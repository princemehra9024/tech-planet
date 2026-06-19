{{-- resources/views/components/navbar.blade.php --}}
<nav id="main-nav" class="fixed top-0 left-1/2 -translate-x-1/2 w-full z-[110] transition-all duration-500 py-4 border border-transparent">
    <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
        <div class="flex justify-between items-center relative z-[110]">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 sm:gap-4 group relative z-[110]">
                <div class="w-14 h-14 sm:w-16 sm:h-16 transition-all duration-500 flex items-center justify-center transform group-hover:-rotate-3 group-hover:scale-105">
                    <img src="/logo-removebg-preview.png" alt="Tech Planet Logo" class="w-full h-full object-contain drop-shadow-md transform transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="flex flex-col logo-text transition-colors duration-500">
                    <span class="font-display font-black text-[1.35rem] text-charcoal leading-none tracking-tighter transition-all duration-300 group-hover:translate-x-1">tech planet</span>
                    <span class="text-[9px] text-muted font-bold tracking-[0.25em] uppercase mt-1 transition-all duration-300 group-hover:translate-x-1 group-hover:text-charcoal/60">CSI • SRM</span>
                </div>
            </a>

            <!-- Actions -->
            <div class="flex items-center gap-3 relative z-[110]">
                <!-- Theme Toggle Button -->
                <button id="main-theme-toggle" class="theme-toggle-btn w-12 h-12 rounded-full border border-charcoal/20 dark:border-white/20 bg-white/5 backdrop-blur-sm flex items-center justify-center hover:bg-charcoal hover:text-white dark:hover:bg-white dark:hover:text-charcoal transition-all group text-charcoal dark:text-white shadow-sm">
                    <i class="fas fa-moon dark:hidden group-hover:scale-110 transition-transform"></i>
                    <i class="fas fa-sun hidden dark:block group-hover:scale-110 transition-transform"></i>
                </button>

                <!-- Hamburger Button -->
                <button id="menu-trigger" class="w-12 h-12 flex items-center justify-center rounded-full bg-charcoal text-cream hover:bg-warm transition-all duration-300 shadow-lg shadow-charcoal/20 group overflow-hidden border border-transparent">
                    <div class="flex flex-col justify-center items-end gap-1.5 w-5 h-5 relative">
                        <span class="absolute top-[3px] right-0 w-full h-[2px] bg-cream rounded-full transform transition-all duration-300 origin-center" id="line-1"></span>
                        <span class="absolute bottom-[3px] right-0 w-3/4 h-[2px] bg-cream rounded-full transform transition-all duration-300 group-hover:w-full origin-center" id="line-2"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>
    
