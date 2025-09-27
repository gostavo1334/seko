<?php
// app/Http\Controllers/TeamMemberController.php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('dashboard.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('dashboard.team.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        TeamMember::create($validatedData);

        return redirect()->route('team.index')->with('success', 'Team member added successfully!');
    }


    public function edit(TeamMember $teamMember)
    {
        return view('dashboard.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
{
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($teamMember->image_path) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $teamMember->image_path);
            }
            $imagePath = $request->file('image')->store('team_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $teamMember->update($validatedData);

        return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image_path) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $teamMember->image_path);
        }

        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
    }
}

