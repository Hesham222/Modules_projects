<?php


use Illuminate\Database\Seeder;
use Users\Models\Buyer;

class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buyer::create([
            'name' => 'Hesham',
            'mobile' => '01100531939',
            'email' => 'heshamashraf971@gmail.com',
            'password' => bcrypt(123456),

        ]);
    }
}
