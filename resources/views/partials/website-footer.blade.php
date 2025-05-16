@php
    $language = session('app_language', 'English');
@endphp

<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo-section">
            <img src="{{ asset('website/logo.png') }}" alt="logo" class="footer-logo" />
            <div class="footer-title">
                <h2>Shree</h2>
                <h2>Jagannatha</h2>
                <h2>Dham</h2>
            </div>
        </div>

        <div class="footer-links">
            <!-- Temple Info -->
            <div>
                <h3>{{ $language === 'Odia' ? 'ମନ୍ଦିର ସୂଚନା' : 'Temple Information' }}</h3>
                <ul>
                    <li><a href="{{ url('/online-donation') }}">{{ $language === 'Odia' ? 'ଅନଲାଇନ୍ ଦାନ' : 'Online Donation' }}</a></li>
                    <li><a href="{{ url('/hundi-collection') }}">{{ $language === 'Odia' ? 'ହୁଣ୍ଡି ସଂଗ୍ରହ' : 'Hundi Collection' }}</a></li>
                    <li><a href="{{ route('do-and-donts') }}">{{ $language === 'Odia' ? 'କରଣୀୟ ଓ ଅକରଣୀୟ' : "Do's and don'ts" }}</a></li>
                    <li><a href="https://shreejagannathadham.com/puri-website/privacy-policy">{{ $language === 'Odia' ? 'ଗୋପନୀୟତା ନୀତି' : 'Privacy Policy' }}</a></li>
                </ul>
            </div>

            <!-- Quick Services -->
            <div>
                <h3>{{ $language === 'Odia' ? 'ତ୍ଵରିତ ସେବା' : 'Quick Services' }}</h3>
                <ul>
                    <li><a href="{{ url('/view-all-niti') }}">{{ $language === 'Odia' ? 'ନୀତି' : 'Niti' }}</a></li>
                    <li><a href="{{ url('/darshan-timeline') }}">{{ $language === 'Odia' ? 'ଦର୍ଶନ' : 'Darshan' }}</a></li>
                    <li><a href="{{ url('/maha-prasad') }}">{{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ' : 'Mahaprasad' }}</a></li>
                    <li><a href="{{ url('/view-festival-details') }}">{{ $language === 'Odia' ? 'ମନ୍ଦିର ପର୍ବ' : 'Temple Festival' }}</a></li>
                </ul>
            </div>

            <!-- Conveniences -->
            <div>
                <h3>{{ $language === 'Odia' ? 'ଯାତ୍ରୀମାନଙ୍କ ଆବଶ୍ୟକତା' : 'Conveniences' }}</h3>
                <ul>
                    <li><a href="{{url('/bhaktanibas-list')}}">{{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Nibas' }}</a></li>
                    <li><a href="{{url('/parking-list')}}">{{ $language === 'Odia' ? 'ପାର୍କିଂ ସ୍ଥଳ' : 'Parking Areas' }}</a></li>
                    <li><a href="{{url('/locker-shoe-list')}}">{{ $language === 'Odia' ? 'ଲକର ଓ ଜୁତା ସ୍ଥାନ' : 'Locker and Shoes Stands' }}</a></li>
                    <li><a href="{{ url('/services/drinking_water') }}">{{ $language === 'Odia' ? 'ପାନୀୟ ଜଳ' : 'Drinking Water' }}</a></li>
                    <li><a href="{{ url('/services-emergency') }}">{{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency' }}</a></li>
                </ul>
            </div>

            <!-- Extra Convenience Links -->
            <div>
                <ul>
                    <li><a href="{{ url('/services-abled') }}">{{ $language === 'Odia' ? 'ବିଶେଷ ସକ୍ଷମ ବ୍ୟକ୍ତି' : 'Special Abled Person' }}</a></li>
                    <li><a href="{{ url('/services/lost_and_found_booth') }}">{{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost And Found' }}</a></li>
                    <li><a href="{{ url('/services/toilet') }}">{{ $language === 'Odia' ? 'ଶୌଚାଳୟ' : 'Toilet' }}</a></li>
                    <li><a href="{{ url('/services/beach') }}">{{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}</a></li>
                    <li><a href="{{ url('/services/life_guard_booth') }}">{{ $language === 'Odia' ? 'ଲାଇଫ ଗାର୍ଡଙ୍କ ଯୋଗାଯୋଗ' : 'Life Guards' }}</a></li>
                </ul>
            </div>
        </div>

        <!-- App Download -->
        <div class="footer-bottom">
            <div class="footer-bottom-container">
                <a href="https://play.google.com/store" target="_blank" class="app-button">
                    <img src="{{ asset('website/footer/google.webp') }}" alt="Google Play">
                </a>
                <a href="https://www.apple.com/app-store/" target="_blank" class="app-button">
                    <img src="{{ asset('website/footer/aaa.png') }}" alt="App Store">
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div style="height: 80px; width: 100%; background-color: #ffae35; display: flex; align-items: center; justify-content: center;">
    <div class="text-center text-sm text-black-400 mt-10 mb-6">
        © {{ date('Y') }} {{ $language === 'Odia' ? 'ମନ୍ଦିର ପରିଚାଳନା ପ୍ରଣାଳୀ। ସମସ୍ତ ସ୍ୱତ୍ୱ ଅଧିକାର ସଂରକ୍ଷିତ।' : 'Temple Management System. All rights reserved.' }}
    </div>
</div>

<script>
    function toggleMobileMenu(el) {
        const mobileNav = document.getElementById('mobileNav');
        const icon = document.getElementById('menuToggleIcon');

        // Toggle menu visibility
        mobileNav.classList.toggle('active');

        // Toggle icon type
        const isOpen = mobileNav.classList.contains('active');
        icon.setAttribute('name', isOpen ? 'close-outline' : 'menu-outline');
    }

    function closeMobileMenu() {
        const mobileNav = document.getElementById('mobileNav');
        const icon = document.getElementById('menuToggleIcon');

        mobileNav.classList.remove('active');
        icon.setAttribute('name', 'menu-outline');
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const submenuToggles = document.querySelectorAll('.submenu-toggle');

        submenuToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();

                const parent = this.closest('.has-submenu');
                const submenu = parent.querySelector('.submenu');

                if (!submenu) return;

                // Collapse all others (accordion behavior)
                document.querySelectorAll('.has-submenu').forEach(item => {
                    if (item !== parent) {
                        item.classList.remove('active');
                        const otherSub = item.querySelector('.submenu');
                        if (otherSub) otherSub.style.maxHeight = null;
                    }
                });

                // Toggle current submenu
                parent.classList.toggle('active');

                if (submenu.style.maxHeight) {
                    submenu.style.maxHeight = null;
                } else {
                    submenu.style.maxHeight = submenu.scrollHeight + "px";
                }
            });
        });

        // Mobile toggle functions
        window.toggleMobileMenu = function(icon) {
            const nav = document.getElementById('mobileNav');
            nav.classList.toggle('active');
            icon.classList.toggle('active');
        }

        window.closeMobileMenu = function() {
            document.getElementById('mobileNav').classList.remove('active');
            document.querySelector('.hamburger-icon').classList.remove('active');
        }
    });
</script>