<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Privacy Policy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Custom Header CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        section.privacy-policy {
            max-width: 900px;
            margin: 100px auto;
            background: #ffffff;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .privacy-policy h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .privacy-policy h3 {
            font-size: 20px;
            margin-top: 30px;
            color: #34495e;
        }

        .privacy-policy p,
        .privacy-policy li {
            font-size: 16px;
            line-height: 1.7;
            color: #555;
        }

        .privacy-policy ul {
            padding-left: 20px;
        }

        .privacy-policy a {
            color: #007bff;
            text-decoration: none;
        }

        .privacy-policy a:hover {
            text-decoration: none;
        }
    </style>

</head>

<body>
    @include('partials.header-puri-dham')

    @php
        $language = session('app_language', 'English');
    @endphp

    <section class="privacy-policy px-4 py-10 max-w-5xl mx-auto text-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">
            {{ $language === 'Odia' ? 'ଆପଣଙ୍କର ଗୋପନୀୟତା ପ୍ରତି ଆମର ସଙ୍କଳ୍ପ' : 'Our Commitment to Your Privacy' }}
        </h2>

        <h3 class="text-xl font-semibold mt-6">1.
            {{ $language === 'Odia' ? 'ଆମେ କଣ ତଥ୍ୟ ସଂଗ୍ରହ କରୁଛୁ' : 'Information We Collect' }}</h3>
        <p>{{ $language === 'Odia' ? 'ଆମେ କୌଣସି ବ୍ୟକ୍ତିଗତ ତଥ୍ୟ ସଂଗ୍ରହ କରୁନାହିଁ।' : 'We do not collect any personal information.' }}
        </p>

        <h3 class="text-xl font-semibold mt-6">2.
            {{ $language === 'Odia' ? 'ଆମେ ତୁମର ତଥ୍ୟ କିପରି ବ୍ୟବହାର କରୁଛୁ' : 'How We Use Your Data' }}</h3>
        <ul class="list-disc ml-6">
            <li>{{ $language === 'Odia' ? 'ଆମର ୱେବସାଇଟ୍ ଅନୁଭବ ଓ ସେବାକୁ ଉନ୍ନତ କରିବା ପାଇଁ।' : 'To improve our website experience and customer support.' }}
            </li>
            <li>{{ $language === 'Odia' ? 'ଆଇନ ଅନୁସାରେ ଚାଲିବା ଏବଂ ଠକେଇ ରୋକିବା ପାଇଁ।' : 'To comply with legal requirements and prevent fraud.' }}
            </li>
        </ul>

        <h3 class="text-xl font-semibold mt-6">3.
            {{ $language === 'Odia' ? 'ତଥ୍ୟ ସୁରକ୍ଷା ପାଇଁ ଉପାୟ' : 'Data Protection Measures' }}</h3>
        <p>{{ $language === 'Odia' ? 'ଅନାଧିକୃତ ପ୍ରବେଶ, ହାନି ବା ଦୁର୍ବ୍ୟବହାରକୁ ବାରଣ କରିବାକୁ ଆମେ ଶ୍ରେଷ୍ଠ ଉଦ୍ୟୋଗ ନିଅଛୁ।' : 'We implement industry-standard security measures to protect your data from unauthorized access, loss, or misuse.' }}
        </p>

        <h3 class="text-xl font-semibold mt-6">4.
            {{ $language === 'Odia' ? 'ତଥ୍ୟ ଅଦାନ-ପ୍ରଦାନ' : 'Sharing of Information' }}</h3>
        <p>{{ $language === 'Odia' ? 'ଆମେ ତୁମର ବ୍ୟକ୍ତିଗତ ତଥ୍ୟ ବିକ୍ରି ବା ବିନିମୟ କରୁନାହିଁ।' : 'We do not sell or trade your personal information.' }}
        </p>

        <h3 class="text-xl font-semibold mt-6">5. {{ $language === 'Odia' ? 'ତୁମର ଅଧିକାର' : 'Your Rights' }}</h3>
        <p>{{ $language === 'Odia' ? 'ତୁମେ ତୁମର ବ୍ୟକ୍ତିଗତ ତଥ୍ୟ ଅଭିଗମ, ସଂଶୋଧନ ବା ବିଲୋପ ପାଇଁ ଅନୁରୋଧ କରିପାରିବେ।' : 'You have the right to request access, modification, or deletion of your personal data.' }}
        </p>

        <h3 class="text-xl font-semibold mt-6">6.
            {{ $language === 'Odia' ? 'ଗୋପନୀୟତା ନୀତିର ଅଦ୍ୟତନ' : 'Updates to Privacy Policy' }}</h3>
        <p>{{ $language === 'Odia' ? 'ଆମେ ସମୟ-ସମୟରେ ଏହି ନୀତିକୁ ଅଦ୍ୟତନ କରିପାରିବା। ଯେଉଁ ଯେଉଁ ପରିବର୍ତ୍ତନ ହେବ, ସେଗୁଡିକୁ ୱେବସାଇଟ୍ ଓ ଇମେଲ୍ ମାଧ୍ୟମରେ ଜଣାଇଯିବ।' : 'We may update this policy periodically. Any changes will be communicated through our website and email notifications.' }}
        </p>

        <h3 class="text-xl font-semibold mt-6">{{ $language === 'Odia' ? 'ପ୍ରଶ୍ନ ପାଇଁ' : 'For Queries' }}</h3>
        <p>
            {{ $language === 'Odia' ? 'ଯଦି ଆପଣଙ୍କର ଗୋପନୀୟତା ସଂପର୍କରେ କୌଣସି ପ୍ରଶ୍ନ ରହିଛି, ତେବେ ଏହି ଇମେଲ୍ ଠିକଣାକୁ ସମ୍ପର୍କ କରନ୍ତୁ:' : 'If you have any questions or concerns about your privacy, contact us at:' }}
            <a href="mailto:jagannath.or@nic.in" class="text-blue-500 underline">jagannath.or@nic.in</a>
        </p>
    </section>

    @include('partials.website-footer')

</body>

</html>
