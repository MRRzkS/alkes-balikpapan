<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <a href="{{ route('admin.inquiries.index') }}" class="text-brand-700 text-sm">← Kembali</a>
        <h1 class="text-2xl font-bold mt-3">{{ $inquiry->name }}</h1>
        <p class="text-muted text-sm mt-1">{{ $inquiry->company ?? '-' }} · {{ $inquiry->phone }} · {{ $inquiry->email ?? '-' }}</p>
        <div class="bg-white border rounded-xl p-5 mt-5">{{ $inquiry->message }}</div>
        <div class="mt-5 flex gap-3">
            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Hapus inquiry ini?')">
                @csrf @method('DELETE')
                <button class="text-red-600 text-sm">Hapus</button>
            </form>
        </div>
    </div>
</x-layouts.app>
