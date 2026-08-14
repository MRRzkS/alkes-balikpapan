<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Inbox Inquiry</h1>
        @if (session('success')) <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-lg mb-4 text-sm">{{ session('success') }}</div> @endif
        <table class="w-full text-left text-sm">
            <thead class="text-muted border-b"><tr><th class="py-2">Nama</th><th>Perusahaan</th><th>Telepon</th><th>Status</th><th></th></tr></thead>
            <tbody>
                @forelse ($inquiries as $inquiry)
                    <tr class="border-b">
                        <td class="py-3">{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->company ?? '-' }}</td>
                        <td>{{ $inquiry->phone }}</td>
                        <td>{{ $inquiry->is_read ? 'Dibaca' : 'Baru' }}</td>
                        <td class="text-right"><a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-brand-700">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 text-muted">Belum ada inquiry.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6">{{ $inquiries->links() }}</div>
    </div>
</x-layouts.app>
