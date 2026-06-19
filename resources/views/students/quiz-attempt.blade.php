@extends('layouts.student')
@section('title', 'Attempt Quiz')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="glass-card rounded-3xl p-6 md:p-8 border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-8 -top-8 w-24 h-24 bg-purple-500/5 rounded-full blur-xl pointer-events-none"></div>
        <h1 class="text-3xl font-extrabold text-white font-display tracking-tight">{{ $quiz->title }}</h1>
        <p class="text-slate-400 mt-2 mb-8 text-xs sm:text-sm leading-relaxed">{{ $quiz->description ?? 'Demonstrate syntax proficiency across selected engineering models.' }}</p>
        
        <form method="POST" action="{{ route('student.quiz.submit', $quiz->id) }}" id="quizForm" class="space-y-8">
            @csrf
            @foreach($quiz->questions as $index => $q)
            <div class="border-b border-white/5 pb-8 last:border-0 last:pb-0 space-y-4">
                <p class="font-bold text-white text-sm sm:text-base font-display flex items-start gap-2.5">
                    <span class="text-cyan-400 font-extrabold shrink-0">{{ $index+1 }}.</span> 
                    <span>{{ $q->question_text }}</span>
                </p>
                <div class="ml-4 sm:ml-6 space-y-3 option-group">
                    @foreach(['a', 'b', 'c', 'd'] as $opt)
                        @php
                            $optField = 'option_' . $opt;
                            $text = $q->$optField;
                        @endphp
                        <label class="option-label flex items-center gap-3 bg-[#07080f]/50 border border-white/5 rounded-xl px-4 py-3.5 cursor-pointer hover:border-purple-500/30 transition-all">
                            <input type="radio" name="answers[{{ $q->id }}]" value="{{ $opt }}" required class="quiz-radio bg-obsidian-950 border-white/10 text-purple-650 focus:ring-purple-500 w-4 h-4">
                            <span class="text-slate-350 text-xs sm:text-sm font-semibold">{{ $text }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="pt-6 flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-650 text-white font-bold px-8 py-3 rounded-xl text-xs shadow-lg hover:shadow-cyan-500/10 transition transform hover:-translate-y-0.5">
                    Submit Challenge
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Handle active styling for selected options
    document.querySelectorAll('.quiz-radio').forEach(radio => {
        radio.addEventListener('change', function() {
            // Find parent question group
            const group = this.closest('.option-group');
            // Remove active classes from all labels in this group
            group.querySelectorAll('.option-label').forEach(lbl => {
                lbl.classList.remove('border-purple-500/50', 'bg-purple-950/20');
                lbl.classList.add('border-white/5', 'bg-[#07080f]/50');
            });
            // Add active class to selected option label
            const label = this.closest('.option-label');
            label.classList.remove('border-white/5', 'bg-[#07080f]/50');
            label.classList.add('border-purple-500/50', 'bg-purple-950/20');
        });
    });

    document.getElementById('quizForm').addEventListener('submit', function(e) {
        if(!confirm('Compile and submit answers? You cannot re-attempt this challenge.')) {
            e.preventDefault();
        }
    });
</script>
@endpush