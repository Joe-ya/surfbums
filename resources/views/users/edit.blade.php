@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>プロフィール編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email',null, ['class' => 'form-control-plaintext','readonly']) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('更新', ['class' => 'form-control btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            
            {!! Form::open (['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit ('退会', ['class' => 'form-control btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection