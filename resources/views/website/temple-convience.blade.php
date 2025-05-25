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

    <style>
        /* Base Layout */
        .services-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .service-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: scale(1.01);
        }

        /* Image */
        .service-image img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            max-height: 220px;
        }

        .no-image {
            width: 100%;
            height: 200px;
            background-color: #f0f0f0;
            color: gray;
            display: flex;
            align-items: center;
            justify-content: center;
            font-style: italic;
        }

        /* Info */
        .service-info {
            padding: 15px;
        }

        .service-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #4b2e83;
        }

        .service-address {
            font-size: 14px;
            color: #444;
            margin-bottom: 12px;
        }

        .service-address i {
            color: #888;
            margin-right: 6px;
        }

        .direction-btn {
            display: inline-block;
            padding: 8px 12px;
            background: linear-gradient(90deg, #f9ce62, #f1769f);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .no-link {
            color: #888;
            font-style: italic;
        }

        /* Responsive for Mobile */
        @media (max-width: 768px) {
            .service-card {
                flex-direction: row;
                align-items: flex-start;
                max-width: 100%;
            }

            .service-image {
                flex-shrink: 0;
                width: 150px;
                height: 150px;
                overflow: hidden;
            }

            .service-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .no-image {
                width: 150px;
                height: 150px;
            }

            .service-info {
                padding: 10px;
                flex: 1;
            }

            .service-title {
                font-size: 16px;
            }
        }
    </style>
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

    <div class="services-wrapper">
        @foreach ($services as $service)
            @php
                $photos = json_decode($service->photo, true);
                $firstPhoto = $photos[0] ?? null;
            @endphp

            <div class="service-card">
                <div class="service-image">
                    @if ($firstPhoto)
                        <img src="{{ asset($firstPhoto) }}" alt="{{ $service->service_name }}">
                    @else
                        <div class="no-image">No Image</div>
                    @endif
                </div>
                <div class="service-info">
                    <h3 class="service-title">{{ $service->service_name }}</h3>
                    <p class="service-address">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $service->landmark ?? '' }} {{ $service->city_village ?? '' }},
                        {{ $service->district ?? '' }}
                    </p>

                    @if ($service->google_map_link)
                        <a href="{{ $service->google_map_link }}" class="direction-btn" target="_blank">
                            {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                        </a>
                    @else
                        <p class="no-link">{{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Link' }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>



    @include('partials.website-footer')


</body>

</html>
