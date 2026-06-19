@extends('layouts.admin')
@section('title', 'Edit Question')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-3xl font-extrabold text-white font-display mb-6">Edit Question</h1>
    <form method="POST" action="{{ route('admin.questions.update', $question) }}" class="space-y-5 rounded-2xl glass-card p-6 border border-white/5 shadow-xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Question Text</label>
            <textarea name="question_text" rows="3" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Write the question prompt here...">{{ old('question_text', $question->question_text) }}</textarea>
            @error('question_text') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option A</label>
                <input name="option_a" value="{{ old('option_a', $question->option_a) }}" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('option_a') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option B</label>
                <input name="option_b" value="{{ old('option_b', $question->option_b) }}" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('option_b') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option C</label>
                <input name="option_c" value="{{ old('option_c', $question->option_c) }}" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('option_c') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option D</label>
                <input name="option_d" value="{{ old('option_d', $question->option_d) }}" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('option_d') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 pt-2">
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Correct Option</label>
                <select name="correct_option" class="w-full bg-[#0a0b14]/85 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    <option value="a" {{ old('correct_option', $question->correct_option) === 'a' ? 'selected' : '' }}>Option A</option>
                    <option value="b" {{ old('correct_option', $question->correct_option) === 'b' ? 'selected' : '' }}>Option B</option>
                    <option value="c" {{ old('correct_option', $question->correct_option) === 'c' ? 'selected' : '' }}>Option C</option>
                    <option value="d" {{ old('correct_option', $question->correct_option) === 'd' ? 'selected' : '' }}>Option D</option>
                </select>
                @error('correct_option') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-slate-300 font-semibold text-xs mb-1.5 uppercase tracking-wide">Points</label>
                <input type="number" name="points" min="1" value="{{ old('points', $question->points) }}" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('points') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-white/5">
            <a href="{{ route('admin.quizzes.questions.index', $question->quiz_id) }}" class="px-5 py-2.5 border border-white/10 text-slate-300 hover:bg-white/5 rounded-xl text-sm font-semibold transition">Cancel</a>
            <button type="submit" class="bg-gradient-to-r from-cyan-500 to-purple-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">Save Changes</button>
        </div>
    </form>
</div>
@endsection
