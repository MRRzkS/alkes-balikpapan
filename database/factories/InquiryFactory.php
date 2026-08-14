<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    protected $model = Inquiry::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'company' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'message' => fake()->sentence(),
            'is_read' => false,
        ];
    }
}
