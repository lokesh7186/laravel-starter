<div class="form-group">
    <x-admin.label :label="$label" :for="$attributes->get('id') ?: ''" />

    <div class="input-group">

        <textarea {!! $attributes->merge(['class' => 'form-control ']) !!} name="{{ $name }}"
            @if ($label && $attributes->get('id')) id="{{ $attributes->get('id') }}" @endif>{{ $value }}</textarea>

    </div>

    {!! $help ?? null !!}

</div>
