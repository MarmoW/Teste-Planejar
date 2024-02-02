<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hours>
 */
class HoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inTimestamp = $faker->dateTimeBetween('-1 year', 'now');
        $outTimestamp = $faker->dateTimeBetween($inTimestamp, 'now');

    return [
        'in' => $inTimestamp,
        'out' => $outTimestamp,
        'total' => 0,
        ];
    }
}
