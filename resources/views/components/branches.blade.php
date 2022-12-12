<div>
    <div class="section-branches container">
        <div class="main-title text-center">{{ __('about.branch') }}</div>
        <div class="nav-tabs">
            @foreach($branches as $domainId => $branch)
                <span class="nav-link @if($loop->first) active @endif" data-toggle="tab"
                      data-target="#brancheTab_{{ $domainId }}">
                    {{ $domains->where('id', $domainId)->first()?->title }}
                </span>
            @endforeach
        </div>
        <div class="tab-content">
            @foreach($branches as $domainId => $branchList)
                <div id="brancheTab_{{ $domainId }}" class="tab-pane @if($loop->first) active @endif">
                    <div class="swiper-wrap">
                        @foreach($branchList as $branch)
                            <ul class="contacts">
                                <li>
                                    <div class="color-red">{{ $branch->city }}</div>
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
                                                <img width="100%" height="100%" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image) }}"
                                                     loading="lazy" alt="">
                                            </picture>
                                            @if ($loop->index === 3)
                                                <span class="more toggle-btn">{{ __('car.detail.more_photo', ['num' => $loop->count - 4]) }}</span>
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
            @endforeach
        </div>
    </div>
</div>