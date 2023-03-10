<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class patients_details extends Seeder
{
    //random date
    public function random_date(){
        $timestamp = rand(strtotime('Jan 01 1980'),strtotime('Jan 01 1990'));
        $random_date = date('d.m.Y',$timestamp);
        return $random_date;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 20 random patients
        for($i=0; $i<20;$i++) {
        DB::table('patients')->insert([
            'name' => Str::random(10),
            'dateofbirth' => $this->random_date(),
            'gender' => 'male',
            'email' => Str::random(10).'@gmail.com',
        ]);
        }
    }
}
