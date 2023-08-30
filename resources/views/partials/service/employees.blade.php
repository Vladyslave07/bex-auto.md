@if(count($employees) > 0)
    <div class="section-team container">
        <div class="main-title text-center">{{ \App\Models\Setting::get('employees_block_title') }}</div>
        <div class="swiper team-swiper">
            <div class="swiper-wrapper">
                @foreach($employees as $employee)
                    <div class="swiper-slide item">
                        {!! \App\Helper\ImageHelper::getPicture($employee->image) !!}
                        <div class="name">{{ $employee->name }}</div>
                        <a href="tel:{{ Str::phoneNumber($employee->phone) }}">{{ $employee->phone }}</a>
                        <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination">
                <div class="swiper-bullets"></div>
            </div>
        </div>
    </div>
@endif
