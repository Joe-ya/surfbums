@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <img src="image/welcom.jpg" alt="トップページ画像">
                <h1>Have a good surf!!</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary' ]) !!}
            </div>
        </div>
    @endif
    
@endsection