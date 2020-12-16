@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Edit</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="text-center">
                <img src="{{ Storage::disk('s3')->url($micropost->image) }}" alt="iamge"/>
            </div>
            {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Edit', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection