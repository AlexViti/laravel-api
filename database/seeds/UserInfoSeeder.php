<?php

use Illuminate\Database\Seeder;
use App\UserInfo;
use App\User;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            factory(UserInfo::class)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
