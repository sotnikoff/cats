@extends('layouts/layout')
@section('content')


  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="page-header">
        <a href="{{ route('home') }}" class="no-link"><i class="glyphicon glyphicon-home"></i></a><h1>Documentation</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Random pictures</h3>
      <p>You can require a random kittie.
        You may not specify size of image.
        In this way it will be set automatically to <strong>{{ env('DEFAULT_WIDTH') }}x{{ env('DEFAULT_HEIGHT') }} px</strong>
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img" alt="Awesome cat!" /&gt;</code>
      </p>
      <p>You can set manually the size of image. Use <strong>w</strong> keyword
        for setting width or <strong>h</strong> for height. Order of keyword does not matter.
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/w200h100" alt="Awesome cat!" /&gt;</code>
      </p>
      <p>
        You can specify size of only one dimension.
        Size of other side will be calculated automatically.
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/w200" alt="Awesome cat!" /&gt;</code>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Pictures by identifiers</h3>
      <p>
        If you are storing links of cats in your application and
        don't want the picture to be randomized in every requests
        you can add image identifier to your request
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/2" alt="Awesome cat!" /&gt;</code>
      </p>
      <p>
        Or course you can add size to your request
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/2/w200" alt="Awesome cat!" /&gt;</code>
      </p>
    </div>
  </div>



@endsection