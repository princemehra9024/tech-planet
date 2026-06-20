{{-- resources/views/components/footer.blade.php --}}
<style>
    .footer-bg-grid {
        background-color: var(--color-cream);
        background-image: 
            linear-gradient(rgba(0,0,0,0.05) 1px, transparent 1px), 
            linear-gradient(90deg, rgba(0,0,0,0.05) 1px, transparent 1px);
        background-size: 110px 110px;
        background-position: center top;
        transition: background-color 0.5s ease;
    }
    html.dark .footer-bg-grid {
        background-color: #121212;
        background-image: 
            linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), 
            linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
    }
</style>

<footer class="footer-bg-grid text-charcoal pt-24 pb-12 relative z-10 overflow-hidden font-sans border-t border-charcoal/10 dark:border-white/10">
    <div class="max-w-[1600px] mx-auto px-6 sm:px-12 flex flex-col justify-between relative z-10">
        
        <!-- Top Section -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-20 md:mb-32 uppercase tracking-widest text-[10px] font-bold gap-12 md:gap-0">
            
            <!-- Left: Brand -->
            <div class="w-full md:w-1/4">
                <a href="{{ url('/') }}" class="inline-block hover:text-charcoal/70 dark:hover:text-white transition-colors">
                    <h3 class="font-bold text-sm italic text-charcoal flex items-start tracking-wider">
                        TECH-PLANET <span class="text-[8px] ml-0.5 leading-none">&reg;</span>
                    </h3>
                </a>
            </div>
            
            <!-- Center: Navigation -->
            <div class="w-full md:w-1/4 flex flex-col space-y-2.5">
                <a href="{{ url('/') }}" class="text-charcoal flex items-center w-max">
                    <span class="w-5 text-charcoal">[</span> 
                    <span class="">HOME</span> 
                    <span class="w-5 text-right text-charcoal">]</span>
                </a>
                <a href="{{ url('/about') }}" class="text-charcoal/60 dark:text-[#A0A0A0] hover:text-charcoal dark:hover:text-white pl-5 w-max transition-colors">
                    ABOUT
                </a>
                <a href="#" class="text-charcoal/60 dark:text-[#A0A0A0] hover:text-charcoal dark:hover:text-white pl-5 w-max transition-colors">
                    TESTIMONIALS
                </a>
                <a href="{{ url('/contact') }}" class="text-charcoal/60 dark:text-[#A0A0A0] hover:text-charcoal dark:hover:text-white pl-5 w-max transition-colors">
                    CONTACT
                </a>
                <a href="#" class="text-charcoal/60 dark:text-[#A0A0A0] hover:text-charcoal dark:hover:text-white pl-5 w-max transition-colors">
                    STORE
                </a>
            </div>
            
            <!-- Right: Newsletter -->
            <div class="w-full md:w-2/4 flex flex-col items-start md:items-end">
                <div class="w-full max-w-[400px]">
                    <div class="flex items-center gap-x-4 text-charcoal dark:text-white mb-4">
                        <span class="text-3xl font-black italic tracking-tighter">SIGN UP</span>
                        <span class="text-[9px] font-bold tracking-widest not-italic leading-tight text-center text-charcoal/60 dark:text-white/60">TO<br>OUR</span>
                        <span class="text-3xl font-black italic tracking-tighter">NEWSLETTER</span>
                    </div>
                    <div class="relative w-full group">
                        <input type="email" placeholder="YOUR EMAIL" class="w-full bg-transparent border-2 border-charcoal/20 dark:border-white/20 text-charcoal dark:text-white placeholder-charcoal/40 dark:placeholder-white/40 font-bold text-[10px] uppercase rounded-full pl-6 pr-14 py-4 focus:outline-none focus:border-charcoal dark:focus:border-white transition-colors">
                        <button class="absolute right-2 top-2 bottom-2 aspect-square rounded-full bg-charcoal dark:bg-white flex items-center justify-center text-white dark:text-charcoal hover:scale-105 group-focus-within:bg-black dark:group-focus-within:bg-gray-200 transition-all">
                            <i class="fas fa-arrow-right text-[10px] transform -rotate-45"></i>
                        </button>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Center Area: Massive Oversized Typography -->
        <div class="w-full flex justify-center items-center overflow-hidden mb-12">
            <!-- Using textLength and lengthAdjust to force the text to stretch edge-to-edge exactly like the image graphic -->
            <svg viewBox="0 0 1000 220" class="w-full h-auto max-h-[300px]" preserveAspectRatio="none">
                <g transform="skewX(-16) translate(65, 0)">
                    <text x="0" y="190" textLength="900" lengthAdjust="spacingAndGlyphs" font-family="Impact, 'Arial Black', sans-serif" font-size="230" font-weight="900" class="fill-charcoal dark:fill-[#EAEAEA] transition-colors duration-500">
                        TECH-PLANET
                    </text>
                </g>
            </svg>
        </div>

        <!-- Bottom Section -->
        <div class="flex flex-col md:flex-row justify-between items-start text-[9px] font-bold uppercase tracking-widest border-t border-charcoal/10 dark:border-white/10 pt-8 text-charcoal/60 dark:text-[#A0A0A0] gap-8 md:gap-0">
            <div class="leading-relaxed">
                &copy; TECH-PLANET / <br>
                ALL RIGHTS RESERVED
            </div>
            <div class="leading-relaxed ml-0 md:ml-[-100px]">
                SHIPPING HANDLING DISCLAIMER <br>
                PUBLIC <br>
                OFFER
            </div>
                {{-- Team Grid --}}
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-xs uppercase tracking-wider text-charcoal/70 dark:text-[#A0A0A0]">CREATIVE TEAM</div>
                    <div class="flex items-center gap-4">
                        <!-- Team Member 1 -->
                        <div class="flex flex-col items-center">
                            <img src="/team/avatar1.png" alt="Anastasia" class="w-12 h-12 rounded-full object-cover border-2 border-charcoal/20 dark:border-white/20 hover:scale-105 transition-transform duration-300" />
                            <span class="text-sm font-medium text-charcoal dark:text-[#EAEAEA]">Anastasia Hodubiak</span>
                            <span class="text-xs text-charcoal/60 dark:text-[#A0A0A0]">Creative Director</span>
                        </div>
                        <!-- Team Member 2 -->
                        <div class="flex flex-col items-center">
                            <img src="/team/avatar2.png" alt="John Doe" class="w-12 h-12 rounded-full object-cover border-2 border-charcoal/20 dark:border-white/20 hover:scale-105 transition-transform duration-300" />
                            <span class="text-sm font-medium text-charcoal dark:text-[#EAEAEA]">John Doe</span>
                            <span class="text-xs text-charcoal/60 dark:text-[#A0A0A0]">Lead Designer</span>
                        </div>
                        <!-- Team Member 3 -->
                        <div class="flex flex-col items-center">
                            <img src="/team/avatar3.png" alt="Jane Smith" class="w-12 h-12 rounded-full object-cover border-2 border-charcoal/20 dark:border-white/20 hover:scale-105 transition-transform duration-300" />
                            <span class="text-sm font-medium text-charcoal dark:text-[#EAEAEA]">Jane Smith</span>
                            <span class="text-xs text-charcoal/60 dark:text-[#A0A0A0]">Front‑end Engineer</span>
                        </div>
                    </div>
                </div>
        
    </div>
</footer>
