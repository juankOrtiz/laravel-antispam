@php
    $campoNombre = config('antispam.campo_nombre');
    $campoTiempo = config('antispam.campo_tiempo');
@endphp

<div style="display: block">
    <!-- Campo oculto que no debe ser rellenado (solamente los bots lo harán) -->
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $campoNombre }}">Mi nombre</label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="{{ $campoNombre }}" id="{{ $campoNombre }}">
    </div>

    <!-- Campo oculto que calcula el tiempo que se tardó en rellenar el formulario -->
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $campoTiempo }}">Tiempo</label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="{{ $campoTiempo }}" id="{{ $campoTiempo }}" value=" {{ microtime(true) }}">
    </div>
</div>
