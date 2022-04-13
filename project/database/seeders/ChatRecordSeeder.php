<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ChatRecord;

class ChatRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_records')->truncate();
        DB::table('chat_records')->insert([
            [
                'chat_id' => 1,
                'user_id' => 1,
                'comment' => 'よろしくお願いします。'
            ],
            [
                'chat_id' => 1,
                'user_id' => 4,
                'comment' => 'こちらこそよろしくお願いします。'
            ],
        ]);
        $chats = ChatRecord::factory()
                ->count(200)
                ->create();
    }
}
