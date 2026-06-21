@extends('layouts.admin')

@section('title', 'Publish Event')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.suggestions.index') }}" class="text-muted hover:text-charcoal transition flex items-center gap-2 mb-4 text-sm">
        <i class="fas fa-arrow-left"></i> Back to Suggestions
    </a>
    <h1 class="text-3xl font-display font-bold text-charcoal mb-2">Publish Event</h1>
    <p class="text-muted">Finalize details to publish this suggestion as an official club event.</p>
</div>

<div class="glass-card rounded-2xl p-6 md:p-8 max-w-3xl">
    <form method="POST" action="{{ route('admin.suggestions.publish.store', $suggestion->id) }}" class="space-y-6">
        @csrf
        
        <!-- Title -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Event Title <span class="text-rose-500">*</span></label>
            <input type="text" name="title" required value="{{ old('title', $suggestion->title) }}" class="w-full bg-cream-dark/50 /60 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
            @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <!-- Description -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Description <span class="text-rose-500">*</span></label>
            <textarea name="description" required rows="5" class="w-full bg-cream-dark/50 /60 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-1 focus:ring-purple-500 transition resize-y">{{ old('description', $suggestion->description) }}</textarea>
            @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Date & Time -->
            <div>
                <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Date & Time <span class="text-rose-500">*</span></label>
                <input type="datetime-local" name="date" required value="{{ old('date', $suggestion->suggested_date ? \Carbon\Carbon::parse($suggestion->suggested_date)->format('Y-m-d\TH:i') : '') }}" class="w-full bg-cream-dark/50 /60 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
                @error('date') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
            <!-- Max Participants -->
            <div>
                <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Max Participants <span class="text-rose-500">*</span></label>
                <input type="number" name="max_participants" required min="1" max="1000" value="{{ old('max_participants', 100) }}" class="w-full bg-cream-dark/50 /60 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
                @error('max_participants') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        
        <!-- Location -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Venue / Location <span class="text-rose-500">*</span></label>
            <input type="text" name="location" required value="{{ old('location') }}" placeholder="e.g. CSI Lab, Tech Park 5th Floor" class="w-full bg-cream-dark/50 /60 border border-charcoal/10 rounded-xl px-4 py-3 text-charcoal focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
            @error('location') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div class="pt-4 border-t border-charcoal/5 flex justify-end gap-3">
            <a href="{{ route('admin.suggestions.index') }}" class="px-5 py-2.5 border border-charcoal/10 text-charcoal/70 hover:bg-charcoal/5 rounded-xl text-sm font-bold transition">Cancel</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-500 text-charcoal font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-lg shadow-purple-500/20">Publish Event</button>
        </div>
    </form>
</div>
@endsection


