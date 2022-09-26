@if(count($popularRequests) > 0)
    <div class="container hidden-xs">
        <div class="main-title text-center">@lang('index.popular_request_title')</div>
        <div class="popular-requests">
            @foreach($popularRequests as $request)
                <a href="{{ route('category', [$request->slug]) }}">{{ $request->title }}</a>
            @endforeach
        </div>
    </div>
@endif