@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">イベント一覧</div>

                    <div class="panel-body">
                        @foreach($posts as $post)
                            <div class="left">
                                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a>
                                </h3>
                            </div>
                           <div class="right">
                               <small>æ—¥æ™‚:{{ $post->date }}</small>
                           </div>

                            <div>{{ $post->body }}</div>

                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read</a>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure to delete this page?');">
                                    Delete
                                </a>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
