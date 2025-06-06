<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Locker & Shoe Stands</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/web-service.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">


    <style>
        .service-card img,
        .service-card-bhakta img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
            height: 270px;
        }
    </style>

</head>

<body>

    @include('partials.header-puri-dham')

    @php
        $language = session('app_language', 'English');
    @endphp

    <div class="hero">
        <img class="hero-bg" src="{{ asset('website/parking.jpeg') }}" alt="Visitor Parking Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-left">
                <h1>
                    {{ $language === 'Odia' ? 'ଲକର ଓ ଜୋତା ଷ୍ଟାଣ୍ଡରଖିବା ' : 'Cloakroom & Lockers' }}
                </h1>
                <p>
                    {{ $language === 'Odia'
                        ? 'ମନ୍ଦିର ନିକଟରେ ଉପଲବ୍ଧ କିଛି ଲକର ଏବଂ ଜୋତାଷ୍ଟାଣ୍ଡ।'
                        : 'Same Of The Available Lockers & Stands Near To The Temple' }}
                </p>
            </div>
        </div>
    </div>

    {{-- <div class="hero-right">
        <div class="view-buttons">
            <button class="list-view-btn">
                {{ $language === 'Odia' ? 'ତାଲିକା ଦୃଶ୍ୟ' : 'List View' }}
            </button>
            <button class="map-view-btn">
                {{ $language === 'Odia' ? 'ମାନଚିତ୍ର ଦୃଶ୍ୟ' : 'Map View' }}
            </button>
        </div>
    </div> --}}

    <div class="container">
        <div class="service-grid">
            @foreach ($services as $item)
                <div class="service-card">
                    <h5>{{ $item->service_name }}</h5>

                    @php
                        $photoArray = json_decode($item->photo, true);
                        $firstPhoto = $photoArray[0] ?? null;
                    @endphp

                    <img src="{{ $firstPhoto ? asset($firstPhoto) : asset('website/locker.png') }}"
                        alt="{{ $item->service_name }}">

                    <div class="service-info" style="display: flex; justify-content: space-between;">
                        <div>
                            <div class="info-line">
                                <span class="icon"></span>
                                {{ $item->landmark ? $item->landmark . ', ' : '' }}
                                {{ $item->city_village ? $item->city_village . ', ' : '' }}
                            </div>

                            <div class="info-line">
                                <span class="icon"></span> {{ $item->opening_time ?? 'N/A' }} -
                                {{ $item->closing_time ?? 'N/A' }}
                            </div>
                        </div>

                        <div>
                            @if ($item->google_map_link)
                                <div class="info-line">
                                    <span class="icon"></span>
                                    <a class="btn btn-sm" style="color: white; background: linear-gradient(90deg, #f9ce62, #f1769f);"
                                        href="{{ $item->google_map_link }}" target="_blank">{{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('partials.website-footer')

</body>

</html>
