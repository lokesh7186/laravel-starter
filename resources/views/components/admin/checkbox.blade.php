@props(['name' => '', 'value' => '', 'checked' => false, 'label' => '', 'id' => '', 'inline' => false])

<div class="form-check form-check-inline">
    <input {{ $attributes->merge(['class' => 'form-check-input ']) }} type="checkbox" @checked($checked)
        name="{{ $name }}" value="{{ $value }}" id="{{ $id }}">
    <x-admin.label class="form-check-label" :label="$label" :for="$id" />
</div>
