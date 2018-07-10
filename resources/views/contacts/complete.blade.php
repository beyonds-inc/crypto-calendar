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
                        お問い合わせありがとうございました！
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
