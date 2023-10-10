<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomImages =[
            '/uploads/categoories/1.jpg',
            '/uploads/categoories/2.jpg',
            '/uploads/categoories/3.jpg',
            '/uploads/categoories/4.jpg',
            '/uploads/categoories/5.jpg',
       ];

        $name=$this->faker->words(2,true);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence(15),
            'logo_image'=>$randomImages[rand(0,4)],
            'cover_image'=>$randomImages[rand(0,4)],
        ];
    }
}
