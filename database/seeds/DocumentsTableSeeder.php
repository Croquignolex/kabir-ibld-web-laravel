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
        $doc_types = ['doc', 'jpg', 'pdf', 'png', 'ppt', 'txt', 'xls', 'zip'];

        foreach ($doc_types as $doc_type)
        {
            Document::create([
                'extension' => $doc_type,
                'name' => Lorem::word(),
                'code' => Str::random(16),
                'file' => Str::random(16),
                'description' => Lorem::sentence(),
                'domain_id' => 1
            ]);
        }
    }
}
