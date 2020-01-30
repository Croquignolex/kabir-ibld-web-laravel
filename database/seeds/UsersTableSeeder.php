<?php

use App\Models\Role;
use Faker\Provider\Lorem;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::where('type', Role::SUPER_ADMIN)->first()->users()->create([
            'password' => 'Admin@10',
            'is_confirmed' => true,
            'is_factored' => true,
            'city' => 'Douala',
            'country' => 'Cameroon',
            'phone' => '(+237) 691503072',
            'last_name' => 'NGOMBOL',
            'post_code' => '',
            'first_name' => 'Alex Stéphane',
            'description' => 'Hello',
            'address' => 'Douala Ndogbong',
            'profession' => 'Junior web app developer',
            'email' => 'alexstephane.ngombol@wallex.com',
        ]);

        Role::where('type', Role::ADMIN)->first()->users()->create([
            'password' => 'wallex',
            'is_confirmed' => true,
            'is_factored' => true,
            'city' => Str::title(Lorem::word()),
            'country' => Str::title(Lorem::word()),
            'phone' => str_shuffle('0123456789'),
            'last_name' => 'Administrator',
            'post_code' => Str::title(Lorem::word()),
            'first_name' => 'TEST',
            'description' => ucfirst(Lorem::paragraph()),
            'address' => Str::title(Lorem::sentence(2)),
            'profession' => Str::title(Lorem::sentence(2)),
            'email' => 'admin.test@wallex.com',
        ]);

        Role::where('type', Role::USER)->first()->users()->create([
            'password' => 'wallex',
            'is_confirmed' => true,
            'is_factored' => true,
            'city' => Str::title(Lorem::word()),
            'country' => Str::title(Lorem::word()),
            'phone' => str_shuffle('0123456789'),
            'last_name' => 'User',
            'post_code' => Str::title(Lorem::word()),
            'first_name' => 'TEST',
            'description' => ucfirst(Lorem::paragraph()),
            'address' => Str::title(Lorem::sentence(2)),
            'profession' => Str::title(Lorem::sentence(2)),
            'email' => 'user.test@wallex.com',
        ]);
    }
}
