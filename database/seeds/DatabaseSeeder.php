<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert([
            'name' => 'client',
        ]);
        DB::table('roles')->insert([
            'name' => 'manager',
        ]);
          DB::table('users')->insert([
            'name' => 'vera',
            'email' => 'vera@gmail.com',
            'password' => bcrypt('123456'),
            'role_id'=>'2',
        ]);

    }
}
