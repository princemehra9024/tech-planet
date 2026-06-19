<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000'
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'image_path' => $photoPath,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post published successfully.');
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can delete posts.');
        }

        $post->delete();
        return back()->with('success', 'Post deleted successfully.');
    }
}
