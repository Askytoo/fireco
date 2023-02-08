<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    private static int $sequence = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        self::$sequence++;
        return [
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => '第' . self::$sequence . '分団',
            'area_id' => DB::table('areas')
                ->where('name', '瑞穂市消防団')
                ->value('id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
