{!! csrf_field() !!}
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

    <label for="title" class="control-label">
        {{ trans('title') }}
    </label>

    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', @$post->title) }}"
           placeholder="title"
           required
           class="form-control">

    @if ($errors->has('title'))
        <div class="help-block">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">

    <label for="Body" class="control-label">
        {{ trans('URL') }}
    </label>

    <input type="text"
           name="url"
           id="url"
           value="{{ old('url', @$post->url) }}"
           placeholder="url"
           required
           class="form-control">

    @if ($errors->has('url'))
        <div class="help-block">
            {{ $errors->first('url') }}
        </div>
    @endif
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">

    <label for="Body" class="control-label">
        {{ trans('Body') }}
    </label>

    <input type="text"
           name="body"
           id="body"
           value="{{ old('body', @$post->body) }}"
           placeholder="body"
           required
           class="form-control">

    @if ($errors->has('body'))
        <div class="help-block">
            {{ $errors->first('body') }}
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">

    <label for="Date" class="control-label">
        {{ trans('Date') }}
    </label>

    <input type="date"
           name="date"
           id="date"
           value="{{ old('date', $post->date) }}"
           placeholder="date"
           required
           class="form-control">

    @if ($errors->has('date'))
        <div class="help-block">
            {{ $errors->first('date') }}
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('first_time') ? 'has-error' : '' }}">

    <label for="Date" class="control-label">
        {{ trans('Date') }}
    </label>

    <input type="time"
           name="first_time"
           id="first_time"
           value="{{ old('first_time', $post->first_time) }}"
           placeholder="first_time"
           required
           class="form-control">

    @if ($errors->has('first_time'))
        <div class="help-block">
            {{ $errors->first('first_time') }}
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">

    <label for="Date" class="control-label">
        {{ trans('Date') }}
    </label>

    <input type="time"
           name="end_time"
           id="end_time"
           value="{{ old('end_time', $post->end_time) }}"
           placeholder="end_time"
           required
           class="form-control">

    @if ($errors->has('end_time'))
        <div class="help-block">
            {{ $errors->first('end_time') }}
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('prefectures') ? 'has-error' : '' }}">

    <label for="Body" class="control-label">
        {{ trans('都道府県') }}
    </label>

    <select name="prefectures" class="form-control">
      @foreach($prefs as $name)
        <option value="{{ $name }}">{{$name}}</option>
      @endforeach
    </select>

    @if ($errors->has('prefectures'))
        <div class="help-block">
            {{ $errors->first('prefectures') }}
        </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
    <a href="/posts" class="btn btn-default">Back to list</a>
</div>