<!-- Fullscreen Menu Overlay -->
    <div id="fullscreen-menu" class="fixed inset-0 bg-charcoal text-cream z-[105] flex items-center justify-center opacity-0 pointer-events-none transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] overflow-hidden">
        
        <!-- Decorative background elements -->
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] rounded-full bg-warm/10 blur-[150px] pointer-events-none transition-transform duration-1000 transform translate-y-20" id="menu-blob-1"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] rounded-full bg-sage/10 blur-[150px] pointer-events-none transition-transform duration-1000 transform -translate-y-20" id="menu-blob-2"></div>

        <!-- Premium Image Hover Reveals -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <img id="hover-img-home" src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-0 scale-110 grayscale transition-all duration-[800ms] ease-[cubic-bezier(0.16,1,0.3,1)]">
            <img id="hover-img-about" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-0 scale-110 grayscale transition-all duration-[800ms] ease-[cubic-bezier(0.16,1,0.3,1)]">
            <img id="hover-img-events" src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-0 scale-110 grayscale transition-all duration-[800ms] ease-[cubic-bezier(0.16,1,0.3,1)]">
            <img id="hover-img-gallery" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-0 scale-110 grayscale transition-all duration-[800ms] ease-[cubic-bezier(0.16,1,0.3,1)]">
            <img id="hover-img-contact" src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-0 scale-110 grayscale transition-all duration-[800ms] ease-[cubic-bezier(0.16,1,0.3,1)]">
            <!-- Overlay to ensure text readability -->
            <div class="absolute inset-0 bg-charcoal/80 transition-opacity duration-500"></div>
        </div>

        <div class="max-w-[1400px] w-full mx-auto px-6 sm:px-10 flex flex-col md:flex-row justify-between h-full pt-32 pb-10 sm:pb-20 relative z-10 overflow-y-auto hide-scrollbar">
            
            <!-- Navigation Links -->
            <div class="flex flex-col gap-2 sm:gap-4 md:gap-6 w-full md:w-2/3 justify-center" id="menu-links">
                <a href="{{ url('/') }}" data-hover="home" class="menu-item font-display font-black text-5xl sm:text-6xl md:text-7xl lg:text-[7rem] leading-none uppercase tracking-tighter transition-colors transform translate-y-12 opacity-0 inline-block w-full group/link"><span class="menu-item-text block w-max relative z-10 group-hover/link:text-cream">Home</span></a>
                <a href="{{ url('/about') }}" data-hover="about" class="menu-item font-display font-black text-5xl sm:text-6xl md:text-7xl lg:text-[7rem] leading-none uppercase tracking-tighter transition-colors transform translate-y-12 opacity-0 inline-block w-full group/link"><span class="menu-item-text block w-max relative z-10 group-hover/link:text-cream">About</span></a>
                <a href="{{ url('/events') }}" data-hover="events" class="menu-item font-display font-black text-5xl sm:text-6xl md:text-7xl lg:text-[7rem] leading-none uppercase tracking-tighter transition-colors transform translate-y-12 opacity-0 inline-block w-full group/link"><span class="menu-item-text block w-max relative z-10 group-hover/link:text-cream">Events</span></a>
                <a href="{{ url('/gallery') }}" data-hover="gallery" class="menu-item font-display font-black text-5xl sm:text-6xl md:text-7xl lg:text-[7rem] leading-none uppercase tracking-tighter transition-colors transform translate-y-12 opacity-0 inline-block w-full group/link"><span class="menu-item-text block w-max relative z-10 group-hover/link:text-cream">Gallery</span></a>
                <a href="{{ url('/contact') }}" data-hover="contact" class="menu-item font-display font-black text-5xl sm:text-6xl md:text-7xl lg:text-[7rem] leading-none uppercase tracking-tighter transition-colors transform translate-y-12 opacity-0 inline-block w-full group/link"><span class="menu-item-text block w-max relative z-10 group-hover/link:text-cream">Contact</span></a>
                
                <!-- Mobile Only Info -->
                <div class="flex md:hidden flex-col mt-8 gap-6 border-t border-white/10 pt-8">
                    <div class="menu-item transform translate-y-10 opacity-0">
                        <span class="text-cream/40 text-[10px] font-bold uppercase tracking-widest block mb-2">Connect</span>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="flex gap-4 menu-item transform translate-y-10 opacity-0">
                        @auth
                            <a href="{{ route('student.dashboard') }}" class="btn-pill bg-cream text-charcoal hover:bg-warm hover:text-cream text-xs">Console <i class="fas fa-arrow-right arrow-icon"></i></a>
                        @else
                            <a href="{{ url('/login') }}" class="btn-pill bg-cream text-charcoal hover:bg-warm hover:text-cream text-xs">Login <i class="fas fa-arrow-right arrow-icon"></i></a>
                        @endauth
                        <button class="theme-toggle-btn w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all">
                            <i class="fas fa-moon dark:hidden hover:text-charcoal"></i>
                            <i class="fas fa-sun hidden dark:block hover:text-charcoal"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Desktop Side Info -->
            <div class="hidden md:flex flex-col justify-end w-1/3 pb-10" id="menu-info">
                <div class="transform translate-y-12 opacity-0 menu-info-item group/loc cursor-pointer">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-warm opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-warm"></span>
                        </span>
                        <span class="text-cream/40 text-xs font-bold uppercase tracking-widest">Location</span>
                    </div>
                    <div class="border-l-2 border-cream/10 pl-5 group-hover/loc:border-warm transition-colors duration-500">
                        <p class="font-display text-xl font-bold text-cream group-hover/loc:text-warm transition-colors duration-300">SRM Institute of Science and Technology</p>
                        <p class="text-sm font-medium text-cream/50 mt-1.5">Kattankulathur, Chennai</p>
                    </div>
                </div>
                <div class="mt-10 transform translate-y-12 opacity-0 menu-info-item">
                    <span class="text-cream/40 text-xs font-bold uppercase tracking-widest block mb-4">Connect</span>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="mt-12 flex gap-4 transform translate-y-12 opacity-0 menu-info-item">
                    @auth
                        <a href="{{ route('student.dashboard') }}" class="btn-pill bg-cream text-charcoal hover:bg-warm hover:text-cream text-xs border border-transparent hover:border-cream">Console <i class="fas fa-arrow-right arrow-icon"></i></a>
                    @else
                        <a href="{{ url('/login') }}" class="btn-pill bg-cream text-charcoal hover:bg-warm hover:text-cream text-xs border border-transparent hover:border-cream">Login <i class="fas fa-arrow-right arrow-icon"></i></a>
                    @endauth
                    <button class="theme-toggle-btn w-10 h-10 rounded-full border border-cream/20 flex items-center justify-center hover:bg-cream hover:text-charcoal transition-all group">
                        <i class="fas fa-moon dark:hidden group-hover:text-charcoal transition-colors"></i>
                        <i class="fas fa-sun hidden dark:block group-hover:text-charcoal transition-colors"></i>
                    </button>
                </div>
            </div>
            
        </div>
    </div>

