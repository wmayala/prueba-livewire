<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    // Variables que serán accesibles desde la vista
    public $tasks;
    public $title;

    // Validación de los campos a solicitar
    protected $rules = ['title' => 'required|max:45'];

    // Se ejecuta una sola vez al cargar la página
    public function mount()
    {
        // Carga el contenido de la tabla
        $this->tasks = TaskModel::get();

        // Limpia la variable cada vez que se guarda una tarea
        $this->title = '';
    }

    // Función para guardar en la base de datos
    public function save()
    {
        // Valida según las reglas definidas antes
        $this->validate();

        // Crea un nuevo registro en la tabla con el valor capturado en la variable de la vista
        TaskModel::create([
            'title'=>$this->title
        ]);

        // Vuelve a ejecutar la función mount para actualizar el listado y limpiar el input
        $this->mount();
    }

    // Ejecuta la vista relacionada
    public function render()
    {
        return view('livewire.task');
    }
}
