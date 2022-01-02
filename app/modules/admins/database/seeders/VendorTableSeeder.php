<?php


use Admins\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' => 'Mohamed',
            'mobile' => '01100531939',
            'email' => 'mohaamed@gmail.com',
            'area_id' => 1,
            'password' => bcrypt(123456),

        ]);
    }
}
