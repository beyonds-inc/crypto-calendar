@extends('layouts.app')

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
                    <div class="panel-heading">通報内容</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('posts/contacts/confirm')}}">
                            {{ csrf_field() }}
                            <?php $report_names = Request::query()?>
                            @foreach($report_names as $report_name)
                            <input type="hidden" name="report_name" value="{{$report_name}}">
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputEmail1">タイトル</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="タイトル" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">内容</label>
                                <textarea name="body" rows="4" name="body" cols="10" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">投稿する</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
