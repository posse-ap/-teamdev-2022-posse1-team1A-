<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Calling;
use App\Models\TicketStatus;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->truncate();
        $data = array();
        for ($i = 1; $i <= Calling::count(); $i++) {
            array_push($data, [
                'user_id' => Calling::find($i)->chat()->client_user_id,
                'ticket_status_id' => TicketStatus::getUsedId(),
                'calling_id' => $i,
            ]);
        }
        array_push($data, [
            'user_id' => 1,
            'ticket_status_id' => TicketStatus::getPendingId(),
            'calling_id' => null,
        ]);
        DB::table('tickets')->insert($data);
    }
}
