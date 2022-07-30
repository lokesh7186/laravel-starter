@props(['href' => '#', 'title' => 'Edit'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-success btn-sm rounded-0 showLoaderOnClick']) }}
    title="{{ $title }}">
    <i class="fa fa-edit"></i>
</a>
