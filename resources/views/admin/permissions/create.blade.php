<x-admin-layout :pageTitle="__('admin.new_permission')">
    <x-slot:page-heading>
        <h1>{{ __('admin.new_permission') }}</h1>

        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.new_permission') => route('admin.permissions.index'),
                __('admin.new_permission') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>

    <form method="POST" action="{{ route('admin.permissions.store') }}" id="permissionForm" class="">
        @csrf
        <x-admin.card :title="__('admin.new_permission')" class="card-primary">
            @include('admin.permissions._form')
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
                $('#permissionForm').validate({
                    rules: {
                        permissionName: {
                            required: true,
                        }
                    },
                    messages: {
                        permissionName: {
                            required: "Please enter a permission name"
                        }
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
