<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(ServicesTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
         $this->call(DocumentsTableSeeder::class);
         $this->call(ContactsTableSeeder::class);
         $this->call(AnswersTableSeeder::class);
         $this->call(ContributorsTableSeeder::class);
    }
}
