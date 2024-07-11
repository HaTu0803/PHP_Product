<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>@yield('title')</title>
        <link href="{{asset('customer/css/bootstrap.min.css')}}" rel="stylesheet" />
        @stack('head')
        <meta name="msapplication-TileImage" content="{{asset('customer/images/favicon.ico')}}">
        <link rel="apple-touch-icon" href="{{asset('customer/images/favicon.ico')}}">
        <link rel="icon" href="{{asset('customer/images/favicon.ico')}}" sizes="192x192">
        <link rel="icon" href="{{asset('customer/images/favicon.ico')}}" sizes="32x32">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('customer/css/sweetalert2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('customer/css/style.css')}}?v={{env('CSS_VERSION')}}" rel="stylesheet" />
</head>

<body>
        @yield('content')
        <iframe src="/_gcp_iap/session_refresher" style="opacity: 0"></iframe>
        <script src="{{asset('customer/js/jquery-3.7.0.min.js')}}"></script>
        <script src="{{asset('customer/js/popper.min.js')}}"></script>
        <script src="{{asset('customer/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('customer/js/sweetalert2.min.js')}}"></script>
        @if(request()->user())
        <script>
                const SCOPES = 'https://www.googleapis.com/auth/drive';
                const CLIENT_ID = `{{config("google.client_id")}}`;
                const APP_ID = `{{config("customer.google.config.application_number")}}`;
                const API_KEY = `{{config("google.developer_key")}}`;
                const CLIENT_SECRET = `{{config("google.client_secret")}}`;
                let accessToken = `{{request()->user()? request()->user()->google_token : ''}}`;
                const refreshTokenAction = () => {
                    $.ajax({
                        method: "post",
                        url: `{{route("customer.refreshToken")}}`,
                        data: "_token=" + $(`[name="csrf-token"]`).attr("content"),
                        global:false,
                        success: (data) => {
                            if (data?.token) {
                                accessToken = data.token.access_token;
                            }
                            // if (data?.csrf_token) {
                            //         $(`[name="csrf-token"]`).attr("content", data?.csrf_token)
                            // }
                        }
                    });
                }
                setInterval(() => {
                        refreshTokenAction();
                }, 600000);
                // Handling a 401 status code in an AJAX request global typically involves redirecting the user to the login page or showing an appropriate message.
                $( document ).on( "ajaxError", function( event, jqxhr, settings, thrownError ) {
                        if ([302, 419, 401].includes(jqxhr.status)) {
                                Swal.fire({
                                        customClass: {
                                                container: 'z-sweetalert2'
                                        },
                                        allowOutsideClick : false,
                                        allowEscapeKey: false,
                                        html: `前回のログインから一定時間が経過したため、API認証が切れました。<br> [OK]ボタンを押して、再度認証を行ってください。`,
                                        icon: 'error',
                                        width: 600,
                                        confirmButtonText: 'OK',
                                }).then((result) => {
                                        if (result.isConfirmed) {
                                                window.location.reload()
                                        }
                                });
                        }

                        if ([403].includes(jqxhr.status)) {
                                Swal.fire({
                                        customClass: {
                                                container: 'z-sweetalert2'
                                        },
                                        allowOutsideClick : false,
                                        allowEscapeKey: false,
                                        html: `<h3>申し訳ありません。</h3><br> アクセス権限がないようです。詳しくは、システム管理者にお問い合わせください。`,
                                        icon: 'error',
                                        width: 700,
                                        confirmButtonText: 'OK',
                                });
                        }
                } );
                // Global setup for AJAX requests
                $.ajaxSetup({
                        xhrFields: {
                                withCredentials: true  // This allows sending credentials (like cookies) on cross-origin requests
                        },
                        crossDomain: true
                });
        </script>
        @endif
        @stack('scripts')
</body>

</html>
