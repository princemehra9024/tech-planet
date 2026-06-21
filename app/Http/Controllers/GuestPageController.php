<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class GuestPageController extends Controller
{
    public function home()
    {
        $upcomingEvent = Event::where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->first();

        return view('home', compact('upcomingEvent'));
    }

    public function about()
    {
        return view('about');
    }

    public function events()
    {
        return view('events');
    }

    public function gallery()
    {
        $categories = \App\Models\GalleryCategory::all();
        $galleries = \App\Models\Gallery::with('category')
            ->orderBy('is_featured', 'desc')
            ->orderBy('event_date', 'desc')
            ->get();

        return view('gallery', compact('categories', 'galleries'));
    }

    public function contact()
    {
        return view('contact');
    }
}
