<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="BgNIPERZegT3azkv6tE-9XgKxVGq8AlrrR_pMbz0Gfo" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puri Municipality</title>

    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f4f4f4;
            border-bottom: 2px solid #ccc;
        }

        header img {
            height: 60px;
            object-fit: contain;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            header img {
                margin: 10px 0;
            }
        }

         .banner-slider {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
    }

    .banner-slider .slides {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .banner-slider .slides.active {
        opacity: 1;
    }

    .banner-slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .banner-slider {
            height: 180px;
        }
    }
    </style>
</head>

<body>

    <header>
        <img src="{{ asset('website/municipality/logo1.png') }}" alt="Logo 1">

        <img src="{{ asset('website/municipality/logo2.png') }}" alt="Logo 2">
    </header>

    <div class="banner-slider">
        <div class="slides active">
            <img src="{{ asset('website/municipality/banner1.jpeg') }}" alt="Banner 1">
        </div>
        <div class="slides">
            <img src="{{ asset('website/municipality/banner2.jpeg') }}" alt="Banner 2">
        </div>
        <!-- Add more slides if needed -->
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slides');

        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 4000); // change every 4 seconds
    </script>

</body>

</html>
