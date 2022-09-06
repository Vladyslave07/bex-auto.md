@if (count($benefits) > 0)
    <div class="section-cooperation container">
        <div class="main-title text-center">{{ Lang::get('service.benefit_title') }}</div>
        <div class="list">
            @foreach($benefits as $benefit)
                <div class="item">
                    <img width="40" height="40" src="/storage/{{ $benefit->image }}">
                    {{ $benefit->title }}
                </div>
            @endforeach
        </div>
    </div>
@endif