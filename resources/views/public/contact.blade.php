<x-layouts.public>
    <section class="max-w-3xl mx-auto px-4 py-16 reveal">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-2">Kontak</h1>
        <p class="text-ink-600 dark:text-ink-300 mb-8">Konsultasikan kebutuhan alat kesehatan Anda. Tim kami akan merespons via WhatsApp atau email.</p>

        @if (session('success'))
            <div class="bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-300 px-4 py-3 rounded-lg mb-6 text-sm border border-emerald-200 dark:border-emerald-500/20">{{ session('success') }}</div>
        @endif

        <div class="grid md:grid-cols-2 gap-8 mb-10">
            <div class="glass rounded-2xl p-6 space-y-4 text-sm">
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white">Alamat</div>
                    <p class="text-ink-600 dark:text-ink-300">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan</p>
                    <a href="{{ config('site.maps_link') }}" target="_blank" rel="noopener" class="text-brand-600 dark:text-brand-300 text-xs hover:underline">Buka di Google Maps →</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white">WhatsApp</div>
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="text-ink-600 dark:text-ink-300 hover:text-brand-700 dark:hover:text-white">+62 831-5207-5506</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white">Email</div>
                    <a href="mailto:halo@alkesbalikpapan.com" class="text-ink-600 dark:text-ink-300 hover:text-brand-700 dark:hover:text-white">halo@alkesbalikpapan.com</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white">Jam Operasional</div>
                    <p class="text-ink-600 dark:text-ink-300">Senin–Jumat, 08:30–17:00</p>
                </div>
            </div>

            <form method="POST" action="{{ route('contact.store') }}" class="glass rounded-2xl p-6 space-y-4 card-3d">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Nama*" value="{{ old('name') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-lg px-3 py-2.5 text-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/30 outline-none transition">
                    @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="text" name="company" placeholder="Perusahaan (opsional)" value="{{ old('company') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-lg px-3 py-2.5 text-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/30 outline-none transition">
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Telepon/WhatsApp*" value="{{ old('phone') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-lg px-3 py-2.5 text-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/30 outline-none transition">
                    @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email (opsional)" value="{{ old('email') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-lg px-3 py-2.5 text-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/30 outline-none transition">
                    @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <textarea name="message" rows="4" placeholder="Pesan*" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-lg px-3 py-2.5 text-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/30 outline-none transition">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-semibold px-6 py-2.5 rounded-full hover:-translate-y-0.5 transition-transform duration-200">Kirim Pesan</button>
            </form>
        </div>
    </section>
</x-layouts.public>
