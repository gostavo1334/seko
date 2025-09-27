<?php

namespace App\Http\Controllers;
use App\Models\ProcessImage;
use Illuminate\Http\Request;

class ImageFooterController extends Controller
{
   public function showUploadForm()
    {
        $processImages = ProcessImage::latest()->get();
        return view('dashboard.imageFooter.uploard', compact('processImages'));
    }

    // Method to handle image uploads
public function upload(Request $request)
{
    $request->validate([
        'images'   => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/' . $filename;

            // Move file to public/images
            $image->move(public_path('images'), $filename);

            // Save path to DB
            ProcessImage::create([
                'image_path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('dashboard.imageFooter.uploard')
        ->with('success', 'Images uploaded successfully!');
}
public function destroy(ProcessImage $image)
{
    // Delete the image file from storage
    if (file_exists(public_path($image->image_path))) {
        unlink(public_path($image->image_path));
    }

    // Delete the record from the database
    $image->delete();

    return back()->with('success', 'Image deleted successfully!');
}



}
