@extends('layouts.student')
@section('title', 'Notifications')

@section('content')
<div class="space-y-6">
    <div class="mb-4 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-charcoal font-display flex items-center gap-2.5"><i class="fas fa-bell text-purple-400"></i> Notifications</h2>
            <p class="text-muted mt-2 text-xs sm:text-sm">Stay updated with SRM CSI activities, coding challenges, and coordinator updates.</p>
        </div>
        <button id="enable-push-btn" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-purple-500/20 transition flex items-center justify-center gap-2 text-sm w-full md:w-auto">
            <i class="fas fa-satellite-dish"></i> Enable Push Notifications
        </button>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const btn = document.getElementById('enable-push-btn');
            
            async function subscribeUser() {
                const registration = await navigator.serviceWorker.register('/sw.js');
                await navigator.serviceWorker.ready;

                const vapidPublicKey = '{{ env('VAPID_PUBLIC_KEY') }}';
                const convertedVapidKey = urlBase64ToUint8Array(vapidPublicKey);

                const subscription = await registration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: convertedVapidKey
                });

                // Send subscription to backend
                const response = await fetch('{{ route('student.push-subscription') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(subscription)
                });

                if (!response.ok) {
                    throw new Error('Failed to save subscription');
                }
            }

            // Check if already subscribed or blocked
            if (Notification.permission === 'granted') {
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verifying...';
                try {
                    await subscribeUser();
                    btn.innerHTML = '<i class="fas fa-check-circle"></i> Push Notifications Enabled';
                    btn.classList.replace('from-purple-500', 'from-emerald-500');
                    btn.classList.replace('to-indigo-600', 'to-teal-600');
                    btn.disabled = true;
                } catch(e) {
                    console.error('Auto-subscribe failed:', e);
                    btn.innerHTML = '<i class="fas fa-satellite-dish"></i> Enable Push Notifications';
                    btn.disabled = false;
                }
            } else if (Notification.permission === 'denied') {
                btn.innerHTML = '<i class="fas fa-ban"></i> Notifications Blocked';
                btn.classList.replace('from-purple-500', 'from-red-500');
                btn.classList.replace('to-indigo-600', 'to-rose-600');
                btn.disabled = true;
            }

            btn.addEventListener('click', async () => {
                try {
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enabling...';
                    const permission = await Notification.requestPermission();
                    if (permission !== 'granted') {
                        throw new Error('Permission not granted for Notification');
                    }

                    await subscribeUser();

                    btn.innerHTML = '<i class="fas fa-check-circle"></i> Push Notifications Enabled';
                    btn.classList.replace('from-purple-500', 'from-emerald-500');
                    btn.classList.replace('to-indigo-600', 'to-teal-600');
                    btn.disabled = true;
                    alert('Push notifications enabled successfully!');

                } catch (error) {
                    console.error('Error enabling push notifications:', error);
                    btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Failed to Enable';
                    btn.classList.replace('from-purple-500', 'from-amber-500');
                    btn.classList.replace('to-indigo-600', 'to-orange-600');
                }
            });

            function urlBase64ToUint8Array(base64String) {
                const padding = '='.repeat((4 - base64String.length % 4) % 4);
                const base64 = (base64String + padding)
                    .replace(/\-/g, '+')
                    .replace(/_/g, '/');

                const rawData = window.atob(base64);
                const outputArray = new Uint8Array(rawData.length);

                for (let i = 0; i < rawData.length; ++i) {
                    outputArray[i] = rawData.charCodeAt(i);
                }
                return outputArray;
            }
        });
    </script>
    @endpush

    @if($notifications->count())
        <div class="space-y-4">
            @foreach($notifications as $notif)
            <div class="glass-card rounded-2xl p-5 border-l-4 {{ $notif->is_read ? 'border-slate-800' : 'border-purple-500 shadow-md shadow-purple-500/5' }} transition hover:border-l-8 duration-200">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-purple-950/40 border border-purple-800/30 flex items-center justify-center text-purple-400 mt-0.5 shrink-0">
                            <i class="fas fa-info-circle text-xs"></i>
                        </div>
                        <div>
                            <p class="text-charcoal/80 text-xs sm:text-sm leading-relaxed">{{ $notif->message }}</p>
                            <p class="text-[10px] text-muted font-bold uppercase tracking-wider mt-2.5">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if(!$notif->is_read)
                        <span class="bg-purple-950/80 text-purple-300 border border-purple-800/35 text-[9px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-full shadow-sm shrink-0">New</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="glass-card rounded-2xl p-12 text-center text-slate-505 border border-charcoal/5 shadow-xl">
            <div class="w-14 h-14 rounded-full bg-slate-900/50 flex items-center justify-center mx-auto text-slate-650 border border-charcoal/5 text-2xl mb-4">
                <i class="fas fa-inbox"></i>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-450">No notifications yet. You're all caught up!</p>
        </div>
    @endif
</div>
@endsection

