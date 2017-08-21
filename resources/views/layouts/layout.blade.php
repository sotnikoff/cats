<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:site_name" content="RandomCat"/>
  <meta property="og:title" content="Sweet API for developers and designers to get cat pictures of desired sizes"/>
  <meta property="og:description" content="Use kitties for your application development. We provide images up to 1000px width and height"/>
  <meta property="og:image" content="{{ env('APP_URL') }}/images/cat-thumb.jpg">
  <meta property="og:url" content="{{ env('APP_URL') }}">
  <meta property="og:type" content="service"/>

  <title>{{  env('APP_NAME','cats')  }}</title>

  <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" />


</head>
<body>
<div class="container" id="main">
  @yield('content')
</div>
<footer class="container-fluid">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 text-center">
      <div class="row">
        <p>Created by <a href="https://github.com/sotnikoff">Mikhail Sotnikov</a></p>
      </div>
    </div>
  </div>
</footer>

<script src="{{ mix('/js/app.js')  }}"></script>
</body>
</html>
