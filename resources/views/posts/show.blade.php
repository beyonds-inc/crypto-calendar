@extends('layouts.top')

@section('content')
<div id="results-table">
    <div class="event-search-results col-main">
        <ul class="event-list event-list__medium">
        @foreach($posts as $post)
            <li class="event-thumb ng-scope" id="event-399171" ng-repeat="event in events track by $index">
            　  <div class="event-thumb_link">
                    <time datetime="2018-08-04 14:00:00 +0900" class="event-cal">
                        <span class="month ng-binding">{{ $post->date->format('m') }}</span>
                        <span class="day ng-binding">{{ $post->date->format('d') }}</span>
                    </time>
                    <div class="event-thumb_detail">
                        <div class="event-thumb_info">
                            <time datetime="2018-08-04 14:00:00 +0900" class="datetime ng-binding">{{ date('G:i', strtotime($post->first_time)) }}~{{ date('G:i', strtotime($post->end_time)) }}</time>
                            <span class="event-thumb_location ng-binding">会場: {{ $post->prefectures }}</span>
                            <h3 class="event-thumb_name ng-binding"><a href="{{$post->url}}">{{$post->title}}</a></h3>
                            <span class="event-thumb_organizer ng-binding">主催:  {{ $post->user->name }}</span>
                        </div>
                    </div>
                    <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-primary">編集</a>
                    <a href="{{ action('PostsController@destroy', $post) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this page?');">削除</a>
                </div>
            </li>
        @endforeach
    </div>
</div>
@endsection
