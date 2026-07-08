<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mebelid | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- css external -->
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/animation.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/container-responsive.css') }}" type="text/css" rel="stylesheet">
    <!-- css slick -->
    <link href="{{ asset('css/slick.css ') }}" type="text/css" rel="stylesheet">
    <!-- css fontawesome icon  -->
    <link href="{{ asset('icon/css/all.css ') }}" rel="stylesheet">
    <!-- Animation On Scroll (AOS) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- CSS Lightbox -->
    <link href="{{ asset('css/lightbox.min.css ') }}" type="text/css" rel="stylesheet">
</head>

<body>

    <header></header>


    @include('layouts.component2.navbar')

    @yield('konten')

    @if(View::hasSection('hideFooter'))
    @else
        @include('layouts.component2.footer')
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.slick_img').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: '<i class="bi bi-arrow-right h4 next px-2 py-1"></i>',
                prevArrow: '<i class="bi bi-arrow-left h4 prev px-2 py-1"></i>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>

    <!-- Animation On Scroll (AOS) -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- JS Lightbox -->
    <script src="{{ asset('js/lightbox-plus-jquery.min.js ') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('js/slick.min.js ') }}"></script>
</body>

</html>
