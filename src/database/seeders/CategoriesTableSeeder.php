<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $param = [
        //   'name' => '野球',
        //   'created_at' => '0000-00-00 00:00:00',
        // ];
        // DB::table('categories')->insert($param);
        // $param = [
        //   'name' => 'サッカー',
        //   'created_at' => '0000-00-00 00:00:00',
        // ];
        // DB::table('categories')->insert($param);
        // $param = [
        //   'name' => 'バスケットボール',
        //   'created_at' => '0000-00-00 00:00:00',
        // ];
        // DB::table('categories')->insert($param);
        $param = [
          'name' => 'NCT127',
          'created_at' => '0000-00-00 00:00:00',
        ];
        DB::table('categories')->insert($param);
    }
}
