{{-- resources/views/gallery.blade.php --}}
@extends('layouts.app')

@section('title', 'Gallery - Tech Planet SRM')

@section('content')

<!-- Hide overflow on body to prevent horizontal scroll issues from animations/strips -->
<style>
    body { overflow-x: hidden; }
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<!-- 1. Asymmetrical Hero Section -->
<section class="pt-32 pb-16 px-6 sm:px-10 max-w-[1400px] mx-auto flex flex-col lg:flex-row gap-12 lg:gap-20 items-center">
    <div class="lg:w-5/12 reveal z-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-[2px] bg-warm"></span>
            <span class="text-warm text-[10px] font-bold tracking-[0.2em] uppercase">Tech Planet SRM</span>
        </div>
        <h1 class="font-display font-black text-6xl lg:text-7xl xl:text-[5.5rem] text-charcoal tracking-tighter leading-[0.95] mb-8 uppercase">
            Code.<br/>Build.<br/><span class="text-sage">Launch.</span>
        </h1>
        <p class="text-charcoal/70 text-base lg:text-lg mb-10 leading-relaxed max-w-sm font-medium">
            Visual logs of our late-night hackathons, intensive workshops, and tech summits. Witness the builder culture.
        </p>
        
        <!-- Filter Pills -->
        <div class="flex flex-wrap gap-3">
            <button data-filter="all" class="filter-btn active btn-pill text-xs bg-charcoal text-cream hover:scale-105 transition-transform shadow-lg shadow-charcoal/20">All Archives</button>
            <button data-filter="workshop" class="filter-btn btn-pill btn-pill-outline text-xs hover:border-charcoal hover:text-charcoal transition-colors bg-white/50 backdrop-blur-sm">Workshops</button>
            <button data-filter="hackathon" class="filter-btn btn-pill btn-pill-outline text-xs hover:border-charcoal hover:text-charcoal transition-colors bg-white/50 backdrop-blur-sm">Hackathons</button>
        </div>
    </div>
    
    <div class="lg:w-7/12 w-full reveal reveal-delay-1">
        <div class="relative w-full h-[60vh] lg:h-[75vh] rounded-[2.5rem] overflow-hidden group shadow-2xl cursor-pointer gallery-item"
             data-category="hackathon" data-title="Annual Code Sprint 2024" data-date="Dec 20, 2024" data-coordinator="Kunal Mehta" data-location="SRM IT Wing" data-desc="Speed coding challenges focusing on raw algorithm optimizations and API integrations.">
            <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?w=1200&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[1.5s] ease-out" alt="Featured Hackathon">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-charcoal/10 group-hover:bg-transparent transition-colors duration-700 pointer-events-none"></div>
            <!-- Glass Label -->
            <div class="absolute bottom-8 left-8 right-8 glass px-6 py-5 rounded-2xl border border-white/20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 flex justify-between items-center shadow-lg">
                <div>
                    <span class="text-warm text-[10px] font-bold uppercase tracking-widest block mb-1">Featured Event</span>
                    <h3 class="text-white font-display font-bold text-2xl uppercase tracking-tight">Annual Code Sprint 2024</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-white text-charcoal flex items-center justify-center hover:bg-warm hover:text-white transition-colors flex-shrink-0">
                    <i class="fas fa-expand text-sm"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Magazine Style Gallery Grid -->
