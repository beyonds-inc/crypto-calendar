@extends('layouts.top')

@include('layouts.search')
@section('content')
<div id="results-table">
    <div class="event-search-results col-main">
        <ul class="event-list event-list__medium">
            @foreach($posts as $post)
            <li class="event-thumb ng-scop event-thumb_link" id="event-399171" ng-repeat="event in events track by $index">
                <time datetime="2018-08-04 14:00:00 +0900" class="event-cal">
                    <span class="month ng-binding">{{ $post->date->format('m') }}</span>
                    <span class="day ng-binding">{{ $post->date->format('d') }}</span>
                </time>
                <div class="event-thumb_detail">
                    <div class="event-thumb_info">
                       <time datetime="2018-08-04 14:00:00 +0900" class="datetime ng-binding">{{ date('G:i', strtotime($post->first_time))  }}~{{ date('G:i', strtotime($post->end_time)) }}</time>
                       <span class="event-thumb_location ng-binding">会場: {{ $post->prefectures }}</span>
                       <h3 class="event-thumb_name ng-binding"><a href="{{$post->url}}" target="_blank">{{$post->title}}</a></h3>
                       @foreach ($post->tags as $tag)
                       <span class="event-thumb_location ng-binding category_tag"> {{ $tag->name }} </span>
                       @endforeach
                       <span class="event-thumb_location">{{$post->body}}</span>
                       <span class="event-thumb_organizer ng-binding">posted by {{$post->user->name}}</span>
                    </div>
                </div>
                @if(Auth::check())
                    <a href="/contacts?name={{$post->user->name}}" class="report_btn">通報</a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-sub">
        <p>新着イベント</p>
        <ul class="event-list event-list__short">
            @foreach($conPosts as $post)
            <li class="event-thumb">
                <a href="{{$post->url}}" class="event-thumb_link">
                    <time class="event-cal">
                        <span class="month">{{ $post->date->format('m') }}</span>
                        <span class="day">{{ $post->date->format('d') }}</span>
                    </time>
                    <div class="event-thumb_detail">
                        <div class="event-thumb_info">
                            <time datetime="2018-07-07T11:00:00" class="datetime">{{ date('G:i', strtotime($post->first_time)) }}~{{   date('G:i', strtotime($post->end_time)) }}</time>
                            <span class="event-thumb_location">{{ $post->prefectures }}</span>
                            <h3 class="event-thumb_name">{{$post->title}}</h3>
                            @foreach ($post->tags as $tag)
                            <span class="event-thumb_location ng-binding category_tag"> {{ $tag->name }} </span>
                            @endforeach
                            <span class="event-thumb_location ng-binding">{{$post->body}}</span>
                            <span class="event-thumb_organizer">posted by {{$post->user->name}}</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="paginate">
    {{ $posts->links() }}
</div>

@endsection
