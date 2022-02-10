<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illumitate\Http\UploadedFile;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
 */
class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' =>  $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->image(storage_path('app/public'), 100, 100, 'business', false),
            'website' => $this->faker->url,
        ];
    }
}
