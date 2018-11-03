<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= \App\User::create([
            'name'=>'sandesh chaudhari',
            'email'=>'sandeshchaudhari20@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>0,
        ]);

        \App\Profile::create([
           'user_id'=>$user->id,
            'avatar'=>'524.JPG',
            'about'=>"Write something about you",
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',
        ]);
    }
}
