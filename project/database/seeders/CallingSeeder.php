<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Calling;

class CallingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('callings')->truncate();
        DB::table('callings')->insert([
            [
                'chat_id' => 1,
                'calling_time' => 4000,
                'is_finished' => true,
            ],
        ]);
        $calling = Calling::factory()
            ->count(30)
            ->create();
    }
}
