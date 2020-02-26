<?php

use App\Models\Document;
use Faker\Provider\Lorem;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'extension' => 'pdf',
            'name' => 'Document de test',
            'code' => 'FGD2020KZOP546H',
            'file' => 'fQ0rLkQVMm86pqAyQVytyLghmgGxZVqRSubymU6o',
            'description' => 'Juste un document de test à supprimer à tout moment',
            'domain_id' => 1
        ]);
    }
}
