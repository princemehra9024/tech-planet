{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us - Tech Planet Club')

@section('content')
<div class="px-6 sm:px-10 pt-32 pb-20 relative z-20 min-h-screen">
    <div class="max-w-[1400px] mx-auto">
        
        <!-- Header -->
        <div class="reveal mb-16 max-w-3xl">
            <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Let's Connect</span>
            <h1 class="animate-text font-display font-black text-5xl sm:text-7xl text-charcoal leading-[1.05] tracking-tight mb-6">
                Open a channel.
            </h1>
            <p class="text-charcoal/60 text-base sm:text-lg leading-relaxed">
                Have inquiries regarding partnerships, bootcamps, or membership levels? Send us a message and our team will get back to you shortly.
            </p>
        </div>

        <div class="grid lg:grid-cols-[1.2fr_1fr] gap-12 lg:gap-20 items-start">
            
            <!-- Premium Form -->
            <div class="reveal reveal-delay-1 relative">
                <!-- Decorative element -->
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-warm/5 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="glass rounded-[2.5rem] p-8 sm:p-10 border border-charcoal/10 shadow-2xl relative z-10">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2 group">
                                <label class="block text-charcoal/80 font-semibold text-xs uppercase tracking-wider pl-4 transition-colors group-focus-within:text-warm">Full Name</label>
                                <input type="text" required class="w-full bg-charcoal/5 border border-charcoal/10 px-6 py-4 rounded-full text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-warm focus:bg-transparent focus:ring-4 focus:ring-warm/10 transition-all text-sm font-medium" placeholder="Jane Doe">
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-charcoal/80 font-semibold text-xs uppercase tracking-wider pl-4 transition-colors group-focus-within:text-warm">Email Address</label>
                                <input type="email" required class="w-full bg-charcoal/5 border border-charcoal/10 px-6 py-4 rounded-full text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-warm focus:bg-transparent focus:ring-4 focus:ring-warm/10 transition-all text-sm font-medium" placeholder="jane@example.com">
                            </div>
                        </div>
                        <div class="space-y-2 group">
                            <label class="block text-charcoal/80 font-semibold text-xs uppercase tracking-wider pl-4 transition-colors group-focus-within:text-warm">Message</label>
                            <textarea rows="5" required class="w-full bg-charcoal/5 border border-charcoal/10 px-6 py-5 rounded-[2rem] text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-warm focus:bg-transparent focus:ring-4 focus:ring-warm/10 transition-all text-sm font-medium resize-none" placeholder="How can we help you?"></textarea>
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" class="btn-pill w-full justify-center py-4 bg-charcoal text-cream hover:bg-warm hover:text-cream text-sm font-bold uppercase tracking-widest shadow-lg group/btn transition-all hover:shadow-[0_0_20px_rgba(0,0,0,0.2)]">
                                Send Message <i class="fas fa-paper-plane text-xs ml-2 transform group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info & FAQ -->
            <div class="reveal reveal-delay-2 space-y-10">
                
                <!-- Contact Cards -->
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="glass rounded-3xl p-8 border border-charcoal/10 shadow-xl group hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 rounded-full bg-warm/10 text-warm flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="text-charcoal font-display font-bold text-xl mb-3">Location</h3>
                        <p class="text-charcoal/70 text-sm leading-relaxed">
                            Tech Planet Club<br>
                            Tech Block, Console 305<br>
                            SRM University, Chennai
                        </p>
                    </div>
                    
                    <div class="glass rounded-3xl p-8 border border-charcoal/10 shadow-xl group hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 rounded-full bg-warm/10 text-warm flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="text-charcoal font-display font-bold text-xl mb-3">Direct Comms</h3>
                        <div class="space-y-3 mt-4">
                            <a href="mailto:club@techplanet.edu.in" class="block text-charcoal/70 hover:text-warm transition-colors text-sm font-medium">club@techplanet.edu.in</a>
                            <a href="tel:+919988776655" class="block text-charcoal/70 hover:text-warm transition-colors text-sm font-medium">+91 9988776655</a>
                        </div>
                    </div>
                </div>
                
                <!-- Premium FAQ -->
                <div class="glass rounded-[2.5rem] p-8 sm:p-10 border border-charcoal/10 shadow-xl">
                    <h3 class="text-2xl font-display font-bold text-charcoal mb-8 flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-warm"></span>
                        Frequently Asked
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="faq-item border border-charcoal/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button type="button" class="faq-toggle w-full p-5 sm:p-6 text-left flex justify-between items-center bg-transparent hover:bg-charcoal/5 transition-colors group">
                                <span class="text-charcoal font-bold text-sm">What is the typical response time?</span>
                                <div class="w-8 h-8 rounded-full bg-charcoal/5 flex items-center justify-center text-charcoal/50 group-hover:text-warm transition-colors">
                                    <i class="fas fa-plus transition-transform duration-300 icon"></i>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-charcoal/5">
                                <p class="p-5 sm:p-6 text-charcoal/80 text-sm leading-relaxed border-t border-charcoal/10">
                                    We usually reply within 24 hours. Emails regarding partnership campaigns are routed directly to our faculty adviser for quicker processing.
                                </p>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 2 -->
                        <div class="faq-item border border-charcoal/10 rounded-2xl overflow-hidden transition-all duration-300">
                            <button type="button" class="faq-toggle w-full p-5 sm:p-6 text-left flex justify-between items-center bg-transparent hover:bg-charcoal/5 transition-colors group">
                                <span class="text-charcoal font-bold text-sm">Do you accept corporate sponsorships?</span>
                                <div class="w-8 h-8 rounded-full bg-charcoal/5 flex items-center justify-center text-charcoal/50 group-hover:text-warm transition-colors">
                                    <i class="fas fa-plus transition-transform duration-300 icon"></i>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-charcoal/5">
                                <p class="p-5 sm:p-6 text-charcoal/80 text-sm leading-relaxed border-t border-charcoal/10">
                                    Yes! We welcome sponsorships providing API keys, server credits, internship opportunities, or cash rewards for our hackathons and events.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Premium FAQ accordion logic
    const toggles = document.querySelectorAll('.faq-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const item = toggle.parentElement;
            const content = item.querySelector('.faq-content');
            const icon = toggle.querySelector('.icon');
            
            // Is it already open?
            const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';
            
            // Close all
            document.querySelectorAll('.faq-content').forEach(c => {
                c.style.maxHeight = '0px';
            });
            document.querySelectorAll('.faq-item').forEach(i => {
                i.classList.remove('border-warm');
                i.classList.add('border-charcoal/10');
            });
            document.querySelectorAll('.faq-toggle .icon').forEach(i => {
                i.classList.remove('rotate-45', 'text-warm');
            });
            
            if (!isOpen) {
                // Open this one
                content.style.maxHeight = content.scrollHeight + 'px';
                item.classList.remove('border-charcoal/10');
                item.classList.add('border-warm');
                icon.classList.add('rotate-45', 'text-warm');
            }
        });
    });
</script>
@endpush
@endsection