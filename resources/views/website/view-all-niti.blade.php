<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Niti Timeline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .timeline {
            max-width: 1000px;
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
            background: linear-gradient(to bottom, #f59e0b, #db4d30, #1d4ed8);
            transform: translateX(-50%);
            border-radius: 3px;
        }

        .timeline-item {
            position: relative;
            width: 50%;
            padding: 30px 40px;
            box-sizing: border-box;
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
            top: 80px;
            width: 14px;
            height: 14px;
            background-color: #fff;
            border: 4px solid #db4d30;
            border-radius: 50%;
            left: calc(100% - 0px);
            transform: translateX(-50%);
        }

        .timeline-item.right::after {
            left: 0;
            transform: translateX(-50%);
        }

        .timeline-content {
            position: relative;
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid rgb(213, 213, 213);
            height: 130px;
        }

        .timeline-content.left::before,
        .timeline-content.right::before {
            content: "";
            position: absolute;
            top: 20px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
        }

        .timeline-content.left::before {
            left: -20px;
            border-right-color: #fff;
        }

        .timeline-content.right::before {
            right: -20px;
            border-left-color: #fff;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 10px;
        }

        .niti-title {
            flex: 1;
        }

        .niti-title h3 {
            font-size: 23px;
            font-weight: 600;
            color: #db4d30;
            margin: 0;
        }

        .niti-title .underline {
            width: 60px;
            height: 4px;
            background-color: #b0aeae;
            margin-top: 4px;
        }

        .status-block {
            text-align: right;
            white-space: nowrap;
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
            letter-spacing: 0.6px;
        }

        .badge.Completed {
            background-color: #fef3ec;
            color: #db4d30;
            font-size: 17px;
        }

        .badge.Started {
            background-color: #db4d30;
            color: #fff;
            font-size: 16px;

        }

        .badge.Upcoming {
            background-color: #f5f5f5;
            color: #db4d30;
            font-size: 16px;

        }

        .niti-times p:hover i {
            transform: scale(1.2);
            filter: drop-shadow(0 0 3px rgba(0, 0, 0, 0.3));
        }

        .niti-times {
            font-size: 14px;
        }

        .niti-times p {
            margin: 2px 0;
            font-weight: 500;
            color: #444;
        }

        .niti-times p strong {
            margin-right: 4px;
            color: #666;
        }

        /* Completed Niti */
        .Completed .timeline-content {
            background: #fff7e9;
        }

        /* Started Niti */
        .Started .timeline-content {
            background: #db4d30;
            color: #fff;
        }

        .Started .niti-title .underline {
            width: 80px;
            height: 3px;
            background-color: #f0ebeb;
            margin-top: 4px;
        }

        .Started .niti-title h3 {
            color: #ffae35;
        }

        .Started .niti-times p,
        .Started .niti-times strong {
            color: #fff;
        }

        /* Upcoming Niti */
        .Upcoming .timeline-content {
            background: #ffffff;
        }

        /* Shared styles */
        .niti-times i {
            width: 17px;
            display: inline-block;
            text-align: center;
            margin-right: 8px;
            font-size: 14px;
            color: #999;
        }

        .niti-title .underline {
            width: 60px;
            height: 2px;
            background-color: #db4d30;
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .timeline {
                padding: 0 10px;
                margin: 40px auto;
            }

            .timeline::before {
                left: 25px;
                width: 4px;
                transform: none;
            }

            .timeline-item,
            .timeline-item.right {
                width: 100%;
                left: 0;
                padding: 15px 20px 15px 30px;
                box-sizing: border-box;
            }

            .timeline-item::after,
            .timeline-item.right::after {
                left: 11px;
                top: 64px;
                transform: translateX(0);
            }

            .timeline-content {
                margin-left: 20px;
                padding: 16px;
                height: auto;
                border-radius: 10px;
            }

            .timeline-content.left::before,
            .timeline-content.right::before {
                display: none;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .niti-title h3 {
                font-size: 18px;
            }

            .niti-title .underline {
                width: 50px;
                height: 2px;
                margin-top: 4px;
            }

            .status-block {
                width: 100%;
                text-align: left;
            }

            .badge {
                font-size: 14px;
                padding: 6px 12px;
            }

            .badge.Completed {
                font-size: 15px;
            }

            .badge.Started,
            .badge.Upcoming {
                font-size: 14px;
            }

            .niti-times {
                font-size: 13px;
                margin-top: 5px;
            }

            .niti-times p {
                margin: 2px 0;
            }

            .niti-times i {
                font-size: 13px;
                margin-right: 5px;
            }
        }

        .tooltip-inner {
            max-width: 300px;
            text-align: left;
            font-size: 14px;
            white-space: pre-wrap;
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
        <img class="hero-bg" src="{{ asset('website/besha1.png') }}" alt="Mandir Background" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
            @if ($language === 'Odia')
                <h1>ସମ୍ପୂର୍ଣ୍ଣ ନୀତିକାନ୍ତି ତାଲିକା</h1>
                <p>ଏଠାରେ ଶ୍ରୀମନ୍ଦିରର ଆଜିର ସମସ୍ତ ନୀତି ତାଲିକା ଦେଖନ୍ତୁ ।</p>
            @else
                <h1>Daily List Of Nitis</h1>
                <p>Live Update On The Daily Ritual</p>
            @endif
        </div>
    </div>

    @php
        use Carbon\Carbon;
    @endphp

    <div class="timeline">
        @foreach ($mergedNitiList as $index => $niti)
            @php
                $start = $niti['start_time'] ?? null;
                $end = $niti['end_time'] ?? null;
                $status = $niti['niti_status'];
                $side = $index % 2 === 0 ? 'left' : 'right';

                $icon = match ($status) {
                    'Completed' => 'fa-check-circle',
                    'Started' => 'fa-sun',
                    'Upcoming' => 'fa-bell',
                    default => 'fa-question-circle',
                };

                $statusClass = $status;

                // Localized time values
                $formattedStart = $start ? \Carbon\Carbon::parse($start)->format('h:i A') : null;
                $formattedEnd = $end ? \Carbon\Carbon::parse($end)->format('h:i A') : null;
            @endphp

            <div class="timeline-item {{ $side }} {{ $statusClass }}">
                <div class="timeline-content {{ $side }}" data-bs-toggle="tooltip" data-bs-html="true"
                    title="{{ $language === 'Odia' ? $niti['description'] ?? 'ବର୍ଣ୍ଣନା ଉପଲବ୍ଧ ନାହିଁ' : $niti['english_description'] ?? 'No description available' }}"
                    style="cursor: pointer;">

                    <div class="card-header">
                        <div class="niti-title">
                            <h3>
                                {{ $language === 'Odia' ? $niti['niti_name'] : $niti['english_niti_name'] }}
                            </h3>
                            <div class="underline"></div>
                        </div>

                        <div class="status-block">
                            <span class="badge {{ $statusClass }}">
                                <i class="fas {{ $icon }}"></i>
                                @if ($language === 'Odia')
                                    @switch($status)
                                        @case('Started')
                                            ଚାଲିଚି
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

                            <div class="niti-times">
                                @if ($status === 'Started' && $start)
                                    <p>
                                        <strong>
                                            {{ $language === 'Odia' ? 'ଆରମ୍ଭ:' : 'Started:' }}
                                        </strong>
                                        {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                                    </p>
                                @endif

                                @if ($status === 'Completed')
                                    <p>
                                        <strong>
                                            {{ $language === 'Odia' ? 'ଆରମ୍ଭ:' : 'Started:' }}
                                        </strong>
                                        {{ $language === 'Odia' ? convertToOdiaTime($formattedStart) : strtolower($formattedStart) }}
                                    </p>
                                    <p>
                                        <strong>
                                            {{ $language === 'Odia' ? 'ସମାପ୍ତ:' : 'Completed:' }}
                                        </strong>
                                        {{ $language === 'Odia' ? convertToOdiaTime($formattedEnd) : strtolower($formattedEnd) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>


    @include('partials.website-footer')


</body>

</html>
