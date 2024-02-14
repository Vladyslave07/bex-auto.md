<div>
    <div class="section-branches container">
        <h2 class="main-title text-center">{{ __('about.branch') }}</h2>
        <div class="nav-tabs">
                <span class="nav-link active" data-toggle="tab"
                      data-target="#brancheTab_1">
                    {{ app('domain')->getDomain()->title }}
                </span>
        </div>
        <div class="tab-content">
            <div id="brancheTab_1" class="tab-pane active">
                <div class="swiper-wrap">
                    @foreach($branches as $branch)
                        <ul class="contacts">
                            <li>
                                <div class="color-red">{{ $branch?->city }}</div>
                                {{ $branch->address }}
                                <a href="tel:{{ Str::phoneNumber($branch->phone) }}">{{ $branch->phone }}</a>
                            </li>
                            @if (strlen($branch->weekdays) > 0 || strlen($branch->weekends) > 0)
                                <li>
                                    <div class="color-red">@lang('static.contacts.schedule')</div>
                                    @if(strlen($branch->weekdays) > 0)
                                        <p>{{ $branch->weekdays }}</p>
                                    @endif
                                    @if(strlen($branch->weekends) > 0)
                                        <p>{{ $branch->weekends }}</p>
                                    @endif
                                </li>
                            @endif
                        </ul>
                    @endforeach
                    @if ($branch->images && count($branch->images) > 0)
                        <div class="swiper branches-swiper">
                            <div class="swiper-wrapper">
                                @foreach($branch->images as $image)
                                    <div class="swiper-slide">
                                        <picture>
                                            <img width="100%" height="100%"
                                                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image) }}"
                                                 loading="lazy" alt="">
                                        </picture>
                                        @if ($loop->index === 3)
                                            <span
                                                class="more toggle-btn">{{ __('car.detail.more_photo', ['num' => $loop->count - 4]) }}</span>
                                        @endif
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
