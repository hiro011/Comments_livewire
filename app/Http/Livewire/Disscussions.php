<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DisscussionTicket;
use App\Models\Comment;
use App\Models\UpVotes;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\DB;
use Livewire\withPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Disscussions extends Component
{
    use withPagination;
    use WithFileUploads;

    public $active = 1;
    public $newDisscussion;
    public $disscussionImage;
    public $searchKey;
    
    protected $listeners = [
        'fileUploadD' => 'handleFileUpload',
        'discussionSelected',
    ];
    public function discussionSelected($discussionId)
    {
        $this->active = $discussionId;   
    }

    public function handleFileUpload($imageData){
        $this->disscussionImage = $imageData;
    }
    
    public function updated($field){
        $this->validateOnly($field, ['newDisscussion' => 'required|max:255']);
    }

    public function addDisscussion(){
        $this->validate(['newDisscussion' => 'required|max:255']);
        $disscussionImage = $this->storeImage();
        if (session()->has('LoggedUser')){
            $userData = User::where('email', session('LoggedUser'))->first();
        }

        $createdDisscussion = DisscussionTicket::create([
            'question' => $this->newDisscussion,
            'image' => $disscussionImage,
            'user_id' => $userData->id,
            'vote' => 0,
        ]);
        $this->newDisscussion = "";
        $this->disscussionImage = "";

        session()->flash('message-add', 'Comment add successfully 😃 !');
    }
    
    public function storeImage(){
        if(!$this->disscussionImage){
            return null;
        } 

        $img = Image::make($this->disscussionImage)->encode('jpg');
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

    public function vote($discussionID, $vote){
        if (session()->has('LoggedUser')){
            $userData = User::where('email', session('LoggedUser'))->first();
        }

        $check = UpVotes::where('user_id', '=', $userData->id)
                      ->where('disscussion_id', '=', $discussionID)->first() ;
        $oldVote = DisscussionTicket::where('id', $discussionID)->first();

        if ($check){
            if($check->vote == $vote){
                $check->delete();
                    
                if($vote == 1){
                    $newVote =  $oldVote -> vote - 1;
                }
                elseif($vote == 0){
                    $newVote =  $oldVote -> vote + 1;
                }
            }else{
                $check->vote = $vote;
                $check->save();
                    
                if($vote == 1){
                    $newVote =  $oldVote -> vote + 2;
                }
                elseif($vote == 0){
                    $newVote =  $oldVote -> vote - 2;
                }
            }
        }
        else{
            $createdVote = UpVotes::create([
                'vote' => $vote,
                'user_id' => $userData->id,
                'disscussion_id' => $discussionID,
            ]);

            if($vote == 1){
                $newVote =  $oldVote -> vote + 1;
            }
            elseif($vote == 0){
                $newVote =  $oldVote -> vote - 1;
            }
        }
        $oldVote -> vote =  $newVote;
        $oldVote -> save();
    }

    public function render()
    {
        if (session()->has('LoggedUser')){
            $userData = User::where('email', session('LoggedUser'))->first();
        }
        $disscuss = DisscussionTicket::search('question', $this->searchKey)->latest()->paginate(6);

        $voteLists =  UpVotes::select('disscussion_id','vote')->where('user_id', '=', $userData->id)->get();
        $voteValues =  UpVotes::select('vote')->where('user_id', '=', $userData->id)->get();

        return view('livewire.disscussions')->with('discussions', $disscuss)
            ->with('voteLists', $voteLists)->with('voteValues', $voteValues);
    }
}
