<x-admin-layout :pageTitle="__('admin.update_user') . ' : ' . $user->username">
    <x-slot:page-heading>
        <h1>{{ __('general.users') }}</h1>

        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('general.users') => route('admin.users.index'),
                $user->username => '',
                __('admin.update_user') => '',
            ]" />
        </x-slot:breadcrumb>

    </x-slot:page-heading>


    <form method="POST" action="{{ route('admin.users.update', ['user' => $user->id]) }}" id="userForm" class="">
        @method('PUT')
        @csrf
        <x-admin.card :title="__('admin.update_user') . ' : ' . $user->username . '     (' . $user->email . ')'" class="card-primary">
            @include('admin.user._form')
        </x-admin.card>
    </form>

    <x-slot:footer-scripts>
        <script defer>
            window.onload = function() {
                $.validator.setDefaults({
                    submitHandler: function(f) {
                        showLoader();
                        f.submit();
                    }
                });
                $('#userForm').validate({
                    rules: {
                        username: {
                            required: true,
                            minlength: 6
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        firstname: {
                            required: true,
                            minlength: 2
                        },
                        password: {
                            minlength: 5
                        },
                        password_confirmation: {
                            equalTo: "#password"
                        },
                        role: {
                            required: true
                        },
                    },
                    messages: {
                        email: {
                            required: "Please enter a email address",
                            email: "Please enter a valid email address"
                        },
                        password: {
                            minlength: "Your password must be at least 5 characters long"
                        },
                        password_confirmation: "Passwords do not match"
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            }
        </script>

        </x-slot:footer_scripts>

</x-admin-layout>
