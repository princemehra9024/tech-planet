<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Auth::user()->userNotifications()->orderBy('created_at', 'desc')->get();
        // mark as read
        Auth::user()->userNotifications()->update(['is_read' => true]);
        return view('students.notifications', compact('notifications'));
    }

    public function storePushSubscription(\Illuminate\Http\Request $request) {
        $endpoint = $request->endpoint;
        $key = $request->keys['p256dh']; // public key
        $token = $request->keys['auth']; // auth token

        Auth::user()->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true]);
    }
}