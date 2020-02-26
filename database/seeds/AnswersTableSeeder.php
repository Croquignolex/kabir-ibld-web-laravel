<?php

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
            'message' => 'Juste une reponse de test à supprimer à tout moment',
            'contact_id' => 1,
        ]);
    }
}
