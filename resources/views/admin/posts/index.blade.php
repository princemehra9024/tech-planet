@extends('layouts.admin')
@section('title', 'Manage Posts')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-extrabold text-charcoal font-display">Manage Posts</h1>
        <p class="text-sm text-muted mt-1">All announcement posts created by admins.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-1.5 bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">
        <i class="fas fa-plus text-xs"></i> New Announcement
    </a>
</div>

<div class="space-y-4">
    @forelse($posts as $post)
    <div class="glass-card rounded-2xl p-6 border border-charcoal/5 shadow-md">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-bold text-muted uppercase tracking-wider">By {{ $post->user->name }} â€¢ {{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-3 text-charcoal/80 text-sm leading-relaxed">{{ $post->content }}</p>
                @if($post->image_path)
                    <div class="mt-3 overflow-hidden rounded-xl max-w-md">
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-auto object-cover max-h-60" alt="post photo">
                    </div>
                @endif
            </div>
            @if(auth()->user()->role === 'admin')
            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-rose-955/20 border border-rose-500/30 text-rose-400 hover:bg-rose-900/20 px-4 py-2 rounded-xl text-xs font-bold transition">Delete</button>
            </form>
            @endif
        </div>
    </div>
    @empty
    <div class="glass-card rounded-2xl p-8 text-center text-muted border border-charcoal/5 ">
        <i class="fas fa-bullhorn text-3xl mb-2 text-slate-600"></i>
        <p class="text-sm">No announcements found. Publish one to start!</p>
    </div>
    @endforelse
</div>

<div class="mt-6">{{ $posts->links() }}</div>
@endsection



