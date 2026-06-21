import os

admin_head = r"""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club | @yield('title')</title>
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
            --color-cream: #121212;
            --color-cream-dark: #1A1A1A;
            --color-cream-darker: #2D2D2D;
            --color-charcoal: #F5F0E8;
            --color-charcoal-light: #EDE7D9;
            --color-charcoal-lighter: #E0D8C8;
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
            border: 1px solid color-mix(in srgb, var(--color-charcoal) 5%, transparent);
        }
        html.dark .glass-card {
            background: color-mix(in srgb, var(--color-charcoal-light) 50%, transparent);
            border: 1px solid color-mix(in srgb, var(--color-cream) 5%, transparent);
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
"""

with open(r'd:\tech-planet\tech-planet\resources\views\layouts\student.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace from <!DOCTYPE html> to <body class="antialiased selection:bg-purple-600 selection:text-white">
import re
new_content = re.sub(r'<!DOCTYPE html>.*?(?:<body[^>]*>)', admin_head, content, flags=re.DOTALL)

# Add theme toggle button to sidebar
toggle_html = r"""
                <div class="pt-4 mt-2 border-t border-charcoal/5 dark:border-cream/5 flex justify-center">
                    <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-cream-dark dark:bg-charcoal-lighter text-charcoal dark:text-cream hover:bg-cream-darker dark:hover:bg-charcoal-light transition-colors shadow-sm" aria-label="Toggle Dark Mode">
                        <i class="theme-icon fas fa-moon text-lg"></i>
                    </button>
                </div>
"""
new_content = new_content.replace('<!-- Nav Items -->', toggle_html + '<!-- Nav Items -->')

# Replace classes
replacements = {
    r'bg-\[#0e1122\]/90': r'bg-cream-darker/50 dark:bg-charcoal-lighter/30 glass-card',
    r'border-white/5': r'border-charcoal/5 dark:border-cream/5',
    r'text-slate-400': r'text-muted',
    r'text-slate-200': r'text-charcoal/80 dark:text-cream/80',
    r'text-slate-300': r'text-charcoal/70 dark:text-cream/70',
    r'text-white': r'text-charcoal dark:text-cream',
    r'bg-white/5': r'bg-charcoal/5 dark:bg-cream/5',
    r'hover:bg-white/5': r'hover:bg-charcoal/5 dark:hover:bg-cream/5',
    r'border-white/20': r'border-charcoal/20 dark:border-cream/20',
    r'bg-white/10': r'bg-charcoal/10 dark:bg-cream/10',
    r'bg-obsidian-950/95': r'bg-cream-darker/95 dark:bg-charcoal-lighter/95',
    r'text-red-400 bg-red-955/10 border border-red-955/20': r'text-red-500 bg-red-500/10 border border-red-500/20'
}

for old, new in replacements.items():
    new_content = new_content.replace(old, new)

with open(r'd:\tech-planet\tech-planet\resources\views\layouts\student.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)

print("Updated student.blade.php layout successfully.")
