@extends('layouts.admin')
@section('title', 'Manage Questions')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
        <div>
            <h1 class="text-3xl font-extrabold text-charcoal font-display">Questions for {{ $quiz->title }}</h1>
            <p class="text-sm text-muted mt-1">Edit or delete assessment questions.</p>
        </div>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.quizzes.questions.create', $quiz) }}" class="inline-flex items-center gap-1.5 bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">
            <i class="fas fa-plus text-xs"></i> Add New Question
        </a>
        @endif
    </div>

    <div class="glass-card rounded-2xl overflow-hidden border border-charcoal/5 shadow-2xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/5">
                <thead class="bg-cream-darker/50 ">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Question</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Correct Option</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Points</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-muted uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-cream-dark/30 ">
                    @forelse($quiz->questions as $question)
                    <tr class="hover:bg-charcoal/5 transition duration-150">
                        <td class="px-6 py-4 text-sm font-semibold text-charcoal/80 ">{{ $question->question_text }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-cyan-400 uppercase">{{ $question->correct_option }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-muted">{{ $question->points }} pts</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.questions.edit', $question) }}" class="bg-charcoal/5 border border-charcoal/10 hover:border-cyan-500/30 text-charcoal/70 px-3 py-1.5 rounded-lg text-xs font-bold transition">Edit</a>
                                <form method="POST" action="{{ route('admin.questions.destroy', $question) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this question?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-955/20 border border-rose-500/30 text-rose-400 hover:bg-rose-900/20 px-3 py-1.5 rounded-lg text-xs font-bold transition">Delete</button>
                                </form>
                            @else
                                <span class="text-muted italic">No Actions</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-muted text-sm">
                            <i class="far fa-question-circle text-3xl mb-2 text-slate-600 block"></i>
                            No questions added yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



