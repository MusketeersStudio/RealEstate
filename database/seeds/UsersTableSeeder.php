<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'role' => 'SYSTEM',
            'sub_role' => null,
            'authority' => 0,
            'status' => 0,

            'full_name' => 'NostaLabs_Real_Estate_Management_System',
            'email' => 'nostalabsrealestate@gmail.com',
            'password' => bcrypt('secret'), //TODO: SYSTEM should have strong password and no access to it?
            'tel' => null, //TODO: Tel for SYSTEM
            'alt_tel' => null,
            'national_id' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
