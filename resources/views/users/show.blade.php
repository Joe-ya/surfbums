@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
                @if (Auth::id() == $user->id)
                    <div> 
                        {!! link_to_route('users.edit', 'プロフィールを編集', ['id' => $user->id],['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                @endif
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
@endsection
