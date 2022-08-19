<x-admin-layout :pageTitle="__('admin.update_permission') . ' : ' . $permission->name">
    <x-slot:page-heading>
        <h1>{{ __('admin.permissions') }}</h1>

        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.permissions') => route('admin.permissions.index'),
                $permission->name => '',
                __('admin.update_permission') => '',
            ]" />
        </x-slot:breadcrumb>

    </x-slot:page-heading>


    <form method="POST" action="{{ route('admin.permissions.update', ['permission' => $permission->id]) }}"
        id="permissionForm" class="">
        @method('PUT')
        @csrf
        <x-admin.card :title="__('admin.update_permission') . ' : ' . $permission->name" class="card-primary">
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
                            required: "Please enter a Permission Name",
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
