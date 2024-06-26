<div>
    <form class="p-4" wire:submit.prevent='save'>
        <div class="mb-4">
            <input wire:model='title' class="p-2 bg-gray-200 w-full" type="text" placeholder="Escriba una tarea para agregar...">
            @error('title')<div class="mt-1 text-red-600 text-sm">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="bg-indigo-700 text-white font-bold w-full rounded shadow p-2">Guardar</button>
    </form>
    @if(session()->has('message'))
        <h3>
            <div id="alert-border-3" class="fixed top-0 right-0 z-50 flex items-center p-4 mb-4 text-green-800 border-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{session('message')}}
                </div>
            </div>
        </h3>
    @endif
    <table class="shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">Hecha</th>
                <th class="py-3 px-6 text-left">Tarea</th>
                <th class="py-3 px-6 text-left">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @forelse($tasks as $task)
            <tr class="border-b border-gray-200">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{$task->title}}</td>
                <td class="px-4 py-2">
                    <button type="button" class="bg-indigo-400 px-2 py-1 text-white text-xs rounded">Editar</button>
                    <button type="button" class="bg-red-500 px-2 py-1 text-white text-xs rounded">Eliminar</button>
                </td>
            </tr>
            @empty
            <h3>No existen tareas para mostrar</h3>
            @endforelse
        </tbody>
    </table>
</div>
