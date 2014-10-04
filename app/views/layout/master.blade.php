<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="description" content="BeALeet.com the new place to be if you're a E-Sport entusiast">
    <meta name="keywords" content="ESport, e-sport, e, gaming, gamer, clan, player, dota, cs, cs:go, hon, lol, gamecoach">

    <meta property="og:title" content="BeALeet the place to be for gamers" />
    <meta property="og:url" content="http://bealeet.com"/>
    <meta property="og:site_name" content="BeALeet.com"/>
    <meta property="og:description" content="BeALeet.com the new place to be if you're a E-Sport entusiast">
    <meta property="og:type" content="website"/>

    @if($app->environment() === 'dev' || $app->environment() === 'local')
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    @endif

    <title>BeALeet.com</title>
    {{ HTML::style('/css/libs.css') }}
    {{ HTML::style('/css/main.css?v=0_1') }}

    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js') }}
</head>
<body>

@include('layout.includes.master.nav')

<div class="container">
    @include('partials/_flash')
    @include('partials/_errors')

    <div class="row content">
        <div class="col-xs-12">
            @yield('content')
        </div>
    </div>
</div>

<div class="content-full">
    @yield('content_full')
</div>

@include('layout.includes.footer')

{{ HTML::script('/js/libs.js') }}
{{ HTML::script('/js/main.js?v=0_1') }}

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54576968-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>