<?php

use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insts = [
            ['name'=>"Birth And Death"],
            ['name'=>"Passport Office"],
            ['name'=>"DVLA"],
            ['name'=>"Hospital"],
            ['name'=>"EC"],
            ['name'=>"SSNIT"],
        ];

        foreach ($insts as $inst){
            \App\Institution::create($inst);
        }
    }
}
