<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {{ $footer }}
    </div>
    <!-- /.card-footer-->
</div>
