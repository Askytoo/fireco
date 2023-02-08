<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
        '団長',
        '副団長',
        '分団長',
        '副分団長',
        '部長',
        '班長',
        '団員',
        '本部員',
        ];

        foreach ($positions as $position) {
            DB::table('positions')->insert([
                'name' => $position,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
