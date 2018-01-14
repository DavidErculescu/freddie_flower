@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span style="font-size: 30px">{{ $post->title }}</span>
                        @if($post->author->id == Auth::user()->id)
                            <a href="{{ URL::route('post_delete', $post->id) }}" class="pull-right btn btn-danger">Delete</a>
                            <a href="{{ URL::route('post_form', $post->id) }}" class="pull-right btn btn-success">Edit</a>
                        @else
                            <span style="font-size: 30px; float: right">{{ $post->author->name }}</span>
                        @endif
                    </div>

                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Comments:</h3>
            </div>
            @foreach($post->comments as $comment)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>{{ $comment->author->name }}</b> @ {{ $comment->created_at }}
                            @auth()
                                @if($comment->author->id == Auth::user()->id)
                                    <a href="{{ URL::route('comment_delete', $comment->id) }}" class="btn btn-danger btn-sm pull-right">X</a>
                                @endif
                            @endauth
                        </div>

                        <div class="panel-body">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
            @endforeach

            @auth()
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ Form::open(['route' => ['comment_add', $post->id]]) }}
                                {{ Form::label('content', 'Leave a comment') }}
                                {{ Form::textarea('content', '', ['style' => 'width: 100%; height: 150px;']) }}
                                {{ Form::submit('Add comment') }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
@endsection
