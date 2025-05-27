<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Specially Abled Person</title>
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
                {{ $language === 'Odia' ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ବ୍ୟକ୍ତି' : 'Specially Abled Person' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ଭକ୍ତଙ୍କ ପାଇଁ ନିର୍ଦ୍ଦେଶନାମା' : 'Instructions for Specially Abled Devotees' }}
            </p>
        </div>
    </section>

    <!-- Special Abled Person Instruction Section -->
    <section class="py-12 px-6 md:px-16 bg-gray-50">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
            
            <div class="text-center mb-6">
                <i class="fas fa-wheelchair text-5xl mb-4" style="color: #db4d30;"></i>
                <h2 class="text-3xl font-bold" style="color: #db4d30;">
                    {{ $language === 'Odia' ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ବ୍ୟକ୍ତି ସେବା' : 'Specially Abled Person Services' }}
                </h2>
            </div>

            <p class="text-gray-700 text-md leading-relaxed">
                {!! $language === 'Odia'
                    ? 'ହ୍ୱିଲ୍‌ଚେୟାର କେବଳ ମନ୍ଦିରର ମୁଖ୍ୟ ଦ୍ୱାର ପର୍ଯ୍ୟନ୍ତ ଅନୁମତିପ୍ରାପ୍ତ ଅଟେ <strong>ଜଗନ୍ନାଥ ବଲ୍ଲଭ ପାର୍କିଂ (ମାର୍କେଟ୍ ସ୍କୱାର)</strong> ରୁ <strong>ମନ୍ଦିରର ମୁଖ୍ୟ ଦ୍ୱାର / ଉତ୍ତର ଦ୍ୱାର</strong> ପର୍ଯ୍ୟନ୍ତ ବୃଦ୍ଧ ଏବଂ ଶାରୀରିକ ଭାବରେ ଅସମର୍ଥ ଭକ୍ତଙ୍କ ପାଇଁ <strong>ବେଟେରି ଚାଳିତ ଯାନ</strong> ସେବା ମାଗଣା ଉପଲବ୍ଧ।'
                    : 'Wheelchairs are allowed only till the main gate of the temple ,Free service of <strong>Battery operated vehicles</strong> is available from <strong>Jagannatha Ballav Parking place (Market square)</strong> to the <strong>Temple main gate / North gate</strong> for transporting senior citizens and physically challenged devotees.' !!}
            </p>

            <p class="text-gray-700 text-md mt-4 leading-relaxed">
                {!! $language === 'Odia'
                    ? '<strong>ହ୍ୱିଲଚେୟର୍</strong> ବ୍ୟବହାର କରିବା ପାଇଁ <strong>ମନ୍ଦିର ସୁପରିଭାଇଜର୍ / ଅସିଷ୍ଟେଣ୍ଟ ସୁପରିଭାଇଜର୍</strong>ଙ୍କୁ <strong>06752 – 252527</strong> ରେ ସମ୍ପର୍କ କରନ୍ତୁ।'
                    : 'For availing a wheelchair, devotees can contact the <strong>Temple Supervisor / Assistant Supervisor</strong> at <strong>06752 – 252527</strong>.' !!}
            </p>

            <p class="text-red-500 font-semibold mt-6">
                {{ $language === 'Odia'
                    ? 'ନୋଟ୍: ହ୍ୱିଲଚେୟର୍ କେବଳ ଶାରୀରିକ ଭାବରେ ଅସମର୍ଥ ଭକ୍ତଙ୍କ ପାଇଁ ଉପଲବ୍ଧ।'
                    : 'Note: Wheelchairs are available only for differently abled devotees.,' }}
            </p>

            <p class="text-red-500 font-semibold mt-6">
                {{ $language === 'Odia'
                    ? 'ନୋଟ୍: ଶ୍ରୀମନ୍ଦିର ପ୍ରାଙ୍ଗଣରେ ହ୍ୱିଲଚେୟାର ନେଇଯିବା କଠୋର ଭାବରେ ଅନୁମୋଦିତ ନୁହେଁ।'
                    : 'Note: Wheelchairs are strictly prohibited inside the temple.' }}
            </p>

        </div>
    </section>


    @include('partials.website-footer')

</body>

</html>
