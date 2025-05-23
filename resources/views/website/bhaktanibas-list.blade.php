<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title>Bhakta Niwas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/web-service.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    {{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Niwas' }}
                </h1>
                <p>
                    {{ $language === 'Odia'
                        ? 'ମନ୍ଦିର ଅଧୀନରେ ଥିବା ଭକ୍ତ ନିବାସରେ ଶାନ୍ତିପୂର୍ଣ୍ଣ ଓ ସସ୍ତା ବାସ ଅନୁଭବ କରନ୍ତୁ।'
                        : 'Experience a peaceful and affordable stay in temple-owned Bhakta Niwas accommodations.' }}
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
        @foreach ($bhaktaNibas as $item)
            @php
                $photoArray = json_decode($item->photo, true);
                $firstPhoto = $photoArray[0] ?? null;
            @endphp

            <div class="service-card-bhakta">
                <h5>{{ $item->name }}</h5>

                {{-- Large Main Image --}}
                <div class="image-section">
                    <img id="mainImage-{{ $loop->index }}" class="main-display-image"
                        src="{{ asset($firstPhoto) }}" alt="Main Image">
                </div>

                {{-- Thumbnails --}}
                <div class="thumbnail-section">
                    @foreach ($photoArray as $index => $photo)
                        <img src="{{ asset($photo) }}" class="thumbnail"
                            onclick="updateMainImage('{{ asset($photo) }}', {{ $loop->parent->index }})"
                            alt="Thumbnail {{ $index + 1 }}">
                    @endforeach
                </div>

                {{-- Aligned Service Info --}}
                <div class="service-info-block">
                    <p><strong>Location:</strong> {{ $item->landmark }}, {{ $item->city_village }}</p>
                    <p><strong>Check In:</strong> {{ $item->check_in_time ?? 'N/A' }} |
                        <strong>Check Out:</strong> {{ $item->check_out_time ?? 'N/A' }}</p>
                    <p><strong>Contact:</strong> <a href="tel:{{ $item->contact_no }}">{{ $item->contact_no }}</a></p>
                    @if ($item->google_map_link)
                        <p><a class="map-direction-btn" href="{{ $item->google_map_link }}" target="_blank">📍 Get Directions</a></p>
                    @endif
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
