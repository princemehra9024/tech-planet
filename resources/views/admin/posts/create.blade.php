@extends('layouts.admin')
@section('title', 'New Post')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-3xl font-extrabold text-charcoal font-display mb-6">Publish Announcement</h1>
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-5 rounded-2xl glass-card p-6 border border-charcoal/5 shadow-xl">
        @csrf
        <div>
            <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Post Content</label>
            <textarea name="content" rows="5" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Write your announcement details here...">{{ old('content') }}</textarea>
            @error('content') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Upload Photo (Optional)</label>
            <input type="file" name="photo" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs">
            @error('photo') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('admin.posts.index') }}" class="px-5 py-2.5 border border-charcoal/10 text-charcoal/70 hover:bg-charcoal/5 rounded-xl text-sm font-semibold transition">Cancel</a>
            <button type="submit" class="bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">Publish Post Announcement</button>
        </div>
    </form>
</div>
@endsection



