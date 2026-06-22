@extends('layouts.student')
@section('title', 'My Certificates')
@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-charcoal font-display">My Certificates</h1>
    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">View and download your earned certificates.</p>
</div>

@if($certificates->isEmpty())
    <div class="glass-card rounded-2xl p-10 text-center border border-charcoal/10 dark:border-white/10 shadow-lg mt-8">
        <div class="w-20 h-20 bg-charcoal/5 dark:bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-award text-4xl text-slate-400"></i>
        </div>
        <h3 class="text-xl font-bold text-charcoal dark:text-white mb-2">No certificates yet</h3>
        <p class="text-slate-500 dark:text-slate-400 mb-6">Participate in events and competitions to earn certificates!</p>
        <a href="{{ route('student.events') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-lg shadow-purple-500/20">
            Browse Events
        </a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($certificates as $certificate)
            <div class="glass-card rounded-2xl overflow-hidden border border-charcoal/10 dark:border-white/10 shadow-lg hover:shadow-xl transition-shadow flex flex-col h-full card-lift">
                <div class="p-6 flex-grow flex flex-col justify-center items-center text-center relative border-b border-charcoal/5 dark:border-white/5 bg-gradient-to-b from-transparent to-charcoal/5 dark:to-white/5">
                    <div class="absolute top-4 right-4 bg-yellow-500/10 text-yellow-600 dark:text-yellow-400 p-2 rounded-full">
                        <i class="fas fa-medal text-xl"></i>
                    </div>
                    <i class="fas fa-certificate text-6xl text-purple-500/50 mb-4 drop-shadow-sm"></i>
                    <h3 class="text-lg font-bold text-charcoal dark:text-white font-display leading-tight mb-2">{{ $certificate->title }}</h3>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest">Issued: {{ $certificate->created_at->format('M d, Y') }}</p>
                </div>
                
                @if($certificate->description)
                <div class="px-6 py-4 bg-cream/30 dark:bg-charcoal/30 flex-grow">
                    <p class="text-sm text-slate-600 dark:text-slate-400 italic">"{{ $certificate->description }}"</p>
                </div>
                @endif
                
                <div class="p-4 bg-cream-dark/50 dark:bg-charcoal-light/50 border-t border-charcoal/5 dark:border-white/5 flex gap-3">
                    <a href="{{ Storage::url($certificate->file_path) }}" target="_blank" class="flex-1 bg-charcoal text-cream hover:bg-charcoal-light dark:bg-white dark:text-charcoal dark:hover:bg-gray-200 font-bold py-2.5 rounded-xl text-center transition flex items-center justify-center gap-2 text-sm shadow-md">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="{{ Storage::url($certificate->file_path) }}" download class="flex-1 bg-purple-600 text-white hover:bg-purple-700 font-bold py-2.5 rounded-xl text-center transition flex items-center justify-center gap-2 text-sm shadow-md shadow-purple-500/20">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
