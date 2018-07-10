<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'エンジニア向け'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => '投資家向け'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => 'ビットコイン'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => 'リップル'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => 'イーサリアム'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => 'NEM'
      ];
      DB::table('tags')->insert($param);

        $param = [
          'name' => 'LISK'
      ];
      DB::table('tags')->insert($param);

    }
}
