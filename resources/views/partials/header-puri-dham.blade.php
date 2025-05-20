<!-- Ionicons for Hamburger -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <a href="#">
                <img src="{{ asset('website/logo.png') }}" alt="logo">
            </a>
        </div>

        <!-- Desktop Menu -->
      <nav class="nav-menu desktop-menu">
    <ul>
        <li><a href="{{url('/view-all-niti')}}">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a></li>

        <!-- Quick Services -->
        <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
                {{ $language === 'Odia' ? 'ତ୍ଵରିତ ସେବା' : 'Quick Services' }}
                <i class="fa fa-chevron-down ms-2"></i>
            </a>
            <div class="submenu">
                <div class="submenu-column">
                    <h4>{{ $language === 'Odia' ? 'ସେବା' : 'Services' }}</h4>
                    <a href="{{ url('/darshan-timeline') }}">{{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}</a>
                    <a href="{{ url('/maha-prasad') }}">{{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}</a>
                    <a href="{{ url('/view-festival-details') }}">{{ $language === 'Odia' ? 'ପର୍ବପର୍ବାଣୀ' : 'Festival' }}</a>
                    <a href="{{ url('/do-and-donts') }}">{{ $language === 'Odia' ? 'କରନ୍ତୁ ଏବଂ କରନ୍ତୁ ନାହିଁ' : "Do's & Don'ts" }}</a>
                </div>
            </div>
        </li>

        <!-- Nearby Temples -->
        <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
                {{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଧାର୍ମିକ ସ୍ଥଳ' : 'Nearby Temples' }}
                <i class="fa fa-chevron-down ms-2"></i>
            </a>
            <div class="submenu">
                <div class="submenu-column">
                    <h4>{{ $language === 'Odia' ? 'ମନ୍ଦିର' : 'Temples' }}</h4>
                    @forelse ($temples as $temple)
                        <a href="{{ route('nearby-temple-view', $temple->name) }}">{{ $temple->name }}</a>
                    @empty
                        <a href="#">{{ $language === 'Odia' ? 'ମନ୍ଦିର ମିଳିଲା ନାହିଁ' : 'No Temples Found' }}</a>
                    @endforelse
                </div>
            </div>
        </li>

        <!-- Conveniences -->
        <li class="has-submenu">
            <a href="javascript:void(0)" class="submenu-toggle">
                {{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}
                <i class="fa fa-chevron-down ms-2"></i>
            </a>
            <div class="submenu">
                <div class="submenu-column">
                    <h4>{{ $language === 'Odia' ? 'ବସ୍ତି ଓ ପାର୍କିଂ' : 'Stay & Parking' }}</h4>
                    <a href="{{ url('/bhaktanibas-list') }}">Bhakta Nibas</a>
                    <a href="{{ url('/parking-list') }}">Parking</a>
                    <a href="{{ url('/locker-shoe-list') }}">Locker & Shoe</a>
                    <a href="{{ url('/services/drinking_water') }}">Drinking Water</a>
                </div>

                <div class="submenu-column">
                    <h4>{{ $language === 'Odia' ? 'ସୁବିଧା' : 'Conveniences' }}</h4>
                    <a href="{{ url('/services-emergency') }}">Emergency</a>
                    <a href="{{ url('/services-abled') }}">Special Abled Person</a>
                    <a href="#">{{ $language === 'Odia' ? 'ମାର୍ଗ ମାନଚିତ୍ର' : 'Route Map' }}</a>
                    <a href="{{ url('/services/lost_and_found_booth') }}">Lost & Found</a>
                    <a href="{{ url('/services/toilet') }}">Toilet</a>
                    <a href="{{ url('/services/beach') }}">Beaches</a>
                </div>

                <div class="submenu-column">
                    <h4>{{ $language === 'Odia' ? 'ଅନ୍ୟାନ୍ୟ' : 'Others' }}</h4>
                    <a href="{{ url('/services/life_guard_booth') }}">Life Guards</a>
                    <a href="{{ url('/services/atm') }}">ATM</a>
                    <a href="{{ url('/services/charging_station') }}">Charging Station</a>
                    <a href="{{ url('/bus-railway-station') }}">Bus/Railway Station</a>
                    <a href="{{ url('/services/petrol_pump') }}">Petrol Pump</a>
                </div>
            </div>
        </li>
       
    </ul>
</nav>


        <!-- Hamburger Icon -->
        <div class="hamburger-icon" onclick="toggleMobileMenu(this)">
            <div class="hamburger-menu">
                <ion-icon name="menu-outline" style="height: 35px;width:45px"></ion-icon>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <nav class="nav-menu mobile-nav" id="mobileNav">
        <div class="nav-close" onclick="closeMobileMenu()"><i class="fa fa-times"></i></div>
        <ul>
                  <li><a href="{{url('/puri-dham')}}">{{ $language === 'Odia' ? 'ପ୍ରଧାନ ପୃଷ୍ଠା' : 'Home' }}</a></li>
            <li><a  href="{{url('/view-all-niti')}}">{{ $language === 'Odia' ? 'ନୀତି' : 'Nitis' }}</a></li>

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

            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    {{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଧାର୍ମିକ ସ୍ଥଳ' : 'Nearby Temples' }}
                    <i class="fa fa-chevron-down ms-2"></i>
                </a>
                <ul class="submenu">
                    @foreach ($temples as $temple)
                        <li><a href="{{ route('nearby-temple-view', $temple->name) }}">{{ $temple->name }}</a></li>
                    @endforeach
                </ul>
            </li>

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
</header>
