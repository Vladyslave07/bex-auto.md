@if(count($popularRequests) > 0)
    <div class="container hidden-xs">
        <div class="main-title text-center">{{ config('settings.popular_request_title') }}</div>
        <div class="popular-requests">
            @foreach($popularRequests as $request)
                <a href="{{ route('category', ['category' => $request->slug]) }}">{{ $request->title }}</a>
            @endforeach
        </div>
    </div>
@endif