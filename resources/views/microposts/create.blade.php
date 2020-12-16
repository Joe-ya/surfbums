@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Post</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
                {!! Form::open(['route' => 'microposts.store', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('image', 'Photo') !!}
                        {!! Form::file('image', ['class'=>'form-control-file input-group-prepend']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Comment') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@endsection
