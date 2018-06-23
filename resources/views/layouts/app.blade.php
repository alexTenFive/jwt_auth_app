<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
            $(document).ready(function() {

                $('#get_users').click(function() {
                        $.ajax({
                            type: 'GET',
                            url: '/api/users',
                            beforeSend: function(xhr) {
                            if (localStorage.token) {
                                xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.token);
                            }
                            },
                            success: function(data) {
                            alert(data.names);
                            },
                            error: function() {
                            alert("Sorry, you are not logged in.");
                            }
                        });
                    });

                $('#login_form').on('submit', function() {
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "/api/user/login",
                        data: {
                        email: $("input#email").val(),
                        password: $("input#password").val()
                        },
                        success: function(data) {
                        localStorage.token = data.token;
                        window.location='/home';
                        },
                        error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        }
                    });
                });

                $('#register_form').on('submit', function() {
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "/api/user/register",
                        data: {
                        email: $("input#email").val(),
                        name: $("input#name").val(),
                        password: $("input#password").val(),
                        },
                        success: function(data) {
                        console.log(data);
                        localStorage.token = data.token;
                        window.location='/home';
                        },
                        error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        }
                    });
                });

                $('#logout').click(function() {
                localStorage.clear();
                window.location="/";
                });
            });
    </script>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>