<x-layouts.public>
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        <h1 class="text-4xl font-bold text-brand-700 dark:text-white mb-2">Kontak</h1>
        <p class="text-ink-600 dark:text-ink-300 mb-10">Konsultasikan kebutuhan alat kesehatan Anda. Tim kami akan merespons via WhatsApp atau email.</p>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-5 py-4 mb-8 text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            <div class="glass rounded-[1.25rem] p-7 space-y-5 text-sm h-fit">
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Alamat
                    </div>
                    <p class="text-ink-600 dark:text-ink-300 mt-1">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan</p>
                    <a href="{{ config('site.maps_link') }}" target="_blank" rel="noopener" class="text-brand-600 dark:text-brand-300 text-xs hover:underline mt-1 inline-block">Buka di Google Maps →</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg>
                        WhatsApp
                    </div>
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="text-ink-600 dark:text-ink-300 hover:text-brand-600 dark:hover:text-white transition">+62 831-5207-5506</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Email
                    </div>
                    <a href="mailto:halo@alkesbalikpapan.com" class="text-ink-600 dark:text-ink-300 hover:text-brand-600 dark:hover:text-white transition">halo@alkesbalikpapan.com</a>
                </div>
                <div>
                    <div class="font-semibold text-brand-700 dark:text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Jam Operasional
                    </div>
                    <p class="text-ink-600 dark:text-ink-300 mt-1">Senin–Jumat, 08:30–17:00</p>
                </div>
            </div>

            <form method="POST" action="{{ route('contact.store') }}" class="glass rounded-[1.25rem] p-7 space-y-4 card-3d">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Nama*" value="{{ old('name') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-3 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                    @error('name') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="text" name="company" placeholder="Perusahaan (opsional)" value="{{ old('company') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-3 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Telepon/WhatsApp*" value="{{ old('phone') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-3 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                    @error('phone') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email (opsional)" value="{{ old('email') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-3 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                    @error('email') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <textarea name="message" rows="4" placeholder="Pesan*" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-3 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="press w-full bg-brand-600 hover:bg-brand-500 text-white font-semibold px-6 py-3 rounded-xl shadow-lg shadow-brand-600/30 hover:-translate-y-0.5 transition-transform duration-200">Kirim Pesan</button>
            </form>
        </div>
    </section>
</x-layouts.public>
