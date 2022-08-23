<x-admin.card title="{{ __('admin.filters') }}" class="card-primary">
    <form method="GET" action="{{ route('admin.users.index') }}">
        <x-admin.input :label="__('Search User')" value="{{ $searchUser }}" placeholder="Enter Search Term" id="searchUser"
            name="searchUser" />
    </form>
    <x-slot:footer>
        <button type="button" class="btn btn-primary">{{ __('admin.search') }}</button>
        @if (!empty($searchUser))
            <a href="{{ route('admin.users.index') }}" class="btn">{{ __('admin.reset') }}</a>
        @endif
    </x-slot:footer>
</x-admin.card>
