{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Tech Planet Club - CSI Department: Student tech community for workshops, hackathons, and networking.">
    <title>@yield('title', 'Tech Planet Club - CSI Department')</title>
    <!-- Tailwind CSS + Google Fonts + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        cream: { DEFAULT: 'var(--color-cream)', dark: 'var(--color-cream-dark)', darker: 'var(--color-cream-darker)' },
                        charcoal: { DEFAULT: 'var(--color-charcoal)', light: 'var(--color-charcoal-light)', lighter: 'var(--color-charcoal-lighter)' },
                        warm: { DEFAULT: 'var(--color-warm)', light: 'var(--color-warm-light)', lighter: 'var(--color-warm-lighter)', dark: 'var(--color-warm-dark)' },
                        sage: { DEFAULT: 'var(--color-sage)', light: 'var(--color-sage-light)', dark: 'var(--color-sage-dark)' },
                        muted: 'var(--color-muted)',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    borderRadius: {
                        '4xl': '2rem',
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --color-cream: #ffffff;
            --color-cream-dark: #f9f9f9;
            --color-cream-darker: #f0f0f0;
            --color-charcoal: #000000;
            --color-charcoal-light: #1a1a1a;
            --color-charcoal-lighter: #333333;
            --color-warm: #000000;
            --color-warm-light: #333333;
            --color-warm-lighter: #666666;
            --color-warm-dark: #000000;
            --color-sage: #888888;
            --color-sage-light: #aaaaaa;
            --color-sage-dark: #555555;
            --color-muted: #999999;
        }

        html.dark {
            --color-cream: #000000;
            --color-cream-dark: #0a0a0a;
            --color-cream-darker: #141414;
            --color-charcoal: #ffffff;
            --color-charcoal-light: #e5e5e5;
            --color-charcoal-lighter: #cccccc;
            --color-warm: #ffffff;
            --color-warm-light: #eeeeee;
            --color-warm-lighter: #cccccc;
            --color-warm-dark: #ffffff;
            --color-sage: #888888;
            --color-sage-light: #aaaaaa;
            --color-sage-dark: #555555;
            --color-muted: #777777;
        }

        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Outfit', sans-serif; }
        
        body { 
            background-color: var(--color-cream); 
            color: var(--color-charcoal);
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--color-cream); }
        ::-webkit-scrollbar-thumb { background: var(--color-warm-light); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--color-warm); }

        /* ===== ANIMATIONS ===== */
        
        /* Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* Custom Text Animation */
        .text-split-wrap {
            display: inline-block;
            overflow: hidden;
            vertical-align: top;
        }
        .text-split-word {
            display: inline-block;
            transform: translateY(110%) rotate(2deg);
            opacity: 0;
            transition: transform 0.9s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1);
            transform-origin: top left;
        }
        .text-split-word.visible {
            transform: translateY(0) rotate(0);
            opacity: 1;
        }

        /* Text Stroke */
        .text-stroke-cream { -webkit-text-stroke: 1.5px var(--color-cream); color: transparent; }
        .text-stroke-charcoal { -webkit-text-stroke: 1.5px var(--color-charcoal); color: transparent; }
        .hover\:text-stroke-blue:hover { -webkit-text-stroke: 1.5px #60a5fa; }
        .hover\:text-stroke-purple:hover { -webkit-text-stroke: 1.5px #c084fc; }
        .hover\:text-stroke-pink:hover { -webkit-text-stroke: 1.5px #f472b6; }

        /* Marquee enhancements */
        .marquee-container {
            transform: rotate(-1.5deg) scale(1.03);
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15);
        }
        .marquee-container:hover {
            transform: rotate(0deg) scale(1);
        }

        /* Smooth marquee */
        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-scroll 35s linear infinite;
            will-change: transform;
        }
        .marquee-track:hover {
            animation-play-state: paused;
        }
        @keyframes marquee-scroll {
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-50%, 0, 0); }
        }

        /* Underline slide for links */
        .nav-link {
            position: relative;
            overflow: hidden;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--color-warm);
            transition: width 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .nav-link:hover::after { width: 100%; }

        /* Card hover lift */
        .card-lift {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        }
        html.dark .card-lift:hover { box-shadow: 0 20px 60px rgba(255,255,255,0.03); }

        /* Pill button hover */
        .btn-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.75rem;
            border-radius: 999px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-pill-primary {
            background-color: var(--color-charcoal);
            color: var(--color-cream);
        }
        .btn-pill-primary:hover {
            background-color: var(--color-charcoal-light);
            color: var(--color-cream);
            transform: scale(1.03);
        }
        .btn-pill-outline {
            background-color: transparent;
            border: 1.5px solid var(--color-charcoal);
            color: var(--color-charcoal);
        }
        .btn-pill-outline:hover {
            background-color: var(--color-charcoal);
            color: var(--color-cream);
            transform: scale(1.03);
        }
        .btn-pill-warm {
            background-color: var(--color-warm);
            color: var(--color-cream);
        }
        .btn-pill-warm:hover {
            background-color: var(--color-warm-light);
            transform: scale(1.03);
        }

        /* Arrow icon rotate on hover */
        .arrow-icon {
            transition: transform 0.3s ease;
        }
        .group:hover .arrow-icon,
        .btn-pill:hover .arrow-icon {
            transform: rotate(-45deg);
        }

        /* Glassmorphism */
        .glass {
            background: color-mix(in srgb, var(--color-cream) 75%, transparent);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .glass-dark {
            background: color-mix(in srgb, var(--color-charcoal) 85%, transparent);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Smooth image zoom on hover */
        .img-zoom {
            overflow: hidden;
        }
        .img-zoom img {
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .img-zoom:hover img {
            transform: scale(1.06);
        }

        /* ===== HERO SECTION STYLES ===== */

        /* Animated tilt and glowing outline */
        @keyframes tilt {
            0%, 50%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(1deg);
            }
            75% {
                transform: rotate(-1deg);
            }
        }
        .animate-tilt {
            animation: tilt 10s infinite linear;
        }

        /* Floating animation for cards */
        @keyframes hero-float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }
        .hero-float-card {
            animation: hero-float 5s ease-in-out infinite;
        }

        /* Featured card subtle hover tilt */
        .hero-featured-card {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease;
        }
        .hero-featured-card:hover {
            transform: translateY(-4px) rotate(-1deg);
        }

        /* Hero stat number pulse on count */
        @keyframes stat-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }
        .hero-stat-number.counting {
            animation: stat-pulse 0.15s ease-in-out;
        }

        /* Hero filter buttons shimmer on hover */
        .hero-filter-btn {
            position: relative;
            overflow: hidden;
        }
        .hero-filter-btn::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.6s ease;
        }
        .hero-filter-btn:hover::before {
            left: 100%;
        }

        /* Hero image parallax-like depth */
        #hero .rounded-\[2rem\] {
            box-shadow: 0 25px 80px -20px rgba(0,0,0,0.25);
        }

        /* Separator lines between stats */
        .hero-stat + .hero-stat {
            border-left: 1px solid color-mix(in srgb, var(--color-charcoal) 12%, transparent);
            padding-left: 2rem;
        }
        @media (max-width: 640px) {
            .hero-stat + .hero-stat {
                padding-left: 1.5rem;
            }
        }

        /* Selection */
        ::selection {
            background-color: var(--color-warm);
            color: var(--color-cream);
        }
    </style>
    @stack('styles')
    
    <!-- Dark Mode Init Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="antialiased min-h-screen flex flex-col justify-between transition-colors duration-500">

    <!-- NAVBAR COMPONENT -->
    <x-navbar />

    <!-- MAIN CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER COMPONENT -->
    <x-footer />

    <!-- Scroll Reveal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll reveal observer
            const revealElements = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealElements.forEach(el => observer.observe(el));

            // Custom Text Reveal Animation
            const animatedTexts = document.querySelectorAll('.animate-text');
            animatedTexts.forEach(el => {
                // Ignore elements that already contain HTML children other than text
                if(el.children.length > 0 && !el.classList.contains('allow-html')) return;
                
                const text = el.innerText;
                el.innerHTML = '';
                const words = text.split(' ');
                words.forEach((word, index) => {
                    if(word.trim() === '') return;
                    const wrap = document.createElement('span');
                    wrap.className = 'text-split-wrap';
                    // Keep space between words
                    wrap.style.marginRight = '0.25em'; 
                    
                    const inner = document.createElement('span');
                    inner.className = 'text-split-word';
                    inner.style.transitionDelay = `${index * 0.08}s`;
                    inner.innerText = word;
                    
                    wrap.appendChild(inner);
                    el.appendChild(wrap);
                });
            });

            const textObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const words = entry.target.querySelectorAll('.text-split-word');
                        words.forEach(w => w.classList.add('visible'));
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            
            animatedTexts.forEach(el => textObserver.observe(el));

            // ===== Hero Stat Counter Animation =====
            const heroStats = document.querySelectorAll('.hero-stat');
            if (heroStats.length > 0) {
                const statObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const target = parseInt(entry.target.dataset.target) || 0;
                            const numberEl = entry.target.querySelector('.hero-stat-number');
                            if (numberEl && !numberEl.dataset.counted) {
                                numberEl.dataset.counted = 'true';
                                let current = 0;
                                const duration = 1800;
                                const stepTime = Math.max(Math.floor(duration / target), 15);
                                const timer = setInterval(() => {
                                    current += Math.ceil(target / (duration / stepTime));
                                    if (current >= target) {
                                        current = target;
                                        clearInterval(timer);
                                        numberEl.classList.add('counting');
                                        setTimeout(() => numberEl.classList.remove('counting'), 300);
                                    }
                                    numberEl.textContent = current;
                                }, stepTime);
                            }
                            statObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });
                heroStats.forEach(el => statObserver.observe(el));
            }

            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>

    <x-share-toast />
    @stack('scripts')
</body>
</html>