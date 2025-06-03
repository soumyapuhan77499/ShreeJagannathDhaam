<!-- Ionicons for Hamburger -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- HEADER -->
@php
    use App\Models\NearByTemple;
    $language = session('app_language', 'English');
    $temples = NearByTemple::where('language', $language)->get();
@endphp

<header class="header-area">
    <div class="header-content">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('website/logo.png') }}" alt="logo">
            </a>
        </div>

        <!-- Desktop Menu -->
        <nav class="nav-menu desktop-menu">
            <ul>
                <li><a href="{{ url('/') }}">{{ $language === 'Odia' ? 'ପ୍ରଧାନ ପୃଷ୍ଠା' : 'Home' }}</a></li>

                <li><a href="{{ url('/view-all-niti') }}">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a></li>

                <li><a href="{{ url('/darshan-timeline') }}">{{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}</a></li>

                <li><a href="{{ url('/maha-prasad') }}">{{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}</a></li>

                <li class="has-submenus">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ତ୍ଵରିତ ସେବା' : 'Quick Services' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>

                    <ul class="submenus" style="width: 200px !important;">
                        <div class="submenu-column">
                            <li>
                                <a href="{{ url('/view-festival-details') }}">
                                    <i class="fas fa-calendar-days me-2"></i>
                                    {{ $language === 'Odia' ? 'ପର୍ବପର୍ବାଣୀ' : 'Festival' }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/do-and-donts') }}">
                                    <i class="fas fa-check-circle me-1"></i><i class="fas fa-ban me-2"></i>
                                    {{ $language === 'Odia' ? 'କରନ୍ତୁ ଏବଂ କରନ୍ତୁ ନାହିଁ' : "Do's & Don'ts" }}
                                </a>
                            </li>
                        </div>
                    </ul>

                </li>

                <li class="has-submenus">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଧାର୍ମିକ ସ୍ଥଳ' : 'Nearby Temples' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <div class="submenus">
                        @forelse ($temples->chunk(4) as $chunk)
                            <div class="submenu-column">
                                @foreach ($chunk as $temple)
                                    <a href="{{ route('nearby-temple-view', $temple->name) }}">
                                        <i class="fas fa-place-of-worship me-2"
                                            style="margin-left: 10px"></i>{{ $temple->name }}
                                    </a>
                                @endforeach
                            </div>
                        @empty
                            <div class="submenu-column">
                                <a href="#">
                                    <i class="fa fa-exclamation-circle me-2"></i>
                                    {{ $language === 'Odia' ? 'ମନ୍ଦିର ମିଳିଲା ନାହିଁ' : 'No Temples Found' }}
                                </a>
                            </div>
                        @endforelse
                    </div>
                </li>

                <li class="has-submenus">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenus">

                        <div class="submenu-column">
                            <li><a href="{{ url('/bhaktanibas-list') }}"><i class="fa fa-bed me-2"></i>
                                    {{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Nibas' }}</a></li>
                            <li><a href="{{ url('/parking-list') }}"><i class="fa fa-car me-2"></i>
                                    {{ $language === 'Odia' ? 'ପାର୍କିଂ' : 'Parking' }}</a></li>
                            <li><a href="{{ url('/locker-shoe-list') }}"><i class="fa fa-shoe-prints me-2"></i>
                                    {{ $language === 'Odia' ? 'ଲକର ଓ ଜୋତା' : 'Locker & Shoe' }}</a></li>
                            <li><a href="{{ url('/services/drinking_water') }}"><i class="fa fa-tint me-2"></i>
                                    {{ $language === 'Odia' ? 'ପାନୀୟ ଜଳ' : 'Drinking Water' }}</a></li>
                        </div>

                        <div class="submenu-column">
                            <li><a href="{{ url('/services-emergency') }}"><i class="fa fa-ambulance me-2"></i>
                                    {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency' }}</a></li>
                            <li><a href="{{ url('/services-abled') }}"><i class="fa fa-wheelchair me-2"></i>
                                    {{ $language === 'Odia' ? 'ବିଶେଷ ସକ୍ଷମ ବ୍ୟକ୍ତି' : 'Special Abled Person' }}</a>
                            </li>
                            <li><a href="#"><i class="fa fa-map me-2"></i>
                                    {{ $language === 'Odia' ? 'ମାର୍ଗ ମାନଚିତ୍ର' : 'Route Map' }}</a></li>
                            <li><a href="{{ url('/services/lost_and_found_booth') }}"><i class="fa fa-search me-2"></i>
                                    {{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost & Found' }}</a></li>
                        </div>

                        <div class="submenu-column">
                            <li><a href="{{ url('/services/toilet') }}"><i class="fa fa-restroom me-2"></i>
                                    {{ $language === 'Odia' ? 'ଶୌଚାଳୟ' : 'Toilet' }}</a></li>
                            <li><a href="{{ url('/services/beach') }}"><i class="fa fa-umbrella-beach me-2"></i>
                                    {{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}</a></li>
                            <li><a href="{{ url('/services/life_guard_booth') }}"><i class="fa fa-life-ring me-2"></i>
                                    {{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life Guards' }}</a></li>
                            <li><a href="{{ url('/services/atm') }}"><i class="fa fa-credit-card me-2"></i>
                                    {{ $language === 'Odia' ? 'ଏ.ଟି.ଏମ୍' : 'ATM' }}</a></li>
                        </div>

                        <div class="submenu-column">
                            <li><a href="{{ url('/services/charging_station') }}"><i class="fa fa-bolt me-2"></i>
                                    {{ $language === 'Odia' ? 'ଚାର୍ଜିଂ ସ୍ଟେସନ୍' : 'Charging Station' }}</a></li>
                            <li><a href="{{ url('/bus-railway-station') }}"><i class="fa fa-bus me-2"></i>
                                    {{ $language === 'Odia' ? 'ବସ୍/ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand/Railway Station' }}</a>
                            </li>
                            <li><a href="{{ url('/services/petrol_pump') }}"><i class="fa fa-gas-pump me-2"></i>
                                    {{ $language === 'Odia' ? 'ପେଟ୍ରୋଲ ପମ୍ପ' : 'Petrol Pump' }}</a></li>
                        </div>
                    </ul>
                </li>

                <li class="has-submenus">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        {{ $language === 'Odia' ? 'ଭାଷା' : 'Language' }}
                        <i class="fa fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="submenus">
                        <li><a href="{{ url('/lang/Odia') }}">ଓଡ଼ିଆ</a></li>
                        <li><a href="{{ url('/lang/English') }}">English</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

         <div class="hamburger-icon"  onclick="toggleMobileMenu(this)">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    </div>

    <!-- Mobile Nav -->
    <nav class="nav-menu mobile-menu" id="mobileNav">
            <ul>
                <li><a href="{{ url('/') }}">{{ $language === 'Odia' ? 'ପ୍ରଧାନ ପୃଷ୍ଠା' : 'Home' }}</a></li>

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

                <li><a href="{{ url('/view-all-niti') }}">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a></li>

                <li><a href="{{ url('/darshan-timeline') }}">{{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}</a></li>

                <li><a href="{{ url('/maha-prasad') }}">{{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}</a></li>

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

                 <li>
                    <a href="{{ url('/rath-yatra-special') }}">{{ $language === 'Odia' ? 'ରଥ ଯାତ୍ରା' : 'Ratha Yatra' }}</a>
                </li>

            </ul>
        </nav>

</header>

<script>
function toggleMobileMenu(el) {
    el.classList.toggle('active');
    document.getElementById('mobileNav').classList.toggle('active');
}
</script>

