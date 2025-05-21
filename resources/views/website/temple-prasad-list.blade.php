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
            left: calc(100% - 14px);
            transform: translateX(-50%);
        }

        .timeline-item.right::after {
            left: 0;
            transform: translateX(-50%);
        }

        .card {
            background: #fff;
            padding: 25px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid rgb(213, 213, 213);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .card-header .darshan-img-wrapper {
            flex-shrink: 0;
        }

        .card-header img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 10px;
        }

        .card-header .prasad-name {
            flex-grow: 1;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            color: #db4d30;
            margin-left: 20px;
        }

        .card-header .badge {
            white-space: nowrap;
        }


        .card h3 {
            margin: 0 0 12px;
            font-size: 20px;
            font-weight: 600;
            color: #db4d30;
        }

        .card p {
            margin: 8px 0;
            font-size: 15px;
            color: #333;
        }

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

        .Started .card h3 {
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

        @media (max-width: 768px) {
            .timeline {
                padding: 0 12px;
                margin: 24px auto;
                position: relative;
            }

            .timeline::before {
                content: '';
                position: absolute;
                left: 12px;
                top: 0;
                height: 100%;
                width: 4px;
                background-color: #db4d30;
            }

            .timeline-item,
            .timeline-item.right {
                position: relative;
                width: 100%;
                padding: 20px 16px 20px 36px;
                box-sizing: border-box;
                margin-bottom: 20px;
                left: 0;
            }

            .timeline-item::after,
            .timeline-item.right::after {
                content: '';
                position: absolute;
                left: 6px;
                top: 24px;
                width: 14px;
                height: 14px;
                background-color: #db4d30;
                border: 3px solid #fff;
                border-radius: 50%;
                z-index: 1;
            }

            .card {
                background-color: #fff;
                border-radius: 12px;
                padding: 16px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            .card-header {
                display: flex;
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .darshan-img-wrapper {
                width: 100%;
            }

            .darshan-img-wrapper img {
                width: 100%;
                max-width: 100%;
                height: auto;
                border-radius: 10px;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                font-size: 13px;
                padding: 5px 10px;
                background-color: #f5f5f5;
                border-radius: 6px;
                margin-bottom: 6px;
                color: #db4d30;
                font-weight: 500;
            }

            .badge i {
                margin-right: 6px;
                font-size: 14px;
            }

            .prasad-name {
                font-size: 16px;
                font-weight: 600;
                color: #333;
                margin-top: 2px;
            }

            .card h3 {
                font-size: 16px;
                margin: 0;
            }

            .card p {
                font-size: 14px;
                margin: 6px 0;
                color: #444;
            }

            .prasad-times {
                margin-top: 12px;
            }

            .prasad-times p {
                font-size: 13px;
                margin: 4px 0;
            }

            .prasad-times i {
                font-size: 13px;
                margin-right: 6px;
            }

            /* Optional: Color left border based on status */
            .Started .card {
                border-left: 4px solid #4caf50;
            }

            .Completed .card {
                border-left: 4px solid #2196f3;
            }

            .Upcoming .card {
                border-left: 4px solid #ff9800;
            }

            .Unknown .card {
                border-left: 4px solid #999;
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
                {{ $language === 'Odia' ? 'ମହାପ୍ରସାଦ ସମୟ' : 'Maha Prasad Timeline' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ପବିତ୍ର ଭୋଜନ, ସମୟ ଓ ବିବରଣୀ ଜାଣନ୍ତୁ' : 'Explore sacred offerings, their time and items served' }}
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
                    <div class="card-header">
                        @if ($prasad->prasad_name)
                            <div class="darshan-img-wrapper" style="margin-bottom: 10px;">
                                <img src="{{ asset('website/prasad.png') }}" alt="{{ $prasad->prasad_name }}"
                                    style="width: 100%; max-width: 300px; border-radius: 10px;">
                            </div>
                        @endif

                        <div>
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
                        </div>
                    </div>

                    <div class="prasad-times">
                        @if ($status === 'Started' && $start)
                            <p class="right-align">
                                <strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                            </p>
                        @endif

                        @if ($status === 'Completed' && $start)
                            <p class="right-align">
                                <strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                            </p>
                        @endif

                        @if ($status === 'Upcoming')
                            <p class="right-align">
                                <strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Starts' }}:</strong>
                                {{ $language === 'Odia' ? 'ଏପର୍ଯ୍ୟନ୍ତ ଆରମ୍ଭ ହୋଇନାହିଁ' : 'Not yet started' }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('partials.website-footer')

</body>

</html>
