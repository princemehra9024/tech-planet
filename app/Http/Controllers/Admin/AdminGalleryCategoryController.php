<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\GalleryCategory::withCount('galleries')->get();
        return view('admin.gallery-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:gallery_categories,slug'
        ]);

        \App\Models\GalleryCategory::create($request->only(['name', 'slug']));

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = \App\Models\GalleryCategory::findOrFail($id);
        return view('admin.gallery-categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = \App\Models\GalleryCategory::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:gallery_categories,slug,' . $category->id
        ]);

        $category->update($request->only(['name', 'slug']));

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = \App\Models\GalleryCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category deleted.');
    }
}
