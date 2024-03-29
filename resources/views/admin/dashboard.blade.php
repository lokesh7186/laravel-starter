<x-admin-layout :pageTitle="__('admin.dash_welcome')">

    <x-slot:page-heading>
        <h1>{{ __('general.dashboard') }}</h1>
        <x-slot:breadcrumb>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{ __('general.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('general.dashboard') }}</li>
            </ol>
        </x-slot:breadcrumb>
    </x-slot:page-heading>


    <x-admin.card :title="__('general.dashboard')" class="card-primary">
        {{ $appName . ' : ' . __('admin.dash_welcome') }}
    </x-admin.card>

</x-admin-layout>
