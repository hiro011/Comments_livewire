<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use Livewire\withPagination;
use Livewire\WithFileUploads;


class Comments extends Component
{
    use withPagination;
    use WithFileUploads;

    public $newComment;
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }

    public function addcomment()
    {
        $this->validate(['newComment' => 'required|max:255']);
        $image = $this->storeImage();
        $createdComment = Comment::create([
            'body' => $this->newComment, 'user_id' => 1,
            'image' => $image
        ]);
        $this->newComment = "";

        session()->flash('message-add', 'Comment add successfully :D !');
    }
    public function storeImage()
    {
        if(!$this->image){
            return null;
        } 

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        Storage::put('image.jpg', $this->image);
    }

    public function remove($commentID)
    {
        $comment = Comment::find($commentID);
        $comment->delete();

        session()->flash('message-remove', 'Comment deleted successfully :) !');
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::latest()->paginate(3)]);
    }
}
