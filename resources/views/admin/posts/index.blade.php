<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-brand-700 dark:text-white">Artikel / Berita</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400 mt-1">Kelola artikel yang tampil di blog publik.</p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="press inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-brand-600/30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                Artikel Baru
            </a>
        </div>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-4 py-3 mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <div class="glass rounded-2xl overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="text-ink-500 dark:text-ink-400 border-b border-white/10 dark:border-white/5">
                    <tr><th class="py-3 px-5">Judul</th><th>Status</th><th>Tanggal</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="border-b border-white/5 dark:border-white/5 hover:bg-brand-500/5 transition">
                            <td class="py-3 px-5 font-medium text-ink-900 dark:text-white">{{ $post->title }}</td>
                            <td>
                                @if ($post->status === 'published')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">Dipublikasi</span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-ink-500/10 text-ink-600 dark:text-ink-400">Draft</span>
                                @endif
                            </td>
                            <td class="text-ink-500 dark:text-ink-400">{{ $post->published_at?->format('d/m/Y') ?? '-' }}</td>
                            <td class="text-right whitespace-nowrap px-5">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-brand-600 dark:text-brand-300 mr-3 hover:underline">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 dark:text-red-400 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="py-8 text-center text-ink-400">Belum ada artikel.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($posts->hasPages())
            <div class="mt-6">{{ $posts->links() }}</div>
        @endif
    </div>
</x-layouts.app>
