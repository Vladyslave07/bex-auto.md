<form class="form-choose-car" action="{{ route('news-callback') }}">
    @csrf
    <div class="title">{{ Setting::get('call_back_form_title') }}</div>
    <div class="form-group">
        <input name="name" class="form-control" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');">
    </div>
    <div class="form-group">
        <input name="phone" class="form-control" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel">
    </div>
    <button class="btn" type="submit">{{ \Illuminate\Support\Facades\Lang::get('forms.call_back_button') }}</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
       let formChooseCar = document.querySelector('.form-choose-car');
       if (formChooseCar) {
           formChooseCar.addEventListener('submit', e => {
               e.preventDefault();
               let form = e.target;
               let data = new FormData(e.target);
               let res = postFetchAsync(form.getAttribute('action'), data)
                   .then(response => {
                       window.location.href = response.link;
                   });


           })
       }
    });

    async function postFetchAsync(url, option) {
        let response = await fetch(url, {
            method: 'POST',
            body: option
        })
        return await response.json();
    }
</script>
