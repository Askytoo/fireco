<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'name' => fake()->jobTitle(),
            'area_id' => DB::table('areas')
                ->where('name', '瑞穂市消防団')
                ->value('id'),
            'open_at' => Carbon::now()->addDay(self::$sequence),
            'close_at' => Carbon::now()->addDay(self::$sequence)->addHour(2),
            'place' => '第' . self::$sequence . '会議室',
            'target' => '全消防団員',
            'detail' => '詳細情報....',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
