<?php

namespace App\Http\Livewire\Todos;

use Livewire\Component;
use Livewire\Attributes\On;

class Todos extends Component
{
    public $todoList = [];
    public $comments;
    // public function  mount(){
    //     $this->todoList = [
    //         [
    //             'id' => 1,
    //             'name' => 'Công việc 1',
    //             'completed' => false
    //         ],
    //         [
    //             'id' => 2,
    //             'name' => 'Công việc 2',
    //             'completed' => false
    //         ],
    //         [
    //             'id' => 3,
    //             'name' => 'Công việc 3',
    //             'completed' => false
    //         ]
    //     ];
    // }
    // #[On('created-todo')]
    protected $listeners = ['created-todo' => 'createdTodo'];
    public function createdTodo($name){
       $this->todoList[] = [
            'id' => uniqid(),
            'name' => $name,
            'completed' => false
       ];
    }
    public function render()
    {
        return view('livewire.todos.todos');
    }
}
