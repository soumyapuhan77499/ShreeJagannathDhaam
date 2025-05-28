<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="BgNIPERZegT3azkv6tE-9XgKxVGq8AlrrR_pMbz0Gfo" />
    @yield('og-meta')
    <!--====== Title ======-->
    <title>@yield('pagename')</title>
    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/front/img/' . $bs->favicon) }}" type="image/png"> --}}
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/fonts/fontawesome/css/all.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/swiper-bundle.min.css') }}">
    <!-- Kreativ Icon -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/fonts/icomoon/style.css') }}">
    {{-- Toastr css  --}}
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/toastr.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/magnific-popup.min.css') }}">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/aos.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/nice-select.css') }}">
    <!-- Main Style CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- summernote Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/summernote-content.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/responsive.css') }}">
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400&display=swap" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/puri-dhams.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/ratha-yatra-niti.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/shree-mandir.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/service.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/temple-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/convience.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>

    <!-- Content -->
    @yield('content')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Jquery JS -->
    <script src="front-assets/frontend/js/jquery.min.js"></script>
    <script src="assets/front/js/plugin.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="front-assets/frontend/js/bootstrap.min.js"></script>
    <!-- Nice Select JS -->
    <script src="front-assets/frontend/js/jquery.nice-select.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="front-assets/frontend/js/jquery.magnific-popup.min.js"></script>
    <!-- Swiper Slider JS -->
    <script src="front-assets/frontend/js/swiper-bundle.min.js"></script>
    <!-- Lazysizes -->
    <script src="front-assets/frontend/js/lazysizes.min.js"></script>
    <!-- SVG loader -->
    <script src="front-assets/frontend/js/svg-loader.min.js"></script>
    <!-- AOS JS -->
    <script src="front-assets/frontend/js/aos.min.js"></script>
    <script src="front-assets/frontend/js/toastr.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        "use strict";
        var rtl = false; // Hardcoded for static version
    </script>

    <!-- Main script JS -->
    <script src="front-assets/frontend/js/script.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

   
    {{-- banner video --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const video = document.getElementById("bannerVideo");
            const audio = document.getElementById("backgroundAudio");
            const videoPlayPauseButton = document.getElementById("playPauseButton");
            const audioMuteToggle = document.getElementById("audioMuteToggle");
            const hamburger = document.querySelector(".hamburger-icon");
            const navMenu = document.querySelector(".nav-menu");
            const navClose = document.querySelector(".nav-close");

            let userPaused = false; // Track if user manually paused

            // === Autoplay audio after 1 second
            setTimeout(() => {
                audio.play().then(() => {
                    audio.muted = false;
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-up"></i>';
                }).catch(() => {
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-mute"></i>';
                    document.body.addEventListener("click", () => {
                        audio.muted = false;
                        audio.play().then(() => {
                            audioMuteToggle.innerHTML =
                                '<i class="fa fa-volume-up"></i>';
                        }).catch(() => {
                            audioMuteToggle.innerHTML =
                                '<i class="fa fa-volume-mute"></i>';
                        });
                    }, {
                        once: true
                    });
                });
            }, 1000);

            // === Play/Pause Toggle
            videoPlayPauseButton?.addEventListener("click", function() {
                if (video?.paused) {
                    video.play().catch(() => {});
                    audio.play().catch(() => {});
                    audio.muted = false;
                    this.innerHTML = '<i class="fa fa-pause"></i>';
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-up"></i>';
                    userPaused = false;
                } else {
                    video.pause();
                    audio.pause();
                    audio.muted = true;
                    this.innerHTML = '<i class="fa fa-play"></i>';
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-mute"></i>';
                    userPaused = true;
                }
            });

            // === Mute Toggle
            audioMuteToggle?.addEventListener("click", function() {
                if (!audio) return;
                audio.muted = !audio.muted;
                this.innerHTML = audio.muted ?
                    '<i class="fa fa-volume-mute"></i>' :
                    '<i class="fa fa-volume-up"></i>';
            });

            // === Scroll-Based Pause/Play
            function checkScroll() {
                if (!video || !audio) return;
                const rect = video.getBoundingClientRect();
                const inView = rect.top < window.innerHeight && rect.bottom > 0;

                if (inView && !userPaused) {
                    video.play().catch(() => {});
                    audio.play().catch(() => {});
                    audio.muted = false;
                    videoPlayPauseButton.innerHTML = '<i class="fa fa-pause"></i>';
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-up"></i>';
                } else if (!inView) {
                    video.pause();
                    audio.pause();
                    audio.muted = true;
                    videoPlayPauseButton.innerHTML = '<i class="fa fa-play"></i>';
                    audioMuteToggle.innerHTML = '<i class="fa fa-volume-mute"></i>';
                }
            }

            let scrollTimeout;
            window.addEventListener("scroll", () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(checkScroll, 100);
            });

            // === Mobile Nav Toggle
            hamburger?.addEventListener("click", function() {
                hamburger.classList.toggle("active");
                navMenu?.classList.toggle("active");
            });

            navClose?.addEventListener("click", function() {
                navMenu?.classList.remove("active");
                hamburger?.classList.remove("active");
            });
        });
    </script>
</body>

</html>
