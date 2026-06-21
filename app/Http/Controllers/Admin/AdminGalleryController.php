<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = \App\Models\Gallery::with('category')->latest()->paginate(15);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = \App\Models\GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'coordinator' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:5120', // Max 5MB
            'is_featured' => 'nullable|boolean'
        ]);

        $path = $request->file('image')->store('public/gallery');
        $publicPath = str_replace('public/', 'storage/', $path);

        \App\Models\Gallery::create([
            'gallery_category_id' => $request->gallery_category_id,
            'title' => $request->title,
            'event_date' => $request->event_date,
            'coordinator' => $request->coordinator,
            'location' => $request->location,
            'description' => $request->description,
            'image_path' => $publicPath,
            'is_featured' => $request->has('is_featured')
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image uploaded successfully.');
    }

    public function edit($id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        $categories = \App\Models\GalleryCategory::all();
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        
        $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'coordinator' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'is_featured' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            // Remove old image if it exists
            $oldPath = str_replace('storage/', 'public/', $gallery->image_path);
            \Illuminate\Support\Facades\Storage::delete($oldPath);
            
            $path = $request->file('image')->store('public/gallery');
            $publicPath = str_replace('public/', 'storage/', $path);
            $gallery->image_path = $publicPath;
        }

        $gallery->update([
            'gallery_category_id' => $request->gallery_category_id,
            'title' => $request->title,
            'event_date' => $request->event_date,
            'coordinator' => $request->coordinator,
            'location' => $request->location,
            'description' => $request->description,
            'is_featured' => $request->has('is_featured')
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        $oldPath = str_replace('storage/', 'public/', $gallery->image_path);
        \Illuminate\Support\Facades\Storage::delete($oldPath);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted.');
    }
}
