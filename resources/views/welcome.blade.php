<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tuition</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ Request::root() }}/subject">Subject</a>
                    <a href="{{ Request::root() }}/teacher">Teacher</a>
                    @auth
                        <a href="{{ Request::root() }}/profile">Profile</a>
                        <a href="{{ Request::root() }}/student">Student</a>
                        <a href="{{ Request::root() }}/guardian">Guardian</a>
                        <a href="{{ Request::root() }}/school">School</a>
                        <a href="{{ Request::root() }}/edulevel">Education Level</a>
                        <a href="{{ Request::root() }}/room">Room</a>
                        <a href="{{ Request::root() }}/alamat">Address</a>
                    @endauth
                    
                </div>

                <div class="content">
                    <div class="title m-b-md">
                        Tuition
                    </div>

                    <div class="links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>
