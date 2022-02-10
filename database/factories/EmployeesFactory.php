<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = \App\Models\Companies::inRandomOrder()->first();
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'company_id' => $company->id,
        ];
    }
}
