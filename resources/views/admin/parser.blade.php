@extends(backpack_view('blank'))

@section('content')
    <div class="row">
        <div class="col-md-8 bold-labels">
            <form method="post" class="parser-from" action="https://demo.backpackforlaravel.com/admin/menu-item/7">
                @csrf

                <div class="card">
                    <div class="card-body row">
                        <div class="form-group col-sm-12">
                            <label>Ссылка на список лотов</label>
                            <input type="text" name="lots_url" value="{{ $parserInfo->where('slug', 'lots_url')->first()->value }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Ссылка на детальную страницу лота</label>
                            <input type="text" name="detail_url" value="{{ $parserInfo->where('slug', 'detail_url')->first()->value }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Токен</label>
                            <input type="text" name="token" value="{{ $parserInfo->where('slug', 'token')->first()->value }}" class="form-control">
                        </div>

                        <div class="form-group col-sm-12">

                            <label>Parent</label>

                            <select name="category" class="form-control">

                                @if (!$parserInfo->where('slug', 'token')->first()->value)
                                    <option value="">-</option>
                                @endif

                                @foreach($categories as $category)

                                    <option
                                            value="{{ $category->id }}"
                                            @if($parserInfo->where('slug', 'category')->first()->value == $category->id) selected @endif
                                    >
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="hidden">
                            <input type="hidden" name="id" value="7" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="d-none" id="parentLoadedAssets">[]</div>
                <div id="saveActions" class="form-group">
                    <input type="hidden" name="_save_action" value="save_and_back">
                    <div class="btn-group" role="group">

                        <button type="submit" class="btn btn-success">
                            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Сохранить значения</span>
                        </button>
                    </div>

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-warning" onclick="downloadLots()">
                            <span class="la la-download" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Заупстить парсер</span>
                        </button>

                    </div>

                    <a href="{{ route('parser') }}" class="btn btn-error"><span class="la la-ban"></span>Отмена</a>

                </div>

            </form>
        </div>
    </div>
@endsection

<script>

    function sendData(url, data) {
        return fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                "X-CSRF-Token": data._token
            },
            body: data
        });
    }

    function parserInfoSave() {
        let parserForm = document.querySelector('.parser-from');
        if (!parserForm) {return}

        parserForm.addEventListener('submit', e => {
            e.preventDefault();

            let formData = new FormData(e.target);

            // Start saving parser data
            sendData('{{ route('save-parser-info') }}', JSON.stringify(Object.fromEntries(formData)));

            new Noty({
                type: "success",
                text: 'Данные успешно сохранены',
            }).show();
        })
    }

    function downloadLots() {
        new Noty({
            type: "success",
            text: 'Запущен процесс скачивания лотов',
        }).show();

        fetch('{{ route('download-lots') }}')
    }

    document.addEventListener('DOMContentLoaded', () => {
        parserInfoSave();
    })
</script>
