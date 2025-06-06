<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nearby Temple - Festivals</title>
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
                {{ $language === 'Odia' ? 'ପୁରୀ ମନ୍ଦିରର ସମସ୍ତ ଗୁରୁତ୍ଵପୂର୍ଣ୍ଣ ପର୍ବପର୍ବାଣି ।' : 'Temple Festival' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ମନ୍ଦିରରେ ଉଲ୍ଲିଖିତ ସମସ୍ତ ପର୍ବ ତାଲିକା' : 'Complete List Of Festival In The Temple' }}
            </p>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="py-10 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-[#db4d30] mb-8">
                {{ $language === 'Odia' ? 'ପର୍ବ କ୍ୟାଲେଣ୍ଡର' : 'Festival Calendar' }}
            </h2>

            <!-- Search Box -->
            <div class="mb-4">
                <input type="text" id="searchInput"
                    placeholder="{{ $language === 'Odia' ? 'ପର୍ବ ଖୋଜନ୍ତୁ' : 'Search festival' }}"
                    class="w-full sm:w-1/2 p-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-orange-300"
                    oninput="filterFestival()">
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden">
                    <thead class="bg-gradient-to-r from-orange-200 to-yellow-300 text-gray-800 text-left">
                        <tr>
                            <th class="py-3 px-4 text-sm font-semibold">
                                {{ $language === 'Odia' ? 'ପର୍ବ ନାମ' : 'Festival Name' }}</th>
                            <th class="py-3 px-4 text-sm font-semibold">{{ $language === 'Odia' ? 'ତାରିଖ' : 'Date' }}
                            </th>
                            <th class="py-3 px-4 text-sm font-semibold">{{ $language === 'Odia' ? 'ବାର' : 'Day' }}</th>
                        </tr>
                    </thead>
                    <tbody id="festivalBody"></tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        const language = "{{ $language }}";

        const festival = [{
                id: 1,
                name: "Mahabishuba Sankranti, Hanuman Jayanti, RabanaBadha Prastab",
                date: "14/04/2025",
                day: 'Monday',
                odiaName: "ମହାବିଷୁବ ସଂକ୍ରାନ୍ତି, ହନୁମାନ ଜୟନ୍ତୀ, ରାବଣବଧ ପ୍ରସ୍ତାବ",
                odiaDate: "୧୪/୦୪/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 2,
                name: "Shree Mandira re Ramabhiseka",
                date: "22/04/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରମାଭିଷେକ",
                odiaDate: "୨୨/୦୪/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 3,
                name: "Shree Mandira re Rukmani Amavasya",
                date: "27/04/2025",
                day: 'Sunday',
                odiaName: "ରୁକ୍ମଣୀ ଅମାବାସ୍ୟା",
                odiaDate: "୨୭/୪/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 4,
                name: "Shree Mandira re AkhyaTrutiya, Chandan Yatra Arambha",
                date: "30/4/2025",
                day: 'Wednesday',
                odiaName: "ଅକ୍ଷୟତୃତୀୟା, ଚନ୍ଦନଯାତ୍ରା ଆରମ୍ଭ",
                odiaDate: "୩୦/୦୪/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 5,
                name: "Shree Mandira re Niladri Mahodyastami",
                date: "05/05/2025",
                day: 'Monday',
                odiaName: "ନୀଳାଦ୍ରୀ ମହୋଦୟାଷ୍ଟମୀ",
                odiaDate: "୦୫/୦୫/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 6,
                name: "Shree Mandira re Mohini Ekadashi",
                date: "08/05/2025",
                day: 'Thursday',
                odiaName: "ମୋହିନୀ ଏକାଦଶୀ",
                odiaDate: "୦୮/୦୫/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 7,
                name: "Shree Mandira re Nursingha Janma",
                date: "11/05/2025",
                day: 'Sunday',
                odiaName: "ନୃସିଂହ ଜନ୍ମ",
                odiaDate: "୧୧/୦୫/୨୦୨୫",
                odiaDay: "ରବିବାର",

            },
            {
                id: 8,
                name: "Shree Mandira re Bhaunri",
                date: "19/05/2025",
                day: 'Monday',
                odiaName: "ଭଉଁରୀ",
                odiaDate: "୧୯/୦୫/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 9,
                name: "Shree Mandira re Jalakrida Ekadashi",
                date: "23/05/2025",
                day: 'Friday',
                odiaName: "ଜଳକ୍ରୀଡା ଏକାଦଶୀ",
                odiaDate: "୨୩/୦୫/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 10,
                name: "Shree Mandira Sabitri Amavasya, Jalakrida & Sagar Bije",
                date: "27/05/2025",
                day: 'Tuesday',
                odiaName: "ସାବିତ୍ରୀ ଅମାବାସ୍ୟା, ଜଳକ୍ରୀଡା ଓ ସାଗର ବିଜେ",
                odiaDate: "୨୭/୦୫/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 11,
                name: "Siva Bibaha",
                date: "31/05/2025",
                day: 'Saturday',
                odiaName: "ଶିବ ବିବାହ",
                odiaDate: "୩୧/୦୫/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 12,
                name: "Shree Mandira re Sitala Sasthi, Jalakrida",
                date: "01/06/2025",
                day: 'Sunday',
                odiaName: "ଶୀତଳଷଷ୍ଠୀ, ଜଳକ୍ରୀଡା",
                odiaDate: "୦୧/୦୬/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 13,
                name: "Shree Mandira re Rajendrabhiseka & Sudasha Brata",
                date: "05/06/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରାଜେନ୍ଦ୍ରଭିଷେକ ଓ ସୁଦଶା ବ୍ରତ",
                odiaDate: "୦୫/୦୬/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 14,
                name: "Shree Mandira re Rukmaniharan Ekadashi, Bibaha Mahosttaba & Jalakrida",
                date: "06/06/2025",
                day: 'Friday ',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରୁକ୍ମଣୀହରଣ ଏକାଦଶୀ ଓ ବିବାହ ମହୋଉତ୍ସବ ଓ ଜଳକ୍ରୀଡା",
                odiaDate: "୦୬/୦୬/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 15,
                name: "Shree Mandira re Champaka Dwadashi",
                date: "07/06/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଚମ୍ପକ ଦ୍ଵାଦଶୀ",
                odiaDate: "୦୭/୦୬/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 16,
                name: "Shree Mandira re Daitapati Prabesa",
                date: "09/06/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦଇତାପତି ପ୍ରବେଶ",
                odiaDate: "୦୯/୦୬/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 17,
                name: "Shree Mandira re Shree Jeunka ra Chaturthi Homo, Senapata Lagi",
                date: "10/06/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀଜଉଙ୍କର ଚତୁର୍ଥୀ ହୋମ, ସେନାପଟା ଲାଗି",
                odiaDate: "୧୦/୦୬/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 18,
                name: "Shree Mandira re Snana Yatra, Gajanana Besha & Anabasara Arambha",
                date: "11/06/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସ୍ନାନଯାତ୍ରା, ଗଜାନନ ବେଶ ଓ ଅନବସର ଆରମ୍ଭ",
                odiaDate: "୧୧/୦୬/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 19,
                name: "Raja Sankranti",
                date: "15/06/2025",
                day: 'Sunday',
                odiaName: "ରଜ ସଂକ୍ରାନ୍ତି",
                odiaDate: "୧୫/୦୬/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 20,
                name: "Shree Mandira re Anabasra Chakabije",
                date: "20/06/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନବସର ଚକା ବିଜେ",
                odiaDate: "୨୦/୦୬/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 21,
                name: "Shree Mandira re Anabasara Ekadashi & Khalilagi",
                date: "21/06/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନବସର ଏକାଦଶୀ ଓ ଖଳିଲାଗି",
                odiaDate: "୨୧/୦୬/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 22,
                name: "Shree Mandira re Anabasara Dwadashi & Rajaprasad Bije",
                date: "22/06/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନବସର ଦ୍ବାଦଶୀ ଓ ରାଜପ୍ରସାଦ ବିଜେ",
                odiaDate: "୨୨/୦୬/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 23,
                name: "Shree Mandira re Anabasara Trayodashi & Ghanalagi",
                date: "23/06/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନବସର ତ୍ରୟୋଦଶୀ ଓ ଘଣାଲାଗି",
                odiaDate: "୨୩/୦୬/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 24,
                name: "Banakalagi",
                date: "24/06/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀଜୀଉଙ୍କ ବନକଲାଗି",
                odiaDate: "୨୪/୦୬/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 25,
                name: "Amavasya, Shree Jeu nka Banakalagi",
                date: "25/06/2025",
                day: 'Wednesday',
                odiaName: "ଅମାବାସ୍ୟା , ଶ୍ରୀଜୀଉଙ୍କ ବନକଲାଗି",
                odiaDate: "୨୫/୦୬/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 26,
                name: "Shree Mandira re Netroutsab, Nabajouban Darsan & Ratha Angyamala Bije",
                date: "26/06/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ନେତ୍ରୋଉତ୍ସବ, ନବଯୌବନ ଦର୍ଶନ ଓ ରଥ ଆଜ୍ଞାମାଳ ବିଜେ",
                odiaDate: "୨୬/୦୬/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 27,
                name: "Shree Gundicha Yatra",
                date: "27/06/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀଗୁଣ୍ଡିଚା ଯାତ୍ରା",
                odiaDate: "୨୭/୦୬/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 28,
                name: "Herapanchami",
                date: "01/07/2025",
                day: 'Tuesday',
                odiaName: "ହେରାପଞ୍ଚମୀ",
                odiaDate: "୦୧/୦୭/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 29,
                name: "Shree Jeu nka Sandhya Darsan",
                date: "04/07/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀଜୀଉଙ୍କ ସନ୍ଧ୍ୟା ଦର୍ଶନ",
                odiaDate: "୦୪/୦୭/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 30,
                name: "Shree Jeu nka Bahuda Yatra",
                date: "05/07/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀଜୀଉଙ୍କ ବାହୁଡା ଯାତ୍ରା",
                odiaDate: "୦୫/୦୭/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 31,
                name: "Shree Jeu nka Harisayan Ekadashi & BadaTadau Besha(Sunabesha)",
                date: "06/07/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀଜୀଉଙ୍କ ହରିଶୟନ ଏକାଦଶୀ ଓ ବଡତଡାଉ ବେଶ(ସୁନା ବେଶ)",
                odiaDate: "୦୬/୦୭/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 32,
                name: "Ratha upare Shree Jeu nka Adhara Pana & Shree Garuda Sayan ",
                date: "07/07/2025",
                day: 'Monday',
                odiaName: "ରଥ ଉପରେ ଶ୍ରୀଜୀଉଙ୍କ ଅଧର ପଣା ଓ ଶ୍ରୀଗରୁଡ ଶୟନ",
                odiaDate: "୦୭/୦୭/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 33,
                name: "Shree Jeu nka Niladri Bije",
                date: "08/07/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀଜଉଙ୍କ ନୀଳାଦ୍ରୀ ବିଜେ",
                odiaDate: "୦୮/୦୭/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 34,
                name: "Dakhinayan Sankranti",
                date: "16/07/2025",
                day: 'Wednesday',
                odiaName: "ଦକ୍ଷିଣାୟନ ସଂକ୍ରାନ୍ତି",
                odiaDate: "୧୬/୦୭/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 35,
                name: "Shree Mandira re Kamada Or Chakrabula Ekadashi",
                date: "21/07/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କାମଦା ବା ଚକ୍ରବୁଲା ଏକାଦଶୀ",
                odiaDate: "୨୧/୦୭/୨୦୨୫",
                odiaDay: "ସୋମବର",
            },
            {
                id: 36,
                name: "Shree Mandira re Chitalagi Amavasya",
                date: "24/07/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଚିତଲାଗି ଅମାବାସ୍ୟା",
                odiaDate: "୨୪/୦୭/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 37,
                name: "Shree Mandira re Badi Nursingha Bije",
                date: "03/08/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବାଡି ନୃସିଂହ ବିଜେ",
                odiaDate: "୦୩/୦୮/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 38,
                name: "Shree Mandira re Jhulana Yatra Arambha",
                date: "04/08/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଝୁଲଣ ଯାତ୍ରା ଆରମ୍ଭ",
                odiaDate: "୦୪/୦୮/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 39,
                name: "Shree Mandira re Putrada Ekadashi",
                date: "05/08/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପୁତ୍ରଦା ଏକାଦଶୀ",
                odiaDate: "୦୫/୦୮/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 40,
                name: "Shree Mandira re Balabhadra Janma & Rakhilagi",
                date: "09/08/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବଳଭଦ୍ର ଜନ୍ମ ଓ ରାକ୍ଷୀଲାଗି",
                odiaDate: "୦୯/୦୮/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 41,
                name: "Shree Mandira re Jhulana Yatra Sesha",
                date: "10/08/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଝୁଲଣ ଯାତ୍ରା ଶେଷ",
                odiaDate: "୧୦/୦୮/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 42,
                name: "Shree Mandira re Rahurekha Lagi",
                date: "13/08/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରାହୁରେଖା ଲାଗି",
                odiaDate: "୧୩/୦୮/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 43,
                name: "Shree Mandira re Garbhaudaka Bandapana(Jeuta Bhoga)",
                date: "14/08/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଗର୍ଭଉଦକ ବନ୍ଦାପନା(ଜେଉଟ ଲାଗି)",
                odiaDate: "୧୪/୦୮/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 44,
                name: "Shree Mandira re Janmastami",
                date: "15/08/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଜନ୍ମାଷ୍ଟମୀ",
                odiaDate: "୧୫/୦୮/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 45,
                name: "Shree Mandira re Nandoutsaba",
                date: "16/08/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ନନ୍ଦୋଉତ୍ସବ",
                odiaDate: "୧୬/୦୮/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 46,
                name: "Shree Mandira re Banabhoji Besha, Kolibika & Bakasurabadha Prasatab & Arghasurabadha Prastab",
                date: "18/08/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବଣଭୋଜିବେଶ, କୋଳିବିକା ଓ ବକସୁରବଧ ପ୍ରସ୍ତାବ ଓ ଅରଘାସୁରବଧ ପ୍ରସ୍ତାବ",
                odiaDate: "୧୮/୦୮/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 47,
                name: "Shree Mandira re Kaliyadalan Ekadashi, Kaliyadalan Besha & Dhenukasura Badha Prastab",
                date: "19/08/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କାଳୀୟଦଳନ ଏକାଦଶୀ, କାଳୀୟଦଳନ ବେଶ ଓ ଧେନୁକାସୁର ବଧ ପ୍ରସ୍ତାବ",
                odiaDate: "୧୯/୦୮/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 48,
                name: "Shree Mandira re Pralambasura Badha Besha",
                date: "20/08/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପ୍ରଳମ୍ବାସୁର ବଧ ବେଶ",
                odiaDate: "୨୦/୦୮/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 49,
                name: "Shree Mandira re Krushnabalarama Besha, Arnnapratha Prastab",
                date: "21/08/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କୃଷ୍ଣବଳରାମ ବେଶ, ଅର୍ଣ୍ଣପ୍ରଥା ପ୍ରସ୍ତାବ",
                odiaDate: "୨୧/୦୮/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 50,
                name: "Shree Mandira re Satapuri Tada Bije",
                date: "22/08/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସାତପୁରୀ ତାଡ ବିଜେ",
                odiaDate: "୨୨/୦୮/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 51,
                name: "Shree Mandira re Satapuri Amavasya & Bastraharana Lila",
                date: "23/08/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସାତପୁରୀ ଅମାବାସ୍ୟା ଓ ବସ୍ତ୍ରହରଣ ଲୀଳା",
                odiaDate: "୨୩/୦୮/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 52,
                name: "Shree Mandira re Dabagni Lila",
                date: "24/08/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦାବାଗନ୍ନି ଲୀଳା",
                odiaDate: "୨୪/୦୮/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 53,
                name: "Shree Mandira re Nikunjalila",
                date: "25/08/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ନିକୁଞ୍ଜଲୀଳା",
                odiaDate: "୨୫/୦୮/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 54,
                name: "Shree Mandira re Andhalila Prastab & Balitrutiya",
                date: "26/08/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନ୍ଧଲୀଳା ପ୍ରସ୍ତାବ ଓ ବାଲିତୃତୀୟା",
                odiaDate: "୨୬/୦୮/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 55,
                name: "Shree Mandira re Shree Ganesha Chaturthi",
                date: "27/08/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀଗଣେଶ ଚାତୁର୍ଥୀ",
                odiaDate: "୨୭/୦୮/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 56,
                name: "Shree Mandira re Rushipanchami & Dahalila",
                date: "28/08/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଋଷିପଞ୍ଚମୀ ଓ ଦାହଲୀଳା",
                odiaDate: "୨୮/୦୮/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 57,
                name: "Shree Mandira re Bimbasura Badha Prastab",
                date: "29/08/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବିମ୍ବାସୁର ବଧ ପ୍ରସ୍ତାବ",
                odiaDate: "୨୯/୦୮/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 58,
                name: "Shree Mandira re Lalita Saptami, Kekesi Badha Lila & Kukutibrata",
                date: "30/08/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଲଳିତା ସପ୍ତମୀ, କେକେଶି ବଧ ଲୀଳା ଓ କୁକୁଟୀବ୍ରତ",
                odiaDate: "୩୦/୦୮/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 59,
                name: "Shree Mandira re Radhastami, Shree Sudarsan Debanka Ashram Bije, Durga Sayan",
                date: "31/08/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରାଧାଷ୍ଟମୀ, ଶ୍ରୀସୁଦର୍ଶନ ଦେବଙ୍କ ଆଶ୍ରମ ବିଜେ, ଦୁର୍ଗାଶୟନ",
                odiaDate: "୩୧/୦୮/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 60,
                name: "Shree Mandira re Kansa badha Prastab, Labanikhia & Mathurahat Jur",
                date: "02/09/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କଂସବଧ ପ୍ରସ୍ତାବ, ଲବଣୀଖିଆ ଏବଂ ମଥୁରାହାଟ ଜୁର",
                odiaDate: "୦୨/୦୯/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 61,
                name: "Shree Mandira re Parshwa Paribarttan Ekadashi",
                date: "03/09/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପାର୍ଶ୍ଵ ପରିବର୍ତ୍ତନ ଏକାଦଶୀ",
                odiaDate: "୦୩/୦୯/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 62,
                name: "Shree Mandira re Baman Janma & Suniaan, Indradhwaja Pooja & Garuda Parshwa Paribarttan",
                date: "04/09/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବାମନ ଜନ୍ମ ଓ ସୁନିଆଁ, ଇନ୍ଦ୍ରଧ୍ଵଜା ଓ ଗରୁଡ ପାର୍ଶ୍ଵ ପରିବର୍ତ୍ତନ",
                odiaDate: "୦୪/୦୯/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 63,
                name: "Shree Mandira re Balibamana besha",
                date: "05/09/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବଳିବାମନ ବେଶ",
                odiaDate: "୦୫/୦୯/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 64,
                name: "Shree Mandira re Ananta Brat",
                date: "06/09/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅନନ୍ତ ବ୍ରତ",
                odiaDate: "୦୬/୦୯/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 65,
                name: "Shree Mandira re Indra Gobinda Bandapana, Indrahati Prastab",
                date: "07/09/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଇନ୍ଦ୍ର ଗୋବିନ୍ଦ ବନ୍ଦାପନା, ଇନ୍ଦ୍ରହାତୀ ପ୍ରସ୍ତାବ",
                odiaDate: "୦୭/୦୯/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 66,
                name: "Shree Mandira re Sahasrakumbhabhiseka, Debi Utthapana, Sodashadinamtaka Puja Arambha",
                date: "14/09/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସହସ୍ରାକୁମ୍ଭାଭିଷେକ, ଦେବୀ ଉତ୍ଥାପନ, ଷୋଡଶଦିନାମତକ ପୂଜା ଆରମ୍ଭ",
                odiaDate: "୧୪/୦୯/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 67,
                name: "Shree Mandira re Indira Ekadashi",
                date: "17/09/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଇନ୍ଦିରା ଏକାଦଶୀ",
                odiaDate: "୧୭/୦୯/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 68,
                name: "Shree Mandira re Mahalaya Amavasya & Sagar Bije",
                date: "21/09/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ମହାଳୟା ଅମାବାସ୍ୟା ଓ ସାଗର ବିଜେ",
                odiaDate: "୨୧/୦୯/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 69,
                name: "Shree Mandira re Durgamadhabanka Bahar Bije",
                date: "22/09/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦୁର୍ଗାମଧବଙ୍କ ବାହାର ବିଜେ",
                odiaDate: "୨୨/୦୯/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 70,
                name: "Shree Mandira re Mahasaptami",
                date: "28/09/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ମହାସପ୍ତମୀ",
                odiaDate: "୨୮/୦୯/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 71,
                name: "Shree Mandira re Mahastami",
                date: "29/09/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ମହାଷ୍ଟମୀ",
                odiaDate: "୨୯/୦୯/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 72,
                name: "Shree Mandira re Mahanabami",
                date: "30/09/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ମହାନବମୀ",
                odiaDate: "୩୦/୦୯/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 73,
                name: "Shree Mandira re Dussehra & Ayudha Puja, Sudasha Brata",
                date: "02/10/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦଶହରା ଓ ଆୟୁଧ ପୂଜା, ସୁଦଶା ବ୍ରତ",
                odiaDate: "୦୨/୧୦/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 74,
                name: "Shreejio nkara Radhadamodara Besha & Baladhupa Arambha",
                date: "03/10/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀ ଜୀଉଙ୍କ ରାଧଦାମୋଦର ବେଶ ଓ ବାଳଧୂପ ଆରମ୍ଭ",
                odiaDate: "୦୩/୧୦/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 75,
                name: "Shree Mandira re Kumar Purnima, Shree Sudarsan Deba nka Ashram Bije",
                date: "07/10/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍କୁମାର ପୂର୍ଣିମା, ଶ୍ରୀସୁଦର୍ଶନ ଦେବଙ୍କ ଆଶ୍ରମ ବିଜେ",
                odiaDate: "୦୭/୧୦/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 76,
                name: "Shree Mandira re Rama Ekadashi & Garbhana Sankranti",
                date: "17/10/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରମା ଏକାଦଶୀ ଓ ଗର୍ଭଣା ସଂକ୍ରାନ୍ତି",
                odiaDate: "୧୭/୧୦/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 77,
                name: "Shree Mandira re Amavasya & Sagarbije",
                date: "21/10/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅମାବାସ୍ୟା ଓ ସାଗର ବିଜେ",
                odiaDate: "୨୧/୧୦/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 78,
                name: "Shree Mandira re Anala Nabami",
                date: "31/10/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଅଁଳାନବମୀ",
                odiaDate: "୩୧/୧୦/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 79,
                name: "Shree Mandira re Laxminarayana Besha & Hari Utthapana Niti",
                date: "02/11/2025",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଲକ୍ଷ୍ମୀନାରାୟଣୀ ବେଶ ଓ ହରି ଉତ୍ଥାପନ ନୀତି",
                odiaDate: "୦୨/୧୧/୨୦୨୫",
                odiaDay: "ରବିବାର",
            },
            {
                id: 80,
                name: "Shree Mandira re Shree Jeu nka Dalakia Or Tribikrama Besha – Garuda Utthapana",
                date: "03/11/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀଜୀଉଙ୍କ ଡାଳକିଆ ବା ତ୍ରିବିକ୍ରମ ବେଶ – ଗରୁଡ ଉତ୍ଥାପନ",
                odiaDate: "୦୩/୧୧/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 81,
                name: "Shree Mandira re Shree Jeu nka Laxmi Nrusingha Besha",
                date: "04/11/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀଜୀଉଙ୍କ ଲକ୍ଷ୍ମୀ ନୃସିଂହ ବେଶ",
                odiaDate: "୦୪/୧୧/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 82,
                name: "Shree Mandira re Karttika Purnima & Shree Jeu nka Rajadhiraja Besha",
                date: "05/11/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କାର୍ତ୍ତିକ ପୂର୍ଣ୍ଣିମା ଓ ଶ୍ରୀଜୀଉଙ୍କ ରାଜାଧିରାଜ ବେଶ",
                odiaDate: "୦୫/୧୧/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 83,
                name: "Shree Mandira re Prathamistami",
                date: "12/11/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପ୍ରଥମାଷ୍ଟମୀ",
                odiaDate: "୧୨/୧୧/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 84,
                name: "Shree Mandira re Uthhapana Ekadashi",
                date: "15/11/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଉତ୍ପନା ଏକାଦଶୀ",
                odiaDate: "୧୫/୧୧/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 85,
                name: "Shree Mandira re Deba Deepabali Arambha",
                date: "19/11/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦେବ ଦୀପାବଳୀ ଆରମ୍ଭ",
                odiaDate: "୧୯/୧୧/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 86,
                name: "Shree Mandira re Deba Deepabali(Madhya) & Amavasya",
                date: "20/11/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦେବ ଦୀପାବଳୀ (ମଧ୍ୟ) ଓ ଅମାବାସ୍ୟା",
                odiaDate: "୨୦/୧୧/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 87,
                name: "Shree Mandira re Deba Deepabali Sesha",
                date: "21/11/2025",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶେଷ ଦେବ ଦୀପାବଳୀ",
                odiaDate: "୨୧/୧୧/୨୦୨୫",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 88,
                name: "Shree Mandira re Prabrana Or Odhani Sasthi",
                date: "26/11/2025",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପ୍ରାବରଣ ବା ଓଢଣୀ ଷଷ୍ଠୀ",
                odiaDate: "୨୬/୧୧/୨୦୨୫",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 89,
                name: "Shree Mandira re Gomati Ekadashi",
                date: "01/12/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଗୋମତୀ ଏକାଦଶୀ",
                odiaDate: "୦୧/୧୨/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 90,
                name: "Shree Mandira re Pandu Nrusingha Bije",
                date: "04/12/2025",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପଣ୍ଡୁ ନୃସିଂହ ବିଜେ",
                odiaDate: "୦୪/୧୨/୨୦୨୫",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 91,
                name: "Shree Mandira re Saphala Ekadashi",
                date: "15/12/2025",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସଫଳା ଏକାଦଶୀ",
                odiaDate: "୧୫/୧୨/୨୦୨୫",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 92,
                name: "Shree Mandira re Dhanu Sankranti & Pahali Bhoga Arambha",
                date: "16/12/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଧନୁ ସଂକ୍ରାନ୍ତି ଓ ପହିଲି ଭୋଗ ଆରମ୍ଭ",
                odiaDate: "୧୬/୧୨/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 93,
                name: "Shree Mandira re Bakula Amavasya & Sagar Bije",
                date: "20/12/2025",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବକୁଳ ଅମାବାସ୍ୟା ଓ ସାଗର ବିଜେ",
                odiaDate: "୨୦/୧୨/୨୦୨୫",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 94,
                name: "Shree Mandira re Sambha Dashami, Putrada Ekadashi",
                date: "30/12/2025",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶାମ୍ବ ଦଶମୀ, ପୁତ୍ରଦା ଏକାଦଶୀ",
                odiaDate: "୩୦/୧୨/୨୦୨୫",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 95,
                name: "Shree Mandira re Debabhiseka & Pushyabhiseka Purnima",
                date: "03/01/2026",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦେବାଭିଷେକ ଓ ପୁଷ୍ୟାଭିଷେକ ପୂର୍ଣ୍ଣିମା",
                odiaDate: "୦୩/୦୧/୨୦୨୬",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 96,
                name: "Shree Mandira re Dudha Melana",
                date: "12/01/2026",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦୁଧ ମେଲାଣ",
                odiaDate: "୧୨/୦୧/୨୦୨୬",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 97,
                name: "Shree Mandira re Nabanka Besha",
                date: "13/01/2026",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ନବାଙ୍କବେଶ",
                odiaDate: "୧୩/୦୧/୨୦୨୬",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 98,
                name: "Shree Mandira re Makar Sankranti & Satatila Ekadashi",
                date: "14/01/2026",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ମକର ସଂକ୍ରାନ୍ତି ଓ ଷଟ୍ ତିଳା ଏକାଦଶୀ",
                odiaDate: "୧୪/୦୧/୨୦୨୬",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 99,
                name: "Shree Mandira re Shree Jeu nka Padma Besha",
                date: "21/01/2026",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀଜୀଉଙ୍କ ପଦ୍ମ ବେଶ",
                odiaDate: "୨୧/୦୧/୨୦୨୬",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 100,
                name: "Shree Mandira re Basant Panchami & Rathakatha Anukula Puja",
                date: "23/01/2026",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବସନ୍ତ ପଞ୍ଚମୀ ଓ ରଥକାଠ ଅନୁକୂଳ ପୂଜା",
                odiaDate: "୨୩/୦୧/୨୦୨୬",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 101,
                name: "Shree Mandira re Bhoumi Ekadashi",
                date: "29/01/2026",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଭୌମୀ ଏକାଦଶୀ",
                odiaDate: "୨୯/୦୧/୨୦୨୬",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 102,
                name: "Shree Mandira re Shree Jeu nja Gaja Udhharan Besha",
                date: "01/02/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀଜୀଉଙ୍କ ଗଜ ଉଦ୍ଧାରଣ ବେଶ",
                odiaDate: "୦୧/୦୨/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 103,
                name: "Shree Mandira re Kumbha Sankranti & Pankouddhara Ekadashi",
                date: "13/02/2026",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କୁମ୍ଭ ସଂକ୍ରାନ୍ତି ଓ ପଙ୍କଉଦ୍ଧାର ଏକାଦଶୀ",
                odiaDate: "୧୩/୦୨/୨୦୨୬",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 104,
                name: "Mahasibaratri",
                date: "15/02/2026",
                day: 'Sunday',
                odiaName: "ମହାଶିବରାତ୍ରୀ",
                odiaDate: "୧୫/୦୨/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 105,
                name: "Shree Mandira re Shree Jeu nka Phagu Dashami, Chacheri Besha, Sudasha Brat & Dola Yatra Arambha",
                date: "26/02/2026",
                day: 'Thursday',
                odiaName: "",
                odiaDate: "ଶ୍ରୀଜୀଉଙ୍କ ଫଗୁ ଦଶମୀ – ଚାଚେରୀବେଶ, ସୁଦଶା ବ୍ରତ ଓ ଦୋଳଯାତ୍ରା ଆରମ୍ଭ",
                odiaDay: "୨୬/୦୨/୨୦୨୬",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 106,
                name: "Shree Mandira re Papanasini Ekadashi",
                date: "27/02/2026",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପାପନାଶିନୀ ଏକାଦଶୀ",
                odiaDate: "୨୭/୦୨/୨୦୨୬",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 107,
                name: "Shree Mandira re Rajagnyutsaba Or Mendhapodi",
                date: "02/03/2026",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରାଜଅଗ୍ନିଉତ୍ସବ  ବା ମେଣ୍ଢାପୋଡି",
                odiaDate: "୦୨/୦୩/୨୦୨୬",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 108,
                name: "Shree Mandira re Dola Purnima & Rajadhiraj Besha",
                date: "03/03/2026",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦୋଳ ପୂର୍ଣ୍ଣିମା ଓ ରାଜାଧିରାଜ ବେଶ",
                odiaDate: "୦୩/୦୩/୨୦୨୬",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 109,
                name: "Shree Mandira re Holi Utsab, Chandan Anukula",
                date: "04/03/2026",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ହୋଲି ଉତ୍ସବ, ଚନ୍ଦନ ଅନୁକୂଳ",
                odiaDate: "୦୪/୦୩/୨୦୨୬",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 110,
                name: "Shree Mandira re Pap Mochini Ekadashi & Mina Sankranti",
                date: "15/03/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ପାପ ମୋଚିନୀ ଏକାଦଶୀ ଓ ମୀନ ସଂକ୍ରାନ୍ତି",
                odiaDate: "୧୫/୦୩/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 111,
                name: "Shree Mandira re Badi Nrusingha Bije",
                date: "22/03/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ବାଡିନୃସିଂହ ବିଜେ",
                odiaDate: "୨୨/୦୩/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 112,
                name: "Shree Mandira re Jeuta Bhoga & Ashokastami",
                date: "26/03/2026",
                day: 'Thursday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଜେଉଟ ଭୋଗ ଓ ଅଶୋକାଷ୍ଟମୀ",
                odiaDate: "୨୬/୦୩/୨୦୨୬",
                odiaDay: "ଗୁରୁବାର",
            },
            {
                id: 113,
                name: "Shree Mandira re Shree Ramanabami",
                date: "27/03/2026",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଶ୍ରୀରାମନବମୀ",
                odiaDate: "୨୭/୦୩/୨୦୨୬",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 114,
                name: "Shree Mandira re Jangyarakhya",
                date: "28/03/2026",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଯଜ୍ଞରକ୍ଷା",
                odiaDate: "୨୮/୦୩/୨୦୨୬",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 115,
                name: "Shree Mandira re Sita Bibaha & Kamada Ekadashi",
                date: "29/03/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସୀତା ବିବାହ ଓ କାମଦା ଏକାଦଶୀ",
                odiaDate: "୨୯/୦୩/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 116,
                name: "Shree Mandira re Kandarp Adhibasa, Banabasa",
                date: "30/03/2026",
                day: 'Monday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ କନ୍ଦର୍ପ ଅଧିବାସ, ବନବାସ",
                odiaDate: "୩୦/୦୩/୨୦୨୬",
                odiaDay: "ସୋମବାର",
            },
            {
                id: 117,
                name: "Shree Mandira re Dayanachori & Ananga Troyadashi",
                date: "31/03/2026",
                day: 'Tuesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦୟଣାଚୋରି ଓ ଅନଙ୍ଗ ତ୍ରୟୋଦଶୀ",
                odiaDate: "୩୧/୦୩/୨୦୨୬",
                odiaDay: "ମଙ୍ଗଳବାର",
            },
            {
                id: 118,
                name: "Shree Mandira re Damanaka Chaturdashi, Dayana Bedha, Mayamruga & Sita Chori",
                date: "01/04/2026",
                day: 'Wednesday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଦମନକ ଚତୁର୍ଦ୍ଦଶୀ, ଦୟଣା ବେଢା, ମାୟାମୃଗ ଓ ସୀତା ଚୋରି",
                odiaDate: "୦୧/୦୪/୨୦୨୬",
                odiaDay: "ବୁଧବାର",
            },
            {
                id: 119,
                name: "Shree Mandira re Lanka Podi",
                date: "03/04/2026",
                day: 'Friday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ଲଙ୍କା ପୋଡି",
                odiaDate: "୦୩/୦୪/୨୦୨୬",
                odiaDay: "ଶୁକ୍ରବାର",
            },
            {
                id: 120,
                name: "Shree Mandira re Setu Bandha",
                date: "04/04/2026",
                day: 'Saturday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ସେତୁବନ୍ଧ",
                odiaDate: "୦୪/୦୪/୨୦୨୬",
                odiaDay: "ଶନିବାର",
            },
            {
                id: 121,
                name: "Shree Mandira re Rabana Badha",
                date: "05/04/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରାବଣ ବଧ",
                odiaDate: "୦୫/୦୪/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
            {
                id: 122,
                name: "Shree Mandira re Ramabhiseka",
                date: "12/04/2026",
                day: 'Sunday',
                odiaName: "ଶ୍ରୀମନ୍ଦିରରେ ରମାଭିଷେକ",
                odiaDate: "୧୨/୦୪/୨୦୨୬",
                odiaDay: "ରବିବାର",
            },
        ]

        const tbody = document.getElementById("festivalBody");
        const searchInput = document.getElementById("searchInput");

        // Helper: Convert DD/MM/YYYY to a Date object
        function parseDate(dateStr) {
            const [day, month, year] = dateStr.split("/").map(Number);
            return new Date(year, month - 1, day);
        }

        // Filter out past dates
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Normalize to midnight for accurate comparison

        const upcomingFestivals = festival.filter(item => {
            const festivalDate = parseDate(item.date);
            return festivalDate >= today; // Keep today's or future dates
        });

        function renderTable(data) {
            tbody.innerHTML = '';
            data.forEach(item => {
                const row = document.createElement("tr");
                row.className = "border-t";
                row.innerHTML = `
                <td class="py-3 px-4 text-sm">${language === 'Odia' ? item.odiaName : item.name}</td>
                <td class="py-3 px-4 text-sm">${language === 'Odia' ? item.odiaDate : item.date}</td>
                <td class="py-3 px-4 text-sm">${language === 'Odia' ? item.odiaDay : item.day}</td>
            `;
                tbody.appendChild(row);
            });
        }

        function filterFestival() {
            const keyword = searchInput.value.toLowerCase();
            const filtered = upcomingFestivals.filter(item => {
                const name = language === 'Odia' ? item.odiaName : item.name;
                return name.toLowerCase().includes(keyword);
            });
            renderTable(filtered);
        }

        // Initial load
        renderTable(upcomingFestivals);

        // Optional: connect search input
        searchInput.addEventListener("input", filterFestival);
    </script>
    @include('partials.website-footer')

</body>

</html>
