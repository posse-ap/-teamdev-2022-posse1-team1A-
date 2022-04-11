<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_statuses')->insert(
            [
                'name' => 'active'
            ],
            [
                'name' => 'stopped'
            ],
            [
                'name' => 'withdrawn'
            ],
        );
    }
}
