<?php


use Admins\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Hesham',
            'mobile' => '01100531939',
            'email' => 'heshamashraf971@gmail.com',
            'password' => bcrypt(123456),

        ]);
    }
}
