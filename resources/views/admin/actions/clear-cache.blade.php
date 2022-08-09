<div class="col-sm-6 col-lg-3">
    <div class="card border-0 text-white bg-success">
        <div class="card-body">
            <div class="text-value">Удаление кеша:</div>
            <button class="btn btn-primary" onclick="deleteAllCache()" role="button">Удалить весь кеш</button>
        </div>
    </div>
</div>

<script>
    const deleteAllCache = () => {
        fetch('{{ route('clear-cache') }}');
        new Noty({
            type: "success",
            text: 'Кеш успешно удален',
        }).show();
    }
</script>
