<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\AccountStatus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => '新島 駿',
                'nickname' => 'ユーザー',
                'icon' => 'img/user-icon.jpeg',
                'email' => 'user@com',
                'telephone_number' => '09024330755',
                'company' => 'テレビ東京',
                'department' => '営業部',
                'length_of_service' => '1年未満',
                'is_search_target' => true,
                'reason' => '',
                'account_status_id' => AccountStatus::getActiveId(),
                'role_id' => Role::getUserId(),
                'password' => Hash::make('password'),
                'peer_id' => Str::random(16),
            ],
            [
                'name' => '遠竹 悠',
                'nickname' => '管理者',
                'icon' => 'img/user-icon.jpeg',
                'email' => 'admin@com',
                'telephone_number' => '0120444444',
                'company' => 'リクルート',
                'department' => '開発部',
                'length_of_service' => '5年',
                'is_search_target' => true,
                'reason' => '',
                'account_status_id' => AccountStatus::getActiveId(),
                'role_id' => Role::getAdminId(),
                'password' => Hash::make('password'),
                'peer_id' => Str::random(16),
            ],
            [
                'name' => 'Anovey Bot',
                'nickname' => 'Anovey Bot',
                'icon' => 'img/anovey-bot-logo.png',
                'email' => 'bot@com',
                'telephone_number' => '0120555555',
                'company' => 'ボット',
                'department' => '営業部',
                'length_of_service' => '1年未満',
                'is_search_target' => false,
                'reason' => '',
                'account_status_id' => AccountStatus::getActiveId(),
                'role_id' => Role::getBotId(),
                'password' => Hash::make('password'),
                'peer_id' => Str::random(16),
            ],
            [
                'name' => '山田 太郎(退会ユーザーダミー)',
                'nickname' => '退会ユーザーダミー',
                'icon' => 'img/user-icon.jpeg',
                'email' => 'user2@com',
                'telephone_number' => '07040797809',
                'company' => 'テレビ東京',
                'department' => '営業部',
                'length_of_service' => '1年未満',
                'is_search_target' => false,
                'reason' => '転職が成功したため',
                'account_status_id' => AccountStatus::getWithdrawnId(),
                'role_id' => Role::getUserId(),
                'password' => Hash::make('password'),
                'peer_id' => Str::random(16),
            ],
        ]);
        $users = User::factory()
            ->count(40)
            ->state(new Sequence(
                ['is_search_target' => true],
                ['is_search_target' => false],
            ))
            ->state(new Sequence(
                ['department' => '経理部'],
                ['department' => '営業部'],
                ['department' => '総務部'],
                ['department' => '法務部'],
                ['department' => '人事部'],
                ['department' => '開発部'],
                ['department' => '広報部'],
            ))
            ->state(new Sequence(
                ['length_of_service' => '1年未満'],
                ['length_of_service' => '2年'],
                ['length_of_service' => '5年'],
                ['length_of_service' => '7年'],
                ['length_of_service' => '8年'],
                ['length_of_service' => '10年以上'],
            ))
            ->create();
    }
}
