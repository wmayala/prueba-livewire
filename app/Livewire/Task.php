<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{

    public $tasks;
    public TaskModel $task;

    protected $rules=[
        'task.title'=>'required|max:45'
    ];

    public function mount()
    {
        $this->tasks=TaskModel::get();
        $this->task=new TaskModel();
    }

    public function save()
    {
        $this->validate();
        $this->task->save();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
