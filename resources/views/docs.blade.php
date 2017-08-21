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
        In this way it will be set automatically to <strong>{{ env('DEFAULT_WIDTH') }}x{{ env('DEFAULT_HEIGHT') }} px</strong>.
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img" alt="Awesome cat!" /&gt;</code>
      </p>
      <p>You can set manually the size of image. Use <strong>w</strong> keyword
        for setting width or <strong>h</strong> for height. Order of keywords does not matter.
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
        If you are storing links of cats in your applications and
        don't want the picture to be randomized in every requests
        you can add image identifier to your request.
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/2" alt="Awesome cat!" /&gt;</code>
      </p>
      <p>
        Or course you can add image size to your request
      </p>
      <p>
        <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/2/w200" alt="Awesome cat!" /&gt;</code>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Lists of pictures</h3>
      <p>
        Sometimes you may need a list of pictures for your development purposes.
        You can get a set of images in <strong>JSON</strong> format.
        To get images list you have to perform a <code>GET request</code> like this:
      </p>
      <p>
        <code>
          {{ env('APP_URL') }}<wbr>/api/v1/list
        </code>
      </p>
      <p>
        <strong>{{ env('DEFAULT_LIST_SIZE') }}</strong> pictures will be given as default value for this call.
      </p>
      <p>
        Also you can specify amount of required pictures. Try this:
      </p>
      <p>
        <code>
          {{ env('APP_URL') }}<wbr>/api/v1/list/4
        </code>
      </p>
      <p>
        You cannot require more pictures than it's set as service limit.
        The limit is <strong>{{ env('MAX_LIST_SIZE') }}</strong>
      </p>
      <p>
        You can add image size that will be applied to all required images. Try this request:
      </p>
      <p>
        <code>
          {{ env('APP_URL') }}<wbr>/api/v1/list/w500h200
        </code>
      </p>
      <p>
        Or this with amount:
      </p>
      <p>
        <code>
          {{ env('APP_URL') }}<wbr>/api/v1/list/4/w500h200
        </code>
      </p>
    </div>
  </div>



@endsection