<?php

use App\Models\Contributor;
use Illuminate\Database\Seeder;

class ContributorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contributor::create([
            'email' => 'intervenant@fogadac.com',
            'name' => 'Intervenant test',
            'address' => 'Addresse test',
            'phone' => '666666666',
            'description' => 'Juste un intervenant de test à supprimer à tout moment',
            'domain_id' => 1
        ]);
    }
}
