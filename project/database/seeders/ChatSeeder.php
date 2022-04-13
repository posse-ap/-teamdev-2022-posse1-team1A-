<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->truncate();
        DB::table('chats')->insert([
            [
                'client_user_id' => 1,
                'respondent_user_id' => 4,
            ],
        ]);
        $chats = Chat::factory()
                ->count(40)
                ->create();
    }
}
