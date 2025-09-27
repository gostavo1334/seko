<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Display the upload event form and list of existing events (Backend)
    public function create()
    {
        $events = Event::with('images')->get();
        return view('New.upload_event', compact('events'));
    }

    // Store a new event and its images
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('event_images', 'public');

                EventImage::create([
                    'event_id' => $event->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('upload.event')->with('success', 'Event uploaded successfully!');
    }

    // Show the edit form for an event
    public function edit($id)
    {
        $event = Event::with('images')->findOrFail($id);
        return view('New.edit_event', compact('event'));
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('event_images', 'public');

                EventImage::create([
                    'event_id' => $event->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('upload.event')->with('success', 'Event updated successfully!');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete associated images
        foreach ($event->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $event->delete();

        return redirect()->route('upload.event')->with('success', 'Event deleted successfully!');
    }

    // Delete an image
    public function destroyImage($id)
    {
        $image = EventImage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted successfully!');
    }

    // Display event details (Frontend)
    public function show($id)
    {
        $event = Event::with('images')->findOrFail($id);
        return view('New.event_detail', compact('event'));
    }
}
