<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Donation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
</head>

<body>
    @include('partials.header-puri-dham')

    <!-- Hero Banner -->
    @php
        $language = session('app_language', 'English');
    @endphp

    <section class="hero">
        <img class="hero-bg" src="{{ asset('website/fest.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                {{ $language === 'Odia' ? 'ଦାନ କରନ୍ତୁ' : 'Online Donation' }}
            </h1>
        </div>
    </section>

    <!-- Donation Confirmation Section -->
    <section class="py-12 px-4 md:px-0 bg-red-50">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-8 text-center">
            <h2 class="text-xl font-bold mb-4 text-red-600">
                {{ $language === 'Odia' ? 'ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ!' : 'Important!' }}
            </h2>

            <p class="text-gray-700 mb-6">
                {{ $language === 'Odia'
                    ? 'ଆପଣ ଶ୍ରୀମନ୍ଦିରର ଆଧିକାରିକ ଦାନ ପ୍ଲାଟଫର୍ମକୁ ଯାଉଛନ୍ତି।'
                    : 'You are navigating to Shree Mandira official Donation Platform.' }}
            </p>

            <div class="flex justify-center gap-5">
                <a href="https://www.shreejagannatha.in/donation/" target="_blank"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                    {{ $language === 'Odia' ? 'ନିଶ୍ଚିତ କରନ୍ତୁ' : 'Confirm' }}
                </a>

                <a href="{{ url()->previous() }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                    {{ $language === 'Odia' ? 'ବାତିଲ୍ କରନ୍ତୁ' : 'Cancel' }}
                </a>
            </div>
        </div>
    </section>

    @include('partials.website-footer')

</body>

</html>
