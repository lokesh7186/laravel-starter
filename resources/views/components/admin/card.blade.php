@props(['showTools' => false, 'title' => ''])

<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>

        @if ($customTools)
            <div class="card-tools">{{ $customTools }}</div>
        @endif

        @if ($showTools)
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <!-- /.card-body -->
    @if (!empty($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
    <!-- /.card-footer-->
</div>
