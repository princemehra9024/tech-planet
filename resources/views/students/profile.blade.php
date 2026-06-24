@extends('layouts.student')
@section('title', 'Developer Profile')

@section('content')
<div class="w-full md:max-w-3xl mx-auto my-0 md:my-8 pb-12 animate-fade-in-up">
    @if(session('success'))
        <div class="bg-black text-white px-6 py-4 mb-6 text-sm text-center tracking-widest uppercase">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Card Container -->
    <div class="bg-white dark:bg-[#0a0a0a] md:border md:border-gray-200 dark:border-gray-900 md:shadow-[0_20px_50px_rgba(0,0,0,0.05)] dark:md:shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden relative">
        
        <!-- Large Background Image (Editorial Style) -->
        <div class="h-56 md:h-96 w-full relative bg-gray-100 dark:bg-gray-900">
            <!-- Using a high-quality abstract/architectural or clean tech image in black and white -->
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1200&grayscale=true" 
                 alt="Background Cover" 
                 class="w-full h-full object-cover grayscale opacity-90">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/20 dark:to-black/60"></div>
        </div>

        <!-- Overlapping Content Area -->
        <div class="bg-white dark:bg-[#0a0a0a] relative -mt-10 md:-mt-16 pt-0 px-4 md:px-8 pb-8 md:pb-10">
            
            <!-- Avatar overlapping the edge -->
            <div class="absolute -top-10 md:-top-12 left-1/2 -translate-x-1/2 md:translate-x-0 md:left-8">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full p-1 bg-white dark:bg-[#0a0a0a]">
                    <div class="w-full h-full rounded-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center text-gray-800 dark:text-gray-200 text-2xl md:text-3xl font-light overflow-hidden shadow-inner">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
            </div>

            <!-- Top Section: Name, Role, Location, Buttons -->
            <div class="pt-14 md:pt-16 flex flex-col md:flex-row md:items-end justify-between gap-6 md:gap-8 text-center md:text-left">
                
                <!-- Name and Info -->
                <div class="flex flex-col items-center md:items-start w-full md:w-auto">
                    <h1 class="text-[24px] md:text-3xl font-light text-black dark:text-white mb-2 md:mb-3 tracking-tight">
                        {{ $user->name }}
                    </h1>
                    
                    <div class="space-y-1.5 text-sm text-gray-500 dark:text-gray-400 font-light flex flex-col items-center md:items-start">
                        <p class="flex items-center gap-2">
                            <i class="far fa-user-circle w-4 text-center"></i>
                            <span>
                                @if($user->role === 'admin') Administrator
                                @elseif($user->role === 'president') Club President
                                @elseif($user->role === 'secretary') Secretary
                                @elseif($user->role === 'treasurer') Treasurer
                                @elseif($user->role === 'media_manager') Media Manager
                                @else Student Developer
                                @endif
                            </span>
                        </p>
                        <!-- Location -->
                        <p class="text-gray-400 text-sm mt-3 flex items-center justify-center md:justify-start gap-2 w-full">
                            <i class="fas fa-map-marker-alt"></i> {{ $user->location ?? 'Unknown Location' }}
                        </p>
                        <p class="flex items-center gap-2">
                            <i class="far fa-compass w-4 text-center"></i>
                            <span>{{ $user->course ?? 'Course not set' }} &bull; Sem {{ $user->semester ?? '?' }}</span>
                        </p>
                    </div>
                </div>

                <!-- Action Buttons (Solid Black style) -->
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 w-full md:w-auto">
                    <button onclick="shareProfile('{{ route('portfolio.show', $user->portfolioSlug()) }}')" 
                            class="w-full md:w-auto bg-gray-100 hover:bg-gray-200 dark:bg-gray-900 dark:hover:bg-gray-800 text-black dark:text-white px-6 py-3 min-h-[44px] text-[15px] font-medium transition-colors tracking-wide flex justify-center items-center rounded-lg shadow-sm">
                        Share
                    </button>
                    <a href="{{ route('student.profile.edit') }}" 
                       class="w-full md:w-auto bg-black hover:bg-gray-900 dark:bg-white dark:hover:bg-gray-200 dark:text-black text-white px-8 py-3 min-h-[44px] text-[15px] font-medium transition-colors tracking-wide flex justify-center items-center gap-2 rounded-lg shadow-sm">
                        <span>Edit Profile</span>
                    </a>
                </div>
            </div>

            <!-- Stats Section (Large numbers, thin font) -->
            <div class="grid grid-cols-3 mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gray-100 dark:border-gray-900/50 w-full" style="grid-template-columns: repeat(3, 1fr);">
                <div class="text-center flex flex-col items-center justify-center border-r border-gray-100 dark:border-gray-900/50">
                    <p class="text-[11px] md:text-xs uppercase tracking-widest text-gray-400 mb-2 flex items-center justify-center gap-1.5"><i class="far fa-star"></i> <span class="hidden sm:inline">XP</span></p>
                    <p class="text-[28px] md:text-4xl font-light text-black dark:text-white">{{ $user->xp }}</p>
                </div>
                <div class="text-center flex flex-col items-center justify-center border-r border-gray-100 dark:border-gray-900/50">
                    <p class="text-[11px] md:text-xs uppercase tracking-widest text-gray-400 mb-2 flex items-center justify-center gap-1.5"><i class="fas fa-level-up-alt"></i> <span class="hidden sm:inline">Level</span></p>
                    <p class="text-[28px] md:text-4xl font-light text-black dark:text-white">{{ floor($user->xp / 100) }}</p>
                </div>
                <div class="text-center flex flex-col items-center justify-center">
                    <p class="text-[11px] md:text-xs uppercase tracking-widest text-gray-400 mb-2 flex items-center justify-center gap-1.5"><i class="far fa-check-circle"></i> <span class="hidden sm:inline">Badges</span></p>
                    <p class="text-[28px] md:text-4xl font-light text-black dark:text-white">{{ count($badges) }}</p>
                </div>
            </div>

            <!-- Bio Section -->
            <div class="mt-12">
                <p class="text-gray-600 dark:text-gray-400 font-light leading-relaxed text-lg">
                    {{ $user->bio ?? 'No biography provided. A minimalist workspace speaks for itself.' }}
                </p>
            </div>

            <!-- Badges List -->
            @if(count($badges) > 0)
            <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-900/50">
                <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400 mb-6">Achievements</p>
                <div class="flex flex-wrap gap-3">
                    @foreach($badges as $badge)
                        <div class="px-5 py-2 border border-gray-200 dark:border-gray-800 text-sm text-black dark:text-gray-300 font-light tracking-wide flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black dark:bg-white"></span>
                            {{ $badge }}
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
