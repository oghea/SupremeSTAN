<?php

use Illuminate\Database\Seeder;
use SupremeSTAN\UserProfile;
use SupremeSTAN\User;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=SupremeSTAN\User::find(1);
        $profile = new UserProfile();
        $profile->user()->associate($user);
        $profile->save();
    }
}