<section class="py-16 px-6 sm:px-10 max-w-[1400px] mx-auto reveal">
    <div class="mb-10 flex justify-between items-end border-b border-charcoal/10 pb-6">
        <h2 class="font-display font-black text-4xl lg:text-5xl text-charcoal tracking-tight uppercase">Latest Events</h2>
        <span class="text-charcoal/40 text-xs font-bold uppercase tracking-widest hidden sm:block">01 / Archives</span>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 lg:gap-6 auto-rows-[300px]">
        <!-- Large Item -->
        <div class="md:col-span-12 lg:col-span-6 row-span-2 rounded-[2rem] overflow-hidden group relative cursor-pointer gallery-item shadow-md"
             data-category="workshop" data-title="React Frontend Workshop" data-date="Mar 14, 2025" data-coordinator="Prof. Rohan Kapoor" data-location="SRM Tech Hall 3" data-desc="Interactive session covering component trees, state hooks, and custom API consumption setups.">
            <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=1200&h=800&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/20 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-500"></div>
            <div class="absolute bottom-8 left-8 right-8">
                <span class="bg-white/90 backdrop-blur-sm text-charcoal text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3 inline-block">Workshop</span>
                <h3 class="text-white font-display font-bold text-3xl mb-1 uppercase tracking-tight">React Frontend Workshop</h3>
                <p class="text-white/70 text-xs font-medium uppercase tracking-widest">Mar 14, 2025</p>
            </div>
        </div>
        
        <!-- Medium Item Vertical 1 -->
        <div class="md:col-span-6 lg:col-span-3 row-span-2 rounded-[2rem] overflow-hidden group relative cursor-pointer gallery-item shadow-md"
             data-category="seminar" data-title="Generative AI Seminar" data-date="Jan 19, 2025" data-coordinator="Dr. Meera Srinivas" data-location="CSI Seminar Hall" data-desc="Exploring decoder architectures, tokenized models, and fine-tuning custom data agents.">
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=600&h=800&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/10 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-500"></div>
            <div class="absolute bottom-6 left-6 right-6">
                <span class="bg-white/90 text-charcoal text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3 inline-block">Seminar</span>
                <h3 class="text-white font-display font-bold text-xl mb-1 uppercase tracking-tight">Generative AI</h3>
                <p class="text-white/70 text-[10px] font-medium uppercase tracking-widest">Jan 19, 2025</p>
            </div>
        </div>

        <!-- Small Items Stacked -->
        <div class="md:col-span-6 lg:col-span-3 row-span-1 rounded-[2rem] overflow-hidden group relative cursor-pointer gallery-item shadow-md"
             data-category="workshop" data-title="UI/UX Design Bootcamp" data-date="Feb 12, 2025" data-coordinator="Ishita Roy" data-location="Design Lab 1" data-desc="Learning layout systems, modern aesthetics, and interactive wireframes.">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/10 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-500"></div>
            <div class="absolute bottom-6 left-6 right-6">
                <h3 class="text-white font-display font-bold text-lg uppercase tracking-tight">UI/UX Bootcamp</h3>
            </div>
        </div>

        <div class="md:col-span-6 lg:col-span-3 row-span-1 rounded-[2rem] overflow-hidden group relative cursor-pointer gallery-item shadow-md"
             data-category="seminar" data-title="Developer Placement" data-date="Feb 28, 2025" data-coordinator="Sneha Raj" data-location="SRM Placement Cell" data-desc="Alumni sharing advice on system design preparation.">
            <img src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?w=600&h=400&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/10 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-500"></div>
            <div class="absolute bottom-6 left-6 right-6">
                <h3 class="text-white font-display font-bold text-lg uppercase tracking-tight">Dev Placements</h3>
            </div>
        </div>
    </div>
</section>

