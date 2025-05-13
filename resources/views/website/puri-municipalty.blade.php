<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="BgNIPERZegT3azkv6tE-9XgKxVGq8AlrrR_pMbz0Gfo" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puri Municipality</title>

    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f4f4f4;
            border-bottom: 2px solid #ccc;
        }

        header img {
            height: 60px;
            object-fit: contain;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            header img {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ asset('website/municipality/logo1.png') }}" alt="Logo 1">

        <img src="{{ asset('website/municipality/logo2.png') }}" alt="Logo 2">
    </header>

</body>
</html>
