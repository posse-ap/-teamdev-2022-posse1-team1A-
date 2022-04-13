<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CallingEvaluation;


class CallingEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calling_evaluations')->truncate();
        DB::table('calling_evaluations')->insert([
            [
                'calling_id' => 1,
                'user_id' => 1,
                'is_satisfied' => true,
                'comment' => 'ありがとうございました。'
            ],
            [
                'calling_id' => 1,
                'user_id' => 4,
                'is_satisfied' => false,
                'comment' => '面白い人材だった。'
            ],
        ]);
        $calling_evaluation = CallingEvaluation::factory()
                ->count(10)
                ->create();
    }
}
