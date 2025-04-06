@props(['name'])

@error($name)
<div class="text-red-500 text-sm font-semibold mt-1">
    {{ $message }}
</div>
@enderror
