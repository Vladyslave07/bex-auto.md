@if (count($benefits) > 0)
    <div class="section-cooperation container">
        <div class="main-title text-center">{{ Setting::get('benefits_block_title') }}</div>
        <div class="list">
            @foreach($benefits as $benefit)
                <div class="item">
                    <img width="40" height="40" src="{{ Storage::disk('public')->url($benefit->image) }}">
                    {{ $benefit->title }}
                </div>
            @endforeach
        </div>
    </div>
@endif
