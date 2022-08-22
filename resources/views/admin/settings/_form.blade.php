@if (!isset($appSettings))
    <x-admin.input type="text" id="key" name="key" label="Key" placeholder="Enter Key" maxlength="100"
        value="{{ old('key') }}" />
@elseif (isset($appSettings) && $appSettings->is_system == 0)
    <x-admin.input type="text" id="key" name="key" label="Key" placeholder="Enter Key" maxlength="100"
        value="{{ old('key', $appSettings->key ?? '') }}" />
@endif

<x-admin.textarea type="text" id="value" name="value" label="New Value" placeholder="Enter Setting Value"
    value="{{ old('value', $appSettings->value ?? '') }}" />

<x-admin.input type="number" id="sort_order" name="sort_order" label="Sort Order"
    placeholder="{{ __('Enter Sort Order') }}" value="{{ old('sort_order', $appSettings->sort_order ?? '') }}"
    min="-100" max="1000000" />

<x-slot:footer>
    <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
    <a href="{{ route('admin.settings.index') }}" class="btn text-danger showLoaderOnClick">{{ __('general.cancel') }}</a>
</x-slot:footer>
