<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Testeur',
            'email' => 'test@fogadac.com',
            'subject' => 'Message de test',
            'message' => 'Juste un message de test à supprimer à tout moment',
            'domain_id' => 1,
        ]);

        Contact::create([
            'name' => 'Testeur 2',
            'email' => 'test2@fogadac.com',
            'subject' => 'Message de test 2',
            'message' => 'Juste un autre message de test à supprimer à tout moment',
        ]);
    }
}
