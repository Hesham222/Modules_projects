<?php


use Admins\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areasRecords = [
            ['id'=>1 , 'name' => 'New Egypt'],
            ['id'=>2 , 'name' => 'Giza'],
            ['id'=>3 , 'name' => 'Helwan'],
            ['id'=>4 , 'name' => 'Ain shams'],
        ];

        Area::insert($areasRecords);
    }
}
