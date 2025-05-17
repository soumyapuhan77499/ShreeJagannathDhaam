@extends('website.web-layouts')

@section('content')
    @php
        $language = session('app_language', 'English');
    @endphp

    <section class="banner-sections">
        <!-- Video Banner -->
        @if ($latestWebVideo && $latestWebVideo->banner_video)
            <div class="banner-video">
                <video id="bannerVideo" autoplay loop playsinline muted preload="metadata"
                    poster="{{ asset('storage/' . $latestWebVideo->banner_image ?? 'website/d.png') }}">
                    <source src="{{ asset('website/banner.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @else
            <img src="{{ asset('website/d.png') }}" alt="Default Banner" style="width: 100%;">
        @endif

        <!-- Background Audio -->

        <audio id="backgroundAudio" preload="auto" loop muted>
            <source src="{{ asset('website/background.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>


        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('website/logo.png') }}" alt="logo">
        </a>
        <!-- Hamburger Icon -->
        <div class="hamburger-icon">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="nav-menu">
            <div class="nav-close"><i class="fa fa-times"></i></div>
            <ul>
                <li>
                    <a href="#">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a>
                </li>

                <!-- Quick Services -->
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ତ୍ଵରିତ ସେବା' : 'Quick Services' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/darshan-timeline') }}">{{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/maha-prasad') }}">{{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/view-festival-details') }}">{{ $language === 'Odia' ? 'ପର୍ବପର୍ବାଣୀ' : 'Festival' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/do-and-donts') }}">{{ $language === 'Odia' ? 'କରନ୍ତୁ ଏବଂ କରନ୍ତୁ ନାହିଁ' : "Do's & Don'ts" }}</a>
                        </li>
                    </ul>
                </li>

                <!-- Nearby Temples -->
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଧାର୍ମିକ ସ୍ଥଳ' : 'Nearby Temples' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenu">
                        @foreach ($temples as $temple)
                            <li>
                                <a href="{{ route('nearby-temple-view', $temple->name) }}">
                                    {{ $temple->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Conveniences -->
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenu">
                        <li><a
                                href="{{ url('/bhaktanibas-list') }}">{{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Nibas' }}</a>
                        </li>
                        <li><a href="{{ url('/parking-list') }}">{{ $language === 'Odia' ? 'ପାର୍କିଂ' : 'Parking' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/locker-shoe-list') }}">{{ $language === 'Odia' ? 'ଲକର ଓ ଜୋତା' : 'Locker & Shoe' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services/drinking_water') }}">{{ $language === 'Odia' ? 'ପାନୀୟ ଜଳ' : 'Drinking Water' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services-emergency') }}">{{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services-abled') }}">{{ $language === 'Odia' ? 'ବିଶେଷ ସକ୍ଷମ ବ୍ୟକ୍ତି' : 'Special Abled Person' }}</a>
                        </li>
                        <li><a href="#">{{ $language === 'Odia' ? 'ଯାତାୟାତ ମାର୍ଗ' : 'Route Map' }}</a></li>
                        <li><a
                                href="{{ url('/services/lost_and_found_booth') }}">{{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost & Found' }}</a>
                        </li>
                        <li><a href="{{ url('/services/toilet') }}">{{ $language === 'Odia' ? 'ଶୌଚାଳୟ' : 'Toilet' }}</a>
                        </li>
                        <li><a href="{{ url('/services/beach') }}">{{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services/life_guard_booth') }}">{{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life Guards' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services/life_guard_booth') }}">{{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life Guards' }}</a>
                        </li>
                        <li><a href="{{ url('/services/atm') }}">{{ $language === 'Odia' ? 'ଏ.ଟି.ଏମ୍' : 'ATM' }}</a></li>
                        <li><a
                                href="{{ url('/services/charging_station') }}">{{ $language === 'Odia' ? 'ଚାର୍ଜିଂ ସ୍ଟେସନ୍' : 'Charging Station' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/bus-railway-station') }}">{{ $language === 'Odia' ? 'ବସ୍/ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand/Railway Station' }}</a>
                        </li>
                        <li><a
                                href="{{ url('/services/petrol_pump') }}">{{ $language === 'Odia' ? 'ପେଟ୍ରୋଲ ପମ୍ପ' : 'Petrol Pump' }}</a>
                        </li>
                    </ul>
                </li>

                <!-- Language Switcher -->
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ଭାଷା' : 'Language' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/lang/Odia') }}">ଓଡ଼ିଆ</a></li>
                        <li><a href="{{ url('/lang/English') }}">English</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <button id="playPauseButton" class="play-pause-button"><i class="fa fa-pause"></i></button>

        <button id="audioMuteToggle" class="mute-toggle">
            <i style="height:18px;width: 18px" class="fa fa-volume-up"></i>
        </button>
    </section>

    <div class="niti-cards-scroll">
        <div class="niti-cards">
            @foreach ($nitis as $niti)
                <div class="niti-card {{ $loop->first ? 'active' : '' }}">
                    <div class="niti-content">
                        <h3 style="font-size: 21px; padding-bottom:5px;">
                            {{ $niti->display_name }}
                        </h3>

                        <p
                            style="padding-top: 5px; font-weight: bold;
                        color: {{ $niti->niti_status == 'Started' ? '#28a745' : '#333' }};">
                            @if ($language === 'Odia')
                                {{ $niti->niti_status === 'Started' ? 'ଆରମ୍ଭ ହୋଇଛି' : 'ଆଗାମୀ' }}
                            @else
                                {{ $niti->niti_status }}
                            @endif
                        </p>
                    </div>

                    <div class="niti-icons">

                        <p style="color: rgb(139, 137, 137)">
                            <ion-icon name="time-outline" style="margin: 6px; color: #ff0011; font-size: 16px;"></ion-icon>
                            @php
                                $startTime = optional($niti->todayStartTime)->start_time;
                            @endphp

                            @if ($niti->niti_status === 'Upcoming' || !$startTime)
                                {{ $language === 'Odia' ? 'ଆରମ୍ଭ ହୋଇନାହିଁ' : 'Not Started' }}
                            @else
                                @php
                                    $formattedTime = \Carbon\Carbon::parse($startTime)->format('h:i A');
                                @endphp

                                {{ $language === 'Odia' ? convertToOdiaTime($formattedTime) : $formattedTime }}
                            @endif
                        </p>

                        <p style="color: rgb(139, 137, 137)">
                            <ion-icon name="calendar-outline"
                                style="margin: 6px; color: #ff0011; font-size: 16px;"></ion-icon>
                            @php
                                $today = \Carbon\Carbon::now();
                            @endphp

                            {{ $language === 'Odia' ? convertToOdiaDate($today) : $today->format('jS M') }}
                        </p>

                    </div>
                </div>
            @endforeach

            <!-- View All Niti Card -->
            <div class="niti-card" id="niti-mobile">
                <div class="niti-content text-center">
                    <h3 style="font-size: 21px; padding-bottom: 5px;">
                        <a href="{{ route('all.niti') }}">
                            {{ $language === 'Odia' ? 'ସମସ୍ତ ନୀତି ଦେଖନ୍ତୁ' : 'View All Niti' }}
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- 
    <section class="shree-mandir-section  bg-gradient-to-br from-orange-50 via-yellow-50 to-pink-100">

        <div class="section-container">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham">
            <h2 class="section-titles">Shree Mandir <span class="live-badge"><i class="fa fa-bolt"
                        style="margin-right: 6px"></i>Live</span></h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham">
        </div>

        <div class="mandir-content">

            <div class="radio-card">
                <div class="card-content">
                    <a href="{{ route('radio.layout') }}">
                        <div class="card-icon">
                            <img src="{{ asset('website/radio.png') }}" style="height: 60px;width: 65px"
                                alt="Shree Jagannatha Dham">
                            <h3 style="color: #db4d30">Radio</h3>
                        </div>
                    </a>
                    <p class="paras">Listen to all the live broadcasts from Shree Mandira</p>
                    <p style="margin-top: 10px">🕒 12:00 pm</p>
                    <p style="margin-top: 10px">📅 4th Apr</p>
                </div>
                <div class="radio-player">
                    <div class="radio-header">Jay Jagannath</div>
                    <div class="radio-nav">
                        <span><i class="fa fa-compass"></i>
                            <p style="font-size: 10px">Explore</p>
                        </span>
                        <span><i class="fa fa-heart"></i>
                            <p style="font-size: 10px">Favorites</p>
                        </span>
                        <span class="active"><i class="fa fa-map"></i>
                            <p style="font-size: 10px">Browse</p>
                        </span>
                        <span><i class="fa fa-search"></i>
                            <p style="font-size: 10px">Search</p>
                        </span>
                        <span><i class="fa fa-bars"></i>
                            <p style="font-size: 10px">Settings</p>
                        </span>
                    </div>
                    <div class="radio-station">
                        <!-- Header with Title & Icons -->
                        <div class="radio-headers">
                            <h4>Bhajans Name</h4>
                            <div class="radio-icons">
                                <i style="color: #ff4e00" class="fas fa-heart"></i>
                                <i style="color: #ff4e00" class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>

                        <!-- Player Controls -->
                        <div class="radio-controls">
                            <div class="song">
                                <img src="{{ asset('website/12.png') }}" alt="Prev">
                                <img src="{{ asset('website/11.png') }}" alt="Play">
                                <img src="{{ asset('website/10.png') }}" alt="Next">
                            </div>
                            <div class="progress-bar">
                                <input type="range" min="0" max="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TV Section -->
            <div class="mandir-card">
                <div class="card-content">
                    <a href="{{ route('tv.layout') }}">
                        <div class="card-icon">
                            <img src="{{ asset('website/tv.png') }}" style="height: 60px;width: 65px"
                                alt="Shree Jagannatha Dham">
                            <h3 style="color: #db4d30">TV</h3>
                        </div>
                    </a>
                    <p class="para">Watch all the live broadcasts from Shree Mandira</p>
                    <p style="margin-top: 10px">🕒 12:00 pm</p>
                    <p style="margin-top: 10px">📅 4th Apr</p>
                </div>
                <a href="{{ route('tv.layout') }}">
                    <div class="video-container">
                        <img src="{{ asset('website/60.png') }}" style="height: 250px;width: 400px;border-radius: 10px"
                            alt="Shree Jagannatha Dham">
                    </div>
                </a>

            </div>

            <!-- Radio Section -->

        </div>
    </section> --}}

    {{-- <div class="max-w-6xl mx-auto text-center">

        <div class="flex justify-center items-center gap-5 mt-12">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
            <h2 class="text-2xl text-[#db4d30] flex items-center font-sans">
                Temple Information
            </h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
        </div>

        <!-- Navigation Tabs -->
        <div class="flex justify-center items-center gap-6 mt-5 mb-12">
            <div id="navContainer" class="flex gap-5 overflow-x-auto no-scrollbar">
                
                <div class="tab-item text-center min-w-[100px] cursor-pointer active-tab" data-tab="lordSupreme">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent duration-300">
                        <img src="{{ asset('website/temple_info/sup.png') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Lord Supreme</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="throughAges">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/age.png') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Through The Ages</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="tradition">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/tradition.png') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Living Tradition</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="festivals">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/festival.jpeg') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Festivals</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="ratha">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/ratha.png') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Ratha Yatra</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="services">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/devt.png') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Visitor Services</p>
                </div>
        
                <div class="tab-item text-center min-w-[100px] cursor-pointer inactive-tab" data-tab="management">
                    <div class="image-wrapper mx-auto w-20 h-20 p-1 rounded-full bg-transparent transition-all duration-300">
                        <img src="{{ asset('website/temple_info/management.jpg') }}" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <p class="text-gray-500 mt-3">Management</p>
                </div>
        
            </div>
        </div>
        
    </div>

    <section id="dynamicContent" class="bg-100">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Image -->
                <div id="contentImageContainer" class="mt-12" style="height: 350px; width: 450px;">
                    <img id="contentImage" src="{{ asset('website/temple_info/sup.png') }}" alt="Temple Image"
                        class="rounded-xl shadow-lg object-cover w-full h-full" />
                </div>

                <!-- Text Content -->
                <div style="margin-left: -100px">
                    <h2 id="contentTitle" class="text-xl font-semi-bold"></h2>
                    <p id="contentDescription" class="text-gray-500 mt-4 leading-relaxed"></p>

                    <!-- ✅ New: Button area -->
                    <div id="buttonContainer" class="mt-6 flex flex-wrap gap-3"></div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="services-section py-10">
        <!-- Section Title -->
        <div class="text-center mb-14">
             <div class="flex justify-center items-center gap-5 mt-12">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-3">
            <h2 class="text-xl text-[#db4d30] font-semibold">
              {{ $language === 'Odia' ? 'ତ୍ଵରିତ ସେବା' : 'Quick Services' }}
            </h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-3">
        </div>
        
        <!-- Services Layout -->
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start"
            style="max-width: 1290px !important;">

            <!-- Left Featured Card -->
            <div class="p-6 sm:p-8 flex flex-col justify-between transition-all duration-500 hover:scale-105 h-[455px] sm:h-[455px] max-h-[455px] overflow-hidden"
                style="border: 1px solid rgb(213, 213, 213); border-radius: 13px;">
                <a href="{{ route('darshan.timeline') }}" class="flex flex-col items-center text-center h-full">
                    <img src="{{ asset('website/darshan34.png') }}" alt="Darshan"
                        class="mb-2 transition-transform duration-300"
                        style="width: 200px; height: 230px; border-radius: 25px;">
                    <h3 class="text-xl sm:text-2xl font-bold text-[#db4d30] mb-2">
                        {{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}
                    </h3>
                    <div class="text-sm sm:text-base text-gray-700 mb-2 leading-relaxed px-1 line-clamp-5">
                        <p>
                            {{ $language === 'Odia'
                                ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ମହାପ୍ରଭୁଙ୍କ ଦର୍ଶନ ପ୍ରାୟ ପୂରା ଦିନ ଜଣ୍ୟ ଉପଲବ୍ଧ ଅଟେ । ସକାଳ ସମୟରୁ ରାତି ପର୍ଯ୍ୟନ୍ତ ଦର୍ଶନ ହୋଇଥାଏ, କିଛି ପର୍ବ ଅବସର ଛାଡି । ସାଧାରଣତଃ ମନ୍ଦିର ସକାଳ ୫:୩୦ ରେ ଖୋଲାଯାଏ ଏବଂ ଦର୍ଶନ ଆରମ୍ଭ ହୁଏ । ମଙ୍ଗଳ ଆରତି ପରେ ଭକ୍ତମାନେ ଜଗମୋହନ (ଭିତର କାଠା) ଯାଏଁ ପ୍ରବେଶ କରି ଦର୍ଶନ କରିପାରନ୍ତି ।'
                                : 'Darshan of Shree Jagannatha Mahaprabhu is available almost throughout the day i.e. from early in the morning till late night excepting some festive occasions. Generally, Temple opens and darshan starts at around 5.30 A.M. After offering of the perpetual lamp (Mangal Arati), devotees are allowed entry up to Jagamohan (Bhitara Kaatha) of the temple and darshan from this point is available till completion of “Besha”.' }}
                        </p>
                    </div>
                </a>
            </div>

            <!-- Right Side Cards -->
            <div class="flex flex-col gap-6 justify-between h-[450px]">
                <!-- Maha Prasad -->
                <a href="{{ route('prasad.timeline') }}"
                    class="bg-white border-l-4 border-[#db4d30] px-5 py-4 flex items-center gap-5 h-[150px] hover:translate-x-1 duration-300"
                    style="border: 1px solid rgb(213, 213, 213); border-radius: 13px;">
                    <img src="{{ asset('website/prasad.png') }}" alt="Maha Prasad" style="height: 70px; width:70px">
                    <div>
                        <h3 class="text-lg font-semibold text-[#db4d30]">
                            {{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {{ $language === 'Odia'
                                ? 'ପବିତ୍ର ମହାପ୍ରସାଦ ଉପଭୋଗ କରନ୍ତୁ ଯାହା ଠାରେ ଈଶ୍ୱରୀୟ ଅନୁଗ୍ରହ ଥାଏ ।'
                                : 'Savor the sacred offering blessed by the divine presence.' }}
                        </p>
                    </div>
                </a>

                <!-- Temple Festival -->
                <a href="{{ route('view.festival.details') }}"
                    class="bg-white border-l-4 border-[#db4d30] px-5 py-4 flex items-center gap-5 h-[150px] hover:translate-x-1 duration-300"
                    style="border: 1px solid rgb(213, 213, 213); border-radius: 13px;">
                    <img src="{{ asset('website/festival21.png') }}" alt="Offering" style="height: 70px; width:70px">
                    <div>
                        <h3 class="text-lg font-semibold text-[#db4d30]">
                            {{ $language === 'Odia' ? 'ପର୍ବପର୍ବାଣୀ' : 'Temple Festival' }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {{ $language === 'Odia'
                                ? 'ପ୍ରଭୁଙ୍କୁ ଶ୍ରଦ୍ଧା ଓ ଭକ୍ତି ସହିତ ନିଜ ଅର୍ପଣ କରନ୍ତୁ ।'
                                : 'Make your humble offerings to the Lord with ease and devotion.' }}
                        </p>
                    </div>
                </a>

                <!-- Do and Don'ts -->
                <a href="{{ url('do-and-donts') }}"
                    class="bg-white border-l-4 border-[#db4d30] px-5 py-4 flex items-center gap-5 h-[150px] hover:translate-x-1 duration-300"
                    style="border: 1px solid rgb(213, 213, 213); border-radius: 13px;">
                    <img src="{{ asset('website/dodonts.png') }}" alt="Do and Don'ts" style="height: 70px; width:70px">
                    <div>
                        <h3 class="text-lg font-semibold text-[#db4d30]">
                            {{ $language === 'Odia' ? 'କରନ୍ତୁ ଏବଂ କରନ୍ତୁ ନାହିଁ' : "Do's and Don'ts" }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {{ $language === 'Odia'
                                ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମର ପବିତ୍ରତା ଓ ପାରମ୍ପରିକତା ରକ୍ଷା କରିବା ପାଇଁ ।'
                                : 'To preserve the sanctity and traditions of Shree Jagannatha Dham.' }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="services-sections">
        <!-- Bhakta Nibas -->
        <a href="{{ route('bhaktanibas.list') }}" class="service-cards" style="text-decoration: none;">
            <div class="card-top">
                <div class="card-text">
                    <div class="card-title">
                        {{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Nibas' }}
                    </div>
                    <div class="card-desc">
                        {{ $language === 'Odia' ? 'ତୀର୍ଥଯାତ୍ରୀମାନଙ୍କ ପାଇଁ ମନ୍ଦିର ପାଖରେ ରହିବା ସ୍ଥାନ' : 'Temple owned properties for pilgrim stay' }}
                    </div>
                </div>
                <div class="arrow-icon" style="font-size: 25px;">
                    <i class="fa-solid fa-arrow-right" style="color: #e9372b;"></i>
                </div>
            </div>
            <div class="card-bottom">
                <div class="card-icons">
                    <img src="{{ asset('website/niwas.png') }}" alt="Bhakta Nibas" style="height: 40px; width: 40px;">
                </div>
                <div class="footer-bar bar-orange"></div>
            </div>
        </a>

        <!-- Parking Areas -->
        <a href="{{ route('parking.list') }}" class="service-cards" style="text-decoration: none;">
            <div class="card-top">
                <div class="card-text">
                    <div class="card-title">
                        {{ $language === 'Odia' ? 'ପାର୍କିଂ ସ୍ଥଳ' : 'Parking Areas' }}
                    </div>
                    <div class="card-desc">
                        {{ $language === 'Odia' ? '୨, ୩, ୪ ଚକା ବାହନ' : '2, 3, 4 Wheelers' }}
                    </div>
                </div>
                <div class="arrow-icon" style="font-size: 25px;">
                    <i class="fa-solid fa-arrow-right" style="color: #e9372b;"></i>
                </div>
            </div>
            <div class="card-bottom">
                <div
                    style="margin-right:5%; height: 50px; width: 50px; margin-bottom: 25px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('website/park.png') }}" alt="Parking" style="height: 40px; width: 40px;">
                </div>
                <div class="footer-bar bar-red"></div>
            </div>
        </a>

        <!-- Locker & Shoes -->
        <a href="{{ route('lockershoe.list') }}" class="service-cards" style="text-decoration: none;">
            <div class="card-top">
                <div class="card-text">
                    <div class="card-title">
                        {{ $language === 'Odia' ? 'ଲକର ଓ ଜୋତା ସ୍ଥାନ' : 'Locker & Shoes Stands' }}
                    </div>
                    <div class="card-desc">
                        {{ $language === 'Odia' ? 'ଜୋତା, ମୋବାଇଲ ଫୋନ ଇତ୍ୟାଦି' : 'Shoes, Mobile Phones etc' }}
                    </div>
                </div>
                <div class="arrow-icon" style="font-size: 25px;">
                    <i class="fa-solid fa-arrow-right" style="color: #e9372b;"></i>
                </div>
            </div>
            <div class="card-bottom">
                <div class="card-icons">
                    <img src="{{ asset('website/lck.png') }}" alt="Locker" style="height: 40px; width: 40px;">
                </div>
                <div class="footer-bar bar-blue"></div>
            </div>
        </a>

        <!-- Online Donations -->
        <a href="{{ route('online.donation') }}" class="service-cards" style="text-decoration: none;">
            <div class="card-top">
                <div class="card-text">
                    <div class="card-title">
                        {{ $language === 'Odia' ? 'ଅନଲାଇନ୍ ଦାନ' : 'Online Donations' }}
                    </div>
                    <div class="card-desc" style="font-weight: 500;">
                        {{ $language === 'Odia' ? 'ଦାନ କରନ୍ତୁ' : 'Donate Now' }}
                    </div>
                </div>
                <div class="arrow-icon" style="font-size: 25px;">
                    <i class="fa-solid fa-arrow-right" style="color: #e9372b;"></i>
                </div>
            </div>
            <div class="card-bottom">
                <div class="card-icons">
                    <img src="{{ asset('website/donation.png') }}" alt="Donation" style="height: 40px; width: 40px;">
                </div>
                <div class="footer-bar bar-cyan"></div>
            </div>
        </a>

        <!-- Hundi Collection -->
        <a href="{{ route('hundi.collection') }}" class="service-cards" style="text-decoration: none;">
            <div class="card-top">
                <div class="card-text">
                    <div class="card-title">
                        {{ $language === 'Odia' ? 'ହୁଣ୍ଡି ସଂଗ୍ରହ' : 'Hundi Collection' }}
                    </div>
                    <div class="card-desc">
                        {{ $language === 'Odia' ? convertToOdiaDate(\Carbon\Carbon::today()) : \Carbon\Carbon::today()->format('jS M, Y') }}
                        <br>
                        <span style="color:#e75230; font-weight:600;">
                            ₹{{ number_format($hundi->rupees ?? 0, 2) }}/-
                        </span>
                    </div>
                </div>
                <div class="arrow-icon" style="font-size: 25px; margin-left: 20px;">
                    <i class="fa-solid fa-arrow-right" style="color: #e9372b;"></i>
                </div>
            </div>
            <div class="card-bottom">
                <div class="card-icons">
                    <img src="{{ asset('website/hundic.png') }}" alt="Hundi" style="height: 40px; width: 40px;">
                </div>
                <div class="footer-bar bar-green"></div>
            </div>
        </a>
    </section>

    <section class="temple-slider bg-white  bg-gradient-to-br from-orange-50 via-yellow-50 to-pink-100">

        <div class="flex justify-center items-center gap-5 mt-12">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
            <h2 class="text-xl text-[#db4d30] font-semibold">
                {{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଧାର୍ମିକ ସ୍ଥଳ' : 'Nearby Temples' }}
            </h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
        </div>

        <div class="swiper mySwiper mt-12">
            <div class="swiper-wrapper">
                @foreach ($nearbyTemples as $temple)
                    @php
                        $photos = json_decode($temple->photo, true);
                        $firstPhoto = isset($photos[0]) ? $photos[0] : null;
                    @endphp

                    @if ($firstPhoto)
                        <div class="swiper-slide rounded-xl overflow-hidden shadow-lg bg-white">
                            <a href="{{ url('view-near-by-temple/' . $temple->name) }}" class="block">
                                <img src="{{ asset($firstPhoto) }}" alt="{{ $temple->name }}"
                                    class="w-full h-48 object-cover hover:scale-105 transition duration-300">
                                <div class="p-2 text-center bg-white">
                                    <h3 class="text-sm sm:text-base font-semibold text-[#db4d30]">
                                        {{ $temple->name }}
                                    </h3>
                                </div>

                            </a>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next text-orange-500"></div>
            <div class="swiper-button-prev text-orange-500"></div>
        </div>
    </section>

    <section class="temple-convenience">
        <!-- Section Header -->
        
         <div class="text-center mb-14">
             <div class="flex justify-center items-center gap-5 mt-12">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-3">
            <h2 class="text-xl text-[#db4d30] font-semibold">
              {{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}
            </h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-3">
        </div>

        <!-- First Row: 6 Items -->
        <div class="convenience-container" style="margin-top: 50px;">

            <!-- Special Abled -->
            <div class="conv">
                <a href="{{ route('services.abled_person') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/physical21.png') }}" alt="Special Abled">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ବିଶେଷ ସକ୍ଷମ ବ୍ୟକ୍ତି' : 'Special Abled Person' }}</p>
                </a>
            </div>

            <!-- Emergency -->
            <div class="conv">
                <a href="{{ route('services.emergency') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/ph.png') }}" alt="Emergency">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency' }}</p>
                </a>
            </div>

            <!-- Life Guards -->
            <div class="conv">
                <a href="{{ route('services.byType', 'life_guard_booth') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/guard.png') }}" alt="Life Guards">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life Guards' }}</p>
                </a>
            </div>

            <!-- Lost & Found -->
            <div class="conv">
                <a href="{{ route('lostAndFound') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/lost.png') }}" alt="Lost and Found">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost & Found' }}</p>
                </a>
            </div>


            <!-- Drinking Water -->
            <div class="conv">
                <a href="{{ route('services.byType', 'drinking_water') }}">
                    <div class="convenience-item" style="margin-left: 7px">
                        <img src="{{ asset('website/drinkingWater32.png') }}" alt="Water" style="height: 42px">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ପାନୀୟ ଜଳ' : 'Drinking Water' }}</p>
                </a>
            </div>


            <!-- Toilet -->
            <div class="conv">
                <a href="{{ route('services.byType', 'toilet') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/latin.png') }}" alt="Toilet">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଶୌଚାଳୟ' : 'Toilet' }}</p>
                </a>
            </div>
        </div>

        <!-- Second Row: Next 6 Items -->
        <div class="convenience-container mt-6">

            <!-- Beach -->
            <div class="conv">
                <a href="{{ route('services.byType', 'beach') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/sea.png') }}" alt="Beach">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}</p>
                </a>
            </div>

            <!-- ATM -->
            <div class="conv">
                <a href="{{ route('services.byType', 'atm') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/atm.png') }}" alt="ATM">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଏଟିଏମ୍' : 'ATM' }}</p>
                </a>
            </div>

            <!-- Route Map -->
            <div class="conv">
                <a href="https://www.google.co.in/maps/place/Shree+Jagannath+ji+Temple+,puri/@19.8051108,85.8158809,780m/data=!3m1!1e3!4m10!1m2!2m1!1spuri+jagannath+temple!3m6!1s0x3a19c50013561771:0xad4b4235186a4124!8m2!3d19.804741!4d85.81789!15sChVwdXJpIGphZ2FubmF0aCB0ZW1wbGVaFyIVcHVyaSBqYWdhbm5hdGggdGVtcGxlkgEMaGluZHVfdGVtcGxlmgEjQ2haRFNVaE5NRzluUzBWS04xcGZkWFpTTkRkeVNWZEJFQUWqAT4QATIfEAEiG3wu8pyG9H18GTedswS-EibRIw6yUk1mse1cVzIZEAIiFXB1cmkgamFnYW5uYXRoIHRlbXBsZeABAPoBBAgAED8!16s%2Fg%2F11y89cqz51?entry=ttu&g_ep=EgoyMDI1MDUxMy4xIKXMDSoASAFQAw%3D%3D"
                    target="_blank">
                    <div class="convenience-item">
                        <img src="{{ asset('website/map.png') }}" alt="Route Map">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଯାତାୟାତ ମାର୍ଗ' : 'Route Map' }}</p>
                </a>
            </div>


            <!-- Petrol Pump -->
            <div class="conv">
                <a href="{{ route('services.byType', 'petrol_pump') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/petrolPump21.png') }}" alt="Petrol Pump">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ପେଟ୍ରୋଲ ପମ୍ପ' : 'Petrol Pump' }}</p>
                </a>
            </div>

            <!-- Railway Station -->
            <div class="conv">
                <a href="{{ route('busAndRailaway') }}" class="flex flex-col items-center text-center">
                    <div class="convenience-item">
                        <img src="{{ asset('website/busRaily.png') }}"
                            alt="{{ $language === 'Odia' ? 'ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand/Railway Station' }}">
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-800">
                        {{ $language === 'Odia' ? 'ବସ ଷ୍ଟାଣ୍ଡ/ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand/Railway Station' }}
                    </p>
                </a>
            </div>

            <!-- Charging Station -->
            <div class="conv">
                <a href="{{ route('services.byType', 'charging_station') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/charghingstation89.png') }}" alt="Charging Station">
                    </div>
                    <p>{{ $language === 'Odia' ? 'ଚାର୍ଜିଂ ସ୍ଟେସନ୍' : 'Charging Station' }}</p>
                </a>
            </div>

        </div>

    </section>

    {{-- <section class="bg-100 p-10  bg-gradient-to-br from-orange-50 via-yellow-50 to-pink-100">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 md:gap-0">
                <div class="image-panji flex items-center gap-2">
                    <p class="text-2xl text-[#db4d30] flex items-center font-sans">
                        Panji Calendar
                    </p>
                    <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-28 h-5">
                </div>
                <!-- Desktop-only: Events Header stays here on larger screens -->
                <div class="image-event flex items-center gap-2 hidden md:flex">
                    <p class="text-2xl text-[#db4d30] flex items-center font-sans">
                        Events
                    </p>
                    <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-28 h-5">
                </div>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Calendar Section -->
                <div class="bg-white p-6 rounded-xl border border-yellow-300">
                    <h3 class="text-md font-semibold text-red-500 mb-2">Select date</h3>
                    <div id="calendar"></div>

                    <!-- Today Occasion Header -->
                    <div class="flex justify-center items-center gap-5 mt-12">
                        <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-4">
                        <h2 class="text-md text-[#db4d30] font-bold font-sans tracking-wide uppercase">Today Occasion</h2>
                        <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-25 h-4">
                    </div>

                    <!-- Today Occasion List -->
                    <div class="mt-6 space-y-4 font-[Inter,sans-serif] text-sm md:text-base" id="panjiContent">
                        @if ($todayPanji)
                            <div class="flex items-start gap-3">
                                <i class="fas fa-calendar-day text-green-600 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">{{ $todayPanji->event_name ?? 'No Event' }}</p>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-star text-purple-600 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">Tithi: <span
                                        class="font-medium">{{ $todayPanji->tithi ?? '-' }}</span></p>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-smile text-yellow-500 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">Yoga: <span
                                        class="font-medium">{{ $todayPanji->yoga ?? '-' }}</span></p>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-adjust text-blue-600 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">Paksha: <span
                                        class="font-medium">{{ $todayPanji->pakshya ?? '-' }}</span></p>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-red-400 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">Sunrise: <span
                                        class="font-medium">{{ $todayPanji->sun_rise ?? '-' }}</span></p>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-moon text-indigo-600 mt-1 w-5 h-5"></i>
                                <p class="text-gray-800">Sunset: <span
                                        class="font-medium">{{ $todayPanji->sun_set ?? '-' }}</span></p>
                            </div>

                            @if ($todayPanji->description)
                                <hr class="border-dashed border-gray-300 my-4">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-info-circle text-gray-600 mt-1 w-5 h-5"></i>
                                    <p class="text-gray-800">{{ $todayPanji->description }}</p>
                                </div>
                            @endif
                        @else
                            <p class="text-center text-gray-500">No Panji Details Available for Today.</p>
                        @endif
                    </div>

                </div>
                <!-- Events Section -->
                <div class="bg-white p-6 rounded-xl border border-gray-300">
                    <div class="flex items-center gap-2 mb-4 md:hidden">
                        <p class="text-xl font-semibold text-[#db4d30] font-sans">
                            Events
                        </p>
                        <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-28 h-5">
                    </div>
                    <div id="events">
                        <img src="{{ asset('website/astami.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="bg-100 p-2 relative bg-gradient-to-br from-orange-50 via-yellow-50 to-pink-100">
        <div class="max-w-6xl mx-auto text-center relative">
            <!-- Tabs -->
            <div class="absolute top-14 right-0 flex space-x-3 p-3 rounded-lg">
                <button class="tab-buttons active-tabs" onclick="showContent('worldwide', this)">Worldwide</button>
                <button class="tab-buttons" onclick="showContent('india', this)">India</button>
                <button class="tab-buttons" onclick="showContent('odisha', this)">Odisha</button>
            </div>

            <!-- Title -->
            <div class="flex justify-center items-center gap-5 mt-12">
                <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
                <h2 class="text-2xl text-[#db4d30] flex items-center font-sans">Jagannatha Temples Worldwide</h2>
                <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-36 h-5">
            </div>

            <!-- Image -->
            <div class="dynamic-image mt-10 flex justify-center">
                <img id="dynamicImage" src="{{ asset('website/18.png') }}" alt="Jagannatha Temples Worldwide"
                    class="w-[600px] h-[800px] object-contain rounded-xl shadow-md" />
            </div>

        </div> --}}

    {{-- <div class="timeline-footer">
            © {{ date('Y') }} Temple Management System. All rights reserved. <a style="color: red"
                href="http://temple.mandirparikrama.com/puri-website/privacy-policy">privacy policy</a>
        </div> --}}
    {{-- </section> --}}

    @include('partials.website-footer')
@endsection
