<x-admin-layout :pageTitle="__('general.users')">
    <x-slot:page-heading>
    <h1>{{ __('admin.settings') }}</h1>
        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.settings') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <div class="text-right mb-2">
        @can('Manage App Settings')
            <a href="{{ route('admin.settings.create') }}"
                class="btn btn-primary showLoaderOnClick">{{ __('admin.new_setting') }}</a>
        @endcan
    </div>

    @foreach ($appSettings as $settingType => $settingTypeSettings)
        <x-admin.card title="{{ __('admin.settings') . ' : ' . Str::ucfirst($settingType) }}" class="card-primary">
            <table class="table table-collapsed table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('admin.id') }}</th>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settingTypeSettings as $index => $setting)
                        <tr>
                            <td>{{ $setting->id }}</td>
                            <td>{{ $setting->key }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>{{ $setting->sort_order }}</td>
                            <td>
                                <x-admin.edit-link href="{{ route('admin.settings.edit', $setting->id) }}">
                                </x-admin.edit-link>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-admin.card>
    @endforeach

</x-admin-layout>
