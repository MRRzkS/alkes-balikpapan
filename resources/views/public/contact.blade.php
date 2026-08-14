<x-layouts.public>
    <section class="max-w-3xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-brand-700 mb-2">Kontak</h1>
        <p class="text-muted mb-8">Konsultasikan kebutuhan alat kesehatan Anda. Tim kami akan merespons via WhatsApp atau email.</p>

        @if (session('success'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-lg mb-6 text-sm">{{ session('success') }}</div>
        @endif

        <div class="grid md:grid-cols-2 gap-8 mb-10">
            <div class="space-y-4 text-sm">
                <div>
                    <div class="font-semibold text-brand-700">Alamat</div>
                    <p class="text-muted">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan</p>
                    <a href="{{ config('site.maps_link') }}" target="_blank" rel="noopener" class="text-brand-600 text-xs">Buka di Google Maps →</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700">WhatsApp</div>
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="text-muted hover:text-brand-700">+62 831-5207-5506</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700">Email</div>
                    <a href="mailto:halo@alkesbalikpapan.com" class="text-muted hover:text-brand-700">halo@alkesbalikpapan.com</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700">Jam Operasional</div>
                    <p class="text-muted">Senin–Jumat, 08:30–17:00</p>
                </div>
            </div>

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Nama*" value="{{ old('name') }}" class="w-full border rounded-lg px-3 py-2.5 text-sm">
                    @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="text" name="company" placeholder="Perusahaan (opsional)" value="{{ old('company') }}" class="w-full border rounded-lg px-3 py-2.5 text-sm">
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Telepon/WhatsApp*" value="{{ old('phone') }}" class="w-full border rounded-lg px-3 py-2.5 text-sm">
                    @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email (opsional)" value="{{ old('email') }}" class="w-full border rounded-lg px-3 py-2.5 text-sm">
                    @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <textarea name="message" rows="4" placeholder="Pesan*" class="w-full border rounded-lg px-3 py-2.5 text-sm">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-semibold px-6 py-2.5 rounded-full">Kirim Pesan</button>
            </form>
        </div>
    </section>
</x-layouts.public>
