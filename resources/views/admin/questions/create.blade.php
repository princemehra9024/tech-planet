@extends('layouts.admin')
@section('title', 'Add Question')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-3xl font-extrabold text-charcoal font-display mb-6">Add Question to {{ $quiz->title }}</h1>
    <form method="POST" action="{{ route('admin.quizzes.questions.store', $quiz) }}" class="space-y-5 rounded-2xl glass-card p-6 border border-charcoal/5 shadow-xl">
        @csrf

        <div>
            <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Question Text</label>
            <textarea name="question_text" rows="3" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Write the question prompt here...">{{ old('question_text') }}</textarea>
            @error('question_text') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option A</label>
                <input name="option_a" value="{{ old('option_a') }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="First option" />
                @error('option_a') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option B</label>
                <input name="option_b" value="{{ old('option_b') }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Second option" />
                @error('option_b') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option C</label>
                <input name="option_c" value="{{ old('option_c') }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Third option" />
                @error('option_c') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Option D</label>
                <input name="option_d" value="{{ old('option_d') }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Fourth option" />
                @error('option_d') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 pt-2">
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Correct Option</label>
                <select name="correct_option" class="w-full bg-charcoal/5  /85 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    <option value="a" {{ old('correct_option') === 'a' ? 'selected' : '' }}>Option A</option>
                    <option value="b" {{ old('correct_option') === 'b' ? 'selected' : '' }}>Option B</option>
                    <option value="c" {{ old('correct_option') === 'c' ? 'selected' : '' }}>Option C</option>
                    <option value="d" {{ old('correct_option') === 'd' ? 'selected' : '' }}>Option D</option>
                </select>
                @error('correct_option') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-charcoal/70 font-semibold text-xs mb-1.5 uppercase tracking-wide">Points</label>
                <input type="number" name="points" min="1" value="{{ old('points', 5) }}" class="w-full bg-charcoal/5  /80 border border-charcoal/10 rounded-xl px-4 py-2.5 text-charcoal focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                @error('points') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-charcoal/5 ">
            <a href="{{ route('admin.quizzes.questions.index', $quiz) }}" class="px-5 py-2.5 border border-charcoal/10 text-charcoal/70 hover:bg-charcoal/5 rounded-xl text-sm font-semibold transition">Cancel</a>
            <button type="submit" class="bg-purple-600 dark:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm shadow hover:shadow-lg transition">Add Question</button>
        </div>
    </form>
</div>
@endsection



