@props(['value' => '', 'checked' => false, 'label' => '', 'id' => '', 'parentClass' => ''])

<div class="icheck-primary d-inline mx-2 {{ $parentClass }}">
    <input {{ $attributes->merge(['class' => 'form-check-input ']) }} type="radio" id="{{ $id }}"
        name="role" value="{{ $value }}" @checked($checked)>
    <x-admin.label class="form-check-label" :label="$label" :for="$id" />
</div>
