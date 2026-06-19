{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us - Tech Planet Club')

@section('content')
<div class="px-6 sm:px-10 py-28 relative z-20 bg-blue-midnight min-h-screen">
    
    <!-- Brutalist Header -->
    <div class="mb-16 border-b-2 border-blue-sky pb-8">
        <h1 class="text-[10vw] sm:text-[7vw] font-black text-blue-white font-display tracking-tighter leading-none mb-4 uppercase">
            CONNECT_SYS<span class="text-blue-sky">()</span>
        </h1>
        <p class="text-blue-sky max-w-2xl text-xs sm:text-sm font-sans uppercase tracking-widest leading-loose">
            HAVE INQUIRIES REGARDING PARTNERSHIPS, BOOTCAMPS, OR MEMBERSHIP LEVELS? OPEN A CHANNEL.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-start">
        
        <!-- Brutalist Form -->
        <div class="border-2 border-blue-sky bg-blue-navy p-8 relative">
            <div class="absolute inset-0 bg-grid-blue opacity-10 pointer-events-none"></div>
            
            <h2 class="text-4xl font-display text-blue-white uppercase mb-2">TRANSMIT_MSG</h2>
            <p class="text-blue-sky text-xs font-sans uppercase mb-8 border-b-2 border-blue-sky pb-4">FILL OUT THE CONSOLE DETAILS BELOW.</p>
            
            <form action="#" method="POST" class="space-y-6 relative z-10">
                @csrf
                <div>
                    <label class="block text-blue-sky font-sans text-[10px] font-bold uppercase tracking-widest mb-2">> FULL_NAME</label>
                    <input type="text" required class="w-full bg-blue-midnight border-2 border-blue-sky px-4 py-3 text-blue-white placeholder-blue-sky/30 focus:outline-none focus:bg-blue-sky focus:text-blue-midnight transition font-sans text-xs uppercase" placeholder="[INPUT STRING]">
                </div>
                <div>
                    <label class="block text-blue-sky font-sans text-[10px] font-bold uppercase tracking-widest mb-2">> COMMS_ADDRESS</label>
                    <input type="email" required class="w-full bg-blue-midnight border-2 border-blue-sky px-4 py-3 text-blue-white placeholder-blue-sky/30 focus:outline-none focus:bg-blue-sky focus:text-blue-midnight transition font-sans text-xs uppercase" placeholder="[INPUT EMAIL]">
                </div>
                <div>
                    <label class="block text-blue-sky font-sans text-[10px] font-bold uppercase tracking-widest mb-2">> PAYLOAD</label>
                    <textarea rows="5" required class="w-full bg-blue-midnight border-2 border-blue-sky px-4 py-3 text-blue-white placeholder-blue-sky/30 focus:outline-none focus:bg-blue-sky focus:text-blue-midnight transition font-sans text-xs uppercase resize-none" placeholder="[INPUT TEXT]"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-sky text-blue-midnight border-2 border-blue-sky hover:bg-blue-white hover:border-blue-white font-display uppercase tracking-widest text-2xl py-4 transition-colors">
                    EXECUTE_SEND
                </button>
            </form>
        </div>

        <!-- Coordinates & FAQ -->
        <div class="space-y-8">
            
            <div class="border-2 border-blue-sky bg-blue-navy p-8">
                <h3 class="text-3xl font-display text-blue-white uppercase mb-6 border-b-2 border-blue-sky pb-4">/// GEO_COORDINATES</h3>
                <p class="text-blue-sky font-sans text-xs uppercase leading-loose">
                    SRM COMPUTER SOCIETY OF INDIA<br>
                    MAIN TECH BLOCK, FLOOR 3, CONSOLE 305<br>
                    SRM UNIVERSITY, BENGALURU - 560001
                </p>
                <div class="mt-6 flex flex-col gap-4">
                    <div class="bg-blue-sky text-blue-midnight px-4 py-2 font-sans font-bold text-xs uppercase w-max">
                        MAIL: CLUB@TECHPLANET.EDU.IN
                    </div>
                    <div class="bg-blue-sky text-blue-midnight px-4 py-2 font-sans font-bold text-xs uppercase w-max">
                        TEL: +91 9988776655
                    </div>
                </div>
            </div>
            
            <div class="border-2 border-blue-sky bg-blue-midnight p-8">
                <h3 class="text-2xl font-display text-blue-white uppercase mb-6 border-b-2 border-blue-sky pb-4">SYS_FAQ</h3>
                
                <div class="space-y-4">
                    <div class="faq-item border-2 border-blue-sky bg-blue-navy">
                        <button type="button" class="faq-toggle w-full p-4 text-left flex justify-between items-center bg-transparent">
                            <span class="text-blue-white font-sans font-bold text-xs uppercase">RSP_DELIVERY_TIME?</span>
                            <span class="text-blue-sky font-display text-xl transition-transform">+</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <p class="p-4 text-blue-sky text-[10px] font-sans uppercase leading-relaxed border-t-2 border-blue-sky">
                                USUALLY WITHIN 24 HOURS. EMAILS REGARDING PARTNERSHIP CAMPAIGNS ARE ROUTED DIRECTLY TO OUR FACULTY ADVISER.
                            </p>
                        </div>
                    </div>
                    
                    <div class="faq-item border-2 border-blue-sky bg-blue-navy">
                        <button type="button" class="faq-toggle w-full p-4 text-left flex justify-between items-center bg-transparent">
                            <span class="text-blue-white font-sans font-bold text-xs uppercase">CORP_SPONSORSHIPS?</span>
                            <span class="text-blue-sky font-display text-xl transition-transform">+</span>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <p class="p-4 text-blue-sky text-[10px] font-sans uppercase leading-relaxed border-t-2 border-blue-sky">
                                YES. WE WELCOME SPONSORSHIPS PROVIDING API KEYS, SERVER CREDITS, INTERNSHIP OPPORTUNITIES, OR CASH REWARDS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    // FAQ accordion logic - Brutalist style
    const toggles = document.querySelectorAll('.faq-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const item = toggle.parentElement;
            const content = item.querySelector('.faq-content');
            const icon = toggle.querySelector('span:last-child');
            
            if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                content.style.maxHeight = '0px';
                icon.textContent = '+';
                item.classList.remove('bg-blue-sky/10');
            } else {
                document.querySelectorAll('.faq-content').forEach(c => {
                    c.style.maxHeight = '0px';
                    c.parentElement.querySelector('.faq-toggle span:last-child').textContent = '+';
                    c.parentElement.classList.remove('bg-blue-sky/10');
                });
                
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.textContent = '-';
                item.classList.add('bg-blue-sky/10');
            }
        });
    });
</script>
@endpush
@endsection