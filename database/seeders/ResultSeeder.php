<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $results = [
            [
                'title' => 'Yay, Kamu Baik-baik Saja!',
                'result' => 'Berdasarkan hasil screening kesehatan mental, saat ini kondisimu tergolong stabil. Jaga terus kesehatan mental kamu ya. Untuk mempertahankan kondisi tersebut, kamu bisa baca artikel dan tips bunda di <a href="https://www.ibunda.id">https://www.ibunda.id</a>.',
                'image' => '/img/normal.png',
                'download_image' => '/result-image/result-normal.jpg'
            ],
            [
                'title' => 'Oh, Kamu Membutuhkan Sedikit Bantuan!',
                'result' => 'Berdasarkan hasil screening kesehatan mental, saat ini kondisimu tergolong kurang stabil. Kamu mungkin membutuhkan sedikit bantuan untuk melewati situasi ini. Coba ingat-ingat lagi, adakah hal yang membuat kamu merasa kurang nyaman atau mengganggumu dalam beberapa hari belakangan ini? Jangan ragu untuk bercerita mengenai hal tersebut pada teman, keluarga, atau orang yang kamu percaya ya. Kamu juga bisa cerita ke Bunda lewat LINE <a href="http://bit.ly/ibundaLINE">http://bit.ly/ibundaLINE</a>. Selalu ingat, kamu tidak sendirian.',
                'image' => '/img/warning.png',
                'download_image' => '/result-image/result-warning.jpg'
            ],
            [
                'title' => 'Yuk Pertimbangkan Untuk Mencari Bantuan Profesional',
                'result' => 'Berdasarkan hasil screening kesehatan mental, menunjukkan adanya gejala permasalahan psikologis yang menggumu saat ini. Bunda sangat menyarankan kamu untuk menemui psikolog atau psikiater terdekat di kotamu. Apalagi jika apa yang kamu rasakan sudah mengganggu produktivitas dan keseharian kamu. Namun tidak perlu khawatir, selama kamu niat dan berkomitmen untuk mendapatkan pertolongan dari profesional maka bisa merubah kondisimu. Buat kamu yang berdomisili di Jakarta, Bandung, dan Surabaya, kamu bisa membuat jadwal untuk konseling tatap muka dengan psikolog Ibunda di layanan Counseling Corner. Jika kamu kesulitan untuk mengakses psikolog atau psikiater terdekat, kamu juga bisa melakukan konseling melalui telepon atau chat dengan psikolog di E-Counseling Ibunda. Intinya, jangan ragu untuk mencari bantuan ya!.',
                'image' => '/img/danger.png',
                'download_image' => '/result-image/result-danger.jpg'
            ],
        ];

        Result::truncate();
        
        foreach ($results as $result) {
            Result::create($result);
        }
    }
}
