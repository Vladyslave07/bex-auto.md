<div class="container">
    @if (count($cars) > 0)
        <h1 class="main-title text-center h1">{!! Lang::get('search.title', ['query' => request()->get('q')]) !!}</h1>
    @else
        <h2 class="main-title text-center">{!! Lang::get('search.not_found', ['query' => request()->get('q')]) !!}</h2>
    @endif
</div>