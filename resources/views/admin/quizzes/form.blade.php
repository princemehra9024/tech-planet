@extends('layouts.admin')
@section('title', $quiz->exists ? 'Edit Quiz' : 'New Quiz')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-3xl font-extrabold text-charcoal font-display mb-6">{{ $quiz->exists ? 'Edit Quiz' : 'Create New Quiz' }}</h1>
    <form method="POST" action="{{ $quiz->exists ? route('admin.quizzes.update', $quiz) : route('admin.quizzes.store') }}" class="space-y-5 rounded-2xl glass-card p-6 border border-charcoal/5 shadow-xl">
        @csrf
        @if($quiz->exists)
            @method('PUT')
        @endif

        <div>
            <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Quiz Title</label>
            <input name="title" value="{{ old('title', $quiz->title) }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="e.g., Intro to Algorithms" />
            @error('title') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Description</label>
            <textarea name="description" rows="4" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Provide details about the quiz scope and rules...">{{ old('description', $quiz->description) }}</textarea>
            @error('description') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-charcoal/5 ">
            <a href="{{ route('admin.quizzes.index') }}" class="px-5 py-2.5 border border-charcoal/10 text-charcoal/70 hover:bg-charcoal/5 rounded-xl text-sm font-semibold transition">Cancel</a>
            <button type="submit" class="bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">{{ $quiz->exists ? 'Save Changes' : 'Create Quiz' }}</button>
        </div>
    </form>
</div>
@endsection



