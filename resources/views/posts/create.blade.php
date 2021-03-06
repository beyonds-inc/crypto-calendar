@extends('layouts.top')

@push('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors))
                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)
                        <ul>
                            <li>{{$error}}</li>
                        </ul>
                    @endforeach
                </div>
                    @endif
                <div class="panel panel-default">
                    <div class="panel-heading">イベント投稿</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('/')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">タイトル</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="タイトル" value="{{ old('title', @$post->title) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">URL</label>
                                <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="URL" value="{{ old('url', @$post->url) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">内容(100文字まで)</label>
                                <textarea name="body" rows="4" name="body" cols="10" class="form-control" maxlength="100">{{Input::old('body')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-control-range">タグ</label>
                                @foreach($tags as $tag)
                                <div class="checkbox-inline">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="click<?php echo $tag->id?>" {{ is_array(old("tags")) && in_array($tag->id, old("tags"))? 'checked="checked"' : '' }}
                                        >
                                    <label for="click<?php echo $tag->id?>">{{ $tag->name }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">日にち</label>
                                <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="title" value="{{ old('date', @$post->date) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">開始時刻</label>
                                <input type="time" name="first_time" class="form-control" id="exampleInputEmail1" placeholder="title" value="{{ old('first_time', @$post->first_time) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">終了時刻</label>
                                <input type="time" name="end_time" class="form-control" id="exampleInputEmail1" placeholder="title" value="{{ old('end_time', @$post->end_time) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">開催場所</label>
                                <select name="prefectures" class="form-control">
                                  @foreach($prefs as $name)
                                    <option value="{{ $name }}">{{$name}}</option>
                                  @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">投稿する</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
