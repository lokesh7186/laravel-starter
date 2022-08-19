<x-admin.input type="text" id="permissionName" name="permissionName" :label="__('admin.permission_name')"
    placeholder="{{ __('Enter Permission') }}" maxlength="100"
    value="{{ old('permissionName', $permission->name ?? '') }}" />

<x-slot:footer>
    <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
    <a href="{{ route('admin.permissions.index') }}"
        class="btn text-danger showLoaderOnClick">{{ __('general.cancel') }}</a>
</x-slot:footer>
