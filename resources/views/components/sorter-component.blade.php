<div class="dropdown">
    <a href="#" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $query_title }} <span><i class="fa fa-caret-down"></i></span></a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($stuffs as $key=>$value)
        <a href="{{ route("dashboard.$model_alias_plural.index").'?'.Arr::query([$key => $value]) }}" class="dropdown-item d-flex align-items-baseline justify-content-between">{{ Str::of($key)->title() }} &nbsp;<i class="fa fa-angle-{{ $value == 'ascending' ? 'up' : 'down' }}"></i></a>
        @endforeach
    </div>
</div>
