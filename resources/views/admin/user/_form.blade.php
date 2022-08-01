<x-admin.input type="text" id="username" name="username" :label="__('general.username')" placeholder="Enter Username" maxlength="15"
    value="{{ old('username', $user->username ?? '') }}" />

<x-admin.input type="text" id="email" name="email" :label="__('general.email_add')" placeholder="Enter Email address" maxlength="150"
    value="{{ old('email', $user->email ?? '') }}" />

<x-admin.input type="text" id="firstname" name="firstname" :label="__('admin.user_first_name')" placeholder="Enter First Name"
    maxlength="15" value="{{ old('firstname', $user->firstname ?? '') }}" />

<x-admin.input type="text" id="lastname" name="lastname" :label="__('admin.user_last_name')" placeholder="Enter Last Name" maxlength="15"
    value="{{ old('lastname', $user->lastname ?? '') }}" />

<div class="form-group">
    <div><label for="role">Role</label></div>
    @foreach ($roles as $role)
        <div class="icheck-primary d-inline mx-2">
            <input class="form-check-input" type="radio" id="role{{ $role->id }}" name="role"
                value="{{ $role->name }}" @checked(old('role', isset($user) ? $user->roles->pluck('name')->first() : '') == $role->name)>
            <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
        </div>
    @endforeach
</div>

<x-admin.card class="card-secondary" :showTools="true" :title="isset($user) ? __('general.change_password') : __('general.password')">

    <x-admin.input type="password" id="password" name="password" label="{{ __('general.password') }}"
        placeholder="Password" maxlength="25" />

    <x-admin.input type="password" id="passwordCnf" name="password_confirmation"
        label="{{ __('general.confirm_password') }}" placeholder="Confirm Password" maxlength="25" />

    @if (isset($user))
        <x-slot:footer><small>{{ __('admin.password_change_note') }}</small></x-slot:footer>
    @endif
</x-admin.card>