<!-- 3. Featured Moments (Overlapping Images) -->
<section class="py-24 bg-charcoal text-cream overflow-hidden reveal">
    <div class="max-w-[1400px] mx-auto px-6 sm:px-10 relative">
        <h2 class="font-display font-black text-[5rem] md:text-8xl xl:text-[12rem] leading-none text-white/5 tracking-tighter absolute -top-10 -left-10 pointer-events-none select-none">SYSTEMS</h2>
        <h2 class="font-display font-black text-[5rem] md:text-8xl xl:text-[12rem] leading-none text-white/5 tracking-tighter absolute -bottom-10 -right-10 pointer-events-none select-none text-right">ONLINE</h2>
        
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[50vh] lg:min-h-[70vh]">
            <div class="text-center mb-16 lg:mb-24">
                <span class="text-warm font-mono text-[10px] sm:text-xs font-bold tracking-[0.2em] uppercase mb-4 block">&lt; Spotlight /&gt;</span>
                <h3 class="font-display text-4xl md:text-5xl lg:text-7xl font-black tracking-tight uppercase leading-[0.9]">High-Impact<br/>Deployments</h3>
            </div>
            
            <div class="relative w-full max-w-5xl mx-auto h-[350px] sm:h-[450px] md:h-[550px]">
                <!-- Center Image -->
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[85%] md:w-[60%] h-[280px] sm:h-[380px] md:h-[480px] rounded-[2rem] overflow-hidden z-20 shadow-[0_20px_50px_rgba(0,0,0,0.5)] hover:z-50 hover:scale-[1.02] transition-all duration-500 cursor-pointer gallery-item"
                     data-category="hackathon" data-title="Cloud Architecture Summit" data-date="Nov 05, 2024" data-coordinator="Cloud Team" data-location="Main Auditorium" data-desc="Deep dive into scalable cloud infrastructure.">
                    <img src="https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=1000&h=800&fit=crop" class="w-full h-full object-cover">
                    <div class="absolute bottom-6 left-6 glass px-4 py-2 rounded-xl text-[10px] sm:text-xs font-bold uppercase tracking-widest text-white backdrop-blur-md border border-white/10 shadow-lg">01 // AWS Summit</div>
                </div>
                <!-- Left Image -->
                <div class="absolute left-0 md:left-4 top-1/2 -translate-y-1/2 w-[60%] md:w-[40%] h-[220px] sm:h-[300px] md:h-[380px] rounded-[2rem] overflow-hidden z-10 shadow-2xl opacity-70 hover:opacity-100 hover:z-50 hover:scale-[1.02] hover:-rotate-0 transition-all duration-500 cursor-pointer -rotate-6 gallery-item"
                     data-category="hackathon" data-title="Hardware Hackathon" data-date="Oct 12, 2024" data-coordinator="IoT Club" data-location="Hardware Lab" data-desc="24-hour hardware building and IoT challenges.">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&h=800&fit=crop" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                    <div class="absolute bottom-4 left-4 glass px-3 py-1.5 rounded-lg text-[9px] sm:text-[10px] font-bold uppercase tracking-widest text-white backdrop-blur-md border border-white/10">02 // IoT Hack</div>
                </div>
                <!-- Right Image -->
                <div class="absolute right-0 md:right-4 top-1/2 -translate-y-1/2 w-[60%] md:w-[40%] h-[220px] sm:h-[300px] md:h-[380px] rounded-[2rem] overflow-hidden z-10 shadow-2xl opacity-70 hover:opacity-100 hover:z-50 hover:scale-[1.02] hover:rotate-0 transition-all duration-500 cursor-pointer rotate-6 gallery-item"
                     data-category="workshop" data-title="Machine Learning Basics" data-date="Sep 20, 2024" data-coordinator="AI Division" data-location="Lab 4" data-desc="Introductory session on neural networks and PyTorch.">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=600&h=800&fit=crop" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                    <div class="absolute bottom-4 right-4 glass px-3 py-1.5 rounded-lg text-[9px] sm:text-[10px] font-bold uppercase tracking-widest text-white backdrop-blur-md border border-white/10">03 // AI Workshop</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Immersive Showcase Block -->
<section class="py-16 px-6 sm:px-10 max-w-[1400px] mx-auto reveal">
    <div class="flex flex-col lg:flex-row gap-0 rounded-[2.5rem] lg:rounded-[3rem] overflow-hidden bg-cream-dark shadow-xl border border-charcoal/5">
        <div class="lg:w-1/2 h-[350px] sm:h-[400px] lg:h-auto overflow-hidden relative group cursor-pointer gallery-item"
             data-category="hackathon" data-title="Open Source Sprint" data-date="Jun 02, 2025" data-coordinator="Core Team" data-location="Tech Hall 1" data-desc="Contributing to major frameworks. Students collaborating globally to merge PRs.">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1000&h=800&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[2s]">
            <div class="absolute inset-0 bg-charcoal/10 group-hover:bg-transparent transition-colors duration-500"></div>
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <span class="w-16 h-16 rounded-full glass flex items-center justify-center text-white backdrop-blur-md border border-white/20">
                    <i class="fas fa-expand text-xl"></i>
                </span>
            </div>
        </div>
        <div class="lg:w-1/2 p-10 sm:p-12 lg:p-20 flex flex-col justify-center relative overflow-hidden bg-gradient-to-br from-cream to-cream-dark">
            <!-- Decorative element -->
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-sage/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-10 top-10 w-32 h-32 bg-warm/5 rounded-full blur-2xl pointer-events-none"></div>
            
            <span class="w-12 h-12 rounded-full bg-charcoal text-white flex items-center justify-center mb-8 shadow-lg relative z-10">
                <i class="fas fa-code-branch"></i>
            </span>
            <h3 class="font-display font-black text-4xl lg:text-5xl text-charcoal tracking-tight uppercase mb-6 leading-[1.05] relative z-10">
                Open Source <br/>Sprint
            </h3>
            <p class="text-charcoal/70 text-base lg:text-lg mb-10 leading-relaxed font-medium relative z-10 max-w-md">
                Contributing to major frameworks and libraries. Students collaborating globally to merge PRs, fix critical bugs, and build the future of software.
            </p>
            <div class="mt-auto relative z-10">
                <button class="btn-pill btn-pill-primary inline-flex items-center gap-2 group shadow-lg shadow-charcoal/10 font-bold uppercase tracking-wider text-[10px]">
                    Read Case Study <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform text-[10px]"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- 5. Horizontal Image Strip -->
