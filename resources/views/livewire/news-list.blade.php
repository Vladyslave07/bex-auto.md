<div>
    <div class="news container">
        <div class="news-list">
            @foreach($news as $article)
                <div class="article">
                    <time class="date" datetime="2021-09-02">{{ $article->created_at->diffForHumans() }}</time>
                    <a href="{{ route('news_detail', [$article->slug]) }}">
                        <picture>
                            <source type="image/webp" srcset="/storage/{{ $article->image }}">
                            <img width="666" height="400" src="/storage/{{ $article->image }}" alt="">
                        </picture>
                    </a>
                    <a href="{{ route('news_detail', [$article->slug]) }}" class="title">{{ $article->title }}</a>
                    <div class="description">{{ $article->current_preview_text }}</div>
                    <a href="{{ route('news_detail', [$article->slug]) }}" class="read-more">
                        {{ \Illuminate\Support\Facades\Lang::get('news.read_more') }}
                    </a>
                </div>
            @endforeach
        </div>
        {{ $news->onEachSide(1)->links() }}
    </div>
</div>
