{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - Tech Planet Club')

@section('content')
    <section id="about-hero" class="relative min-h-screen overflow-hidden px-4 sm:px-8 pt-24 pb-12 flex items-center">
        <div class="max-w-[1400px] mx-auto w-full h-full flex flex-col justify-center">
            <!-- Split layout for header and cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left: Intro text -->
                <div class="reveal flex flex-col justify-center pr-0 lg:pr-10">
                    <span class="text-warm text-[11px] font-semibold tracking-widest uppercase mb-4 block">About Us</span>
                    <h1 class="animate-text font-display font-black text-[clamp(2.5rem,6vw,5rem)] text-charcoal tracking-tight leading-[1] mb-6">
                        Who we are
                    </h1>
                    <p class="text-charcoal/60 text-sm sm:text-base leading-relaxed mb-8 max-w-md">
                        Tech Planet is an elite student Club under the Computer Science and Informatics (CSI) Dept., bridging tech education and industry skills.
                    </p>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-3 glass px-4 py-3 rounded-xl border border-charcoal/10 shadow-sm">
                            <div class="w-10 h-10 rounded-full bg-sage/10 flex items-center justify-center text-sage">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-muted font-medium uppercase tracking-wider">Community</p>
                                <p class="font-display font-bold text-sm text-charcoal leading-none mt-1">Student Driven</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Vision and Mission Cards -->
                <div class="relative flex flex-col gap-6 justify-center">
                    <!-- Decorative background blur -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-warm/5 rounded-full blur-[100px] -z-10"></div>
                    
                    <!-- Vision Card -->
                    <div class="reveal reveal-delay-1 relative group w-full">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-warm to-sage rounded-3xl blur opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                        <div class="relative glass rounded-3xl p-6 sm:p-8 border border-charcoal/10">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-warm/10 flex items-center justify-center text-warm text-base">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h2 class="font-display font-bold text-xl text-charcoal">Our Vision</h2>
                            </div>
                            <p class="text-charcoal/65 text-[13px] sm:text-sm leading-relaxed">
                                To build a premier tech incubator where students transition from writing elementary code to deploying distributed enterprise software, cultivating standard practices of modern engineering.
                            </p>
                        </div>
                    </div>

                    <!-- Mission Card -->
                    <div class="reveal reveal-delay-2 relative group w-full ml-0 lg:ml-8">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-sage to-warm rounded-3xl blur opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                        <div class="relative glass rounded-3xl p-6 sm:p-8 border border-charcoal/10">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-sage/10 flex items-center justify-center text-sage text-base">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h2 class="font-display font-bold text-xl text-charcoal">Our Mission</h2>
                            </div>
                            <p class="text-charcoal/65 text-[13px] sm:text-sm leading-relaxed">
                                Empower members with high-fidelity bootcamps, community hackathons, product mentorship, and direct industry collaboration, shaping students into highly capable software developers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Timeline -->
        <div class="mb-24 relative" id="journey-section">
            <div class="reveal text-center mb-16">
                <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Milestones</span>
                <h2 class="animate-text font-display font-bold text-4xl sm:text-5xl text-charcoal">Our Journey</h2>
            </div>
            
            <div class="relative max-w-3xl mx-auto py-10" id="journey-container">
                <!-- Custom Animated Line -->
                <div class="absolute left-4 sm:left-1/2 top-0 bottom-0 w-1 bg-charcoal/5 rounded-full transform sm:-translate-x-1/2">
                    <div id="journey-progress" class="absolute top-0 left-0 w-full bg-charcoal rounded-full" style="height: 0%;"></div>
                    <div id="journey-pointer" class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4 h-4 bg-cream-dark border-4 border-charcoal rounded-full shadow-lg transition-transform duration-100 ease-out z-10" style="top: 0%;"></div>
                </div>

                <!-- Timeline Item 1 -->
                <div class="reveal relative pl-12 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-8 mb-12 items-center">
                    <div class="sm:text-right sm:pr-8">
                        <div class="glass p-6 rounded-2xl border border-charcoal/10 hover:border-warm/30 transition-all duration-300 card-lift inline-block text-left w-full">
                            <span class="inline-block bg-warm/10 text-warm text-xs font-semibold px-3 py-1 rounded-full mb-3">September 2023</span>
                            <h3 class="font-display font-bold text-lg text-charcoal mb-2">SRM Chapter Inauguration</h3>
                            <p class="text-charcoal/60 text-sm leading-relaxed">Launched under the CSI Department with a cohort of 40 core students, setting objectives for regular tech campaigns.</p>
                        </div>
                    </div>
                    <div class="hidden sm:block"></div>
                    <div class="absolute left-2.5 sm:left-1/2 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-warm border-4 border-cream transform sm:-translate-x-1/2 shadow-md z-20"></div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="reveal reveal-delay-1 relative pl-12 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-8 mb-12 items-center">
                    <div class="hidden sm:block"></div>
                    <div class="sm:pl-8">
                        <div class="glass p-6 rounded-2xl border border-charcoal/10 hover:border-warm/30 transition-all duration-300 card-lift inline-block text-left w-full">
                            <span class="inline-block bg-sage/10 text-sage text-xs font-semibold px-3 py-1 rounded-full mb-3">May 2024</span>
                            <h3 class="font-display font-bold text-lg text-charcoal mb-2">National AI Summit</h3>
                            <p class="text-charcoal/60 text-sm leading-relaxed">Hosted a 24-hour bootcamp detailing transformers, custom vision engines, and edge computing architectures with 200+ attendees.</p>
                        </div>
                    </div>
                    <div class="absolute left-2.5 sm:left-1/2 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-sage border-4 border-cream transform sm:-translate-x-1/2 shadow-md z-20"></div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="reveal reveal-delay-2 relative pl-12 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-8 items-center">
                    <div class="sm:text-right sm:pr-8">
                        <div class="glass p-6 rounded-2xl border border-charcoal/10 hover:border-warm/30 transition-all duration-300 card-lift inline-block text-left w-full">
                            <span class="inline-block bg-warm/10 text-warm text-xs font-semibold px-3 py-1 rounded-full mb-3">April 2025</span>
                            <h3 class="font-display font-bold text-lg text-charcoal mb-2">AI Forge Hackathon Launch</h3>
                            <p class="text-charcoal/60 text-sm leading-relaxed">Announced our largest inter-college hackathon with cash rewards, AWS computing credits, and industry placements.</p>
                        </div>
                    </div>
                    <div class="hidden sm:block"></div>
                    <div class="absolute left-2.5 sm:left-1/2 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-warm border-4 border-cream transform sm:-translate-x-1/2 shadow-md z-20"></div>
                </div>
            </div>
        </div>

        <!-- Team -->
        <div class="mb-24">
            <div class="reveal text-center mb-16">
                <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Our People</span>
                <h2 class="animate-text font-display font-bold text-4xl sm:text-5xl text-charcoal">Core Developers</h2>
            </div>

            @php
                $devs = [
                    [
                        'name' => 'Aditya', 
                        'role' => 'Platform Architect & Lead Developer', 
                        'img' => asset('storage/devs/aditya.png'),
                        'portfolio' => 'https://aditya-chauhan.vercel.app'
                    ],
                    [
                        'name' => 'Prince Mehra', 
                        'role' => 'UI/UX and Frontend', 
                        'img' => asset('storage/devs/prince.jfif'),
                        'portfolio' => 'https://portfolio-prince-opal.vercel.app/'
                    ]
                ];
            @endphp
            
            <div class="flex flex-wrap justify-center gap-8 mb-24">
                @foreach($devs as $i => $member)
                @if(isset($member['portfolio']))
                <a href="{{ $member['portfolio'] }}" target="_blank" class="reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }} w-full sm:w-[280px] glass rounded-3xl p-6 border border-charcoal/10 relative overflow-hidden group card-lift shadow-lg flex flex-col items-center text-center block cursor-pointer">
                @else
                <div class="reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }} w-full sm:w-[280px] glass rounded-3xl p-6 border border-charcoal/10 relative overflow-hidden group card-lift shadow-lg flex flex-col items-center text-center">
                @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-warm/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative w-40 h-40 rounded-2xl mx-auto mb-6 overflow-hidden border-2 border-charcoal/10 group-hover:border-warm transition-colors duration-300 shadow-md">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-all duration-700">
                    </div>
                    <h3 class="font-display font-bold text-lg text-charcoal mb-1 relative z-10">{{ $member['name'] }}</h3>
                    <p class="text-warm text-sm font-medium relative z-10 mb-2">{{ $member['role'] }}</p>
                    
                    <div class="flex gap-3 text-charcoal/40 group-hover:text-charcoal/70 transition-colors relative z-10 mt-auto pt-2">
                        @if(isset($member['portfolio']))
                            <span class="text-warm/80 group-hover:text-warm transition-colors text-sm"><i class="fas fa-arrow-up-right-from-square"></i></span>
                        @endif
                    </div>
                @if(isset($member['portfolio']))
                </a>
                @else
                </div>
                @endif
                @endforeach
            </div>

            <!-- Committee -->
            <div class="reveal text-center mb-16 mt-8">
                <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Leadership</span>
                <h2 class="animate-text font-display font-bold text-4xl sm:text-5xl text-charcoal">Session 2026-2027 Committee</h2>
            </div>

            @php
                $committee = [
                    [
                        'name' => 'Aditya', 
                        'role' => 'Secretary', 
                        'img' => asset('storage/devs/aditya.png'),
                    ],
                    [
                        'name' => 'Ram Lakhan Nagar', 
                        'role' => 'Active President', 
                        'img' => asset('storage/devs/ram.jfif'),
                    ],
                    [
                        'name' => 'Kanak Maheshwari', 
                        'role' => 'Active Treasurer', 
                        'img' => asset('storage/devs/kanak.jpeg'),
                        'img_position' => 'object-[50%_20%]'
                    ]
                ];
            @endphp
            
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($committee as $i => $member)
                <div class="reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }} w-full sm:w-[280px] glass rounded-3xl p-6 border border-charcoal/10 relative overflow-hidden group card-lift shadow-lg flex flex-col items-center text-center">
                    <div class="absolute inset-0 bg-gradient-to-b from-warm/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative w-40 h-40 rounded-2xl mx-auto mb-6 overflow-hidden border-2 border-charcoal/10 group-hover:border-warm transition-colors duration-300 shadow-md">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover {{ $member['img_position'] ?? 'object-center' }} group-hover:scale-110 transition-all duration-700">
                    </div>
                    <h3 class="font-display font-bold text-lg text-charcoal mb-1 relative z-10">{{ $member['name'] }}</h3>
                    <p class="text-warm text-sm font-medium relative z-10 mb-2">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const journeyContainer = document.getElementById('journey-container');
        const journeyProgress = document.getElementById('journey-progress');
        const journeyPointer = document.getElementById('journey-pointer');

        if (journeyContainer && journeyProgress && journeyPointer) {
            const updateJourneyAnimation = () => {
                const rect = journeyContainer.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                
                // Calculate how much of the container has been scrolled past
                // We want the animation to start when the container enters the middle of the screen
                const startOffset = windowHeight / 2;
                let progress = (startOffset - rect.top) / rect.height;
                
                // Clamp between 0 and 1
                progress = Math.max(0, Math.min(1, progress));
                
                // Convert to percentage
                const percentage = progress * 100;
                
                journeyProgress.style.height = percentage + '%';
                journeyPointer.style.top = percentage + '%';
                
                // Add a glowing effect when moving
                if (progress > 0 && progress < 1) {
                    journeyPointer.classList.add('shadow-[0_0_15px_rgba(0,0,0,0.5)]');
                    journeyPointer.style.transform = 'translate(-50%, -50%) scale(1.2)';
                } else {
                    journeyPointer.classList.remove('shadow-[0_0_15px_rgba(0,0,0,0.5)]');
                    journeyPointer.style.transform = 'translate(-50%, -50%) scale(1)';
                }
            };

            window.addEventListener('scroll', updateJourneyAnimation);
            updateJourneyAnimation(); // init
        }
    });
</script>
@endpush
@endsection
