<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $harga = rand(1000,10000);
        $stok = rand(0,3);
        $id = rand(1,3);
        return [
            'judul'=> fake()->sentence(),
            'penulis'=> fake()->name(),
            'harga'=>$harga,
            'stok'=>$stok,
            'category_id'=>$id,
        ];
    }
}
