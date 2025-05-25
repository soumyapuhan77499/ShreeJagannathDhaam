<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst(str_replace('_', ' ', $service_type)) }} Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TailwindCSS and FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


</head>

<body>

    @include('partials.header-puri-dham')

    <!-- Hero Section -->

    @php
        $language = session('app_language', 'English');
        $title = ucfirst(str_replace('_', ' ', $service_type));

        $odiaTitles = [
            'drinking water' => 'ପାନୀୟ ଜଳ',
            'emergency' => 'ଜରୁରୀ ସେବା',
            'special abled person' => 'ବିଶେଷ କ୍ଷମତା ବ୍ୟକ୍ତି',
            'route map' => 'ମାର୍ଗ ମାନଚିତ୍ର',
            'lost and found booth' => 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର',
            'toilet' => 'ଶୌଚାଳୟ',
            'life guard booth' => 'ଲାଇଫ୍ ଗାର୍ଡ',
            'charging station' => 'ଚାର୍ଜିଂ ଷ୍ଟେସନ୍',
            'petrol pump' => 'ପେଟ୍ରୋଲ ପମ୍ପ',
            'atm' => 'ଏଟିଏମ୍',
        ];

        $localizedTitle = $language === 'Odia' ? $odiaTitles[strtolower($title)] ?? $title : $title;
    @endphp
    @php
        // Sanitize and map service_type to image file
        $imageName = $service_type ? $service_type . '.png' : 'default.jpeg';
    @endphp

    <div class="hero">
        @php
            $firstPhoto = null;
            if ($services->isNotEmpty()) {
                $photos = json_decode($services->first()->photo, true);
                $firstPhoto = $photos[0] ?? null;
            }
        @endphp

        @if ($firstPhoto)
            <img class="hero-bg" src="{{ asset($firstPhoto) }}" alt="{{ $title }} Background" />
        @endif

        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-left">
                <h1 class="text-4xl font-bold">{{ $localizedTitle }}</h1>
                <p class="text-lg mt-2">
                    {{ $language === 'Odia' ? 'ଏଠାରେ ଉପଲବ୍ଧ ସମସ୍ତ ସେବା ଦେଖନ୍ତୁ' : 'Explore all available services here' }}
                </p>
            </div>
        </div>
    </div>

    @php
        $language = session('app_language', 'English');
    @endphp

    <div class="px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($services as $service)
                @php
                    $photos = json_decode($service->photo, true);
                    $firstPhoto = $photos[0] ?? null;
                @endphp

                <div class="bg-white rounded-lg shadow-md p-3 flex items-start space-x-4">
                    <!-- Image section -->
                    @if ($firstPhoto)
                        <img src="{{ asset($firstPhoto) }}" alt="{{ $service->service_name }}"
                            class="w-[120px] h-[120px] object-cover rounded-md flex-shrink-0">
                    @else
                        <div
                            class="w-[120px] h-[120px] bg-gray-100 flex items-center justify-center rounded-md text-gray-400 italic">
                            {{ $language === 'Odia' ? 'ଫୋଟୋ ନାହିଁ' : 'No Image' }}
                        </div>
                    @endif

                    <!-- Text section -->
                    <div class="flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-purple-800 mb-1">{{ $service->service_name }}</h3>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt mr-1 text-gray-500"></i>
                                {{ $service->landmark ?? '' }} {{ $service->city_village ?? '' }},
                                {{ $service->district ?? '' }}
                            </p>
                        </div>

                        <!-- Direction Button -->
                        @if ($service->google_map_link)
                            <a href="{{ $service->google_map_link }}" target="_blank"
                                class="mt-3 inline-block text-sm text-white px-3 py-1 rounded-md"
                                style="background: linear-gradient(90deg, #f9ce62, #f1769f);">
                                {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                            </a>
                        @else
                            <span class="mt-3 text-sm text-gray-400 italic">
                                {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Link' }}
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @include('partials.website-footer')


</body>

</html>
