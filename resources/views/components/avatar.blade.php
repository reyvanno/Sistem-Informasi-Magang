@php
    $initial = strtoupper(substr($name, 0, 1));
@endphp

<div class="flex items-center justify-center bg-blue-600 text-white font-bold rounded-full
            w-12 h-12 text-xl select-none">
    {{ $initial }}
</div>
