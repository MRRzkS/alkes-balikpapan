<?php

return [
    // Brand & entity
    'name'    => 'Alkes Balikpapan',
    'company' => 'Wahana Surya',
    'tagline' => 'Solusi Pengadaan Alat Kesehatan Terpercaya di Kalimantan Timur',

    // Contact
    'address'      => 'Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan',
    'whatsapp'     => '6283152075506', // no "+", international format without leading zero
    'email'        => 'halo@alkesbalikpapan.com',
    'hours'        => 'Senin–Jumat, 08:30–17:00',
    'admin_email'  => 'halo@alkesbalikpapan.com', // receives inquiry notifications

    // Pre-built WhatsApp link with prefilled message
    'wa_link' => 'https://wa.me/6283152075506?text=' . urlencode('Halo Alkes Balikpapan, saya ingin konsultasi pengadaan alat kesehatan'),

    // Google Maps search link
    'maps_link' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode('Palm Hills City Puri Alamanda Sepinggan Balikpapan'),

    // Social hashtags
    'hashtags' => '#DistributorAlkesBalikpapan #AlkesKaltim #SupplierAlkes #PengadaanAlkes #TokoAlkesBalikpapan #AlkesMurahBalikpapan #KesehatanBalikpapan',

    // Placeholder images (Unsplash, medical-themed). Replace with real brand assets before launch.
    'placeholders' => [
        'hero'    => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=900&q=70',
        'about'   => 'https://images.unsplash.com/photo-1666214280391-8ff5bd3c0bf0?auto=format&fit=crop&w=800&q=70',
        'product' => 'https://images.unsplash.com/photo-1583947581924-860bda6a26df?auto=format&fit=crop&w=600&q=70',
        'post'    => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=600&q=70',
    ],
];
