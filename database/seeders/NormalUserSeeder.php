<?php

namespace Database\Seeders;

use App\Constants\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NormalUserSeeder extends Seeder
{
    const MAX_NUMBER_OF_USERS = 10000;
    const BATCH_SIZE = 500;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array();
        $this->command->getOutput()->progressStart(self::MAX_NUMBER_OF_USERS);

        for ($i = 0; $i < self::MAX_NUMBER_OF_USERS; $i++) {
            $users[] = [
                'name' => "user {$i}",
                'email' => "user{$i}@example.com",
                'password' => bcrypt('123456'),
                'type' => UserType::TYPE_NORMAL
            ];

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();

        $chunks = array_chunk($users, self::BATCH_SIZE);

        foreach ($chunks as $key => $chunk) {
            User::insert($chunk);
            $this->command->info("Batch {$key} Inserted");
        }
    }
}
