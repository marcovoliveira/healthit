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
        $random = str_random(10);

        DB::table('users')->insert([
            'name' => $random,
            'seg_social' => rand(0, 99999999),
            'especialidade' => 'Pediatric',
            'hora_in' => '09:00',
            'hora_out' => '15:00',
            'email' => $random.'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

/*        DB::table('users')->insert([
            'name' => $random,
            'seg_social' => rand(0, 99999999),
            'email' => $random.'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/
    }
}
