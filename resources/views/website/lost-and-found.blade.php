<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lost and Found</title>
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

    <!-- Hero Banner -->
    <section class="hero relative">
        <img class="hero-bg object-cover w-full h-96 sm:h-[450px]" src="{{ asset('website/fest.jpg') }}"
            alt="Mandir Background" />

        <div class="hero-overlay absolute inset-0 bg-black bg-opacity-50"></div>

        <div
            class="hero-content absolute inset-0 flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-3xl sm:text-5xl font-bold drop-shadow-md">
                {{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost and Found' }}
            </h1>
            <p class="mt-3 text-base sm:text-lg font-medium max-w-2xl">
                {{ $language === 'Odia'
                    ? 'ଦୟାକରି ପୁରୀର ଶ୍ରୀ ମନ୍ଦିରରେ ଥିବା ସିଂହଦ୍ଵାର ସୂଚନା କେନ୍ଦ୍ର ସହିତ ଯୋଗାଯୋଗ କରନ୍ତୁ ।'
                    : 'Assistance for items lost or found within the temple premises is available here.' }}
            </p>
        </div>
    </section>

    <!-- Lost & Found Info Section -->
    <section class="py-12 px-4 md:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-[#db4d30] mb-6">
                {{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା' : 'Lost & Found Assistance' }}
            </h2>

            <p class="text-gray-700 text-base leading-relaxed mb-4">
                {{ $language === 'Odia'
                    ? 'ଯଦି ଆପଣ ମନ୍ଦିର ପରିସରରେ କୌଣସି ବସ୍ତୁ ହାରାଇଦେଇଛନ୍ତି କିମ୍ବା ଉଠାଇଛନ୍ତି, ତେବେ ଦୟାକରି ନିମ୍ନଲିଖିତ ଯୋଗାଯୋଗ ନମ୍ବରରେ ସମ୍ପର୍କ କରନ୍ତୁ।'
                    : 'If you have lost or found any item within the temple premises, please contact the temple authorities immediately at the number below.' }}
            </p>

            <div class="mt-6 flex justify-center items-center gap-4">
                <i class="fas fa-phone text-green-600 text-xl"></i>
                <span class="text-lg font-semibold text-gray-800">+91 6752 222 025</span>
            </div>

            <p class="mt-4 text-sm text-gray-500">
                {{ $language === 'Odia'
                    ? 'ମନ୍ଦିର ଖୋଜା ଓ ହଜା ବିଭାଗ ଦ୍ୱାରା ସହଯୋଗ ପ୍ରଦାନ କରାଯିବ।'
                    : 'Support will be provided by the Temple Lost & Found Department.' }}
            </p>
        </div>
    </section>

    @include('partials.website-footer')

</body>

</html>
