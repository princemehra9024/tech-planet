@extends('layouts.admin')

@section('title', 'Create New Event')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.events.index') }}" class="text-slate-400 hover:text-white transition flex items-center gap-2 mb-4 text-sm">
        <i class="fas fa-arrow-left"></i> Back to Events
    </a>
    <h1 class="text-3xl font-display font-bold text-white mb-2">Create New Event</h1>
    <p class="text-slate-400">Schedule and publish a new official club event.</p>
</div>

<div class="glass-card rounded-2xl p-6 md:p-8 max-w-3xl">
    <form method="POST" action="{{ route('admin.events.store') }}" class="space-y-6">
        @csrf
        
        <!-- Title -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Event Title <span class="text-rose-500">*</span></label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Intro to Web3 Workshop" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
            @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <!-- Description -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Description <span class="text-rose-500">*</span></label>
            <textarea name="description" required rows="5" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition resize-y" placeholder="Describe the event, agenda, requirements...">{{ old('description') }}</textarea>
            @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Date & Time -->
            <div>
                <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Date & Time <span class="text-rose-500">*</span></label>
                <input type="datetime-local" name="date" required value="{{ old('date') }}" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
                @error('date') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
            <!-- Max Participants -->
            <div>
                <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Max Participants <span class="text-rose-500">*</span></label>
                <input type="number" name="max_participants" required min="1" max="1000" value="{{ old('max_participants', 100) }}" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
                @error('max_participants') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        
        <!-- Location -->
        <div>
            <label class="block text-slate-350 font-semibold text-xs mb-2 uppercase tracking-widest">Venue / Location <span class="text-rose-500">*</span></label>
            <input type="text" name="location" required value="{{ old('location') }}" placeholder="e.g. CSI Lab, Tech Park 5th Floor" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition">
            @error('location') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div class="pt-4 border-t border-white/5 flex justify-end gap-3">
            <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 border border-white/10 text-slate-300 hover:bg-white/5 rounded-xl text-sm font-bold transition">Cancel</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-lg shadow-purple-500/20">Create Event</button>
        </div>
    </form>
</div>
@endsection
