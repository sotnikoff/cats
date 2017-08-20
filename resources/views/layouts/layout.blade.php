<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{  env('APP_NAME','cats')  }}</title>

  <link rel="stylesheet" type="text/css" href="{{  asset('/css/app.css') }}" />


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

<script src="{{ asset('/js/app.js')  }}"></script>
</body>
</html>
