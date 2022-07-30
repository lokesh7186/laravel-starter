    <ol class="breadcrumb float-sm-right">
        @foreach ($data as $bLabel => $bLink)
            <li class="breadcrumb-item @if ($loop->last) active @endif">
                @if ($bLink == '')
                    {{ $bLabel }}
                @else
                    <a href="{{ $bLink }}">{{ $bLabel }}</a>
                @endif
            </li>
        @endforeach
    </ol>
