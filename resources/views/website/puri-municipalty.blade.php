<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="BgNIPERZegT3azkv6tE-9XgKxVGq8AlrrR_pMbz0Gfo" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Puri Municipality</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

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

        .people-section {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 30px 20px;
            background-color: #f8f9fa;
            flex-wrap: wrap;
        }

        .person {
            text-align: center;
            max-width: 300px;
            margin: 20px;
        }

        .person img {
            width: 100%;
            height: auto;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .person h3 {
            margin-top: 15px;
            font-size: 1.1rem;
            color: #333;
        }

        .content-section {
            padding: 30px 20px;
            max-width: 900px;
            margin: auto;
        }

        .content-section h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #004085;
        }

        .content-section p {
            margin-bottom: 15px;
            color: #444;
        }
    </style>
</head>

<body>

    <header>
        <img src="{{ asset('website/municipality/logo1.png') }}" alt="Logo 1" />
        <img src="{{ asset('website/municipality/logo2.png') }}" alt="Logo 2" />
    </header>

    <div class="banner-slider">
        <div class="slides active">
            <img src="{{ asset('website/municipality/banner1.jpeg') }}" alt="Banner 1" />
        </div>
        <div class="slides">
            <img src="{{ asset('website/municipality/banner2.jpeg') }}" alt="Banner 2" />
        </div>
    </div>

    <section class="people-section">
        <div class="person">
            <img src="{{ asset('website/municipality/people.jpeg') }}" alt="Shri Siddharth Shankar Swain" />
            <h3>
                Shri Siddharth Shankar Swain, IAS<br />
                Administrator<br />
                Collector & District Magistrate, Puri
            </h3>
        </div>
        <div class="person">
            <img src="{{ asset('website/municipality/people1.png') }}" alt="Shri Abhimanyu Behera" />
            <h3>
                Shri Abhimanyu Behera, OAS (S)<br />
                Executive Officer<br />
                Puri Municipality
            </h3>
        </div>
    </section>

    <section class="content-section">
        <h2>PURI MUNICIPALITY</h2>
        <p>
            Puri Municipality was constituted on 01/04/1881 as per Bengal Municipal Act vide Notification dated 25.1.1881
            duly published in the Calcutta Gazette on 26/01/1881, comprising an area of 16.84 Sq. K.M.
        </p>

        <h2>PURI</h2>
        <p>
            Puri is a place of pilgrims and tourists. It is famous for Mahaprabhu Shri Jagannath and Golden Sea Beach. Out
            of four Dhams, Puri is considered to be the most sacred place. It is declared as Swachh Iconic City (SIC) by
            Government of Odisha. It attracts all the religious pilgrims as well as tourists of the country and abroad.
        </p>
    </section>

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
