@if(count($popularRequests) > 0)
    <div class="container hidden-xs">
        <h2 class="main-title text-center">{{ Setting::get('popular_request_title') }}</h2>
        <div class="popular-requests">
            @foreach($popularRequests as $request)
                <a href="{{ route('category', ['category' => $request->slug]) }}">{{ $request->title }}</a>
            @endforeach
        </div>
    </div>
@endif
