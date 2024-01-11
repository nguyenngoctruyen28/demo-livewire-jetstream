<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class Comments extends Component
{
    // public $comments;
    use WithPagination;
    public $newComment;
    public $image;
    protected $listeners = ['fileUpload' => 'handleFileUpload'];
    public function handleFileUpload($imageData){
        $this->image = $imageData;
    }
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
    public function storeImage(){
        if(!$this->image){
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }
    public function addComment(){
        $this->validate();
        $image = $this->storeImage();
        $createdComment = Comment::create(['body'=>$this->newComment, 'user_id'=> 1, 'image' => $image]);
        // $this->comments->prepend($createdComment);
        $this->newComment= "";
        $this->image= "";
        session()->flash('message', 'Comment added successfully');
    }
    public function remove($commentId){
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
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