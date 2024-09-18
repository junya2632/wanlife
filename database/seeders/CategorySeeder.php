<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'id' => '1',
            'name' => 'カテゴリーを選択',
        ];
        DB::table('categories')->insert($param);

        
        $param = [
            'id' => '2',
            'name' => '旅館',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '3',
            'name' => '飲食店',
        ];
        DB::table('categories')->insert($param);


        $param = [
            'id' => '4',
            'name' => '公園',
        ];
        DB::table('categories')->insert($param);
        
        
        $param = [
            'id' => '5',
            'name' => 'レジャー施設',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'id' => '6',
            'name' => 'その他',
        ];
        DB::table('categories')->insert($param);

    }
}
