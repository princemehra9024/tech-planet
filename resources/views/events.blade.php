{{-- resources/views/events.blade.php --}}
@extends('layouts.app')

@section('title', 'Events - Tech Planet UOK')

@section('content')
<section class="relative pt-32 pb-20 px-6 sm:px-10 min-h-screen overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-10 right-[5%] w-[400px] h-[400px] rounded-full bg-sage/10 blur-[100px] pointer-events-none mix-blend-multiply dark:mix-blend-screen animate-pulse duration-[8000ms] -z-10"></div>
    <div class="absolute bottom-20 left-[-5%] w-[500px] h-[500px] rounded-full bg-warm/5 blur-[120px] pointer-events-none mix-blend-multiply dark:mix-blend-screen -z-10"></div>

    <div class="max-w-[1400px] mx-auto relative z-10">
    
    @if(session('success'))
        <div class="reveal glass text-sage border border-sage/20 rounded-2xl px-6 py-4 flex items-center gap-4 mb-8 shadow-sm">
            <div class="w-8 h-8 rounded-full bg-sage/20 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check text-sm"></i>
            </div>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Page Header -->
    <div class="reveal flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6 mb-12">
        <div>
            <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Events</span>
            <h1 class="animate-text font-display font-black text-5xl sm:text-6xl lg:text-7xl text-charcoal tracking-tight leading-[1.05] mb-4">
                Explore events
            </h1>
            <p class="text-charcoal/60 text-base max-w-lg leading-relaxed">
                Register for upcoming developer workshops or browse through our completed milestones.
            </p>
        </div>
        <button type="button" onclick="window.location.href='/student/events'" class="btn-pill btn-pill-warm hidden sm:inline-flex group flex-shrink-0 card-lift">
            <i class="fas fa-plus text-xs mr-1.5"></i> Suggest Event
        </button>
    </div>
    

    <!-- Filter Pills -->
    <div class="reveal flex flex-wrap gap-3 mb-12">
        <button onclick="filterEvents('all')" class="event-filter-btn active btn-pill btn-pill-primary text-xs shadow-md">All Events</button>
        <button onclick="filterEvents('bootcamp')" class="event-filter-btn btn-pill btn-pill-outline text-xs">Bootcamps</button>
        <button onclick="filterEvents('hackathon')" class="event-filter-btn btn-pill btn-pill-outline text-xs">Hackathons</button>
        <button onclick="filterEvents('workshop')" class="event-filter-btn btn-pill btn-pill-outline text-xs">Workshops</button>
    </div>

    <!-- Events Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
        
        <!-- Event 1 -->
        <div class="reveal event-card group glass rounded-3xl border border-charcoal/10 relative overflow-hidden flex flex-col shadow-lg card-lift transition-all duration-300" data-category="bootcamp">
            <div class="absolute inset-0 bg-gradient-to-br from-sage/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
            <div class="p-8 flex-grow flex flex-col relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <span class="bg-warm/10 text-warm text-[10px] uppercase tracking-widest font-bold px-3 py-1 rounded-full border border-warm/10 shadow-sm">Bootcamp</span>
                    <span class="flex items-center gap-1.5 text-sage text-[11px] font-bold uppercase tracking-wider bg-sage/10 px-3 py-1 rounded-full border border-sage/10"><span class="w-1.5 h-1.5 rounded-full bg-sage animate-pulse"></span> Live</span>
                </div>
                <h3 class="font-display font-bold text-2xl text-charcoal mb-3 leading-tight group-hover:text-warm transition-colors duration-300">AI & ML Bootcamp</h3>
                <p class="text-charcoal/60 text-sm leading-relaxed mb-6 flex-grow">
                    Deep dive into large language modeling, API orchestration, fine-tuning techniques, and computer vision systems.
                </p>
                <div class="flex items-center gap-4 text-charcoal/50 text-xs mb-6 font-medium">
                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-warm"></i>May 10, 2025</span>
                    <span class="flex items-center gap-1.5"><i class="far fa-clock text-warm"></i>09:00 AM</span>
                </div>
            </div>
            <div class="px-8 pb-8 mt-auto relative z-10">
                <a href="#" class="btn-pill btn-pill-primary w-full justify-center group/btn text-xs shadow-md">
                    Register <i class="fas fa-arrow-right arrow-icon text-[10px] ml-1.5"></i>
                </a>
            </div>
        </div>

        <!-- Event 2 -->
        <div class="reveal reveal-delay-1 event-card group glass rounded-3xl border border-charcoal/10 relative overflow-hidden flex flex-col shadow-lg card-lift transition-all duration-300" data-category="workshop">
            <div class="absolute inset-0 bg-gradient-to-br from-charcoal/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
            <div class="p-8 flex-grow flex flex-col relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <span class="bg-sage/10 text-sage text-[10px] uppercase tracking-widest font-bold px-3 py-1 rounded-full border border-sage/10 shadow-sm">Workshop</span>
                    <span class="text-muted text-[11px] font-bold uppercase tracking-wider bg-charcoal/5 px-3 py-1 rounded-full border border-charcoal/5">In 6 days</span>
                </div>
                <h3 class="font-display font-bold text-2xl text-charcoal mb-3 leading-tight group-hover:text-sage transition-colors duration-300">Cloud Resume Challenge</h3>
                <p class="text-charcoal/60 text-sm leading-relaxed mb-6 flex-grow">
                    Deploy a static resume page on AWS/GCP, routing over CDN gateways, DNS hosting, and connecting DynamoDB.
                </p>
                <div class="flex items-center gap-4 text-charcoal/50 text-xs mb-6 font-medium">
                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-warm"></i>May 18, 2025</span>
                    <span class="flex items-center gap-1.5"><i class="far fa-clock text-warm"></i>02:00 PM</span>
                </div>
            </div>
            <div class="px-8 pb-8 mt-auto relative z-10">
                <a href="#" class="btn-pill btn-pill-primary w-full justify-center group/btn text-xs shadow-md">
                    Register <i class="fas fa-arrow-right arrow-icon text-[10px] ml-1.5"></i>
                </a>
            </div>
        </div>

        <!-- Event 3 -->
        <div class="reveal reveal-delay-2 event-card group glass rounded-3xl border border-charcoal/10 relative overflow-hidden flex flex-col shadow-lg card-lift transition-all duration-300" data-category="hackathon">
            <div class="absolute inset-0 bg-gradient-to-br from-charcoal/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
            <div class="p-8 flex-grow flex flex-col relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <span class="bg-charcoal/10 text-charcoal text-[10px] uppercase tracking-widest font-bold px-3 py-1 rounded-full border border-charcoal/5 shadow-sm">Hackathon</span>
                    <span class="text-muted text-[11px] font-bold uppercase tracking-wider bg-charcoal/5 px-3 py-1 rounded-full border border-charcoal/5">In 20 days</span>
                </div>
                <h3 class="font-display font-bold text-2xl text-charcoal mb-3 leading-tight group-hover:text-charcoal transition-colors duration-300">Open Source Sprint</h3>
                <p class="text-charcoal/60 text-sm leading-relaxed mb-6 flex-grow">
                    Submit PRs to high-impact GitHub repositories under the guidance of core maintainers. Earn exclusive swags.
                </p>
                <div class="flex items-center gap-4 text-charcoal/50 text-xs mb-6 font-medium">
                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-warm"></i>Jun 02, 2025</span>
                    <span class="flex items-center gap-1.5"><i class="far fa-clock text-warm"></i>10:00 AM</span>
                </div>
            </div>
            <div class="px-8 pb-8 mt-auto relative z-10">
                <a href="#" class="btn-pill btn-pill-outline w-full justify-center group/btn text-xs">
                    Coming Soon <i class="fas fa-arrow-right arrow-icon text-[10px] ml-1.5"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- Roadmap Table -->
    <div class="reveal">
        <div class="mb-8">
            <span class="text-warm text-xs font-semibold tracking-widest uppercase mb-4 block">Schedule</span>
            <h2 class="font-display font-bold text-3xl sm:text-4xl text-charcoal">Visual Roadmap</h2>
        </div>
        <div class="glass rounded-3xl border border-charcoal/10 overflow-hidden shadow-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-left min-w-[700px]">
                    <thead>
                        <tr class="bg-cream-dark/60 text-charcoal text-[11px] font-bold uppercase tracking-widest border-b border-charcoal/10">
                            <th class="px-8 py-5">Date</th>
                            <th class="px-8 py-5">Event</th>
                            <th class="px-8 py-5">Vertical</th>
                            <th class="px-8 py-5 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-charcoal/5">
                        <tr class="hover:bg-cream-dark/40 transition-colors group">
                            <td class="px-8 py-5 text-charcoal/60 font-medium whitespace-nowrap"><i class="far fa-calendar-alt text-warm mr-2"></i>May 10, 2025</td>
                            <td class="px-8 py-5 text-charcoal font-bold group-hover:text-sage transition-colors">AI & ML Bootcamp Sessions</td>
                            <td class="px-8 py-5 text-charcoal/60">AI / ML Lab</td>
                            <td class="px-8 py-5 text-center"><span class="bg-sage/10 text-sage text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full border border-sage/20 inline-block shadow-sm">Live</span></td>
                        </tr>
                        <tr class="hover:bg-cream-dark/40 transition-colors group">
                            <td class="px-8 py-5 text-charcoal/60 font-medium whitespace-nowrap"><i class="far fa-calendar-alt text-warm mr-2"></i>May 18, 2025</td>
                            <td class="px-8 py-5 text-charcoal font-bold group-hover:text-warm transition-colors">Cloud Resume Deployment</td>
                            <td class="px-8 py-5 text-charcoal/60">Technical Core</td>
                            <td class="px-8 py-5 text-center"><span class="bg-warm/10 text-warm text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full border border-warm/20 inline-block shadow-sm">Upcoming</span></td>
                        </tr>
                        <tr class="hover:bg-cream-dark/40 transition-colors group">
                            <td class="px-8 py-5 text-charcoal/60 font-medium whitespace-nowrap"><i class="far fa-calendar-alt text-warm mr-2"></i>Jun 02, 2025</td>
                            <td class="px-8 py-5 text-charcoal font-bold group-hover:text-warm transition-colors">Open Source Hackathon Day</td>
                            <td class="px-8 py-5 text-charcoal/60">Outreach</td>
                            <td class="px-8 py-5 text-center"><span class="bg-warm/10 text-warm text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full border border-warm/20 inline-block shadow-sm">Upcoming</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
