<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Darshan Timeline</title>
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
            border: 1px solid rgb(213, 213, 213);
            transition: all 0.3s ease;
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
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 10px;
        }

        .card-header .darshan-name {
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
            color: #272525;
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

         .card.timeline-content {
                    display: flex;
                    flex-direction: row;
                    align-items: flex-start;
                    padding: 16px;
                    border-radius: 12px;
                    background: #fff;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    gap: 16px;
                }

        @media (max-width: 768px) {
            @media (max-width: 768px) {
                .timeline {
                    padding: 0 12px;
                    margin: 24px auto;
                    position: relative;
                }

                .timeline::before {
                    content: '';
                    position: absolute;
                    left: 18px;
                    top: 0;
                    width: 4px;
                    height: 100%;
                    background-color: #db4d30;
                }

                .timeline-item,
                .timeline-item.right {
                    width: 100%;
                    left: 0;
                    padding: 0;
                    box-sizing: border-box;
                    margin-bottom: 24px;
                    position: relative;
                }

                .timeline-item::after,
                .timeline-item.right::after {
                    content: '';
                    position: absolute;
                    left: 14px;
                    top: 28px;
                    width: 14px;
                    height: 14px;
                    background-color: #db4d30;
                    border: 3px solid #fff;
                    border-radius: 50%;
                }

                .card.timeline-content {
                    display: flex;
                    flex-direction: row;
                    align-items: flex-start;
                    padding: 16px;
                    border-radius: 12px;
                    background: #fff;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    gap: 16px;
                    margin-left: 40px;
                }

                .darshan-img-wrapper {
                    width: 80px;
                    flex-shrink: 0;
                }

                .darshan-img-wrapper img {
                    width: 100%;
                    height: auto;
                    border-radius: 50%;
                    display: block;
                }

                .card-header {
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                    flex-grow: 1;
                }

                .badge {
                    font-size: 13px;
                    padding: 6px 12px;
                    border-radius: 6px;
                    background-color: #f5f5f5;
                    color: #db4d30;
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                }

                .badge i {
                    font-size: 14px;
                }

                .darshan-name {
                    font-size: 16px;
                    font-weight: 600;
                    color: #333;
                    margin-top: 4px;
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

                .darshan-times {
                    margin-top: 8px;
                }

                .darshan-times p {
                    font-size: 13px;
                    margin: 4px 0;
                }

                .darshan-times i {
                    font-size: 13px;
                    margin-right: 6px;
                }

                .Started .card {
                    border-left: 4px solid #db4d30;
                }

                .Completed .card {
                    border-left: 4px solid #db4d30;
                }

                .Upcoming .card {
                    border-left: 4px solid #ff9800;
                }
            }
        }
    </style>
</head>

<body>
    @include('partials.header-puri-dham')

    <!-- Hero Section -->
    @php
        $language = session('app_language', 'English');
    @endphp

    <div class="hero">
        <img class="hero-bg" src="{{ asset('website/darshans.jpg') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                {{ $language === 'Odia' ? 'ଆନୁମାନିକ ଦର୍ଶନ ସମୟ' : 'Tentative Darshan Timing' }}
            </h1>
            <p>
                {{ $language === 'Odia' ? 'ଦର୍ଶନ ସ୍ଥିତି ଜାଣନ୍ତୁ' : 'Know The Darshan Status' }}
            </p>
        </div>
    </div>


    <div class="timeline">
        @foreach ($darshanList as $index => $darshan)
            @php
                $start = $darshan->start_time;
                $end = $darshan->end_time;
                $status = $darshan->today_status;
                $side = $index % 2 === 0 ? 'left' : 'right';

                $icon = match ($status) {
                    'Completed' => 'fa-check-circle',
                    'Started' => 'fa-sun',
                    'Upcoming' => 'fa-bell',
                    default => 'fa-clock',
                };

                $statusClass = $status;

                $startTimeFormatted = $start ? \Carbon\Carbon::parse($start)->format('h:i A') : null;
                $endTimeFormatted = $end ? \Carbon\Carbon::parse($end)->format('h:i A') : null;
            @endphp

            <div class="timeline-item {{ $side }} {{ $statusClass }}">
                <div class="card timeline-content">
                    <div class="card-header">

                        @if ($darshan->darshan_name)
                            <div class="darshan-img-wrapper" style="margin-bottom: 10px;">
                                <img src="{{ asset('website/darshan.png') }}" alt="{{ $darshan->darshan_name }}">
                            </div>
                        @endif


                    </div>

                    <div class="darshan-times">

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

                            <h3 class="darshan-name">
                                {{ $language === 'Odia' ? $darshan->darshan_name : $darshan->english_darshan_name ?? $darshan->darshan_name }}
                            </h3>
                        </div>
                        @if ($status === 'Started' && $start)
                            <p class="right-align">
                                <strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                {{ $language === 'Odia' ? convertToOdiaTime($startTimeFormatted) : strtolower($startTimeFormatted) }}
                            </p>
                        @endif

                        @if ($status === 'Completed')
                            @if ($start)
                                <p class="right-align">
                                    <strong>{{ $language === 'Odia' ? 'ଆରମ୍ଭ' : 'Started' }}:</strong>
                                    {{ $language === 'Odia' ? convertToOdiaTime($startTimeFormatted) : strtolower($startTimeFormatted) }}
                                </p>
                            @endif
                            @if ($end)
                                <p class="right-align">
                                    <strong>{{ $language === 'Odia' ? 'ସମାପ୍ତ' : 'Completed' }}:</strong>
                                    {{ $language === 'Odia' ? convertToOdiaTime($endTimeFormatted) : strtolower($endTimeFormatted) }}
                                </p>
                            @endif
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
