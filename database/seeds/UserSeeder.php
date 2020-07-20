<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where("email", "GlennRudge@Outlook.com")->first();

        if (!$user) {
            User::create([
                "name" => "Glenn Rudge",
                "role" => "admin",
                "email" => "GlennRudge@Outlook.com",
                "password" => Hash::make("password")
            ]);
        }
    }
}
