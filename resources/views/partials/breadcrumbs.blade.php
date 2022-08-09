@if (count($breadcrumbs) > 0)
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)

                    @if ($breadcrumb->url && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"
                                                       class="link-red">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="breadcrumb-item"
                            aria-current="page">{{ $breadcrumb->title }}</li>
                    @endif

                @endforeach

            </ol>
        </nav>
    </div>
@endif
