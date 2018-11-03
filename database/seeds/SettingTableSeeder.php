<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>"Laravel's Blog",
            'contact_email'=>'sandeshchaudharii20@gmail.com',
            'contact_number'=>'8976196634',
            'address'=>'vasind Tal-shahaput,dis-thane',
        ]);
    }
}
