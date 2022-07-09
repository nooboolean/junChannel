<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'identify_key' => 'notGuest',
        'created_at' => '0000-00-00 00:00:00',
      ];
      DB::table('guests')->insert($param);
    }
}
