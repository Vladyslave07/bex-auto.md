<div class="social-list">
    @if($telegram = app('domain')->getDomain()->telegram)
        <a href="{{ $telegram }}" aria-label="telegram">
            <svg width="18" height="17">
                <use xlink:href="#telegram-icon"></use>
            </svg>
        </a>
    @endif
    @if($tiktok = app('domain')->getDomain()->tiktok)
        <a href="{{ $tiktok }}" aria-label="tiktok">
            <svg width="16" height="19">
                <use xlink:href="#tiktok-icon"></use>
            </svg>
        </a>
    @endif
    @if($instagram = app('domain')->getDomain()->instagram)
        <a href="{{ $instagram }}" aria-label="viber">
            <svg width="23" height="23">
                <use xlink:href="#insta-icon"></use>
            </svg>
        </a>
    @endif
    @if($youtube = app('domain')->getDomain()->youtube)
        <a href="{{ $youtube }}" aria-label="viber">
            <svg width="23" height="23">
                <use xlink:href="#youtube"></use>
            </svg>
        </a>
    @endif
</div>
