<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/web-service.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    @include('partials.header-puri-dham')
    @php
        $language = session('app_language', 'English');
    @endphp

    <div class="hero">
        <img class="hero-bg" src="{{ asset('website/bhkt.jpg') }}" alt="Bhakta Niwas Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-left">
                <h1>
                    {{ $language === 'Odia' ? 'ସମୁଦ୍ର କୂଳ' : 'Beach' }}
                </h1>
                <p>
                    {{ $language === 'Odia'
                        ? 'ପୁରୀ ସହରର କିଛି ଆକର୍ଷଣୀୟ ସମୁଦ୍ର କୂଳ'
                        : 'Some Of The Attractive and Clean Beaches In The City Of Puri' }}
                </p>
            </div>
        </div>
    </div>

    <div class="hero-right">
        <div class="view-buttons">
            <button class="list-view-btn">List View</button>
            <button class="map-view-btn">Map View</button>
        </div>
    </div>

    <div class="container">
        <div class="service-grid">
            @foreach ($seabeach as $item)
                @php
                    $photoArray = json_decode($item->photo, true);
                    $firstPhoto = $photoArray[0] ?? null;
                @endphp

                <div class="service-card-bhakta">
                    <h5>{{ $item->service_name }}</h5>

                    {{-- Large Main Image --}}
                    <div class="image-section" style="width: 100%; height: 237px; overflow: hidden;">
                        <img id="mainImage-{{ $loop->index }}" class="main-display-image"
                            src="{{ asset($firstPhoto) }}" alt="Main Image">
                    </div>

                    {{-- Thumbnails Row --}}
                    <div class="thumbnail-section">
                        @foreach ($photoArray as $index => $photo)
                            <img src="{{ asset($photo) }}" class="thumbnail"
                                onclick="updateMainImage('{{ asset($photo) }}', {{ $loop->parent->index }})"
                                alt="Thumbnail {{ $index + 1 }}">
                        @endforeach
                    </div>

                    {{-- Info Block --}}
                    <div class="service-info" style="display: flex; justify-content: space-between;">
                        <div>
                            <div class="info-line">
                                <div class="property-offer-section">
                                    <strong>Facility Available</strong>
                                </div>
                                <div class="info-line">
                                    Parking / Toilet / Parking / Sitting Chair
                                </div>

                            </div>
                        </div>

                        <div>
                            <div class="info-line address-block">
                                <strong>Address:</strong><br>
                                <span class="address-text">
                                    {{ $item->landmark }}
                                    {{ $item->district }}
                                </span>
                            </div>

                            @if ($item->google_map_link)
                                <div class="info-line">
                                    <span class="icon"></span>
                                    <a class="btns btns-info btn-sm" style="color:white"
                                        href="{{ $item->google_map_link }}" target="_blank">Direction</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('partials.website-footer')

    <script>
        function updateMainImage(src, index) {
            const mainImg = document.getElementById('mainImage-' + index);
            if (mainImg) {
                mainImg.src = src;
            }
        }
    </script>

</body>

</html>
