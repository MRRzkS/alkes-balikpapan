<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.inquiries.index') }}" class="press inline-flex items-center gap-1 text-brand-600 dark:text-brand-300 text-sm hover:underline">← Kembali</a>
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mt-3">{{ $inquiry->name }}</h1>
        <p class="text-ink-500 dark:text-ink-400 text-sm mt-1">{{ $inquiry->company ?? '-' }} · {{ $inquiry->phone }} · {{ $inquiry->email ?? '-' }}</p>

        <div class="glass rounded-2xl p-6 mt-6">
            <div class="text-sm font-medium text-ink-500 dark:text-ink-400 mb-2">Pesan</div>
            <p class="text-ink-900 dark:text-white whitespace-pre-line">{{ $inquiry->message }}</p>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
            @if ($inquiry->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" target="_blank" rel="noopener" class="press inline-flex items-center gap-2 bg-wa hover:bg-emerald-500 text-white font-semibold px-5 py-2.5 rounded-xl text-sm shadow-lg shadow-emerald-500/25 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.82 11.82 0 018.413 3.488 11.82 11.82 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24z"/></svg>
                    Balas via WhatsApp
                </a>
            @endif
            @if ($inquiry->email)
                <a href="mailto:{{ $inquiry->email }}" class="press inline-flex items-center gap-2 glass text-brand-700 dark:text-white font-semibold px-5 py-2.5 rounded-xl text-sm hover:-translate-y-0.5 transition-transform duration-200">Balas via Email</a>
            @endif
            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Hapus inquiry ini?')" class="inline">
                @csrf @method('DELETE')
                <button class="press inline-flex items-center gap-2 text-red-600 dark:text-red-400 font-medium px-5 py-2.5 rounded-xl text-sm hover:bg-red-500/10 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
