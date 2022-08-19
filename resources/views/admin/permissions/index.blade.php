<x-admin-layout :pageTitle="__('admin.permissions')">
    <x-slot:page-heading>
        <h1>{{ __('admin.permissions') }}</h1>
        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.administration') => '',
                __('admin.permissions') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <div class="text-right mb-2">
        @can('permissions.manage')
            <a href="{{ route('admin.permissions.create') }}"
                class="btn btn-primary showLoaderOnClick">{{ __('admin.new_permission') }}</a>
        @endcan
    </div>


    <x-admin.card title="{{ __('admin.permissions') }}" class="card-primary">
        <table id="permissionsTable" class="table table-collapsed table-stripped table-bordered">
            <thead>
                <tr>
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('admin.permission_name') }}</th>
                    <th>{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            @can('permissions.manage')
                                <x-admin.edit-link href="{{ route('admin.permissions.edit', $permission->id) }}">
                                </x-admin.edit-link>
                            @endcan

                            @can('permissions.manage')
                                <x-admin.delete-link href="{{ route('admin.permissions.destroy', $permission->id) }}">
                                </x-admin.delete-link>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-admin.card>

    <x-slot:footer-scripts>
        <script defer>
            window.onload = function() {
                $("#permissionsTable").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                });
            }
        </script>
        </x-slot:footer_scripts>
</x-admin-layout>
