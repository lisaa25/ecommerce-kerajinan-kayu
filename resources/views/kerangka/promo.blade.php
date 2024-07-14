<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SLIDER</title>
    <!-- EXTERNAL LINKS -->
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <style>
        #containerSlider {
            margin: auto;
            width: 100%;
            text-align: center;
            padding: 100px 40px 40px 40px;
            box-sizing: border-box;
            background-color: #DAD3BE;
        }

        #containerSlider img {
            width: 80%;
            height: 90%;
            margin: auto;
            /* text-align: center;
        align-content: center;*/
            padding-top: 30px;
            background-color: #DAD3BE;
        }

        @media (max-width: 732px) {
            #containerSlider img {
                height: 12em;
            }
        }

        @media (max-width: 500px) {
            #containerSlider img {
                height: 10em;
            }
        }
    </style>
</head>

<body>
    @extends('layout.master')

    @section('about')
        <section>
            <div id="containerSlider">
                <div id="slidingImage"><img src="{{ asset('img/slider6.png') }}"></div>
                <div id="slidingImage"><img src="{{ asset('img/slider6.png') }}"></div>
                <div id="slidingImage"><img src="{{ asset('img/slider6.png') }}"></div>
                <div id="slidingImage"><img src="{{ asset('img/slider6.png') }}"></div>
            </div>
        </section>
        @endsection
    </body>

    <!-- <script src=“https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js”></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#containerSlider").slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });
    </script>

    </html>
