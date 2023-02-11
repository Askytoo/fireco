<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => '瑞穂市消防団',
            'prefecture_id' => 21,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
