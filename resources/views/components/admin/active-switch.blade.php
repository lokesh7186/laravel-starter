@props(['name' => '', 'uid' => '', 'active' => false, 'idPrefix' => 'activeSwitch'])

<div class="custom-control custom-switch">
    <input type="checkbox" name="{{ $name }}" {{ $attributes->merge(['class' => 'custom-control-input']) }}
        id="{{ $idPrefix . $uid }}" data-id="{{ $uid }}" @if ($active) checked @endif>
    <label class="custom-control-label" for="{{ $idPrefix . $uid }}">Active</label>
</div>
