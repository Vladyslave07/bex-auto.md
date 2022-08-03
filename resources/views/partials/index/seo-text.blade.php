@if ($seoText)
    <div class="section-seo container">
        <div class="seo-inner">
            {!! $seoText->title !!}
            {!! $seoText->text !!}
        </div>
        <span class="toggle-btn" data-text="@lang('index.seo_text.btn_close')">@lang('index.seo_text.btn_show')</span>
    </div>
@endif