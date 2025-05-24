<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Visitor Parking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/web-service.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">



    <style>
        .tab-btn {
            padding: 10px 25px;
            border: none;
            background: #eee;
            color: #333;
            font-size: 16px;
            border-radius: 5px 5px 0 0;
            cursor: pointer;
            transition: background 0.2s;
        }
        .tab-btn.active {
            background: #2d7b2d;
            color: #fff;
        }
   
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
        <img class="hero-bg" src="{{ asset('website/parkings.jpg') }}" alt="Visitor Parking Background" />
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-left">
                <h1>
                    {{ $language === 'Odia' ? 'ଭ୍ରମଣକାରୀ ପାର୍କିଂ' : 'Visitor Parking' }}
                </h1>
                <p>
                    {{ $language === 'Odia'
                        ? 'ନିମ୍ନଲିଖିତ ସ୍ଥାନଗୁଡିକରେ ଆପଣଙ୍କର ୨, ୩ ଓ ୪ ଚକିଆ ଯାନ ସହଜରେ ପାର୍କ କରନ୍ତୁ।'
                        : 'Park your two, three & four Wheelers with ease at the following spaces' }}
                </p>
            </div>
        </div>
    </div>

    <div class="hero-right">
        <div class="view-buttons">
            <button class="list-view-btn">
                {{ $language === 'Odia' ? 'ତାଲିକା ଦୃଶ୍ୟ' : 'List View' }}
            </button>
            <button class="map-view-btn">
                {{ $language === 'Odia' ? 'ମାନଚିତ୍ର ଦୃଶ୍ୟ' : 'Map View' }}
            </button>
        </div>
    </div>
    
    <div class="tab-buttons" style="display: flex; justify-content: center; margin: 30px 0;"></div>
        <button id="fourWheelerTab" class="tab-btn active" style="margin-right: 10px;">
            {{ $language === 'Odia' ? '୪ ଚକିଆ' : 'Four Wheeler' }}
        </button>
        <button id="twoWheelerTab" class="tab-btn">
            {{ $language === 'Odia' ? '୨ ଚକିଆ' : 'Two Wheeler' }}
        </button>
    </div>


    <div class="container">
        <div class="service-grid">
            @foreach ($parking as $item)
                <div class="service-card">
                    <h5>{{ $item->parking_name }}</h5>
                    <img src="{{ $item->parking_photo ? asset($item->parking_photo) : asset('website/parking.jpeg') }}"
                        alt="{{ $item->parking_name }}">
                    <div class="service-info" style="display: flex; justify-content: space-between;">
                        <div>
                            <div class="info-line">
                                <i class="fas fa-map-marker-alt icon"></i>
                                {{ $item->landmark ? $item->landmark . ', ' : '' }}
                                {{ $item->city_village ? $item->city_village . ', ' : '' }}
                            </div>

                            <div class="info-line">
                                <i class="fas fa-clock icon"></i> 24/7
                            </div>
                        </div>


                        {{-- <div style="margin-top: 45px;">
                            <button class="booking-btn">Confirm Booking</button>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('partials.website-footer')

</body>

</html>
