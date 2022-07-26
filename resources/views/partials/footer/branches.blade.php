<ul class="contacts">
    @foreach(\App\Models\Branch::branches() as $branch)
        <li>
            <div class="color-red">{{ $branch->city }}</div>
            {{ $branch->address }}
            <a href="tel:{{ \App\Helpers\StringHelper::preparePhone($branch->phone) }}">{{ $branch->phone }}</a>
        </li>
    @endforeach
</ul>