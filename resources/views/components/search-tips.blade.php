<div class="menu-search">
    <nav>
        @foreach($items as $item)
            <a href="#">{{ $item->title }}</a>
        @endforeach
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.menu-search nav a').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector('.search input').value = item.innerText;
                });
            });
        });
    </script>
</div>