</section>

<!-- Suggest Event Modal -->
<div id="suggest-event-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-charcoal/50 backdrop-blur-md hidden opacity-0 transition-opacity duration-300">
    <div class="w-full max-w-2xl glass rounded-[2.5rem] shadow-[0_30px_80px_rgba(0,0,0,0.15)] border border-charcoal/10 relative overflow-hidden transform scale-95 transition-transform duration-300">
        
        <!-- Modal Header -->
        <div class="px-8 py-6 border-b border-charcoal/5 flex justify-between items-center bg-cream-dark/30">
            <h3 class="font-display font-bold text-2xl text-charcoal">Suggest an Event</h3>
            <button type="button" id="close-suggest-modal-btn" class="w-10 h-10 rounded-full bg-cream-dark border border-transparent hover:border-charcoal/10 flex items-center justify-center text-charcoal/50 hover:text-charcoal transition-all shadow-sm">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <form method="POST" action="{{ route('events.suggest') }}" class="p-8 space-y-6">
            @csrf
            
            @guest
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Your Name</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="Alex Johnson">
                    </div>
                </div>
                <div>
                    <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="student@uok.ac.in">
                    </div>
                </div>
            </div>
            @endguest

            <div>
                <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Event Title</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-heading"></i></span>
                    <input type="text" name="title" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="e.g. Next.js Deployment Workshop">
                </div>
            </div>
            <div>
                <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Description</label>
                <div class="relative group">
                    <span class="absolute top-3 left-0 flex pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-align-left mt-1"></i></span>
                    <textarea name="description" required rows="4" class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm resize-none" placeholder="Target audience & goals"></textarea>
                </div>
            </div>
            <div>
                <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Suggested Date <span class="text-muted/60 normal-case">(optional)</span></label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="far fa-calendar"></i></span>
                    <input type="date" name="suggested_date" class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm">
                </div>
            </div>
            
            <div class="flex justify-end gap-4 pt-6 border-t border-charcoal/5">
                <button type="button" id="cancel-suggest-btn" class="btn-pill btn-pill-outline px-6 py-2.5 text-xs font-bold">Cancel</button>
                <button type="submit" class="btn-pill btn-pill-primary px-6 py-2.5 text-xs shadow-md shadow-charcoal/10"><i class="fas fa-paper-plane mr-1.5"></i> Submit Suggestion</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function filterEvents(category) {
        const buttons = document.querySelectorAll('.event-filter-btn');
        buttons.forEach(btn => {
            btn.classList.remove('btn-pill-primary', 'shadow-md');
            if (!btn.classList.contains('btn-pill-outline')) {
                btn.classList.add('btn-pill-outline');
            }
        });
        
        const activeBtn = event.currentTarget;
        activeBtn.classList.add('btn-pill-primary', 'shadow-md');
        activeBtn.classList.remove('btn-pill-outline');

        const cards = document.querySelectorAll('.event-card');
        cards.forEach(card => {
            if(category === 'all' || card.getAttribute('data-category') === category) {
                card.style.display = 'flex';
                card.style.opacity = '0';
                card.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 10);
            } else {
                card.style.display = 'none';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('suggest-event-modal');
        const modalInner = modal ? modal.querySelector('.w-full') : null;
        const openBtn1 = document.getElementById('open-suggest-modal-btn');
        const openBtn2 = document.getElementById('open-suggest-modal-btn-mobile');
        const closeBtn = document.getElementById('close-suggest-modal-btn');
        const cancelBtn = document.getElementById('cancel-suggest-btn');
        
        const showModal = () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if (modalInner) modalInner.classList.remove('scale-95');
            }, 10);
        };
        const hideModal = () => {
            modal.classList.add('opacity-0');
            if (modalInner) modalInner.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };
        
        if (openBtn1) openBtn1.addEventListener('click', showModal);
        if (openBtn2) openBtn2.addEventListener('click', showModal);
        if (closeBtn) closeBtn.addEventListener('click', hideModal);
        if (cancelBtn) cancelBtn.addEventListener('click', hideModal);
        
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal();
            });
        }
    });
</script>
@endpush
@endsection