<section class="py-16 overflow-hidden reveal bg-white">
    <div class="mb-10 px-6 sm:px-10 max-w-[1400px] mx-auto flex justify-between items-end border-b border-charcoal/10 pb-6">
        <h2 class="font-display font-black text-3xl lg:text-4xl text-charcoal tracking-tight uppercase">Tech Frames</h2>
        <span class="text-charcoal/40 text-xs font-bold uppercase tracking-widest hidden sm:block">02 / Strip</span>
    </div>
    <div class="flex gap-4 md:gap-8 px-6 sm:px-10 overflow-x-auto snap-x snap-mandatory hide-scrollbar pb-8">
        <div class="snap-center shrink-0 w-[85vw] md:w-[50vw] lg:w-[35vw] h-[350px] md:h-[450px] rounded-[2rem] overflow-hidden relative group shadow-lg cursor-pointer gallery-item"
             data-category="workshop" data-title="Python Data Science" data-date="Aug 15, 2024" data-coordinator="Data Team" data-location="Lab 2" data-desc="Data manipulation and visualization.">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-charcoal/20 group-hover:bg-transparent transition-colors duration-500"></div>
        </div>
        <div class="snap-center shrink-0 w-[85vw] md:w-[50vw] lg:w-[35vw] h-[350px] md:h-[450px] rounded-[2rem] overflow-hidden relative group shadow-lg mt-0 md:mt-12 cursor-pointer gallery-item"
             data-category="seminar" data-title="Cybersecurity Talk" data-date="Jul 10, 2024" data-coordinator="Security Club" data-location="Seminar Hall" data-desc="Ethical hacking and defense mechanisms.">
            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-charcoal/20 group-hover:bg-transparent transition-colors duration-500"></div>
        </div>
        <div class="snap-center shrink-0 w-[85vw] md:w-[50vw] lg:w-[35vw] h-[350px] md:h-[450px] rounded-[2rem] overflow-hidden relative group shadow-lg cursor-pointer gallery-item"
             data-category="hackathon" data-title="Web3 Buildathon" data-date="May 05, 2024" data-coordinator="Crypto Club" data-location="Innovation Hub" data-desc="Smart contracts and decentralized apps.">
            <img src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?w=800&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-charcoal/20 group-hover:bg-transparent transition-colors duration-500"></div>
        </div>
        <div class="snap-center shrink-0 w-[85vw] md:w-[50vw] lg:w-[35vw] h-[350px] md:h-[450px] rounded-[2rem] overflow-hidden relative group shadow-lg mt-0 md:mt-12 cursor-pointer gallery-item"
             data-category="workshop" data-title="Docker & Kubernetes" data-date="Apr 20, 2024" data-coordinator="DevOps Team" data-location="Lab 1" data-desc="Container orchestration for modern web apps.">
            <img src="https://images.unsplash.com/photo-1607799279861-4dd93b853819?w=800&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-charcoal/20 group-hover:bg-transparent transition-colors duration-500"></div>
        </div>
        <div class="snap-center shrink-0 w-6 md:w-12 h-1 bg-transparent"></div> <!-- Spacer -->
    </div>
