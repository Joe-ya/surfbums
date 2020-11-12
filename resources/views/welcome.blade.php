@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <img src="image/welcom.jpg" alt="トップページ画像">
            <h1>Have a good surf!!</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary' ]) !!}
        </div>
    </div>
    
@endsection