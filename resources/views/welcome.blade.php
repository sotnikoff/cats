@extends('layouts/layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <header class="jumbotron" id="page_header">
                <h1>Random Cat</h1>
                <p>Sweet API for developers and designers to get random cat pictures of desired sizes</p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('docs')  }}" role="button">Read docs</a></p>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h4>Hi there!</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-1 col-sm-4  col-xs-12">
            <img src="{{ asset('/images/cat-thumb.jpg') }}" alt="" class="img-rounded img-responsive center-block">
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2 class="site-h2">
                Use kitties for your application development.
            </h2>
            <p>
                We provide images up to 1000px width and height.
            </p>
            <p>
                Feel free to get a random cat picture! Just use our API to get image links.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h4>Try it!</h4>
            <p>Get any random cat with default size <strong>{{ env('DEFAULT_WIDTH') }}x{{ env('DEFAULT_HEIGHT') }} px</strong></p>
            <p>
                <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img" alt="Awesome cat!" /&gt;</code>
            </p>
            <p>Or with your desired size!</p>

            <p>
                <code>&lt;img src="{{ env('APP_URL') }}<wbr>/api/v1/img/w300h200" alt="Awesome cat!" /&gt;</code>
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h4>Documentation</h4>
            <p>Learn about all available features in our <a href="{{ route('docs')  }}">documentation</a></p>
        </div>
    </div>

@endsection