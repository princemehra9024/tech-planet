@extends('layouts.student')
@section('title', 'Coding Arena')

@section('content')
<div class="space-y-8">
    <div class="relative overflow-hidden p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-cyan-950/40 via-blue-950/40 to-purple-950/40 border border-white/5 shadow-2xl">
        <div class="absolute -right-16 -top-16 w-32 h-32 bg-cyan-500/10 rounded-full blur-xl pointer-events-none"></div>
        <div class="relative z-10">
            <h2 class="text-3xl font-extrabold text-white font-display flex items-center gap-2.5"><i class="fas fa-bolt text-cyan-400"></i> Assessment Arena</h2>
            <p class="text-slate-400 mt-2 text-xs sm:text-sm">Validate your conceptual developer understanding, capture XP rewards, and level up.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 px-5 py-4 rounded-2xl flex items-center gap-2.5">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-rose-950/40 border border-rose-500/30 text-rose-300 px-5 py-4 rounded-2xl flex items-center gap-2.5">
            <i class="fas fa-exclamation-circle text-rose-400"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        @forelse($quizzes as $quiz)
        @php
            // Dynamically assign a visual tag based on name
            $titleLower = strtolower($quiz->title);
            if (str_contains($titleLower, 'hard') || str_contains($titleLower, 'advanced') || str_contains($titleLower, 'system')) {
                $diff = 'Expert';
                $diffClass = 'bg-rose-950/80 text-rose-450 border border-rose-800/20';
                $xpVal = '150 XP';
            } elseif (str_contains($titleLower, 'medium') || str_contains($titleLower, 'react') || str_contains($titleLower, 'web')) {
                $diff = 'Intermediate';
                $diffClass = 'bg-purple-950/80 text-purple-300 border border-purple-800/30';
                $xpVal = '100 XP';
            } else {
                $diff = 'Novice';
                $diffClass = 'bg-cyan-950/80 text-cyan-400 border border-cyan-800/30';
                $xpVal = '50 XP';
            }
        @endphp
        <div class="glass-card rounded-3xl p-6 border border-white/5 hover:border-cyan-500/30 hover:shadow-cyan-500/5 transition-all duration-300 flex flex-col justify-between group relative overflow-hidden">
            <div class="absolute -right-8 -top-8 w-20 h-20 bg-cyan-500/[0.02] rounded-full blur-lg"></div>
            <div>
                <!-- Badge details header -->
                <div class="flex justify-between items-center mb-4">
                    <span class="{{ $diffClass }} text-[9px] uppercase tracking-widest font-bold px-2.5 py-0.5 rounded-full">{{ $diff }}</span>
                    <span class="text-[9px] font-mono font-bold text-slate-500 uppercase tracking-widest bg-white/5 px-2 py-0.5 rounded-md">{{ $xpVal }}</span>
                </div>
                <h3 class="text-lg font-bold text-white font-display mt-2 group-hover:text-cyan-400 transition-colors">{{ $quiz->title }}</h3>
                <p class="text-slate-400 text-xs mt-2.5 leading-relaxed">{{ $quiz->description ?? 'Demonstrate syntax proficiency across selected engineering models.' }}</p>
                <div class="mt-4 flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span><i class="far fa-question-circle text-purple-400 mr-1"></i>{{ $quiz->questions->count() }} Queries</span>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-white/5">
                @if(isset($attempts[$quiz->id]))
                    @php
                        $percentage = ($attempts[$quiz->id]->score / $attempts[$quiz->id]->total_possible) * 100;
                        $scoreClass = $percentage >= 70 ? 'text-emerald-400 border-emerald-800/30 bg-emerald-950/20' : 'text-yellow-400 border-yellow-800/30 bg-yellow-950/20';
                    @endphp
                    <div class="w-full text-center border py-3 rounded-xl text-xs font-bold flex items-center justify-center gap-1.5 {{ $scoreClass }}">
                        <i class="fas fa-trophy text-sm"></i> Finished: {{ $attempts[$quiz->id]->score }} / {{ $attempts[$quiz->id]->total_possible }} Correct
                    </div>
                @else
                    <a href="{{ route('student.quiz.show', $quiz->id) }}" class="inline-block w-full text-center bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-650 text-white font-bold py-3 rounded-xl text-xs shadow hover:shadow-lg transition">Initialize Challenge</a>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-2 glass-card rounded-3xl p-12 text-center text-slate-500 border border-white/5">
            <i class="fas fa-keyboard text-4xl mb-4 text-slate-650 animate-pulse"></i>
            <p class="text-xs font-semibold uppercase tracking-wider">No active challenges deployed in arena.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection