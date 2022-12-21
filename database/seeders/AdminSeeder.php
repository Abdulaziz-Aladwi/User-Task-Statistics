<?php

namespace Database\Seeders;

use App\Constants\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{

    const MAX_NUMBER_OF_USERS = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array();

        for ($i = 0; $i < self::MAX_NUMBER_OF_USERS ; $i++) {
            $users []= [
                'name' => "admin {$i}",
                'email' => "admin{$i}@example.com",
                'password' => bcrypt('123456'),
                'type' => UserType::TYPE_ADMIN
            ];
        }

        User::insert($users);
    }
}
