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

    <style>
        body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 1300px;
            padding-top: 70px;
        }

        .table-header {
            background: linear-gradient(90deg, #FFA726, #F06292);
            color: white;
        }

        .table-row:nth-child(even) {
            background-color: #fdf2f8;
        }

        .table-row:nth-child(odd) {
            background-color: #fff7f0;
        }



        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 20px;
            }

            table.min-w-full {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }

            table.min-w-full thead {
                display: none;
                /* Hide header for smaller devices */
            }

            table.min-w-full tbody,
            table.min-w-full tr,
            table.min-w-full td {
                display: block;
                width: 100%;
            }

            table.min-w-full tr {
                margin-bottom: 15px;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                background: #fff;
                padding: 15px;
            }

            table.min-w-full td {
                text-align: left;
                padding: 10px 10px;
                position: relative;
            }

            table.min-w-full td::before {
                content: attr(data-label);
                position: absolute;
                top: 10px;
                left: 10px;
                font-weight: bold;
                color: #f06292;
                font-size: 14px;
                text-transform: capitalize;
            }

            table.min-w-full td img {
                width: 100px;
                height: 100px;
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
            'beach' => 'ସମୁଦ୍ର କୂଳ',
            'life guard booth' => 'ଲାଇଫ୍ ଗାର୍ଡ',
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


    <!-- Table Section -->
    @php
        $language = session('app_language', 'English');
    @endphp

    <div class="container mx-auto">
        <div class="overflow-x-auto rounded-lg shadow-lg bg-white">
            <table class="min-w-full">
                <thead class="table-header">
                    <tr>
                        <th class="py-3 px-6 text-left">
                            {{ $language === 'Odia' ? 'ଫୋଟୋ' : 'Photo' }} <i class="fas fa-image"></i>
                        </th>
                        <th class="py-3 px-6 text-left">
                            {{ $language === 'Odia' ? 'ସେବା ନାମ' : 'Service Name' }} <i
                                class="fas fa-concierge-bell"></i>
                        </th>
                        <th class="py-3 px-6 text-left">
                            {{ $language === 'Odia' ? 'ଅବସ୍ଥିତି' : 'Location' }} <i class="fas fa-map-marker-alt"></i>
                        </th>
                        <th class="py-3 px-6 text-left">
                            {{ $language === 'Odia' ? 'ସମ୍ପୂର୍ଣ୍ଣ ସୂଚନା' : 'Full Information' }} <i
                                class="fas fa-tools"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr class="table-row hover:bg-pink-100 transition duration-300">
                            <td class="py-4 px-6">
                                @php
                                    $photos = json_decode($service->photo, true);
                                    $firstPhoto = $photos[0] ?? null;
                                @endphp

                                @if ($firstPhoto)
                                    <button onclick="openPhotoModal({{ $service->id }})">
                                        <img src="{{ asset($firstPhoto) }}" alt="{{ $service->service_name }}"
                                            class="w-20 h-20 object-cover rounded-md shadow-md hover:scale-105 transition duration-300">
                                    </button>
                                @else
                                    <span class="text-gray-400 italic">
                                        {{ $language === 'Odia' ? 'ଫୋଟୋ ନାହିଁ' : 'No Image' }}
                                    </span>
                                @endif
                            </td>

                            <td class="py-4 px-6 font-semibold">{{ $service->service_name }}</td>

                            <td class="py-4 px-6">
                                @if ($service->google_map_link)
                                    <a href="{{ $service->google_map_link }}" target="_blank"
                                        class="px-3 py-1 rounded-md text-sm hover:scale-105 transition"
                                        style="background: linear-gradient(90deg, #f9ce62, #f1769f); color: white;padding: 10px;">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">
                                        {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Link' }}
                                    </span>
                                @endif
                            </td>

                            <td class="py-4 px-6">
                                <button onclick="openModal({{ $service->id }})"
                                    class="text-white px-3 py-1 rounded-md hover:scale-105 transition"
                                    style="background: linear-gradient(90deg, #f9ce62, #f1769f);padding: 10px;">
                                    {{ $language === 'Odia' ? 'ପୂର୍ଣ୍ଣ ବିବରଣୀ' : 'View Full Info' }}
                                </button>
                            </td>
                        </tr>

                        <!-- Full Info Modal -->
                        <div id="modal-{{ $service->id }}"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
                                <button onclick="closeModal({{ $service->id }})"
                                    class="absolute top-2 right-2 text-gray-600 hover:text-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h2 class="text-2xl font-bold mb-4 text-center text-pink-500">
                                    {{ $service->service_name }}
                                </h2>
                                <div class="space-y-2 text-gray-700 text-sm">
                                    <p><i class="fas fa-landmark text-purple-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ଲ୍ୟାଣ୍ଡମାର୍କ' : 'Landmark' }}:</strong>
                                        {{ $service->landmark ?? 'N/A' }}
                                    </p>
                                    <p><i class="fas fa-map-pin text-red-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ପିନକୋଡ୍' : 'Pincode' }}:</strong>
                                        {{ $service->pincode ?? 'N/A' }}
                                    </p>
                                    <p><i class="fas fa-map-marker-alt text-pink-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ସହର/ଗ୍ରାମ' : 'City/Village' }}:</strong>
                                        {{ $service->city_village ?? 'N/A' }}
                                    </p>
                                    <p><i class="fas fa-city text-indigo-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ଜିଲ୍ଲା' : 'District' }}:</strong>
                                        {{ $service->district ?? 'N/A' }}
                                    </p>
                                    <p><i class="fas fa-flag text-green-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ରାଜ୍ୟ' : 'State' }}:</strong>
                                        {{ $service->state ?? 'N/A' }}
                                    </p>
                                    <p><i class="fas fa-globe text-yellow-400"></i>
                                        <strong>{{ $language === 'Odia' ? 'ଦେଶ' : 'Country' }}:</strong>
                                        {{ $service->country ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Modal -->
                        <div id="photo-modal-{{ $service->id }}"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-3xl relative">
                                <button onclick="closePhotoModal({{ $service->id }})"
                                    class="absolute top-2 right-2 text-gray-600 hover:text-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h2 class="text-2xl font-bold mb-6 text-center text-orange-500">
                                    {{ $language === 'Odia' ? 'ଫୋଟୋ' : 'Photos of' }} {{ $service->service_name }}
                                </h2>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    @foreach ($photos as $photo)
                                        <img src="{{ asset($photo) }}" alt="{{ $service->service_name }}"
                                            class="w-full h-40 object-cover rounded-md shadow-md hover:scale-105 transition duration-300">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-lg text-red-500">
                                {{ $language === 'Odia' ? 'କୌଣସି ସେବା ମିଳିଲା ନାହିଁ।' : 'No Services Found.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    @include('partials.website-footer')

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

        function openDescModal(id) {
            document.getElementById('desc-modal-' + id).classList.remove('hidden');
        }

        function closeDescModal(id) {
            document.getElementById('desc-modal-' + id).classList.add('hidden');
        }
    </script>
    <script>
        function openPhotoModal(id) {
            document.getElementById('photo-modal-' + id).classList.remove('hidden');
        }

        function closePhotoModal(id) {
            document.getElementById('photo-modal-' + id).classList.add('hidden');
        }
    </script>




</body>

</html>
