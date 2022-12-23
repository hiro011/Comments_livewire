<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\UpVotes;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\withPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;


class Comments extends Component
{
    use withPagination;
    use WithFileUploads;

    public $newComment;
    public $image;
    public $like;
    public $discussionId;
    public $searchKey = '';

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'discussionSelected',
    ];
    public function discussionSelected($discussionId){
        $this->discussionId = $discussionId;   
    }

    public function handleFileUpload($imageData){
        $this->image = $imageData;
    }

    public function updated($field){
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
        // $this->validateOnly($field, ['searchKey' => 'required|max:255']);
    }

    public function addcomment(){
        $this->validate(['newComment' => 'required|max:255']);
        $image = $this->storeImage();
        if (session()->has('LoggedUser')){
            $userData = User::where('email', session('LoggedUser'))->first();
            // $loggedUser = ['userData' => User::where('email', session('LoggedUser'))->first()];
        }
        $createdComment = Comment::create([
            'body' => $this->newComment, 
            'user_id' => $userData->id,
            'image' => $image,
            'likes' => 0,
            'support_ticket_id' => $this->discussionId
        ]);
        $this->newComment = "";
        $this->image = "";

        session()->flash('message-add', 'Comment add successfully 😃 !');
    }
    
    public function storeImage(){
        if(!$this->image){
            return null;
        } 

        $img = Image::make($this->image)->encode('jpg');
        $name = Str::random().'.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentID){
        $comment = Comment::find($commentID);
        if ($comment->image) {
            Storage::disk('public')->delete($comment->image);
        }
        $comment->delete();

        session()->flash('message-remove', 'Comment deleted successfully 🙂 !');
    }

    public function like($commentID){
        if (session()->has('LoggedUser')){
            $userData = User::where('email', session('LoggedUser'))->first();
        }

        $check = Likes::where('user_id', '=', $userData->id)
                      ->where('comment_id', '=', $commentID)->first() ;
        $oldLike = Comment::where('id', $commentID)->first();
                    
        if ($check){
            $check->delete();

            $newLike =  $oldLike -> likes - 1;
        }
        else{
            $createdLike = Likes::create([
                'user_id' => $userData->id,
                'comment_id' => $commentID,
            ]);

            $newLike =  $oldLike -> likes + 1;
        }
            $oldLike -> likes =  $newLike;
            $oldLike -> save();
    }

    public function render()
    {
        $userData = User::where('email', session('LoggedUser'))->first();

        $commentsLists =  Comment::search('body', $this->searchKey)->where('support_ticket_id', $this->discussionId)->latest()->paginate(3);
        $likeLists =  Likes::select('comment_id')->where('user_id', '=', $userData->id)->get();
        
        return view('livewire.comments')->with('comments', $commentsLists)
                ->with('likeList', $likeLists);
    }
}
