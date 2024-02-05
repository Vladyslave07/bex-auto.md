@if(strlen($category->image) > 0 || strlen($category->h1) > 0)
<div class="banner bg">
    <div class="container">
        {{-- Breadcrumbs --}}
        {{ Breadcrumbs::render() }}
        <br>
        <br>
        <br>
        <h1 class="h1">
            {!! $category->domain_h1 !!}
        </h1>
        @if ($category->sub_title)
            <div class="h2 color-blue-xs">{!! $category->domain_sub_title !!}</div>
        @endif
        <span class="line"></span>
        @if ($category->sub_title_text)
            <div class="h3 color-blue">{!! $category->domain_sub_title_text !!}</div>
        @endif
        @if (strlen($category->image) > 0)
            {!! \App\Helper\ImageHelper::getPicture($category->image, $category->title, null, 'img') !!}
        @endif
    </div>
</div>
{{-- Call back form --}}
<livewire:forms.call-back :title="Lang::get('category.form.form_title')">
@endif
