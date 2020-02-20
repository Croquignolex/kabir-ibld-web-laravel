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
            'post_code' => '',
            'city' => 'Douala',
            'is_factored' => true,
            'is_confirmed' => true,
            'country' => 'Cameroon',
            'description' => 'Hello',
            'password' => 'Admin@10',
            'last_name' => 'NGOMBOL',
            'phone' => '(+237) 691503072',
            'address' => 'Douala Ndogbong',
            'first_name' => 'Alex Stéphane',
            'profession' => 'Junior web app developer',
            'email' => 'alexstephane.ngombol@fogadac.com',
        ]);

        Role::where('type', Role::ADMIN)->first()->users()->create([
            'last_name' => 'test',
            'is_factored' => true,
            'is_confirmed' => true,
            'password' => 'fogadac',
            'first_name' => 'administrateur',
            'city' => Str::title(Lorem::word()),
            'country' => Str::title(Lorem::word()),
            'email' => 'administrateur@fogadac.com',
            'phone' => str_shuffle('0123456789'),
            'post_code' => Str::title(Lorem::word()),
            'description' => ucfirst(Lorem::paragraph()),
            'address' => Str::title(Lorem::sentence(2)),
            'profession' => Str::title(Lorem::sentence(2)),
        ]);

        Role::where('type', Role::USER)->first()->users()->create([
            'is_factored' => true,
            'last_name' => 'test',
            'is_confirmed' => true,
            'password' => 'fogadac',
            'first_name' => 'utilisateur',
            'city' => Str::title(Lorem::word()),
            'email' => 'utilisateur@fogadac.com',
            'country' => Str::title(Lorem::word()),
            'phone' => str_shuffle('0123456789'),
            'post_code' => Str::title(Lorem::word()),
            'description' => ucfirst(Lorem::paragraph()),
            'address' => Str::title(Lorem::sentence(2)),
            'profession' => Str::title(Lorem::sentence(2)),
        ]);
    }
}
