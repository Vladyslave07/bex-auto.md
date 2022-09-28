@extends(backpack_view('blank'))


<style>
    .info-queue {
        max-width: 405px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-8 bold-labels">
            <form method="post" class="parser-from" action="https://demo.backpackforlaravel.com/admin/menu-item/7">
                @csrf

                <div class="card">
                    <div class="card-body row">
                        <div class="form-group col-sm-12">
                            <label>Ссылка на список лотов</label>
                            <input type="text" name="lots_url"
                                   data-prev-value="{{ $parserInfo->where('slug', 'lots_url')->first()->value }}"
                                   value="{{ $parserInfo->where('slug', 'lots_url')->first()->value }}"
                                   class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Ссылка на детальную страницу лота</label>
                            <input type="text" name="detail_url"
                                   data-prev-value="{{ $parserInfo->where('slug', 'detail_url')->first()->value }}"
                                   value="{{ $parserInfo->where('slug', 'detail_url')->first()->value }}"
                                   class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Токен</label>
                            <input type="text" name="token"
                                   data-prev-value="{{ $parserInfo->where('slug', 'token')->first()->value }}"
                                   value="{{ $parserInfo->where('slug', 'token')->first()->value }}"
                                   class="form-control">
                        </div>

                        <div class="form-group col">

                            <label>Категория</label>

                            <select name="category" class="form-control" data-prev-value="{{ $parserInfo->where('slug', 'category')->first()->value }}">

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

                        <div class="form-group col">
                            <label>Статус машины</label>

                            <select name="status" class="form-control" data-prev-value="{{ $parserInfo->where('slug', 'status')->first()->value }}">
                                @foreach($statuses as $status)
                                    <option
                                            value="{{ $status }}"
                                            @if($parserInfo->where('slug', 'status')->first()->value == $status) selected @endif
                                    >
                                        @lang('backpack::fields.option.' . $status)
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>


                <div id="saveActions" class="form-group">
                    <input type="hidden" name="_save_action" value="save_and_back">
                    <div class="btn-group" role="group">

                        <button type="submit" class="btn btn-success">
                            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Сохранить значения</span>
                        </button>
                    </div>

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-warning run-parser" onclick="downloadLots()">
                            <span class="la la-download" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Запустить парсер</span>
                        </button>

                    </div>

                    <a href="{{ route('parser') }}" class="btn btn-error"><span class="la la-ban"></span>Отмена</a>

                </div>

            </form>

        </div>

        <div class="col-md-4 queue-info">
            @foreach($infoQueues as $info)
                <div class="card info-queue">
                    <div class="card-body">
                        <p>Id: {{ $info->id }}</p>
                        <span>{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</span>
                        @if ($info->attempts > 0)
                            <p>Лоты загружаются</p>
                        @else
                            <p>В очереди на загрузку</p>
                        @endif
                    </div>
                </div>
            @endforeach
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
        if (!parserForm) {
            return
        }

        parserForm.addEventListener('submit', e => {
            e.preventDefault();

            let formData = new FormData(e.target);

            // Start saving parser data
            sendData('{{ route('save-parser-info') }}', JSON.stringify(Object.fromEntries(formData)));

            new Noty({
                type: "success",
                text: 'Данные успешно сохранены',
            }).show();
            document.querySelector('.parser-from').querySelector('.run-parser').disabled = false;
        })
    }

    // Start download Lots
    function downloadLots() {
        new Noty({
            type: "success",
            text: 'Запущен процесс скачивания лотов',
        }).show();

        fetch('{{ route('download-lots') }}')

        fetch('{{ route('parser-queue-info') }}').then(response => {
            return response.json();
        }).then(data => {
            let wrap = document.querySelector('.queue-info');

            if (data.data.length) {
                let result = ''
                data.data.forEach(element => {
                    result += makeInfoBlock(element)
                });
                wrap.innerHTML = result;
            }
        });
    }

    function makeInfoBlock(info) {
        return `<div class="card info-queue"> <div class="card-body">
        <p>Id: ${info.id}</p>
        <span>${info.time}</span>
        <p>${info.attempts > 0 ? 'Лоты загружаются' : 'В очереди на загрузку'}</p>
        </div>
        </div>`
    }

    // If manager changing fields, not allow begin downloading lots before manager doesn't save changed fields
    function checkFields() {
        let form = document.querySelector('.parser-from');

        let inputs = form.querySelectorAll('input');
        let selects = form.querySelectorAll('select');

        inputs.forEach(input => {
            input.addEventListener('input', e => {
                form.querySelector('.run-parser').disabled = e.target.value !== e.target.dataset.prevValue;
            })
        });

        selects.forEach(select => {
            select.addEventListener('change', e => {
                form.querySelector('.run-parser').disabled = e.target.value !== e.target.dataset.prevValue;
            })
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        parserInfoSave();
        checkFields();
    })
</script>
