<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'address'=>'shiraz'.$this->faker->numberBetween(1,10),
            'whatsapp'=>'whatsapp'.$this->faker->numberBetween(1,10),
            'telegram'=>'telegram'.$this->faker->numberBetween(1,10),
        ];
    }
}
