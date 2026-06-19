<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $posts = Post::with('user', 'comments.user', 'likes')->latest()->paginate(10);
        $upcomingEvents = Event::where('date', '>', now())->orderBy('date')->limit(5)->get();
        $leaderboard = User::orderBy('xp', 'desc')->limit(10)->get();
        $user = Auth::user();
        $approvedSuggestions = \App\Models\EventSuggestion::with('votes')->where('status', 'approved')->latest()->get();
        return view('students.dashboard', compact('posts', 'upcomingEvents', 'leaderboard', 'user', 'approvedSuggestions'));
    }

    public function createPost(Request $request) {
        if (! Auth::user()->canManagePosts()) {
            abort(403, 'Access denied. You do not have permission to publish posts.');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,mov,ogg,qt|max:20000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000', // legacy single photo
        ]);

        $media = [];

        // Handle single legacy photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('posts', 'public');
            $media[] = [
                'path' => $path,
                'type' => 'photo'
            ];
        }

        // Handle multiple photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $path = $file->store('posts', 'public');
                $media[] = [
                    'path' => $path,
                    'type' => 'photo'
                ];
            }
        }

        // Handle multiple videos
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $file) {
                $path = $file->store('posts', 'public');
                $media[] = [
                    'path' => $path,
                    'type' => 'video'
                ];
            }
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image_path' => count($media) > 0 && $media[0]['type'] === 'photo' ? $media[0]['path'] : null, // fallback
            'media' => $media,
        ]);

        // Reward posting with 10 XP
        Auth::user()->addXp(10, 'shared a post');

        // Notify all users about new post (simple broadcast)
        $users = User::where('id', '!=', Auth::id())->get();
        foreach ($users as $user) {
            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type' => 'post',
                'message' => Auth::user()->name . ' posted: ' . substr($post->content, 0, 50),
            ]);
        }
        return back()->with('success', 'Post shared on Developer Feed! (+10 XP)');
    }

    public function createEvent(Request $request) {
        if (! Auth::user()->canSeeAdminDetails()) {
            abort(403, 'Access denied. Only board members and admins can create events.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1|max:1000',
        ]);

        \App\Models\Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'max_participants' => $request->max_participants,
        ]);

        return back()->with('success', 'Event successfully created and published!');
    }

    public function likePost($postId) {
        $like = \App\Models\Like::where('user_id', Auth::id())->where('post_id', $postId)->first();
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            \App\Models\Like::create(['user_id' => Auth::id(), 'post_id' => $postId]);
            $liked = true;
        }
        $likesCount = \App\Models\Like::where('post_id', $postId)->count();
        return response()->json([
            'status' => 'ok',
            'likes' => $likesCount,
            'liked' => $liked
        ]);
    }

    public function addComment(Request $request, $postId) {
        $request->validate(['content' => 'required|string|max:500']);
        $comment = \App\Models\Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
            'content' => $request->content,
        ]);
        // Add XP for comment
        Auth::user()->addXp(2, 'commented on post');
        return back()->with('success', 'Comment added!');
    }

    public function voteSuggestion(Request $request, $suggestionId) {
        $request->validate(['vote' => 'required|in:support,neutral,reject']);
        $suggestion = \App\Models\EventSuggestion::findOrFail($suggestionId);

        if ($suggestion->status !== 'approved') {
            return back()->with('error', 'This suggestion is not open for voting.');
        }

        \App\Models\EventSuggestionVote::updateOrCreate(
            ['user_id' => Auth::id(), 'event_suggestion_id' => $suggestionId],
            ['vote' => $request->vote]
        );

        return back()->with('success', 'Your vote has been recorded.');
    }
}