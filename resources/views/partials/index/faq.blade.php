@if (count($faqs) > 0)
    <div class="section-faq container">
        <h2 class="main-title text-center">{{ Setting::get('faq_block_title') }}</h2>
        @foreach($faqs as $faq)
            <div class="item">
                <div class="title toggle-btn">
                    {{ $faq->question }}
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
                <div class="body">
                    {!! $faq->answer !!}
                </div>
            </div>
        @endforeach
    </div>
@endif
