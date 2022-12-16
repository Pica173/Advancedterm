<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '東京', 
        ];
        Area::create($param);
        $param = [
            'name' => '大阪', 
        ];
        Area::create($param);
        $param = [
            'name' => '福岡', 
        ];
        Area::create($param);
    }
}
