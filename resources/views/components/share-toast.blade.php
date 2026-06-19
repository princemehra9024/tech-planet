{{-- resources/views/components/share-toast.blade.php --}}
<div id="share-toast" class="fixed bottom-5 right-5 z-[9999] transform translate-y-10 opacity-0 pointer-events-none transition-all duration-300 ease-out">
    <div class="glass-card bg-[#0e1122]/90 border border-cyan-500/30 text-slate-100 px-5 py-3.5 rounded-2xl flex items-center gap-3 shadow-2xl shadow-cyan-500/10">
        <div class="w-8 h-8 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400">
            <i class="fas fa-link text-sm"></i>
        </div>
        <div>
            <h4 class="text-xs font-bold text-white">Link Copied!</h4>
            <p class="text-[10px] text-slate-400">Profile portfolio URL copied to clipboard.</p>
        </div>
    </div>
</div>

<script>
    function shareProfile(url) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(showToast).catch(err => {
                console.error('Failed to copy: ', err);
                fallbackCopy(url);
            });
        } else {
            fallbackCopy(url);
        }
    }

    function fallbackCopy(url) {
        const tempInput = document.createElement('textarea');
        tempInput.value = url;
        tempInput.style.position = 'fixed';
        tempInput.style.opacity = '0';
        document.body.appendChild(tempInput);
        tempInput.focus();
        tempInput.select();
        try {
            document.execCommand('copy');
            showToast();
        } catch (err) {
            console.error('Fallback copy failed', err);
        }
        document.body.removeChild(tempInput);
    }

    function showToast() {
        const toast = document.getElementById('share-toast');
        if (!toast) return;
        toast.classList.remove('translate-y-10', 'opacity-0', 'pointer-events-none');
        toast.classList.add('translate-y-0', 'opacity-100');
        
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-10', 'opacity-0', 'pointer-events-none');
        }, 3000);
    }
</script>
