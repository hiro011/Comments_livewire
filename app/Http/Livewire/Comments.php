<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use Livewire\withPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Comments extends Component
{
    use withPagination;
    use WithFileUploads;

    public $newComment;
    public $image;
    public $ticketId;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected',
    ];
    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;   
    }

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
            'image' => $image,
            'support_ticket_id' => $this->ticketId
        ]);
        $this->newComment = "";
        $this->image = "";

        session()->flash('message-add', 'Comment add successfully :D !');
    }
    public function storeImage()
    {
        if(!$this->image){
            return null;
        } 

        $img = Image::make($this->image)->encode('jpg');
        $name = Str::random().'.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentID)
    {
        $comment = Comment::find($commentID);
        if ($comment->image) {
            Storage::disk('public')->delete($comment->image);
        }
        $comment->delete();

        session()->flash('message-remove', 'Comment deleted successfully :) !');
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(3)]);
    }
}
