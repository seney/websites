@extends('main')
@section('title', ' | Create Post')
@section('styles')
    {{Html::style('css/parsley.css')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate'=>'']) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Post Title', 'required'=>'', 'maxlength'=>'255')) }}
            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control', 'placeholder'=>'Post body...', 'required'=>'')) }}
            {{ Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {{Html::script('js/parsley.min.js')}}
@endsection