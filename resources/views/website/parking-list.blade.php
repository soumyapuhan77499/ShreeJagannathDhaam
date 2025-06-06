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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .service-card img,
        .service-card-bhakta img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
            height: 270px;
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
                    {{ $language === 'Odia' ? 'ଯାନବାହାନ ପାର୍କିଂ ସ୍ଥଳ  ' : 'Vehicle Parking' }}
                </h1>
                <p>
                    {{ $language === 'Odia'
                        ? 'ଆପଣ ଆପଣଙ୍କର ଦୁଇ, ତିନି ଏବଂ ଚାରି ଚକିଆ ଯାନ ନିମ୍ନଲିଖିତ ପାର୍କିଂ ସ୍ଥାନଗୁଡିକରେ ପାର୍କ କରିପାରିବେ ।'
                        : 'You Can Park Your Two Three & Four Wheelers At The Following Parking Places' }}
                </p>
            </div>
        </div>
    </div>
    <!-- Tabs Section -->
    <div class="flex justify-center mt-8">
    <div class="inline-flex bg-white rounded-lg shadow overflow-hidden">
        <button id="tab-twowheeler" class="px-6 py-2 focus:outline-none font-semibold text-gray-700 bg-yellow-200"
            onclick="showTab('two wheeler')">
            {{ $language === 'Odia' ? 'ଦୁଇ ଚକିଆ' : 'Two Wheeler' }}
        </button>
        <button id="tab-threewheeler" class="px-6 py-2 focus:outline-none font-semibold text-gray-700"
            onclick="showTab('three wheeler')">
            {{ $language === 'Odia' ? 'ତିନି ଚକିଆ' : 'Three Wheeler' }}
        </button>
        <button id="tab-fourwheeler" class="px-6 py-2 focus:outline-none font-semibold text-gray-700"
            onclick="showTab('four wheeler')">
            {{ $language === 'Odia' ? 'ଚାରି ଚକିଆ' : 'Four Wheeler' }}
        </button>
        <button id="tab-electricvehicle" class="px-6 py-2 focus:outline-none font-semibold text-gray-700"
            onclick="showTab('electric vehicle')">
            {{ $language === 'Odia' ? 'ଇଲେକ୍ଟ୍ରିକ ଭେହିକଲ' : 'Electric Vehicle' }}
        </button>
    </div>
</div>


 <div class="container mt-6">
    <div class="service-grid">
        @foreach ($parking as $item)
            @php
                // Decode the JSON array of vehicle types
                $vehicleTypes = json_decode($item->vehicle_type, true) ?? [];
            @endphp
            <div class="service-card" data-vehicle-types="{{ implode(',', $vehicleTypes) }}" style="display:none; flex-direction: column;">
                <h5>{{ $item->parking_name }}</h5>
                <img src="{{ $item->parking_photo ? asset($item->parking_photo) : asset('website/parking.jpeg') }}"
                    alt="{{ $item->parking_name }}">
                <div class="service-info" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <div class="info-line">
                            <i class="fas fa-map-marker-alt icon"></i>
                            {{ $item->landmark ?? '' }}
                            {{ $item->city_village ?? '' }}
                            {{ $item->district ?? '' }}
                        </div>
                        <div class="info-line">
                            <i class="fas fa-clock icon"></i> 24/7
                        </div>
                    </div>
                    @if($item->map_url)
                        <div>
                            <a href="{{ $item->map_url }}" target="_blank" rel="noopener noreferrer" class="direction-btn">
                                View Map
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

    @include('partials.website-footer')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        showTab('two wheeler'); // Default active tab
    });

    function showTab(type) {
        // Update tab button active states
        ['twowheeler', 'threewheeler', 'fourwheeler', 'electricvehicle'].forEach(id => {
            document.getElementById('tab-' + id).classList.toggle('bg-yellow-200', id === type.replace(' ', ''));
        });

        // Show/hide parking cards based on vehicle type matching
        document.querySelectorAll('.service-card').forEach(function(card) {
            const vehicleTypes = card.dataset.vehicleTypes.split(',');
            if (vehicleTypes.includes(type)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
</body>

</html>
