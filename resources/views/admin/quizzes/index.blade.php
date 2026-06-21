@extends('layouts.admin')
@section('title', 'Quizzes')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-extrabold text-charcoal font-display">Manage Quizzes</h1>
        <p class="text-sm text-muted mt-1">Create, update, and manage assessments.</p>
    </div>
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.quizzes.create') }}" class="inline-flex items-center gap-1.5 bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">
        <i class="fas fa-plus text-xs"></i> New Quiz
    </a>
    @endif
</div>

<div class="space-y-4">
    @forelse($quizzes as $quiz)
    <div class="glass-card rounded-2xl p-6 border border-charcoal/5 shadow-md">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-xl font-bold text-charcoal font-display">{{ $quiz->title }}</h2>
                <p class="mt-2 text-muted text-sm leading-relaxed">{{ $quiz->description ?: 'No description provided.' }}</p>
                <div class="mt-3 flex items-center gap-2">
                    <span class="bg-purple-950/80 text-purple-300 border border-purple-800/30 text-[10px] uppercase tracking-wider font-extrabold px-2.5 py-0.5 rounded-full">{{ $quiz->questions_count }} Question(s)</span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 shrink-0">
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="bg-charcoal/5 border border-charcoal/10 hover:border-cyan-500/30 text-charcoal/70 px-4 py-2 rounded-xl text-xs font-bold transition">Edit</a>
                @endif
                <a href="{{ route('admin.quizzes.questions.index', $quiz) }}" class="bg-purple-955/20 border border-purple-500/30 text-purple-400 hover:bg-purple-900/20 px-4 py-2 rounded-xl text-xs font-bold transition">
                    {{ auth()->user()->role === 'admin' ? 'Manage Questions' : 'View Questions' }}
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.quizzes.questions.create', $quiz) }}" class="bg-cyan-955/20 border border-cyan-500/30 text-cyan-400 hover:bg-cyan-900/20 px-4 py-2 rounded-xl text-xs font-bold transition">Add Question</a>
                    <form method="POST" action="{{ route('admin.quizzes.destroy', $quiz) }}" onsubmit="return confirm('Are you sure you want to delete this quiz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-rose-955/20 border border-rose-500/30 text-rose-400 hover:bg-rose-900/20 px-4 py-2 rounded-xl text-xs font-bold transition">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="glass-card rounded-2xl p-8 text-center text-muted border border-charcoal/5 ">
        <i class="fas fa-laptop-code text-3xl mb-2 text-slate-600"></i>
        <p class="text-sm">No quizzes available yet. Create one to get started!</p>
    </div>
    @endforelse
</div>
@endsection



