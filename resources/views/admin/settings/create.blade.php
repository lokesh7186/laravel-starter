<x-admin-layout :pageTitle="__('admin.new_setting')">
    <x-slot:page-heading>
        <h1>{{ __('admin.update_setting') }}</h1>
        <x-slot:breadcrumb>
            <x-admin.breadcrumbs :data="[
                __('general.home') => route('admin.dashboard'),
                __('admin.settings') => route('admin.settings.index'),
                __('admin.new_setting') => '',
            ]" />
        </x-slot:breadcrumb>
    </x-slot:page-heading>


    <form method="POST" action="{{ route('admin.settings.store') }}" id="settingsForm">
        @csrf
        <x-admin.card :title="__('admin.new_setting')" class="card-primary">
            @include('admin.settings._form')
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
                $('#settingsForm').validate({
                    rules: {
                        key: {
                            required: true,
                            minlength: 2
                        },
                        value: {
                            required: true,
                        },
                        sort_order: {
                            required: true,
                            number: true,
                        }
                    },
                    messages: {
                        key: {
                            required: "Please enter a Valid Setting Key",
                        },
                        value: {
                            required: "Please enter a Value Setting Value",
                        },
                        sort_order: {
                            required: 'Please enter a valid Sort Order',
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
