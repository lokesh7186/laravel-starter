<x-admin-layout :pageTitle="__('admin.new_user')">
    <x-slot:page-heading>
        <h1>{{ __('general.users') }}</h1>
        <x-slot:breadcrumb>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">{{ __('admin.administration') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ __('general.users') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __('admin.new_user') }}</a></li>
            </ol>
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-admin.validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('admin.users.store') }}" id="userForm" class="showLoadingOnSubmit">
                    @csrf
                    <x-admin.card :title="__('admin.new_user')" class="card-primary">

                        @include('admin.user._form')

                        <x-slot:footer>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.users.index') }}"
                                class="btn text-danger showLoaderOnClick">{{ __('general.cancel') }}</a>
                        </x-slot:footer>
                    </x-admin.card>
                </form>

                <x-slot:footer-scripts>
                    <script defer>
                        window.onload = function() {
                            $.validator.setDefaults({
                                submitHandler: function(f) {
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
                                        required: true,
                                        minlength: 5
                                    },
                                    password_confirmation: {
                                        minlength: 5,
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
                                        required: "Please provide a password",
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

            </div>
        </div>
    </div>
</x-admin-layout>
