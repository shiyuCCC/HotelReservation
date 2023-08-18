<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="hotel, luxury hotel, best hotel, book hotel, Wander Hotel">
    <meta name="description" content="Wander Hotel is a luxurious hotel offering the best accommodations. Book now for the best deals.">

    <title>Wander Hotel</title>
    <!-- facebook & instagram-->
    <meta property="og:title" content="Wander Hotel" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.wanderhotel.com/" />
    <meta property="og:image" content="../public/img/background.jpg" />
    <meta property="og:description" content="Wander Hotel is a luxurious hotel offering the best accommodations. Book now for the best deals." />

    <!-- google snippet -->
    <meta itemprop="name" content="Wander Hotel">
    <meta itemprop="description" content="Wander Hotel is a luxurious hotel offering the best accommodations. Book now for the best deals.">
    <meta itemprop="image" content="../public/img/background.jpg">
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icons-->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Customized CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('../public/css/style.css') }}"> -->


    <!-- CSS -->
    <style>
        h1 {
            color: white;
            font-size: 100px;
        }

        h2 {
            color: burlywood;
            font-size: 50px;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
        }

        .datepicker-toggle {
            display: inline-block;
            position: relative;
            width: 18px;
            height: 19px;
        }

        .datepicker-toggle-button {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml;base64,...");
        }

        .bg-image {
            width: 100%;
            background: url(https://i.ytimg.com/vi/KRbbDCLgs5U/maxresdefault.jpg);
            /* background: url("../img/background.jpg"); */
            background-position: center;
            background-size: cover;
        }

        .labelfont {
            color: aliceblue;
        }

        .titlebox {
            width: 100%;
            height: 100px;
            background-color: beige;
        }

        .card-horiz {
            flex-direction: row;
            align-items: start;
        }

        .card-horiz img {
            width: 50%;
        }
    </style>
</head>

<body>
    <!-- Start your project here-->
    @include('layouts.navbar')

    @yield('content')
    @yield('scripts')

    @include('layouts.footer')


    <!-- End your project here-->

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>