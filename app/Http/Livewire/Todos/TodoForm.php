<?php

namespace App\Http\Livewire\Todos;

use Livewire\Component;

class TodoForm extends Component
{
    public $name = null;
    public function handleAdd(){
        if($this->name){
            $this->emit('created-todo', $this->name);
            $this->reset();
            session()->flash('msg', 'Thêm thành công');
        }else{
            session()->flash('msg', 'Thêm không thành công');
        }
    }
    public function render()
    {
        return view('livewire.todos.todo-form');
    }
}
