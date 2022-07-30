@props(['href' => '#', 'title' => 'Delete'])

<form action="{{ $href }}" method="POST" class="d-inline deleteForm">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm rounded-0" type="submit" title="{{ $title }}"><i
            class="fa fa-trash"></i></button>
</form>
