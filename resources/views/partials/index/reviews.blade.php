@if (count($reviews) > 0)
    <div class="section-reviews container hidden-xs" id="reviews">
        <div class="main-title text-center noline">{{ Setting::get('reviews_block_title') }}</div>
        <div class="h3 text-center">{{ Setting::get('reviews_block_sub_title') }}</div>
        <div class="swiper reviews-swiper">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="header">
                            <picture>
                                <img class="review-avatar" width="54" height="56" src="{{ $review->user_icon }}"
                                     loading="lazy" alt="">
                            </picture>
                            <div>
                                <div class="review-author">{{ $review->user_name }}</div>
                                <div class="review-rating">
                                    <div class="stars">
                                        @php($review->rating = $review->rating > 5 ? 5 : $review->rating)
                                        @for($i = 0; $i < $review->rating; $i++)
                                            <svg class="active" width="22" height="19">
                                                <use xlink:href="#star-icon"></use>
                                            </svg>
                                        @endfor
                                    </div>
                                    <time class="review-data"
                                          datetime="2021-09-22 14:56">{{ $review->date_created_review }}</time>
                                </div>
                            </div>
                        </div>
                        <div class="review-text">
                            <p>{{ $review->text }}</p>
                        </div>
                        <picture>
                            <source type="image/webp" srcset="{{ asset('img/example/img_15.webp') }}">
                            <img class="review-logo" width="101" height="39" src="{{ asset('img/example/img_15.png') }}"
                                 loading="lazy" alt="">
                        </picture>
                    </div>
                @endforeach
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev team-prev">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
                <div class="swiper-bullets"></div>
                <div class="swiper-button-next team-next">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endif
