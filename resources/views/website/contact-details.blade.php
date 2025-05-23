<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">

</head>

<body>
    @include('partials.header-puri-dham')

    @php
        $language = session('app_language', 'English');
    @endphp

    <!-- Hero Section -->
    <section class="hero">
        <img class="hero-bg" src="{{ asset('website/fest.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                Contact and Support
            </h1>

        </div>
    </section>

    <section class="bg-gray-100 py-12 px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Get in Touch</h2>
            <p class="mb-10 text-gray-600">We're here to help and answer any question you might have. We look forward to
                hearing from you!</p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <div class="flex items-center gap-4 bg-white shadow-md p-6 rounded-lg w-full sm:w-auto">
                    <i class="fas fa-phone-alt text-xl text-blue-600"></i>
                    <div class="text-left">
                        <p class="text-gray-700 font-semibold">Call Us</p>
                        <p class="text-gray-600">+91 70087 10275</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 bg-white shadow-md p-6 rounded-lg w-full sm:w-auto">
                    <i class="fas fa-envelope text-xl text-red-600"></i>
                    <div class="text-left">
                        <p class="text-gray-700 font-semibold">Email Us</p>
                        <p class="text-gray-600">contact@shreejagannathadham.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.website-footer')

</body>

</html>
