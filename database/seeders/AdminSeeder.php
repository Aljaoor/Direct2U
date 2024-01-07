<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Translatable\HasTranslations;



class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@direct2U.com',
            'mobile' => '+963932174371',
            'password' => bcrypt(123456),

        ]);

        $role = Role::whereName('Admin')->first();
        $admin->assignRole([$role->id]);


        $user = User::create([
            'name' => 'delivery',
            'email' => 'delivery@direct2U.com',
            'mobile' => '0932174371',
            'password' => bcrypt(123456),
        ]);


        $role = Role::whereName('Delivery')->first();
        $user->assignRole([$role->id]);

//        restaurant account
        $user = User::create([
            'name' => 'samer',
            'email' => 'restaurant@gmail.com',
            'mobile' => '0932174371',
            'password' => bcrypt(123456),

        ]);

        $role = Role::whereName('Restaurant')->first();
        $user->assignRole([$role->id]);

        $restaurant = new Restaurant();
// Set the non-translatable attributes
        $restaurant->user_id = $user->id;
        $restaurant->name = 'samer';
        $restaurant->city = 'homs';
        $restaurant->open_time = '8:00';
        $restaurant->close_time = '20:00';
        $restaurant->image = '/images/07-06-2023/1686158558.jpg';
        $restaurant->translateOrNew('en')->title = 'English title';
        $restaurant->translateOrNew('ar')->title = 'Arabic title';
        $restaurant->translateOrNew('en')->description = 'English description';
        $restaurant->translateOrNew('ar')->description = 'Arabic description';
        $restaurant->save();



        $user = User::create([
            'name' => 'mohammed',
            'email' => 'mohammed@gmail.com',
            'mobile' => '0932174371',
            'password' => bcrypt(123456),

        ]);

        $role = Role::whereName('User')->first();
        $user->assignRole([$role->id]);


    }
}
