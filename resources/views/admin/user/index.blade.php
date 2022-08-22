<x-admin-layout :pageTitle="__('general.users')">
    <x-slot:page-heading>
        <h1>{{ __('general.users') }}</h1>
        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.administration') => '',
                __('general.users') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <div class="text-right mb-2">
        @can('users.manage')
            <a href="{{ route('admin.users.create') }}"
                class="btn btn-primary showLoaderOnClick">{{ __('admin.new_user') }}</a>
        @endcan
    </div>


    <x-admin.card title="{{ __('admin.users_list') }}" class="card-primary">
        <table id="usersTable" class="table table-collapsed table-stripped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Username') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('admin.active') }}</th>
                    <th>{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname . ' ' . $user->firstname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin)
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-pill badge-primary">{{ $role->name }}</span>
                                @endforeach
                            @else
                                <span class="badge badge-pill badge-secondary">Frontend User</span>
                            @endif
                        </td>
                        <td>
                            <x-admin.active-switch :uid="$user->id" :active="$user->active == 1" name="user_status"
                                class="user-active-switch" />
                        </td>
                        <td>
                            @can('users.manage')
                                <x-admin.edit-link href="{{ route('admin.users.edit', $user->id) }}">
                                </x-admin.edit-link>
                            @endcan

                            @can('users.manage')
                                <x-admin.delete-link href="{{ route('admin.users.destroy', $user->id) }}">
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
                // $("#usersTable").DataTable({
                //     "responsive": true,
                //     "lengthChange": false,
                //     "autoWidth": false,
                //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                // }).buttons().container().appendTo('#usersTable_wrapper .col-md-6:eq(0)');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.user-active-switch').each(function() {
                    $(this).on('change', function(e) {
                        e.preventDefault();

                        let clickedCheckbox = $(this);

                        var isActive = clickedCheckbox.prop('checked') ? 1 : 0;

                        var url = "{{ route('admin.users.toggle_status', ':userId') }}";
                        url = url.replace(':userId', clickedCheckbox.data('id'));

                        showLoader();
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: {
                                'isActive': isActive,
                                '_method': 'PUT'
                            },
                            success: function(data) {
                                hideLoader();
                                if (data.errors) {
                                    alert(data.message);
                                    window.location.reload();
                                } else if (data.success) {
                                    alert(data.success);
                                }
                            },
                            error: function(xhr, exception) {
                                var msg = "";
                                if (xhr.status === 0) {
                                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                                } else if (xhr.status == 404) {
                                    msg = "Requested page not found. [404]" + xhr.responseText;
                                } else if (xhr.status == 500) {
                                    msg = "Internal Server Error [500]." + xhr.responseText;
                                } else if (exception === "parsererror") {
                                    msg = "Requested JSON parse failed.";
                                } else if (exception === "timeout") {
                                    msg = "Time out error." + xhr.responseText;
                                } else if (exception === "abort") {
                                    msg = "Ajax request aborted.";
                                } else {
                                    msg = "Error:" + xhr.status + " " + xhr.responseText;
                                }
                            }
                        });
                    })
                });

            }
        </script>
        </x-slot:footer_scripts>
</x-admin-layout>
