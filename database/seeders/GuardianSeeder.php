<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=0;$i<10;$i++){
        DB::table('guardians')->insert([
        'guardian_id' => 'GP'.Str::random(10),
        'last_name' => Str::random(10),
        'name' => Str::random(10),
        'address' => Str::random(10),
        'email' => Str::random(10).'@gmail.com',
        'gender' => 1,
        'contact_no' => Str::random(10),
        'sid' => Str::random(10),
        'nid' => Str::random(10),
      ]);
      }
    }
}