</section>

<!-- 6. Creative Mosaic Section (Bento Grid) -->
<section class="py-16 px-6 sm:px-10 max-w-[1400px] mx-auto mb-16 reveal">
    <div class="mb-10 flex justify-between items-end border-b border-charcoal/10 pb-6">
        <h2 class="font-display font-black text-3xl lg:text-4xl text-charcoal tracking-tight uppercase">By The Numbers</h2>
        <span class="text-charcoal/40 text-xs font-bold uppercase tracking-widest hidden sm:block">03 / Impact</span>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px] lg:auto-rows-[250px]">
        <div class="col-span-2 row-span-2 rounded-[2rem] overflow-hidden relative group shadow-md cursor-pointer gallery-item"
             data-category="seminar" data-title="Tech Meetup 2024" data-date="Jan 10, 2024" data-coordinator="Community" data-location="City Center" data-desc="Annual gathering of the tech community.">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1000&h=1000&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
        </div>
        
        <div class="col-span-2 md:col-span-1 row-span-1 rounded-[2rem] overflow-hidden relative group shadow-md cursor-pointer gallery-item"
             data-category="workshop" data-title="Mobile App Dev" data-date="Feb 22, 2024" data-coordinator="App Club" data-location="Lab 3" data-desc="React Native and Flutter basics.">
            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=600&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
        </div>
        
        <div class="col-span-2 md:col-span-1 row-span-1 rounded-[2rem] overflow-hidden relative bg-sage flex flex-col items-center justify-center text-center p-6 shadow-inner border border-charcoal/5">
             <h4 class="font-display font-black text-5xl lg:text-6xl text-charcoal mb-2">50+</h4>
             <span class="text-charcoal/80 text-[10px] font-bold uppercase tracking-[0.2em]">Projects Shipped</span>
        </div>
        
        <div class="col-span-2 row-span-1 rounded-[2rem] overflow-hidden relative group shadow-md cursor-pointer gallery-item"
             data-category="hackathon" data-title="FinTech Hackathon" data-date="Mar 18, 2024" data-coordinator="Finance Tech" data-location="Auditorium 2" data-desc="Building payment gateways and algorithms.">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1000&h=600&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-charcoal/20 group-hover:bg-transparent transition-colors duration-500"></div>
        </div>
    </div>
</section>

