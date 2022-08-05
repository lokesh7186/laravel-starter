<div class="form-group">
    <div>
        <x-admin.label :label="$label" :for="$attributes->get('id') ?: ''" />
    </div>

    <div class="input-group">
        @isset($prepend)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            </div>
        @endisset

        <input {{ $attributes->merge(['class' => 'form-control ']) }} type="{{ $type }}"
            value="{{ $value }}" name="{{ $name }}"
            @if ($label && $attributes->get('id')) id="{{ $attributes->get('id') }}" @endif />

        @isset($append)
            <div class="input-group-append">
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            </div>
        @endisset

    </div>

    {!! $help ?? null !!}

</div>
