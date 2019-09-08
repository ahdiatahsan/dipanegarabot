<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'user_id' => 1,
            'name' => 1,
        ]);

        DB::table('roles')->insert([
            'user_id' => 2,
            'name' => 2,
        ]);

        DB::table('roles')->insert([
            'user_id' => 2,
            'name' => 3,
        ]);
    }
}
