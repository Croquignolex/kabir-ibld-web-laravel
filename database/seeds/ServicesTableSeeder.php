<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Partenariat',
            'icon' => 'mdi mdi-account-multiple-plus-outline',
            'description' => 'Ojectif de Developpement Durable - Partenariats pour la realisation des objectifs ',
        ]);

        Service::create([
            'name' => 'Cloud',
            'icon' => 'mdi mdi-amazon-drive',
            'description' => 'Vous accompagne dans la sécurisation de votre patrimoine informationnel et le maintien en sécurité de votre système d\'information',
        ]);

        Service::create([
            'name' => 'Archivage',
            'icon' => 'mdi mdi-archive',
            'description' => 'Gestion, le classement et la conservation des documents qui constituent toutes documentations',
        ]);
    }
}
