<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" maxlength="15"
        value="{{ old('username', $user->username ?? '') }}">
</div>
<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" maxlength="150"
        value="{{ old('email', $user->email ?? '') }}">
</div>
<div class="form-group">
    <label for="username">First Name</label>
    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name"
        maxlength="15" value="{{ old('firstname', $user->firstname ?? '') }}">
</div>
<div class="form-group">
    <label for="username">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name"
        maxlength="15" value="{{ old('lastname', $user->lastname ?? '') }}">
</div>

<div class="form-group">
    <div><label for="passwordCnf">Role</label></div>
    @foreach ($roles as $role)
        <div class="icheck-primary d-inline mx-2">
            <input class="form-check-input" type="radio" id="role{{ $role->id }}" name="role"
                value="{{ $role->name }}" @checked(old('role', isset($user) ? $user->roles->pluck('name')->first() : '') == $role->name)>
            <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
        </div>
    @endforeach
</div>

<x-admin.card :title="__('general.change_password')" class="card-secondary" :showTools="true">
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
            maxlength="25">
    </div>
    <div class="form-group">
        <label for="passwordCnf">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="passwordCnf"
            placeholder="Confirm Password" maxlength="25">
    </div>
    <x-slot:footer><small>Enter New Password if you want to change the password. Leave Blank for no change.</small></x-slot:footer>
</x-admin.card>
