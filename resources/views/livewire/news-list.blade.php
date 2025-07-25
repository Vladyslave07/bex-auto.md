<div>
    <div class="news container">
        <div class="news-list">
            @foreach($news as $article)
                <div class="article">
                    <time class="date" datetime="2021-09-02">{{ $article->created_at->diffForHumans() }}</time>
                    <a href="{{ route('news_detail', [$article->slug]) }}">
                        {!! \App\Helper\ImageHelper::getPicture($article->image,
                            \App\Helper\ImageHelper::alt(htmlspecialchars($article->title), $loop->index, getenv(app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN ? 'KZ_APP_DOMAIN' : 'APP_DOMAIN')),
                            \App\Helper\ImageHelper::title(htmlspecialchars($article->title), $loop->index)
                            ) !!}
                    </a>
                    <a href="{{ route('news_detail', [$article->slug]) }}" class="title">
                        {{ $article->title }}
                    </a>
                    @if($article->preview_text)
                        <div class="description">{!! $article->preview_text !!}</div>
                    @endif
                    <a href="{{ route('news_detail', [$article->slug]) }}" class="read-more">
                        {{ \Illuminate\Support\Facades\Lang::get('news.read_more') }}
                    </a>
                </div>
            @endforeach
        </div>
        {{ $news->onEachSide(1)->links() }}
    </div>
</div>
