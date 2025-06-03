<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Do's and Don'ts</title>
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
                            <li>ଶ୍ରୀମନ୍ଦିରରେ ଶାନ୍ତି ଓ ସୁବ୍ୟବସ୍ଥିତ ଦର୍ଶନ ପାଇଁ ଶୃଙ୍ଖଳାବଦ୍ଧ ଭାବେ ଧାଡ଼ିରେ ଆସନ୍ତୁ।</li>
                            <li>ଶ୍ରୀଜଗନ୍ନାଥ ମନ୍ଦିରରେ ପ୍ରାଚୀନ ରୀତି ଓ ପ୍ରଥାକୁ ସମ୍ମାନ ଦିଅନ୍ତୁ ଏବଂ ସହ-ତୀର୍ଥଯାତ୍ରୀ ଭକ୍ତ ମଧ୍ୟରେ ଧାର୍ମିକ ଭାବନାକୁ ପ୍ରୋତ୍ସାହିତ କରନ୍ତୁ।</li>
                            <li>ମନ୍ଦିର ଭିତରେ ପୂର୍ଣ୍ଣ ନିରବତା ପାଳନ କରନ୍ତୁ</li>
                            <li>ମନ୍ଦିର ପରିସରରେ ଥିବା ହୁଣ୍ଡି ଓ ଶାଖା କାର୍ଯ୍ୟାଳୟରେ ଆପଣଙ୍କର ଦାନ ଅର୍ପଣ କରନ୍ତୁ।</li>
                            <li>ଶ୍ରୀଜଗନ୍ନାଥ ମନ୍ଦିର ପରିସରକୁ ପରିଷ୍କାର ରଖନ୍ତୁ।</li>
                            <li>ସ୍ନାନ ଓ  ଶୌଚ କରି ସଫା ପୋଷାକ ପିନ୍ଧି ମନ୍ଦିରରେ ପ୍ରବେଶ କରନ୍ତୁ।</li>
                            <li>ପକେଟମାର ଓ ମାଙ୍କଡ଼ମାନଙ୍କଠାରୁ  ସତର୍କ ରୁହନ୍ତୁ।</li>
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
                            <li>ଦେବତାଙ୍କ ଦର୍ଶନ ସମୟରେ ମଦ ବା ଅନ୍ୟ କୌଣସି ମାଦକ ଦ୍ରବ୍ୟ ସେବନ କରିବା ନିଷିଦ୍ଧ</li>
                            <li>ମନ୍ଦିର ପରିସରକୁ ମାଂସାହାର କରି ଯିବା ନିଷିଦ୍ଧ।</li>
                            <li>ମନ୍ଦିର ପରିସରକୁ ରନ୍ଧା ଖାଦ୍ୟ ନେଇଯିବା ନିଷିଦ୍ଧ।</li>
                            <li>ମନ୍ଦିର ପରିସରରେ ଭିକ୍ଷାବୃତ୍ତି କରିବା ଅନୁଚିତ।</li>
                            <li>ଛେପ ପକାଇବା କିମ୍ବା ଅସଭ୍ୟ ଆଚରଣ କରିବା ନିଷିଦ୍ଧ।</li>
                            <li>ଜଳକୁ ନଷ୍ଟ କରନ୍ତୁ ନାହିଁ।</li>
                            <li>ମନ୍ଦିର ପରିସରରେ ଛେପ ପକାଇବା, ପରିଶ୍ରା କରିବା ବା ଶୌଚ କରିବା ନିଷିଦ୍ଧ ଅଟେ।</li>
                            <li>ମନ୍ଦିର ପରିସର ଭିତରେ ଏବଂ ଚାରିପାଖରେ ଜୋତା ଓ ଚମଡା ଜିନିଷ ବ୍ୟବହାର ନିଷିଦ୍ଧ ଅଟେ।</li>
                            <li>ଛତା, ମୋବାଇଲ୍ ଫୋନ୍, ଇଲେକ୍ଟ୍ରୋନିକ୍ ଉପକରଣ, ଚମଡା ଜିନିଷ ଇତ୍ୟାଦି ସାଙ୍ଗରେ ନେଇଯିବାକୁ ନିଷିଦ୍ଧ ଅଟେ।</li>
                            <li>ମନ୍ଦିର ପରିସର ମଧ୍ୟରେ ଟୋପି ପିନ୍ଧନ୍ତୁ ନାହିଁ ।</li>
                        @else
                            <li>Do not consume liquor or other intoxicants during Darshan of the Deities.</li>
                            <li>Do not eat non-vegetarian food.</li>
                            <li>Do not carry cooked food.</li>
                            <li>Do not encourage beggary.</li>
                            <li>Do not spit or commit nuisance.</li>
                            <li>Do not waste water.</li>
                            <li>Do not spit, urinate or defecate in the premises of temple.</li>
                            <li>Do not wear footwear and leather items in and around the premises of the temple.</li>
                            <li>Do not carry umbrella, mobile phones, electronic gadgets, leather items etc.</li>
                            <li>Do not wear caps inside the temple.</li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </section>


    @include('partials.website-footer')

</body>

</html>
