@section('search')
<div class="search search-primary">
     <div class="filters" ng-show="toShowFilters">
        <form class="head_form form-inline" action="/posts/search" method="post">
            {{ csrf_field() }}
                <input type="date" class="form-control txt-field txt-field__l ng-pristine ng-untouched ng-valid" name="first_date" value="{{date('Y-m-d')}}">〜
                <input type="date" class="form-control txt-field txt-field__l ng-pristine ng-untouched ng-valid" name="end_date" value="{{date('Y-m-d',strtotime("+1 week"))}}">
                <select name="prefs" class="form-control txt-field txt-field__l ng-pristine ng-untouched ng-valid pref_search">
                  @foreach(config('prefs') as $index => $name)
                    <option value="{{ $name }}">{{$name}}</option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-default form-control txt-field txt-field__l ng-pristine ng-untouched ng-valid" value="検索する">
        </form>
    </div>
</div>
@endsection
