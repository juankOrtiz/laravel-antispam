<div style="display: block">
    <!-- Campo oculto que no debe ser rellenado (solamente los bots lo harán) -->
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="mi_nombre">Mi nombre</label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="mi_nombre" id="mi_nombre">
    </div>

    <!-- Campo oculto que calcula el tiempo que se tardó en rellenar el formulario -->
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="tiempo">Tiempo</label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="tiempo" id="tiempo" value=" {{ microtime(true) }}">
    </div>
</div>
