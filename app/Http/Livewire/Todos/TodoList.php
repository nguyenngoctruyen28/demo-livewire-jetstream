<?php

namespace App\Http\Livewire\Todos;

use Livewire\Component;

class TodoList extends Component
{
    public $todoList = [];
    public function mount($todoList = []){
        $this->todoList = $todoList;
    }
    public function render()
    {
        return view('livewire.todos.todo-list');
    }
}
