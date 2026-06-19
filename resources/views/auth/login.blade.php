{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login - Tech Planet SRM')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-16 px-4 relative overflow-hidden">
    <!-- Clean background, gradients removed as requested -->
    
    <div class="max-w-md w-full reveal visible">
        <div class="glass rounded-[2.5rem] p-8 border border-charcoal/5 dark:border-cream/5 relative z-10 card-lift shadow-2xl shadow-charcoal/5 dark:shadow-none">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="mx-auto w-12 h-12 rounded-xl bg-cream-dark flex items-center justify-center shadow-lg mb-3 img-zoom border border-charcoal/5 dark:border-cream/5">
                    <i class="fas fa-lock text-charcoal text-xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-charcoal font-display tracking-tight mb-2">Access Portal</h2>
                <p class="text-muted text-sm">Login to your SRM CSI student profile console</p>
            </div>

            <form class="space-y-5" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Developer Email</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="student@srmist.edu.in">
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between items-center mb-1.5 pl-1 pr-1">
                        <label class="block text-charcoal font-bold text-[11px] uppercase tracking-widest">Secret Key (Password)</label>
                        <a href="#" class="text-charcoal/60 text-[10px] font-bold hover:text-charcoal transition-colors">Forgot?</a>
                    </div>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-charcoal/80 pt-2 pb-2">
                    <label class="flex items-center select-none cursor-pointer group">
                        <input type="checkbox" class="rounded bg-cream-dark border-charcoal/20 text-charcoal focus:ring-charcoal/50 focus:ring-offset-0 w-4 h-4 cursor-pointer">
                        <span class="ml-2 font-semibold group-hover:text-charcoal transition-colors">Keep Console Session Active</span>
                    </label>
                </div>

                <button type="submit" class="w-full btn-pill btn-pill-primary justify-center py-3.5 text-sm shadow-lg shadow-charcoal/10 dark:shadow-none mt-2">
                    <i class="fas fa-sign-in-alt mr-2"></i> Decrypt & Login
                </button>
            </form>
            
            <p class="mt-8 text-center text-sm text-muted">
                First time logging in? 
                <a href="{{ url('/signup') }}" class="nav-link text-charcoal font-bold ml-1">Register console account</a>
            </p>
        </div>
    </div>
</div>
@endsection