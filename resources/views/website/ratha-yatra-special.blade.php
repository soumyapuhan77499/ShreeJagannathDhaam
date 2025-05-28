@extends('website.ratha-yatra-layouts')

@section('content')
    @php use Carbon\Carbon; @endphp

    <section class="banner-sections">
        <!-- Video Banner -->

        <img src="{{ asset('website/d.png') }}" alt="Default Banner" style="width: 100%;">

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

                <li>
                    <a href="{{ url('/view-all-niti') }}">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a>
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
            </ul>
        </nav>

        <div class="niti-cards-scroll">
            <div class="niti-cards">
                @foreach ($festivals as $festival)
                    @php
                        $isToday = $festival['date'] === $todayDate;
                    @endphp

                    <div class="niti-card-wrapper">
                        <div class="niti-card {{ $isToday ? 'active' : '' }}">
                            <div class="niti-content">
                                <h4 style="font-size: 21px; padding-bottom:5px;">{{ $festival['name'] }}</h4>
                                <p style="color: {{ $isToday ? '#28a745' : '#333' }};padding-top: 5px; font-weight: bold;">
                                    @if ($language === 'Odia')
                                        {{ $isToday ? 'ଆରମ୍ଭ ହୋଇଛି' : 'ଆଗାମୀ' }}
                                    @else
                                        {{ $isToday ? 'Started' : 'Upcoming' }}
                                    @endif
                                </p>
                            </div>
                            <div class="niti-icons">
                                <p>
                                    <ion-icon name="calendar-outline"></ion-icon>
                                    {{ $language === 'Odia' ? convertToOdiaDate($festival['date']) : $festival['day'] . ', ' . $festival['date'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


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
    </section>

    <section class="temple-convenience">
        <!-- Section Header -->
        <div class="section-header-row flex flex-row justify-center items-center gap-2 sm:gap-5 text-center mt-4 sm:mt-8"
            style="margin-left: -15px;">
            <img src="{{ asset('website/left.png') }}" alt="Shree Jagannatha Dham" class="w-24 sm:w-36 h-5">
            <h2 class="text-base sm:text-2xl text-[#db4d30] font-sans font-semibold whitespace-nowrap">
                {{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}
            </h2>
            <img src="{{ asset('website/right.png') }}" alt="Shree Jagannatha Dham" class="w-24 sm:w-36 h-5">
        </div>


        <!-- First Row: 6 Items -->
        <div class="convenience-container" style="margin-top: 50px;">

            <!-- Special Abled -->
            <div class="conv">
                <a href="{{ route('services.abled_person') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/physical21.png') }}" alt="Special Abled">
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-800">{!! $language === 'Odia' ? 'ବିଶେଷ <br>ସକ୍ଷମ ବ୍ୟକ୍ତି' : 'Special<br> Abled Person' !!}</p>
                </a>
            </div>

            <!-- Emergency -->
            <div class="conv">
                <a href="{{ route('services.emergency') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/ph.png') }}" alt="Emergency">
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-800">{!! $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ <br>ଯୋଗାଯୋଗ' : 'Emergency' !!}</p>
                </a>
            </div>

            <!-- Life Guards -->
            <div class="conv">
                <a href="{{ route('services.byType', 'life_guard_booth') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/guard.png') }}" alt="Life Guards">
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-800">{!! $language === 'Odia' ? 'ଲାଇଫ <br> ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life<br> Guards' !!}</p>
                </a>
            </div>

            <!-- Lost & Found -->
            <div class="conv">
                <a href="{{ route('lostAndFound') }}">
                    <div class="convenience-item">
                        <img src="{{ asset('website/lost.png') }}" alt="Lost and Found">
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-800">{!! $language === 'Odia' ? 'ହଜିବା ଓ<br> ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost &<br> Found' !!}</p>
                </a>
            </div>


            <!-- Drinking Water -->
            <div class="conv">
                <a href="{{ route('services.byType', 'drinking_water') }}">
                    <div class="convenience-item" style="margin-left: 7px">
                        <img src="{{ asset('website/drinkingWater32.png') }}" alt="Water" style="height: 42px">
                    </div>
                    <p>{!! $language === 'Odia' ? 'ପାନୀୟ <br> ଜଳ' : 'Drinking<br>Water' !!}</p>

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



    </section>

    @include('partials.website-footer')
@endsection