<style>
    /* Add transition utility for JS manipulation */
    .menu-item, .menu-info-item {
        transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .menu-item-active {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    /* Huge menu item hover effect */
    .menu-item-text {
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        transform-origin: left center;
        -webkit-text-stroke: 2px transparent;
    }
    .menu-item:hover .menu-item-text {
        -webkit-text-fill-color: transparent;
        -webkit-text-stroke: 2px var(--color-cream);
        transform: translateX(40px);
    }
    .hover-img-active {
        opacity: 0.4 !important;
        transform: scale(1) !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nav = document.getElementById('main-nav');
        const trigger = document.getElementById('menu-trigger');
        const menu = document.getElementById('fullscreen-menu');
        const line1 = document.getElementById('line-1');
        const line2 = document.getElementById('line-2');
        const logoTexts = document.querySelectorAll('.logo-text span');
        const logoTextContainer = document.querySelector('.logo-text');
        
        const menuItems = document.querySelectorAll('.menu-item');
        const infoItems = document.querySelectorAll('.menu-info-item');
        
        const blob1 = document.getElementById('menu-blob-1');
        const blob2 = document.getElementById('menu-blob-2');
        
        let isOpen = false;

        // Theme Toggle Logic
        const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
        themeToggleBtns.forEach(btn => btn.addEventListener('click', toggleTheme));

        // Scroll effect — transparent to glass pill
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            if (isOpen) return; // Don't apply scroll effects if menu is open
            
            const scrollY = window.scrollY;
            if (scrollY > 60) {
                nav.classList.add('glass', 'shadow-lg', 'top-4', 'rounded-[2rem]', 'w-[95%]', 'max-w-[1200px]', 'border-charcoal/10', 'py-2');
                nav.classList.remove('w-full', 'py-4', 'top-0', 'border-transparent');
            } else {
                nav.classList.remove('glass', 'shadow-lg', 'top-4', 'rounded-[2rem]', 'w-[95%]', 'max-w-[1200px]', 'border-charcoal/10', 'py-2');
                nav.classList.add('w-full', 'py-4', 'top-0', 'border-transparent');
            }
            lastScroll = scrollY;
        });

        // Toggle Menu
        if(trigger && menu) {
            trigger.addEventListener('click', () => {
                isOpen = !isOpen;
                
                if (isOpen) {
                    // Open Menu
                    document.body.style.overflow = 'hidden';
                    menu.classList.remove('opacity-0', 'pointer-events-none');
                    menu.classList.add('opacity-100');
                    
                    // Animate Hamburger to X
                    line1.style.transform = 'translateY(3.5px) rotate(45deg)';
                    line2.style.width = '100%';
                    line2.style.transform = 'translateY(-3.5px) rotate(-45deg)';
                    
                    // Button styles
                    trigger.classList.remove('bg-charcoal', 'text-cream');
                    trigger.classList.add('bg-white', 'text-charcoal');
                    line1.classList.remove('bg-cream'); line1.classList.add('bg-charcoal');
                    line2.classList.remove('bg-cream'); line2.classList.add('bg-charcoal');
                    
                    // Change Logo Text Color to White for contrast
                    logoTextContainer.classList.remove('text-charcoal');
                    logoTextContainer.classList.add('text-white');
                    logoTexts[0].classList.remove('text-charcoal');
                    logoTexts[0].classList.add('text-white');
                    
                    // Change main theme toggle button color for contrast
                    const mainThemeToggle = document.getElementById('main-theme-toggle');
                    if (mainThemeToggle) {
                        mainThemeToggle.classList.remove('text-charcoal', 'border-charcoal/20');
                        mainThemeToggle.classList.add('text-white', 'border-white/20');
                    }
                    
                    // Remove glass background if scrolled so menu is not obscured
                    if (window.scrollY > 60) {
                        nav.classList.remove('glass', 'shadow-lg', 'border-charcoal/10');
                        nav.classList.add('border-transparent');
                    }
                    
                    // Animate Blobs
                    setTimeout(() => {
                        blob1.style.transform = 'translateY(0)';
                        blob2.style.transform = 'translateY(0)';
                    }, 100);

                    // Stagger Links
                    menuItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('menu-item-active');
                        }, 200 + (index * 80));
                    });
                    
                    // Stagger Info
                    infoItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('menu-item-active');
                        }, 400 + (index * 80));
                    });

                } else {
                    // Close Menu
                    document.body.style.overflow = '';
                    menu.classList.add('opacity-0', 'pointer-events-none');
                    menu.classList.remove('opacity-100');
                    
                    // Animate X back to Hamburger
                    line1.style.transform = 'translateY(0) rotate(0)';
                    line2.style.width = '75%';
                    line2.style.transform = 'translateY(0) rotate(0)';
                    
                    // Button styles
                    trigger.classList.add('bg-charcoal', 'text-cream');
                    trigger.classList.remove('bg-white', 'text-charcoal');
                    line1.classList.add('bg-cream'); line1.classList.remove('bg-charcoal');
                    line2.classList.add('bg-cream'); line2.classList.remove('bg-charcoal');
                    
                    // Revert Logo Text Color
                    logoTextContainer.classList.add('text-charcoal');
                    logoTextContainer.classList.remove('text-white');
                    logoTexts[0].classList.add('text-charcoal');
                    logoTexts[0].classList.remove('text-white');
                    
                    // Revert main theme toggle button color
                    const mainThemeToggle = document.getElementById('main-theme-toggle');
                    if (mainThemeToggle) {
                        mainThemeToggle.classList.add('text-charcoal', 'border-charcoal/20');
                        mainThemeToggle.classList.remove('text-white', 'border-white/20');
                    }
                    
                    // Restore glass background if scrolled
                    if (window.scrollY > 60) {
                        nav.classList.add('glass', 'shadow-lg', 'border-charcoal/10');
                        nav.classList.remove('border-transparent');
                    }
                    
                    // Reset Blobs
                    blob1.style.transform = 'translateY(20px)';
                    blob2.style.transform = 'translateY(-20px)';

                    // Remove Active classes
                    menuItems.forEach(item => {
                        item.classList.remove('menu-item-active');
                    });
                    infoItems.forEach(item => {
                        item.classList.remove('menu-item-active');
                    });
                }
            });
        }
        
        // Image Hover Reveal Logic
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                const targetId = item.getAttribute('data-hover');
                const targetImg = document.getElementById(`hover-img-${targetId}`);
                if (targetImg) {
                    targetImg.classList.add('hover-img-active');
                }
            });
            
            item.addEventListener('mouseleave', () => {
                const targetId = item.getAttribute('data-hover');
                const targetImg = document.getElementById(`hover-img-${targetId}`);
                if (targetImg) {
                    targetImg.classList.remove('hover-img-active');
                }
            });
        });
    });
</script>
