<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda tiba-tiba merasa lelah?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa cemas?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa cemas sampai tidak bisa menenangkan diri sendiri meskipun ada bantuan?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa putus asa?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa gelisah atau tidak tenang?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa sangat gelisah sampai Anda tidak bisa tidur dengan tenang?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa depresi/sedih yang mendalam?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa sulit melakukan sesuatu yang biasanya mudah dilakukan?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa sangat sedih sampai tidak ada yang dapat membuat kamu terhibur?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa tidak berharga?'],
            ['question' => 'Dalam 4 minggu terakhir, seberapa sering Anda merasa tidak mampu menangani masalahmu sendiri?'],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
