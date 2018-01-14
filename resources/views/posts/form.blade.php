@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @auth()
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(isset($post->id))
                                {{ Form::model($post, array('route' => array('post_edit', $post->id))) }}
                                    {{ Form::label('title', 'Edit your post') }}
                                    <div>
                                        {{ Form::text('title', $post->title) }}
                                        {{ Form::textarea('content', $post->content, ['style' => 'margin-top:15px; width: 100%; height: 150px;']) }}
                                        {{ Form::submit('Edit post') }}
                                    </div>
                                {{ Form::close() }}
                            @else
                                {{ Form::open(['route' => 'post_add']) }}
                                    {{ Form::label('title', 'Add new post') }}
                                    <div>
                                        {{ Form::text('title', '', ['placeholder' => 'Post title']) }}
                                        {{ Form::textarea('content', '', ['style' => 'margin-top:15px; width: 100%; height: 150px;', 'placeholder' => 'Post content']) }}
                                        {{ Form::submit('Add post') }}
                                    </div>
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
@endsection
