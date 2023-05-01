@if($car->prepared_benefits)
    <div class="card-description">
        @foreach($car->prepared_benefits as $benefit)
            <div class="item">
                <div class="img">
                    {!! \App\Helper\ImageHelper::getPicture($benefit->image) !!}
                </div>
                <div class="text">
                    {!! $benefit->text !!}
                </div>
            </div>
        @endforeach
    </div>
@endif
