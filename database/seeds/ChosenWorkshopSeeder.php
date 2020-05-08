<?php

use App\User;
use Illuminate\Database\Seeder;

class ChosenWorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin_cosmepick',
            'email' => 'admin@cosmepick.com',
            'phone' => '08123456789',
            'website' => 'www.cosmpic.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 1,
            'profile_pic_url' => 'profile_photo.png'
            
        ]);

        User::create([
            'name' => 'member_cosmepick',
            'email' => 'member@cosmepick.com',
            'phone' => '08123456789',
            'website' => 'www.cosmepick.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'profile_pic_url' => 'profile_photo.png'
             // password
        ]);

        factory(App\ChosenWorkshop::class, 25)->create();
    }
}
