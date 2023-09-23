
<!-- Meta Tag -->
@yield('meta')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- Title Tag  -->
<title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend-c/assets/images/icons/favicon.png')}}">

    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Shadows+Into+Light:400' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = "{{asset('frontend-c/assets/js/webfont.js')}}";
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend-c/assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend-c/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-c/assets/css/demo4.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-c/assets/css/demo1.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-c/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-c/assets/vendor/fontawesome-free/css/all.min.css')}}">