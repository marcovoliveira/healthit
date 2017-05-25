<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller;
use App\User;
use App\role;
use App\Proficiency;
use App\Appointment;

class ProficiencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $faker = Faker\Factory::create();
         $strings = array(
             'Infectology',
            'Cardiology',
            'Dermatology',
            'Gastroenterology',
            'Pediatric',
            'Neurosurgery',
            'Nuclear medicine',
            'Occupational medicine',
            'Pulmonology',
            'Urology',
            'Vascular surgery',
            'Immunology',
            'Obstetrics',
            'Gynecology',
            'Psychiatry'
            
                );


         foreach ($strings as $value) { 
        $proficiency = Proficiency::create([
            'name' => $value,
            ]);  
        
    }
    }
}
