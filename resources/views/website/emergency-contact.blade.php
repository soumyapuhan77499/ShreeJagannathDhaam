<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Emergency Contact</title>
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

    <section class="hero">
        <img class="hero-bg" src="{{ asset('website/fest.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency Contact' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ସଂପର୍କ ସୂଚୀ' : 'List Of Emergency Contact' }}
            </p>
        </div>
    </section>

    <section class="py-12 px-4 md:px-12 bg-gray-100">
        <h2 class="text-3xl font-bold text-center mb-10 text-[#db4d30]">
            {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ସହଯୋଗ ସଂଖ୍ୟା' : 'Emergency Helpline Numbers' }}
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

            <!-- Police -->
            <!-- Police -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-shield-alt text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ପୋଲିସ' : 'Police' }}</p>
                    <p class="text-gray-600"> 100 </p>
                </div>
            </div>

            <!-- Ambulance -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-ambulance text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ଅମ୍ବୁଲାନ୍ସ ' : 'Ambulance' }}</p>
                    <p class="text-gray-600">108</p>
                </div>
            </div>

            <!-- Fire Service -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-fire-extinguisher text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ଅଗ୍ନିଶମ ସେବା' : 'Fire Service' }}</p>
                    <p class="text-gray-600">101</p>
                </div>
            </div>

            <!-- Elder Person -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-user-shield text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">
                        {{ $language === 'Odia' ? 'ବୟସ୍କ ବ୍ୟକ୍ତିଙ୍କ ପାଇଁ ହେଲ୍ପଲାଇନ୍' : 'Elder Person Helpline' }}</p>
                    <p class="text-gray-600">1090</p>
                </div>
            </div>

            <!-- Child Helpline -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-child text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ଶିଶୁଙ୍କ ପାଇଁ ହେଲ୍ପଲାଇନ୍ ' : 'Child Helpline' }}
                    </p>
                    <p class="text-gray-600">1098</p>
                </div>
            </div>

            <!-- Women Helpline -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-female text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ମହିଳାଙ୍କ ହେଲ୍ପଲାଇନ୍' : 'Women Helpline' }}
                    </p>
                    <p class="text-gray-600">1091</p>
                </div>
            </div>

            <!-- Life Guard -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-life-ring text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">{{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡ' : 'Life Guard' }}</p>
                    <p class="text-gray-600">8260777771</p>
                </div>
            </div>


            <!-- Highway -->
            <div class="flex items-center gap-4 bg-white shadow-md p-4 rounded-lg">
                <i
                    class="fas fa-road text-3xl bg-gradient-to-r from-[#FFA726] to-[#F06292] bg-clip-text text-transparent"></i>
                <div>
                    <p class="font-semibold text-lg">
                        {{ $language === 'Odia' ? 'ଜାତୀୟ ରାଜପଥ ହେଲ୍ପଲାଇନ୍' : 'National Highway Helpline' }}
                    </p>
                    <p class="text-gray-600">1033</p>
                </div>
            </div>

        </div>
    </section>

    @include('partials.website-footer')

</body>

</html>
