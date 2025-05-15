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

    <!-- Hero Section -->
    <section class="hero">
        <img class="hero-bg" src="{{ asset('website/fest.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                {{ $language === 'Odia' ? 'କରନ୍ତୁ ଏବଂ କରନ୍ତୁ ନାହିଁ' : "Do's and don'ts" }}
            </h1>
            <p>
                {{ $language === 'Odia'
                    ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମର ପବିତ୍ରତା ଓ ପାରମ୍ପରିକତା ରକ୍ଷା ପାଇଁ ଏହି ନିୟମଗୁଡିକୁ ଅନୁସରଣ କରନ୍ତୁ।'
                    : 'To preserve the sanctity and traditions of Shree Jagannatha Dham.' }}
            </p>
        </div>
    </section>

    <!-- Do & Don't Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- DO's -->
                <div class="bg-white rounded-lg shadow p-6 border-t-4 border-green-500">
                    <h3 class="text-xl font-semibold text-green-600 mb-4 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ $language === 'Odia' ? 'କରନ୍ତୁ' : 'DO’S' }}
                    </h3>
                    <ul class="space-y-3 list-inside list-disc text-gray-800">
                        @if ($language === 'Odia')
                            <li>ଦେବତାଙ୍କ ଦର୍ଶନ ପାଇଁ ଶାନ୍ତିପୂର୍ଣ୍ଣ ଧାରାରେ ଅଗ୍ରସର ହୁଅନ୍ତୁ।</li>
                            <li>ପାରମ୍ପରିକ ରୀତିନୀତି ଓ ଧାର୍ମିକ ଭାବନାକୁ ସମ୍ମାନ କରନ୍ତୁ ଓ ଅନ୍ୟ ତୀର୍ଥଯାତ୍ରୀଙ୍କ ସହିତ ଶେୟାର
                                କରନ୍ତୁ।</li>
                            <li>ମନ୍ଦିର ମଧ୍ୟରେ ନିରବତା ପାଳନ କରନ୍ତୁ।</li>
                            <li>ମନ୍ଦିର ସଭାଘର ସ୍ଥିତ ହୁଣ୍ଡି ଓ ଶାଖା କାର୍ଯ୍ୟାଳୟରେ ଅପନ ଦାନ ଦିଅନ୍ତୁ।</li>
                            <li>ମନ୍ଦିର ପରିସର ସଫା ଓ ପବିତ୍ର ରଖନ୍ତୁ।</li>
                            <li>ସ୍ନାନ କରି ପରିଷ୍କୃତ ପୋଷାକ ପିନ୍ଧି ଶ୍ରୀମନ୍ଦିର ପ୍ରବେଶ କରନ୍ତୁ।</li>
                            <li>ଚୋର ଓ ବାନର ଠାରୁ ସତର୍କ ରୁହନ୍ତୁ।</li>
                        @else
                            <li>Follow the Queue System for hassle-free darshan of Deities.</li>
                            <li>Respect ancient customs and usages while at Shree Jagannatha Temple and promote
                                religious sentiments among co-pilgrims.</li>
                            <li>Observe absolute silence inside the temple.</li>
                            <li>Deposit your offerings in the Hundi and Branch Office inside the temple premises.</li>
                            <li>Keep clean the premises of Shree Jagannatha Temple.</li>
                            <li>Bath and wear clean clothes before you enter the shrine.</li>
                            <li>Beware of pickpockets and monkeys.</li>
                        @endif
                    </ul>
                </div>

                <!-- DON'Ts -->
                <div class="bg-white rounded-lg shadow p-6 border-t-4 border-red-500">
                    <h3 class="text-xl font-semibold text-red-600 mb-4 flex items-center">
                        <i class="fas fa-ban mr-2"></i>
                        {{ $language === 'Odia' ? 'କରନ୍ତୁ ନାହିଁ' : 'DON’TS' }}
                    </h3>
                    <ul class="space-y-3 list-inside list-disc text-gray-800">
                        @if ($language === 'Odia')
                            <li>ଦର୍ଶନ ସମୟରେ ମଦ୍ୟପାନ କରିବେ ନାହିଁ।</li>
                            <li>ମାଂସାହାର ଖାଇବେ ନାହିଁ।</li>
                            <li>ପକା ଖାଦ୍ୟ ନେଇଯିବେ ନାହିଁ।</li>
                            <li>ଭିଖା ଦିଅନ୍ତୁ ନାହିଁ।</li>
                            <li>ଥୁଣ୍ଡି କିମ୍ବା ଅନ୍ୟ ଅପବିତ୍ର କାମ କରିବେ ନାହିଁ।</li>
                            <li>ପାଣି ବ୍ୟର୍ଥ କରିବେ ନାହିଁ।</li>
                            <li>ମନ୍ଦିର ପରିସରରେ ଥୁଣ୍ଡି, ପିଶାବ କିମ୍ବା ପାଖାନ କରିବେ ନାହିଁ।</li>
                            <li>ମନ୍ଦିର ପରିସରରେ ଜୁତା, ଚମଡ଼ା ସାମଗ୍ରୀ ନେଇଯିବେ ନାହିଁ।</li>
                            <li>ଛତା, ମୋବାଇଲ, ଇଲେକ୍ଟ୍ରୋନିକ୍ ଗ୍ୟାଜେଟ୍ ନେଇଯିବେ ନାହିଁ।</li>
                        @else
                            <li>Consume liquor or other intoxicants during Darshan of the Deities.</li>
                            <li>Eat non-vegetarian food.</li>
                            <li>Carry cooked food.</li>
                            <li>Encourage beggary.</li>
                            <li>Spit or commit nuisance.</li>
                            <li>Waste water.</li>
                            <li>Spit, urinate or defecate in the premises of temple.</li>
                            <li>Footwear and leather items in and around the premises of the temple.</li>
                            <li>Carry umbrella, mobile phones, electronic gadgets, leather items etc.</li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </section>


    @include('partials.website-footer')

</body>

</html>
