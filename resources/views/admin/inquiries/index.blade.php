<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-2">Inbox Inquiry</h1>
        <p class="text-sm text-ink-500 dark:text-ink-400 mb-6">Pesan dari formulir kontak publik.</p>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-4 py-3 mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <div class="glass rounded-2xl overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="text-ink-500 dark:text-ink-400 border-b border-white/10 dark:border-white/5">
                    <tr><th class="py-3 px-5">Nama</th><th>Perusahaan</th><th>Telepon</th><th>Status</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($inquiries as $inquiry)
                        <tr class="border-b border-white/5 dark:border-white/5 hover:bg-brand-500/5 transition {{ !$inquiry->is_read ? 'bg-brand-500/5' : '' }}">
                            <td class="py-3 px-5 font-medium text-ink-900 dark:text-white">
                                {{ $inquiry->name }}
                                @if (!$inquiry->is_read) <span class="ml-1 inline-block w-2 h-2 rounded-full bg-brand-500"></span> @endif
                            </td>
                            <td class="text-ink-600 dark:text-ink-300">{{ $inquiry->company ?? '-' }}</td>
                            <td class="text-ink-600 dark:text-ink-300">{{ $inquiry->phone }}</td>
                            <td>
                                @if ($inquiry->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-ink-500/10 text-ink-600 dark:text-ink-400">Dibaca</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-brand-500/15 text-brand-700 dark:text-brand-300">Baru</span>
                                @endif
                            </td>
                            <td class="text-right whitespace-nowrap px-5">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-brand-600 dark:text-brand-300 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-8 text-center text-ink-400">Belum ada inquiry.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($inquiries->hasPages())
            <div class="mt-6">{{ $inquiries->links() }}</div>
        @endif
    </div>
</x-layouts.app>
