{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Tech Planet Club ')

@section('content')

    <!-- ===== HERO SECTION ===== -->
    <section id="hero" class="relative min-h-screen lg:h-screen lg:overflow-hidden px-4 sm:px-8 pt-20 pb-4">
        <div class="max-w-[1400px] mx-auto w-full h-full">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-5 items-stretch h-full">

                <!-- ===== LEFT COLUMN ===== -->
                <div class="flex flex-col justify-center gap-8 md:gap-12 py-8 lg:py-4 lg:pr-6 h-full">

                    <!-- Top: Meta + Heading -->
                    <div>
                        <!-- Meta row -->
                        <div class="reveal flex items-center gap-3 mb-4">
                            <div class="w-2 h-2 rounded-full bg-sage animate-pulse"></div>
                            <span class="text-muted text-[11px] font-medium tracking-widest uppercase">UOK CSI Department
                                Estd. 2023</span>
                        </div>

                        <!-- Heading with inline avatars -->
                        <div class="reveal">
                            <h1
                                class="font-display font-black text-[clamp(2rem,5.5vw,3.6rem)] leading-[1] tracking-tight text-charcoal mb-3">
                                Shaping the<br>
                                <span class="inline-flex items-center gap-2">
                                    Digital

                                    Frontiers
                            </h1>
                        </div>

                        <!-- Short subtitle -->
                        <p class="reveal reveal-delay-1 text-charcoal/50 text-sm mb-4">Let's get acquainted!</p>
                    </div>

                    <!-- Middle: Description + CTA -->
                    <div class="reveal reveal-delay-1 flex items-start gap-5 mb-4">
                        <span class="text-muted/40 text-[11px] font-semibold mt-0.5 shrink-0 tracking-wider">05</span>
                        <div>
                            <p class="text-charcoal/65 text-[13px] leading-relaxed max-w-[340px] mb-4">
                                Tech Planet is UOK's premier computer science student club. We merge technical rigour,
                                design thinking, and collaborative execution into real-world builds. Join us to level up
                                your engineering capabilities.
                            </p>
                            <a href="{{ url('/events') }}" class="btn-pill btn-pill-primary group text-xs !py-2.5 !px-5">
                                More
                                <svg class="arrow-icon ml-1 inline-block" width="12" height="12"
                                    viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 20 L70 50 L30 80" fill="none" stroke="currentColor" stroke-width="12"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bottom: Stats row -->
                    <div class="reveal reveal-delay-2 flex items-end gap-6 sm:gap-10">
                        <div class="hero-stat" data-target="150">
                            <p class="font-display font-black text-[clamp(1.6rem,3vw,2.2rem)] text-charcoal leading-none">
                                <span class="hero-stat-number">0</span>+</p>
                            <p class="text-charcoal/70 text-xs sm:text-sm font-semibold mt-1">Active Members</p>
                        </div>
                        <div class="hero-stat" data-target="25">
                            <p class="font-display font-black text-[clamp(1.6rem,3vw,2.2rem)] text-charcoal leading-none">
                                <span class="hero-stat-number">0</span>+</p>
                            <p class="text-charcoal/70 text-xs sm:text-sm font-semibold mt-1">Tech Campaigns</p>
                        </div>
                        <div class="hero-stat" data-target="12">
                            <p class="font-display font-black text-[clamp(1.6rem,3vw,2.2rem)] text-charcoal leading-none">
                                <span class="hero-stat-number">0</span>+</p>
                            <p class="text-charcoal/70 text-xs sm:text-sm font-semibold mt-1">Bootcamp Seminars</p>
                        </div>
                    </div>
                </div>

                <!-- ===== RIGHT COLUMN: Immersive Image ===== -->
                <div class="reveal reveal-delay-1 relative rounded-[1.5rem] overflow-hidden min-h-[500px] lg:min-h-0" style="margin-top: 20px;">

                    <!-- Main hero image -->
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&q=85&w=1200&h=1600"
                        alt="Tech community collaboration"
                        class="w-full h-full object-cover absolute inset-0 transition-transform duration-[2s] hover:scale-105">

                    <!-- Gradient overlays -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-l from-transparent to-black/15 pointer-events-none"></div>

                    <!-- Top-right floating location card -->
                    <div class="absolute top-4 right-4 hero-float-card z-10">
                        <div class="glass-dark rounded-xl p-3 flex items-center gap-3 border border-white/10 shadow-2xl">
                            <div>
                                <p class="text-white font-display font-bold text-xs leading-tight">TechPlanet Club</p>
                                <p class="text-white/50 text-[10px]">Kota, Raj.</p>
                            </div>
                            <div class="w-10 h-10 rounded-lg overflow-hidden shrink-0 border border-white/10">
                                <img src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=80&h=80"
                                    alt="Campus" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-charcoal flex items-center justify-center text-white mt-2 hover:bg-warm transition-colors cursor-pointer shadow-lg">
                            <i class="fas fa-arrow-up-right text-[10px]"></i>
                        </div>
                    </div>

                    <!-- Bottom-left floating featured event card (Hidden on mobile) -->
                    @if($upcomingEvent)
                    <div class="absolute bottom-16 left-4 hero-float-card z-10 hidden md:block"
                        style="animation-delay: 1.5s;">
                        <div
                            class="hero-featured-card group relative w-[200px] rounded-xl overflow-hidden border border-white/10 shadow-2xl cursor-pointer">
                            <div class="img-zoom aspect-[16/10]">
                                <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?auto=format&fit=crop&q=80&w=400"
                                    alt="{{ $upcomingEvent->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-5">
                                <p class="text-white/90 font-display font-semibold text-xs">{{ Str::limit($upcomingEvent->title, 25) }}</p>
                                <div class="flex items-center justify-between mt-1">
                                    <span
                                        class="inline-flex items-center gap-1 text-[9px] text-white/60 bg-cream-dark/10 backdrop-blur-sm px-1.5 py-0.5 rounded-full">
                                        <i class="fas fa-fire text-amber-400 text-[7px]"></i> Upcoming
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Bottom overlay: description + filter buttons -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5 z-10">
                        
                        <!-- Filter bar -->
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ url('/events') }}"
                                class="hero-filter-btn flex items-center gap-1.5 px-4 py-2 rounded-full border border-white/20 bg-cream-dark/5 backdrop-blur-md text-white text-xs font-medium hover:bg-cream-dark/15 transition-all">
                                Events <i class="fas fa-chevron-down text-[8px] text-white/40"></i>
                            </a>
                            <a href="{{ url('/gallery') }}"
                                class="hero-filter-btn flex items-center gap-1.5 px-4 py-2 rounded-full border border-white/20 bg-cream-dark/5 backdrop-blur-md text-white text-xs font-medium hover:bg-cream-dark/15 transition-all">
                                Gallery <i class="fas fa-chevron-down text-[8px] text-white/40"></i>
                            </a>
                            <a href="{{ url('/about') }}"
                                class="hero-filter-btn px-5 py-2 rounded-full bg-charcoal text-white text-xs font-semibold hover:bg-warm transition-all shadow-lg">
                                Explore
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===== SCROLLING MARQUEE ===== -->
    <div class="marquee-container relative py-6 sm:py-8 overflow-hidden bg-charcoal border-y border-white/5 my-12 z-20" style="width:98vw ">
        <!-- Glow effect -->
        <div
            class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10 pointer-events-none opacity-50 mix-blend-screen">
        </div>

        <div class="marquee-track group flex items-center">
            <!-- First Set -->
            <div class="flex items-center whitespace-nowrap px-4">
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-blue-400 cursor-default transition-colors duration-300">workshops</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-blue hover:text-blue-400/20 cursor-default transition-all duration-300">hackathons</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-purple-400 cursor-default transition-colors duration-300">bootcamps</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-purple hover:text-purple-400/20 cursor-default transition-all duration-300">networking</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-pink-400 cursor-default transition-colors duration-300">innovation</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-pink hover:text-pink-400/20 cursor-default transition-all duration-300">open
                    source</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
            </div>
            <!-- Duplicate for infinite scroll (Second Set) -->
            <div class="flex items-center whitespace-nowrap px-4">
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-blue-400 cursor-default transition-colors duration-300">workshops</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-blue hover:text-blue-400/20 cursor-default transition-all duration-300">hackathons</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-purple-400 cursor-default transition-colors duration-300">bootcamps</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-purple hover:text-purple-400/20 cursor-default transition-all duration-300">networking</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-cream tracking-tighter uppercase hover:text-pink-400 cursor-default transition-colors duration-300">innovation</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
                <span
                    class="font-display font-black text-5xl sm:text-6xl md:text-7xl text-transparent text-stroke-cream tracking-tighter uppercase hover:text-stroke-pink hover:text-pink-400/20 cursor-default transition-all duration-300">open
                    source</span>
                <span class="text-warm mx-6 sm:mx-10 text-3xl opacity-50 animate-pulse">âœ¦</span>
            </div>
        </div>
    </div>

    <!-- ===== ABOUT / COLLECTION SECTION ===== -->
    <section class="py-12 sm:py-16 px-6 sm:px-10">
        <div class="max-w-[1400px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Image side -->
                <div class="reveal flex justify-center lg:justify-end px-2 sm:px-6">
                    <div class="relative w-full max-w-[440px]">
                        <!-- Single High-Quality Frame (Reduced Height) -->
                        <div
                            class="rounded-[2.5rem] overflow-hidden aspect-square shadow-[0_25px_60px_-15px_rgba(0,0,0,0.3)] border-8 border-white/90 bg-cream-dark/50 backdrop-blur-md relative group">
                            <!-- Overlay for contrast -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-charcoal/60 via-charcoal/0 to-transparent z-10 pointer-events-none">
                            </div>

                            <!-- High Quality Image -->
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=100&w=1200"
                                alt="Team collaboration"
                                class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">

                            <!-- Integrated floating badge -->
                            <div
                                class="absolute bottom-6 left-6 z-20 bg-cream-dark/95 backdrop-blur-md px-6 py-3 rounded-2xl shadow-xl border border-white/50 transform transition-transform group-hover:-translate-y-1">
                                <span
                                    class="text-white font-display font-black text-sm tracking-widest uppercase flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                                    Est. 2023
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Text side -->
                <div class="reveal reveal-delay-1">
                    <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">About Us</span>
                    <h2
                        class="animate-text font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-charcoal leading-[1.05] mb-6">
                        Shaping digital frontiers
                    </h2>
                    <p class="text-charcoal/60 text-base leading-relaxed mb-8 max-w-lg">
                        To build a premier tech incubator where students transition from writing elementary code to
                        deploying distributed enterprise software, cultivating standard practices of modern engineering.
                    </p>
                    <!-- Mini gallery -->
                    <div class="flex gap-3 mb-10">
                        <div class="w-16 h-16 rounded-xl overflow-hidden img-zoom"><img
                                src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?auto=format&fit=crop&w=200"
                                alt="" class="w-full h-full object-cover"></div>
                        <div class="w-16 h-16 rounded-xl overflow-hidden img-zoom"><img
                                src="https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=200"
                                alt="" class="w-full h-full object-cover"></div>
                        <div class="w-16 h-16 rounded-xl overflow-hidden img-zoom"><img
                                src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?auto=format&fit=crop&w=200"
                                alt="" class="w-full h-full object-cover"></div>
                        <div class="w-16 h-16 rounded-xl overflow-hidden img-zoom"><img
                                src="https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&w=200"
                                alt="" class="w-full h-full object-cover"></div>
                    </div>
                    <p class="text-muted text-sm italic mb-6">We embrace quality, innovation, and community.</p>
                    <a href="{{ url('/about') }}" class="btn-pill btn-pill-primary group">
                        view more <i class="fas fa-arrow-right arrow-icon text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATS SECTION ===== -->
    <section class="py-12 px-6 sm:px-10 bg-charcoal">
        <div class="max-w-[1400px] mx-auto">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="reveal text-center py-6">
                    <p class="font-display font-bold text-5xl sm:text-6xl text-cream mb-2">150<span>+</span></p>
                    <p class="text-cream text-sm font-medium">Active Members</p>
                </div>
                <div class="reveal reveal-delay-1 text-center py-6">
                    <p class="font-display font-bold text-5xl sm:text-6xl text-cream mb-2">25<span>+</span></p>
                    <p class="text-cream text-sm font-medium">Tech Campaigns</p>
                </div>
                <div class="reveal reveal-delay-2 text-center py-6">
                    <p class="font-display font-bold text-5xl sm:text-6xl text-cream mb-2">12<span>+</span></p>
                    <p class="text-cream text-sm font-medium">Bootcamp Seminars</p>
                </div>
                <div class="reveal reveal-delay-3 text-center py-6">
                    <p class="font-display font-bold text-5xl sm:text-6xl text-cream mb-2">5<span>+</span></p>
                    <p class="text-cream text-sm font-medium">Industry Partners</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== VERTICALS / FEATURED SECTION ===== -->
    <section class="py-12 sm:py-16 px-6 sm:px-10">
        <div class="max-w-[1400px] mx-auto">
            <div class="reveal text-center mb-16">
                <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">What We Do</span>
                <h2 class="animate-text font-display font-bold text-4xl sm:text-5xl text-charcoal">Our Verticals</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Technical Core -->
                <div
                    class="reveal card-lift group relative rounded-[2rem] p-[1.5px] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_-15px_rgba(59,130,246,0.3)]">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-charcoal/10 to-charcoal/5 group-hover:from-blue-500 group-hover:to-cyan-400 transition-colors duration-500 opacity-50 group-hover:opacity-100">
                    </div>
                    <div
                        class="relative h-full bg-cream rounded-[calc(2rem-1.5px)] p-8 overflow-hidden z-10 flex flex-col">
                        <div
                            class="absolute -top-12 -right-12 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl group-hover:bg-blue-500/25 transition-all duration-700 group-hover:scale-150">
                        </div>
                        <div
                            class="relative w-14 h-14 rounded-2xl bg-charcoal/5 border border-charcoal/10 flex items-center justify-center text-charcoal text-xl mb-6 group-hover:scale-110 group-hover:text-blue-500 group-hover:border-blue-500/30 group-hover:bg-blue-500/10 transition-all duration-500 shadow-sm z-20">
                            <i class="fas fa-terminal"></i>
                        </div>
                        <h3
                            class="relative font-display font-bold text-xl text-charcoal mb-3 transition-colors duration-300 group-hover:text-blue-500 z-20">
                            Technical Core
                        </h3>
                        <p class="relative text-charcoal/70 text-sm leading-relaxed mt-1 flex-grow z-20">
                            Full-stack application development, open-source systems, cloud setups, and DevOps orchestration.
                        </p>
                        <div
                            class="relative mt-6 flex items-center gap-2 text-xs font-semibold text-charcoal/40 group-hover:text-blue-500 transition-colors duration-300 z-20">
                            <span class="tracking-wider uppercase text-[10px]">Explore</span>
                            <i
                                class="fas fa-arrow-right transform -translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- AI/ML Lab -->
                <div
                    class="reveal reveal-delay-1 card-lift group relative rounded-[2rem] p-[1.5px] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_-15px_rgba(168,85,247,0.3)]">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-charcoal/10 to-charcoal/5 group-hover:from-purple-500 group-hover:to-fuchsia-400 transition-colors duration-500 opacity-50 group-hover:opacity-100">
                    </div>
                    <div
                        class="relative h-full bg-cream rounded-[calc(2rem-1.5px)] p-8 overflow-hidden z-10 flex flex-col">
                        <div
                            class="absolute -top-12 -right-12 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/25 transition-all duration-700 group-hover:scale-150">
                        </div>
                        <div
                            class="relative w-14 h-14 rounded-2xl bg-charcoal/5 border border-charcoal/10 flex items-center justify-center text-charcoal text-xl mb-6 group-hover:scale-110 group-hover:text-purple-500 group-hover:border-purple-500/30 group-hover:bg-purple-500/10 transition-all duration-500 shadow-sm z-20">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3
                            class="relative font-display font-bold text-xl text-charcoal mb-3 transition-colors duration-300 group-hover:text-purple-500 z-20">
                            AI / ML Lab
                        </h3>
                        <p class="relative text-charcoal/70 text-sm leading-relaxed mt-1 flex-grow z-20">
                            Neural networks, custom vision engines, NLP agents, and machine learning pipelines.
                        </p>
                        <div
                            class="relative mt-6 flex items-center gap-2 text-xs font-semibold text-charcoal/40 group-hover:text-purple-500 transition-colors duration-300 z-20">
                            <span class="tracking-wider uppercase text-[10px]">Explore</span>
                            <i
                                class="fas fa-arrow-right transform -translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Creative Dept -->
                <div
                    class="reveal reveal-delay-2 card-lift group relative rounded-[2rem] p-[1.5px] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_-15px_rgba(236,72,153,0.3)]">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-charcoal/10 to-charcoal/5 group-hover:from-pink-500 group-hover:to-rose-400 transition-colors duration-500 opacity-50 group-hover:opacity-100">
                    </div>
                    <div
                        class="relative h-full bg-cream rounded-[calc(2rem-1.5px)] p-8 overflow-hidden z-10 flex flex-col">
                        <div
                            class="absolute -top-12 -right-12 w-40 h-40 bg-pink-500/10 rounded-full blur-3xl group-hover:bg-pink-500/25 transition-all duration-700 group-hover:scale-150">
                        </div>
                        <div
                            class="relative w-14 h-14 rounded-2xl bg-charcoal/5 border border-charcoal/10 flex items-center justify-center text-charcoal text-xl mb-6 group-hover:scale-110 group-hover:text-pink-500 group-hover:border-pink-500/30 group-hover:bg-pink-500/10 transition-all duration-500 shadow-sm z-20">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3
                            class="relative font-display font-bold text-xl text-charcoal mb-3 transition-colors duration-300 group-hover:text-pink-500 z-20">
                            Creative & UI/UX
                        </h3>
                        <p class="relative text-charcoal/70 text-sm leading-relaxed mt-1 flex-grow z-20">
                            Design systems, responsive interfaces, branding strategy, and high-fidelity prototype mockups.
                        </p>
                        <div
                            class="relative mt-6 flex items-center gap-2 text-xs font-semibold text-charcoal/40 group-hover:text-pink-500 transition-colors duration-300 z-20">
                            <span class="tracking-wider uppercase text-[10px]">Explore</span>
                            <i
                                class="fas fa-arrow-right transform -translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Coding Arena -->
                <div
                    class="reveal reveal-delay-3 card-lift group relative rounded-[2rem] p-[1.5px] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_-15px_rgba(245,158,11,0.4)]">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-amber-500/50 to-orange-400/50 group-hover:from-amber-400 group-hover:to-orange-500 transition-colors duration-500 opacity-100">
                    </div>
                    <div
                        class="relative h-full bg-charcoal rounded-[calc(2rem-1.5px)] p-8 overflow-hidden z-10 flex flex-col">
                        <div
                            class="absolute -top-12 -right-12 w-40 h-40 bg-amber-500/20 rounded-full blur-3xl group-hover:bg-amber-500/30 transition-all duration-700 group-hover:scale-150">
                        </div>

                        <div
                            class="absolute top-0 right-8 bg-amber-500 text-charcoal text-[9px] font-bold tracking-widest uppercase px-3 py-1 rounded-b-lg shadow-lg transform origin-top group-hover:scale-110 transition-transform duration-300 z-20">
                            Featured
                        </div>

                        <div
                            class="relative w-14 h-14 rounded-2xl bg-cream-dark/5 border border-white/10 flex items-center justify-center text-amber-400 text-xl mb-6 group-hover:scale-110 group-hover:text-amber-300 group-hover:border-amber-400/30 group-hover:bg-amber-400/10 transition-all duration-500 shadow-sm z-20">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3
                            class="relative font-display font-bold text-xl text-cream mb-3 transition-colors duration-300 group-hover:text-amber-400 z-20">
                            Outreach & Ops
                        </h3>
                        <p class="relative text-cream/70 text-sm leading-relaxed mt-1 flex-grow z-20">
                            Event organization, community engagement, branding outreach, and industrial collaborations.
                        </p>
                        <div class="relative mt-6 z-20">
                            <a href="{{ url('/signup') }}"
                                class="btn-pill inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-amber-500 text-charcoal text-xs font-bold hover:bg-amber-400 transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(245,158,11,0.4)] group/btn">
                                Join Now <i
                                    class="fas fa-arrow-right arrow-icon text-[10px] transform group-hover/btn:rotate-[-45deg] transition-transform duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== UPCOMING EVENT HIGHLIGHT ===== -->
    @if($upcomingEvent)
    <section class="py-12 sm:py-16 px-6 sm:px-10 bg-cream-dark">
        <div class="max-w-[1400px] mx-auto">
            <div class="reveal grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image -->
                <div
                    class="rounded-3xl overflow-hidden aspect-video img-zoom shadow-xl shadow-charcoal/5 outline outline-2 outline-offset-[6px] outline-charcoal/20 dark:outline-white/20">
                    <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?auto=format&fit=crop&q=80&w=900"
                        alt="{{ $upcomingEvent->title }}" class="w-full h-full object-cover">
                </div>
                <!-- Details -->
                <div>
                    <span
                        class="inline-block bg-warm/10 text-warm text-xs font-semibold px-3 py-1 rounded-full mb-6">Upcoming
                        Event</span>
                    <h2 class="animate-text font-display font-bold text-4xl sm:text-5xl text-charcoal leading-[1.1] mb-4">
                        {{ $upcomingEvent->title }}</h2>
                    <div class="flex items-center gap-4 text-muted text-sm mb-6">
                        <span><i class="far fa-calendar-alt mr-2 text-warm"></i>{{ \Carbon\Carbon::parse($upcomingEvent->date)->format('F j, Y, g:i A') }}</span>
                        <span><i class="fas fa-map-marker-alt mr-2 text-warm"></i>{{ $upcomingEvent->location ?? 'TBA' }}</span>
                    </div>
                    <p class="text-charcoal/60 text-base leading-relaxed mb-8 max-w-md">
                        {{ Str::limit($upcomingEvent->description, 150) }}
                    </p>
                    <a href="{{ url('/events') }}" class="btn-pill btn-pill-primary group">
                        Register Now <i class="fas fa-arrow-right arrow-icon text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection
