<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Test Kesehatan Mental Online - Ibunda.com</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="my-10 mx-auto" style="max-width: 480px">
        <br>
        <h4>Kamu sudah berhasil mengisi Test Kesehatan Online by Ibunda.id - Konseling Dengan Psikolog. Hasilnya menunjukan...</h4>
        <br>
        <div>
            <h5 class="">{{ $result->title }}</h5>
            <br>
            <p>{{ $result->result }}</p>
        </div>
    </div>
</body>
</html>