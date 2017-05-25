<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProficiencyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
        
    }
 
}
