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
        $param = [
          'name' => 'イワナ',
          'created_at' => '0000-00-00 00:00:00',
        ];
        DB::table('categories')->insert($param);
        $param = [
          'name' => 'メンズリゼ',
          'created_at' => '0000-00-00 00:00:00',
        ];
        DB::table('categories')->insert($param);
        $param = [
          'name' => 'アスパラ',
          'created_at' => '0000-00-00 00:00:00',
        ];
        DB::table('categories')->insert($param);
        $param = [
          'name' => 'Twice',
          'created_at' => '0000-00-00 00:00:00',
        ];
        DB::table('categories')->insert($param);
    }
}