<!-- Lightbox Modal (Retained and styled) -->
<div id="lightbox" class="fixed inset-0 bg-charcoal/90 backdrop-blur-xl z-50 hidden flex-col lg:flex-row items-center justify-center p-4 md:p-10 opacity-0 transition-opacity duration-300">
    <!-- Close Button -->
    <button class="absolute top-6 right-6 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white text-lg transition-all z-50 border border-white/10" id="close-lightbox">
        <i class="fas fa-times"></i>
    </button>
    
    <div class="flex flex-col lg:flex-row w-full max-w-[1200px] h-auto lg:h-[75vh] bg-cream rounded-[2.5rem] overflow-hidden shadow-[0_30px_100px_rgba(0,0,0,0.5)] transform scale-95 transition-transform duration-300" id="lightbox-inner">
        <!-- Image Container -->
        <div class="lg:w-8/12 bg-charcoal flex items-center justify-center p-0 min-h-[40vh] lg:min-h-full overflow-hidden relative group">
            <img id="lightbox-img" class="w-full h-full object-cover" src="" alt="lightbox">
            <div class="absolute inset-0 bg-charcoal/5"></div>
        </div>
        <!-- Info Panel -->
        <div class="lg:w-4/12 p-8 lg:p-12 flex flex-col overflow-y-auto bg-cream-dark">
            <div class="space-y-4 mb-8">
                <span id="lightbox-category" class="inline-block bg-charcoal text-cream text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full shadow-sm"></span>
                <h2 id="lightbox-title" class="font-display font-black text-3xl lg:text-4xl text-charcoal leading-tight uppercase tracking-tight"></h2>
                <span id="lightbox-date" class="text-charcoal/60 text-xs font-bold uppercase tracking-widest block pb-6 border-b border-charcoal/10">
                    <i class="far fa-calendar-alt mr-2 text-warm"></i>
                </span>
                <p id="lightbox-desc" class="text-charcoal/70 text-sm leading-relaxed font-medium mt-4"></p>
            </div>
            
            <div class="space-y-6 pt-8 mt-auto border-t border-charcoal/10">
                <div>
                    <span class="text-charcoal/40 text-[10px] font-bold uppercase tracking-widest block mb-1">Coordinator</span>
                    <strong id="lightbox-coordinator" class="font-sans font-bold text-sm text-charcoal tracking-wide"></strong>
                </div>
                <div>
                    <span class="text-charcoal/40 text-[10px] font-bold uppercase tracking-widest block mb-1">Location</span>
                    <strong id="lightbox-location" class="font-sans font-bold text-sm text-charcoal tracking-wide"></strong>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Reveal Animations using simple Intersection Observer
    document.addEventListener('DOMContentLoaded', () => {
        const reveals = document.querySelectorAll('.reveal');
        
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

        reveals.forEach(reveal => {
            // Apply initial CSS states directly if not using a separate CSS file for them
            reveal.style.opacity = '0';
            reveal.style.transform = 'translateY(40px)';
            reveal.style.transition = 'all 0.8s cubic-bezier(0.16, 1, 0.3, 1)';
            
            if(reveal.classList.contains('reveal-delay-1')) {
                reveal.style.transitionDelay = '0.2s';
            }
            
            revealObserver.observe(reveal);
        });

        // Add active class definition dynamically for convenience
        const style = document.createElement('style');
        style.innerHTML = `
            .reveal.active {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    });

    // Filter Logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Reset all buttons
            filterBtns.forEach(b => {
                b.classList.remove('bg-charcoal', 'text-cream', 'shadow-lg', 'shadow-charcoal/20');
                if (!b.classList.contains('btn-pill-outline')) {
                    b.classList.add('btn-pill-outline');
                    b.classList.add('bg-white/50', 'backdrop-blur-sm');
                }
            });
            
            // Set active button
            btn.classList.add('bg-charcoal', 'text-cream', 'shadow-lg', 'shadow-charcoal/20');
            btn.classList.remove('btn-pill-outline', 'bg-white/50', 'backdrop-blur-sm');
            
            const filterValue = btn.getAttribute('data-filter');
            
            // Filter items with a smooth fade
            galleryItems.forEach(item => {
                // If the item doesn't have a category (like the mosaic stat block), skip filtering it directly, 
                // but in our structure, all gallery-items have data-category.
                if (!item.hasAttribute('data-category')) return;

                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = ''; // Revert to default (block or flex)
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
                item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            });
        });
    });

    // Lightbox Logic
    const lightbox = document.getElementById('lightbox');
    const lightboxInner = document.getElementById('lightbox-inner');
    const lightboxImg = document.getElementById('lightbox-img');
    const lTitle = document.getElementById('lightbox-title');
    const lCategory = document.getElementById('lightbox-category');
    const lDate = document.getElementById('lightbox-date');
    const lDesc = document.getElementById('lightbox-desc');
    const lCoordinator = document.getElementById('lightbox-coordinator');
    const lLocation = document.getElementById('lightbox-location');
    const closeBtn = document.getElementById('close-lightbox');

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            if(!img) return; // Skip if no image (e.g. stat block)
            
            // Show lightbox
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            
            // Slight delay for smooth animation
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
                lightboxInner.classList.remove('scale-95');
                lightboxInner.classList.add('scale-100');
            }, 10);
            
            lightboxImg.src = img.src;
            lTitle.innerText = item.getAttribute('data-title');
            lCategory.innerText = item.getAttribute('data-category');
            lDate.innerHTML = '<i class="far fa-calendar-alt mr-2 text-warm"></i>' + item.getAttribute('data-date');
            lDesc.innerText = item.getAttribute('data-desc');
            lCoordinator.innerText = item.getAttribute('data-coordinator');
            lLocation.innerText = item.getAttribute('data-location');
        });
    });

    const closeLightbox = () => {
        lightbox.classList.add('opacity-0');
        lightboxInner.classList.remove('scale-100');
        lightboxInner.classList.add('scale-95');
        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
        }, 300);
    };

    closeBtn.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });
</script>
@endpush
@endsection