@extends('layouts/layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" id="page_header">
                <h1>Random pics of cats</h1>
                <p>Sweet API for developers and designers to get cat pictures of desired sizes</p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('docs')  }}" role="button">Read docs</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h4>Hi there!</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam et ex non quam reprehenderit rerum sed temporibus!
                Atque et eum excepturi exercitationem,
                facere itaque necessitatibus nobis non quae suscipit tenetur.
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