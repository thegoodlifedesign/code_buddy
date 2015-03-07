<?php

use Illuminate\Support\Facades\Hash;

class UserTableSeeder  extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \ThreeAccents\Users\Entities\User::unguard();

        \ThreeAccents\Users\Entities\User::create([
            'name' => 'rodrigo',
            'username' => 'rodzzlessa',
            'slug' => 'rodzzlessa',
            'email' => 'rodrigo@tgld.co',
            'password' => Hash::make('ro'),
            'is_admin' => 1
        ]);

    }
}