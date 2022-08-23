@props(['href' => '#', 'title' => '', 'icon' => '', 'label' => ''])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => "btn rounded-0 showLoaderOnClick"]) }}
    title="{{ $title }}">
    <i class="fa {{ $icon }}"></i> {{ $label }}
</a>
