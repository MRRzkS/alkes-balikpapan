<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public const CATEGORIES = [
        'medis' => 'Peralatan Medis & Rumah Sakit',
        'disposable' => 'Bahan Habis Pakai / Disposable',
        'diagnostik' => 'Peralatan Diagnostik Mandiri',
        'p3k_k3' => 'Perlengkapan P3K & K3 Industri',
    ];

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Product $product): void {
            if (empty($product->slug)) {
                $product->slug = \Illuminate\Support\Str::slug($product->name);
            }
        });
    }
}
