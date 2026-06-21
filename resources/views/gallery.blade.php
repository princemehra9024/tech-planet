{{-- resources/views/gallery.blade.php --}}
@extends('layouts.app')

@section('title', 'Gallery - Tech Planet SRM')

@section('content')

<!-- Hide overflow on body to prevent horizontal scroll issues -->
<style>
    body { overflow-x: hidden; }
</style>

<section class="pt-32 pb-24 px-6 sm:px-10 max-w-[1400px] mx-auto reveal">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="font-display font-black text-5xl lg:text-7xl text-charcoal tracking-tight uppercase mb-4">Gallery</h1>
        <p class="text-charcoal/60 text-base lg:text-lg max-w-2xl mx-auto">
            A visual journey through our hackathons, bootcamps, and community meetups. Witness the builder culture in action.
        </p>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <button data-filter="all" class="filter-btn active btn-pill text-sm bg-charcoal text-cream shadow-lg shadow-charcoal/20 px-6 py-2">All Photos</button>
        @foreach($categories as $category)
            <button data-filter="{{ $category->slug }}" class="filter-btn btn-pill btn-pill-outline text-sm hover:border-charcoal hover:text-charcoal transition-colors bg-cream-dark/50 backdrop-blur-sm px-6 py-2">{{ $category->name }}</button>
        @endforeach
    </div>

    <!-- Masonry Grid -->
    <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
        
        @forelse($galleries as $gallery)
            <div class="break-inside-avoid relative group cursor-pointer gallery-item rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500" 
                 data-category="{{ $gallery->category->slug ?? '' }}" 
                 data-title="{{ $gallery->title }}" 
                 data-date="{{ $gallery->event_date ? \Carbon\Carbon::parse($gallery->event_date)->format('M d, Y') : '' }}" 
                 data-coordinator="{{ $gallery->coordinator }}" 
                 data-location="{{ $gallery->location }}" 
                 data-desc="{{ $gallery->description }}">
                 
                <img src="{{ asset($gallery->image_path) }}" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <div class="flex justify-between items-end">
                        <div>
                            <span class="text-warm text-[10px] font-bold uppercase tracking-widest mb-1 block">{{ $gallery->category->name ?? '' }}</span>
                            <h3 class="text-white font-display font-bold text-xl uppercase tracking-tight">{{ $gallery->title }}</h3>
                        </div>
                        @if($gallery->is_featured)
                            <div class="w-8 h-8 rounded-full bg-warm/90 text-white flex items-center justify-center shadow-lg transform rotate-12">
                                <i class="fas fa-star text-xs"></i>
                            </div>
                        @endif
                    </div>
                </div>

                @if($gallery->is_featured)
                    <div class="absolute top-4 right-4 bg-warm/90 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full shadow-lg z-10 backdrop-blur-sm border border-white/20">
                        Featured
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-20">
                <p class="text-charcoal/50 text-lg">No gallery images found.</p>
            </div>
        @endforelse

    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-charcoal/90 backdrop-blur-xl z-50 hidden flex-col lg:flex-row items-center justify-center p-4 md:p-10 opacity-0 transition-opacity duration-300">
    <!-- Close Button -->
    <button class="absolute top-6 right-6 w-12 h-12 rounded-full bg-cream-dark/10 hover:bg-cream-dark/20 flex items-center justify-center text-white text-lg transition-all z-50 border border-white/10" id="close-lightbox">
        <i class="fas fa-times"></i>
    </button>
    
    <div class="flex flex-col lg:flex-row w-full max-w-[1200px] h-auto lg:h-[75vh] bg-cream rounded-[2.5rem] overflow-hidden shadow-[0_30px_100px_rgba(0,0,0,0.5)] transform scale-95 transition-transform duration-300" id="lightbox-inner">
        <!-- Image Container -->
        <div class="lg:w-8/12 bg-charcoal flex items-center justify-center p-0 min-h-[40vh] lg:min-h-full overflow-hidden relative group">
            <img id="lightbox-img" class="w-full h-full object-cover" src="" alt="lightbox">
            <div class="absolute inset-0 bg-charcoal/5"></div>
            
            <!-- Navigation -->
            <button id="prev-lightbox" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-charcoal/50 hover:bg-charcoal flex items-center justify-center text-white text-sm transition-all z-20 backdrop-blur-md border border-white/10 opacity-0 group-hover:opacity-100 lg:opacity-100 shadow-lg">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="next-lightbox" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-charcoal/50 hover:bg-charcoal flex items-center justify-center text-white text-sm transition-all z-20 backdrop-blur-md border border-white/10 opacity-0 group-hover:opacity-100 lg:opacity-100 shadow-lg">
                <i class="fas fa-chevron-right"></i>
            </button>
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
    document.addEventListener('DOMContentLoaded', () => {
        // Reveal Animations
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
            reveal.style.opacity = '0';
            reveal.style.transform = 'translateY(40px)';
            reveal.style.transition = 'all 0.8s cubic-bezier(0.16, 1, 0.3, 1)';
            revealObserver.observe(reveal);
        });

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
                    b.classList.add('bg-cream-dark/50', 'backdrop-blur-sm');
                }
            });
            
            // Set active button
            btn.classList.add('bg-charcoal', 'text-cream', 'shadow-lg', 'shadow-charcoal/20');
            btn.classList.remove('btn-pill-outline', 'bg-cream-dark/50', 'backdrop-blur-sm');
            
            const filterValue = btn.getAttribute('data-filter');
            
            // Filter items with a smooth fade
            galleryItems.forEach(item => {
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
    const prevBtn = document.getElementById('prev-lightbox');
    const nextBtn = document.getElementById('next-lightbox');

    // Convert NodeList to Array for easier index tracking
    const itemsArray = Array.from(galleryItems);
    let currentLightboxIndex = 0;

    const getVisibleItems = () => itemsArray.filter(item => item.style.display !== 'none');

    const updateLightboxContent = (item) => {
        const img = item.querySelector('img');
        if(!img) return;
        
        // Add a tiny fade effect on image change
        lightboxImg.style.opacity = '0.5';
        setTimeout(() => {
            lightboxImg.src = img.src;
            lightboxImg.style.opacity = '1';
        }, 150);

        lTitle.innerText = item.getAttribute('data-title');
        lCategory.innerText = item.getAttribute('data-category');
        lDate.innerHTML = '<i class="far fa-calendar-alt mr-2 text-warm"></i> ' + item.getAttribute('data-date');
        lDesc.innerText = item.getAttribute('data-desc');
        lCoordinator.innerText = item.getAttribute('data-coordinator');
        lLocation.innerText = item.getAttribute('data-location');
    };

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const visibleItems = getVisibleItems();
            currentLightboxIndex = visibleItems.indexOf(item);
            
            updateLightboxContent(item);
            
            // Show lightbox
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            
            // Slight delay for smooth animation
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
                lightboxInner.classList.remove('scale-95');
                lightboxInner.classList.add('scale-100');
            }, 10);
        });
    });

    const navigateLightbox = (direction) => {
        const visibleItems = getVisibleItems();
        if(visibleItems.length === 0) return;
        
        currentLightboxIndex += direction;
        
        // Wrap around
        if (currentLightboxIndex < 0) currentLightboxIndex = visibleItems.length - 1;
        if (currentLightboxIndex >= visibleItems.length) currentLightboxIndex = 0;
        
        updateLightboxContent(visibleItems[currentLightboxIndex]);
    };

    prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        navigateLightbox(-1);
    });
    
    nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        navigateLightbox(1);
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
        // Close if clicking outside the inner container or navigation buttons
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Keyboard Navigation
    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'ArrowLeft') navigateLightbox(-1);
            if (e.key === 'ArrowRight') navigateLightbox(1);
            if (e.key === 'Escape') closeLightbox();
        }
    });
</script>
@endpush
@endsection
