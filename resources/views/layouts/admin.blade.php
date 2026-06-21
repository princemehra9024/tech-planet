<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club Admin | @yield('title')</title>
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
            --color-cream: #F5F0E8;
            --color-cream-dark: #EDE7D9;
            --color-cream-darker: #E0D8C8;
            --color-charcoal: #1A1A1A;
            --color-charcoal-light: #2D2D2D;
            --color-charcoal-lighter: #3D3D3D;
            --color-warm: #000000;
            --color-warm-light: #333333;
            --color-warm-lighter: #666666;
            --color-warm-dark: #000000;
            --color-sage: #7A8B6F;
            --color-sage-light: #95A888;
            --color-sage-dark: #5E6D54;
            --color-muted: #6B6B6B;
        }

        html.dark {
            --color-cream: #09090b;
            --color-cream-dark: #18181b;
            --color-cream-darker: #27272a;
            --color-charcoal: #fafafa;
            --color-charcoal-light: #e4e4e7;
            --color-charcoal-lighter: #a1a1aa;
            --color-warm: #FFFFFF;
            --color-warm-light: #E0E0E0;
            --color-warm-lighter: #CCCCCC;
            --color-warm-dark: #FFFFFF;
            --color-sage: #5E6D54;
            --color-sage-light: #7A8B6F;
            --color-sage-dark: #95A888;
            --color-muted: #A0A0A0;
        }

        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Outfit', sans-serif; }
        
        body { 
            background-color: var(--color-cream); 
            color: var(--color-charcoal);
            scroll-behavior: smooth;
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

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--color-cream); }
        ::-webkit-scrollbar-thumb { background: var(--color-warm-light); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--color-warm); }
        
        /* Card hover lift */
        .card-lift {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        }
        html.dark .card-lift:hover { box-shadow: 0 20px 60px rgba(255,255,255,0.03); }

        .glass-card {
            background: color-mix(in srgb, var(--color-cream-dark) 50%, transparent);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        html.dark .glass-card {
            background: color-mix(in srgb, var(--color-charcoal-light) 50%, transparent);
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
        
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                updateThemeIcon('light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                updateThemeIcon('dark');
            }
        }
        
        function updateThemeIcon(theme) {
            const icons = document.querySelectorAll('.theme-icon');
            icons.forEach(icon => {
                if(theme === 'dark') {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            });
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            updateThemeIcon(currentTheme);
        });
    </script>
</head>
<body class="antialiased min-h-screen flex flex-col md:flex-row transition-colors duration-500 selection:bg-charcoal selection:text-cream dark:selection:bg-cream dark:selection:text-charcoal">
    @if(session()->has('impersonator_id'))
        <div class="absolute top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-rose-600 text-white px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg z-50">
            <div class="flex items-center gap-2.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cream-dark opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-cream-dark"></span>
                </span>
                <span>Impersonation Active: You are logged in as <span class="underline">{{ auth()->user()->name }}</span> ({{ ucfirst(auth()->user()->role) }})</span>
            </div>
            <form method="POST" action="{{ route('student.stop-impersonating') }}">
                @csrf
                <button type="submit" class="bg-cream-dark/20 hover:bg-cream-dark/30 border border-white/30 text-white font-bold px-3 py-1 rounded-lg transition text-[10px] uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Return to Admin
                </button>
            </form>
        </div>
    @endif

    <div class="min-h-screen flex flex-col md:flex-row w-full {{ session()->has('impersonator_id') ? 'pt-12' : '' }}">
        <!-- Sidebar -->
        <aside class="w-full md:w-72 bg-cream-dark/50 backdrop-blur-xl border-r border-charcoal/5 p-6 shrink-0 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-charcoal flex items-center justify-center shadow-lg">
                            <i class="fas fa-shield-alt text-cream text-lg"></i>
                        </div>
                        <div>
                            <div class="text-xl font-extrabold text-charcoal font-display leading-tight">Command Center</div>
                        </div>
                    </div>
                    <!-- Theme Toggle -->
                    <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-cream-dark text-charcoal hover:bg-charcoal/5 transition-colors border border-charcoal/5 " title="Toggle Light/Dark Mode">
                        <i class="fas theme-icon fa-moon text-lg transition-transform hover:rotate-12"></i>
                    </button>
                </div>

                <nav class="space-y-1.5 font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-chart-pie w-5 {{ request()->routeIs('admin.dashboard') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.posts.*') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-bullhorn w-5 {{ request()->routeIs('admin.posts.*') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Posts</span>
                    </a>
                    @if(auth()->user()->role !== 'media_manager')
                    <a href="{{ route('admin.quizzes.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-laptop-code w-5 {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Quizzes</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.users.*') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-users-cog w-5 {{ request()->routeIs('admin.users.*') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.suggestions.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.suggestions.*') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-vote-yea w-5 {{ request()->routeIs('admin.suggestions.*') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Suggestions & Votes</span>
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.events.*') ? 'bg-charcoal text-cream  shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal ' }}">
                        <i class="fas fa-calendar-alt w-5 {{ request()->routeIs('admin.events.*') ? 'text-cream/70 ' : 'text-charcoal/50 ' }}"></i>
                        <span>Events</span>
                    </a>
                    @endif
                    @if(auth()->user()->canManageGallery())
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'bg-charcoal text-cream shadow-md' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-charcoal' }}">
                        <i class="fas fa-images w-5 {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'text-cream/70' : 'text-charcoal/50' }}"></i>
                        <span>Gallery</span>
                    </a>
                    @endif
                </nav>
            </div>

            <div class="mt-8 pt-6 border-t border-charcoal/10 space-y-2">
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-charcoal/70 hover:bg-charcoal/5 transition-all">
                    <i class="fas fa-user-graduate w-5"></i>
                    <span>Student Portal</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 transition-all font-bold">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-8 min-w-0 bg-cream ">
            @if(session('success'))
                <div class="mb-6 rounded-2xl bg-green-50 dark:bg-green-950/30 border border-green-200 dark:border-green-800/50 text-green-700 dark:text-green-400 px-5 py-4 flex items-center gap-3 shadow-sm">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-2xl bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-800/50 text-red-700 dark:text-red-400 px-5 py-4 flex items-center gap-3 shadow-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>

