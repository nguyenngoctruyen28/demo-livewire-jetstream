<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;
class Comments extends Component
{
    // public $comments;
    use WithPagination;
    public $newComment;
    public $image;
    protected $rules = [
        'newComment' => 'required|min:6|max:255',
    ];
    public function updated($rules)
    {
        $this->validateOnly($rules);
    }
    // public function mount(){
    //     $initialComments = Comment::latest()->paginate(2);
    //     $this->comments = $initialComments;
    // }
    public function addComment(){
        $this->validate();
        $createdComment = Comment::create(['body'=>$this->newComment, 'user_id'=> 1]);
        // $this->comments->prepend($createdComment);
        $this->newComment= "";
        session()->flash('message', 'Comment added successfully');
    }
    public function remove($commentId){
        $comment = Comment::find($commentId);
        $comment->delete();
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message_deleted', 'Comment deleted successfully');
    }
    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}