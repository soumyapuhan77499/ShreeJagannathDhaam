<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maha Prasad Timeline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .timeline {
            max-width: 1100px;
            margin: 60px auto;
            position: relative;
            padding: 0 20px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 6px;
            background: linear-gradient(to bottom, #db4d30, #f59e0b, #1d4ed8);
            transform: translateX(-50%);
            z-index: 0;
            border-radius: 3px;
        }

        .timeline-item {
            position: relative;
            width: 50%;
            padding: 30px 40px;
            box-sizing: border-box;
            z-index: 1;
        }

        .timeline-item.left {
            left: 0;
        }

        .timeline-item.right {
            left: 50%;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            top: 40px;
            width: 14px;
            height: 14px;
            background-color: #fff;
            border: 4px solid #db4d30;
            border-radius: 50%;
            z-index: 2;
            left: calc(100% - 0px);
            transform: translateX(-50%);
        }

        .timeline-item.right::after {
            left: 0;
            transform: translateX(-50%);
        }
        /* ================== CARD STYLING ================== */
        .card.timeline-content {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border: 1px solid rgb(213, 213, 213);
        }

        /* Image left */
        .darshan-img-wrapper {
            width: 70px;
            height: 70px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 18px;
        }

        .darshan-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Content right */
        .card-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* Badge styling */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background-color: #f5f5f5;
            color: #db4d30;
        }

       .badge{
            width: auto;
            max-width: 40%;
            white-space: nowrap;
        }
        .badge i {
            font-size: 14px;
        }

        .badge.Completed {
            background-color: #fef3ec;
            color: #db4d30;
        }

        .badge.Started {
            background-color: #fef3ec;
            color: #2e5b02;
        }

        .badge.Upcoming {
            background-color: #f5f5f5;
            color: #db4d30;
        }

        /* Title and times */
        .card-content h3,
        .card-content .prasad-name {
            font-size: 18px;
            font-weight: bold;
            color: #db4d30;
            margin: 0;
        }

        .card-content p {
            margin: 6px 0;
            font-size: 14px;
            color: #333;
        }

        .darshan-times {
            margin-top: 8px;
        }

        .darshan-times p {
            font-size: 14px;
            margin: 4px 0;
            color: #333;
        }

        .darshan-times i {
            width: 17px;
            display: inline-block;
            text-align: center;
            margin-right: 8px;
            font-size: 14px;
            color: #999;
        }

        .darshan-times p:hover i {
            transform: scale(1.2);
            filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.3));
        }

        /* ================== STATUS-BASED CARD COLORS ================== */

        .Completed .card {
            background: #fffaf3;
            border-left: 6px solid #db4d30;
            border: 1px solid rgb(213, 213, 213);
        }

        .Started .card {
            background: #db4d30;
            color: #ffae35;
            border-left: 6px solid #fff;
            border: 1px solid rgb(213, 213, 213);
        }

        .Started .card h3,
        .Started .prasad-name {
            color: #ffae35;
        }

        .Started .card p,
        .Started .darshan-times i {
            color: #fff;
        }

        .Upcoming .card {
            background: #ffffff;
            border-left: 6px solid #db4d30;
        }

        @media (max-width: 768px) {
            .timeline {
                padding: 0 10px;
                margin: 40px auto;
            }

            .timeline::before {
                left: 10px;
                width: 4px;
                transform: none;
            }

            .timeline-item,
            .timeline-item.right {
                width: 100%;
                left: 0;
                padding: 20px 20px 20px 30px;
                box-sizing: border-box;
            }

            .timeline-item::after,
            .timeline-item.right::after {
                left: -9px;
                top: 30px;
                transform: none;
            }

            .card {
                padding: 16px;
                border-radius: 12px;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .darshan-img-wrapper img {
                width: 70%;
                max-width: 100%;
                height: auto;
                margin: 0;
            }

            .badge {
                font-size: 13px;
                padding: 5px 12px;
                margin-bottom: 8px;
            }

            .badge i {
                font-size: 13px;
            }

            .prasad-name {
                font-size: 16px;
                margin-left: 0;
                margin-top: 4px;
            }

            .card h3 {
                font-size: 17px;
                margin: 0 0 10px;
            }

            .card p {
                font-size: 14px;
                margin: 6px 0;
            }

            .prasad-times {
                margin-top: 10px;
                display: flex;
                align-items: center;
                gap: 15px;
                flex-wrap: wrap;
            }

            .prasad-times p {
                font-size: 13px;
            }

            .prasad-times i {
                font-size: 13px;
                margin-right: 6px;
            }

            .Started .card {
                border-left: 4px solid #fff;
            }

            .Completed .card,
            .Upcoming .card {
                border-left: 4px solid #db4d30;
            }
        }
    </style>
</head>

<body>
    @include('partials.header-puri-dham')

    @php
        $language = session('app_language', 'English');
    @endphp

    <!-- Hero Section -->
    <div class="hero">
        <img class="hero-bg" src="{{ asset('website/prsd.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                {{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ ଭୋଗ ଆନୁମାନିକ ସମୟ ।' : 'MahaPrasad Bhoga Tentative Timing' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ଆନନ୍ଦ ବଜାରରେ ମହାପ୍ରସାଦ ମିଳିବାର ସମୟ ଜାଣନ୍ତୁ ।' : 'Know The Bhoga Being Offered To Mahaprabhu & Mahaprasad Availability at Ananda Bazar' }}
            </p>
        </div>
    </div>

    <!-- Timeline -->
    <div class="timeline">
        @foreach ($prasadList as $index => $prasad)
            @php
                $start = $prasad->start_time;
                $status = $prasad->today_status;
                $side = $index % 2 === 0 ? 'left' : 'right';

                $icon = match ($status) {
                    'Completed' => 'fa-check-circle',
                    'Started' => 'fa-sun',
                    'Upcoming' => 'fa-bell',
                    default => 'fa-clock',
                };

                $statusClass = $status;
                $formattedStart = $start ? \Carbon\Carbon::parse($start)->format('h:i A') : null;
            @endphp

            <div class="timeline-item {{ $side }} {{ $statusClass }}">
                <div class="card timeline-content">
                    {{-- Image Left --}}
                    <div class="darshan-img-wrapper">
                        <img src="{{ asset('website/prasad.png') }}" alt="{{ $prasad->prasad_name }}">
                    </div>

                    {{-- Text Right --}}
                    <div class="card-content">
                        <span class="badge {{ $statusClass }}">
                            <i class="fas {{ $icon }}"></i>
                            @if ($language === 'Odia')
                                @switch($status)
                                    @case('Started')
                                        ଚାଲିଛି
                                    @break

                                    @case('Completed')
                                        ସମାପ୍ତ
                                    @break

                                    @case('Upcoming')
                                        ଆଗାମୀ
                                    @break

                                    @default
                                        ଅଜଣା
                                @endswitch
                            @else
                                {{ $status === 'Started' ? 'Going On' : $status }}
                            @endif
                        </span>

                        <h3 class="prasad-name">
                            {{ $language === 'Odia' ? $prasad->prasad_name : $prasad->english_prasad_name ?? $prasad->prasad_name }}
                        </h3>

                        <div class="darshan-times">
                            @if ($status === 'Started' && $start)
                                <p><strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                    {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                                </p>
                            @endif

                            @if ($status === 'Completed' && $start)
                                <p><strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                    {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                                </p>
                            @endif

                            @if ($status === 'Upcoming')
                                <p><strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Starts' }}:</strong>
                                    {{ $language === 'Odia' ? 'ଏପର୍ଯ୍ୟନ୍ତ ଆରମ୍ଭ ହୋଇନାହିଁ' : 'Not yet started' }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @include('partials.website-footer')

</body>

</html>
