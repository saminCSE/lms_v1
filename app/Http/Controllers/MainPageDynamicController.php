<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class MainPageDynamicController extends Controller
{
    public function heroedit()
    {
        $hero = Hero::all()->first();
        return view('admin.heroEdit.heroEdit', compact('hero'));
    }

    public function submit_hero(Request $request)
    {
        // Validate the request data
        $request->validate([
            'hero_title' => 'required|string',
            'hero_description' => 'required|string',
            'hero_video' => 'required|string',
            'workshop_title' => 'required|string',
            'hero_banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=574,height=575',
        ], [
            'hero_banner_image.dimensions' => 'Error Uploading..!! The hero banner image must be exactly 575x575 pixels.',
        ]);

        // Attempt to find the first record, or create a new one if not found
        $hero = Hero::firstOrNew();

        // Update the attributes with the request data
        $hero->hero_title = $request->hero_title;
        $hero->hero_description = $request->hero_description;
        $hero->hero_video = $request->hero_video;
        $hero->workshop_title = $request->workshop_title;

        if ($request->hasFile('hero_banner_image')) {
            $image = $request->file('hero_banner_image');
            $timestamp = now()->timestamp;
            $extension = $image->getClientOriginalExtension();
            $imageName = $timestamp . '.' . $extension;

            // Delete the old image if it exists
            if ($hero->hero_banner_image) {
                $oldImagePath = storage_path('app/public/img/' . $hero->hero_banner_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imagePath = $image->storeAs('public/img', $imageName);
            $hero->hero_banner_image = $imageName;
        }

        // Save the record to the database
        $hero->save();

        // Redirect back
        return redirect()->back()->with('message', 'Hero Banner Section Info added Successfully');
    }

}
