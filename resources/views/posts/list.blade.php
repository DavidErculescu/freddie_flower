@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ URL::route('post_single', $post->id) }}">
                                {{ $post->title }}
                            </a>
                            <span class="pull-right">{{ $post->created_at }}</span>
                        </div>

                        <div class="panel-body">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
