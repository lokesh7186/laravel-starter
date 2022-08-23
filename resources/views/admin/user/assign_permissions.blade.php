<x-admin-layout :pageTitle="__('admin.new_user')">
    <x-slot:page-heading>
        <h1>{{ __('User Permissions') }}</h1>

        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.new_user') => route('admin.users.index'),
                __('admin.new_user') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <div class="row">
        <div class="col-md-6">
            <form method="GET"
                action="{{ route('admin.user_permissions.search', ['username' => 'user-place-holder']) }}"
                id="selectUser">
                <x-admin.card :title="__('Select a User')" class="card-primary" showTools="true">

                    <x-admin.input name="username" value="{{ old('username', $username) }}"
                        label="{{ __('general.username') }}" id="searchUsername" />

                    <div class="row">
                        <button type="submit" class="btn btn-secondary btn-sm">{{ __('general.submit') }}</button>
                    </div>
                </x-admin.card>
            </form>
        </div>
        @isset($user)
            <div class="col-md-6">
                <div class=" table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">{{ $user->username }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>{{ $user->roles->pluck('name')->first() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>

    @isset($user)
        <form method="POST" action="{{ route('admin.user_permissions.store', ['username' => $username]) }}"
            id="savePermissions">
            @csrf
            @method('PUT')

            <x-admin.card :title="__('admin.permissions')" class="card-primary">

                <x-slot:customTools>
                    <label><input type="checkbox" class="form-check-input select-all-check"
                            data-target="#allPermissionsDiv"> {{ __('admin.select_all') }}</label>
                </x-slot:customTools>

                <div class="row" id="allPermissionsDiv">
                    @forelse($allPermissions as $permission)
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <x-admin.checkbox value="{{ $permission->id }}" label="{{ $permission->name }}"
                                name="user_permissions[{{ $loop->iteration }}]['name']" id="p-{{ $permission->id }}"
                                inline="true" checked="{{ $userPermissions->contains('id', $permission->id) }}" />
                        </div>
                    @empty
                        <div class="col">No Permission Defined Yet!</div>
                    @endforelse
                </div>

                <x-slot:footer>
                    <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
                    <a href="{{ route('admin.user_permissions.index') }}"
                        class="btn text-danger showLoaderOnClick">{{ __('general.cancel') }}</a>
                </x-slot:footer>
            </x-admin.card>
        </form>
    @endisset

    <x-slot:footer-scripts>
        <script defer>
            window.onload = function() {
                $('#selectUser').on('submit', function(e) {
                    e.preventDefault();
                    window.location.href = ($(this).attr('action').replace('user-place-holder', $.trim($(
                        '#searchUsername').val())));
                });
            }
        </script>
    </x-slot:footer-scripts>

</x-admin-layout>
