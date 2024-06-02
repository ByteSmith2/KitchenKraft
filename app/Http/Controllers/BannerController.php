<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('banners', 'public');

        Banner::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }
}
