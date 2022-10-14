<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 1;
    public $newComment;
    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
    public $comments = [
        [
            'created_at' => '3 min ago',
            'creator' => 'Sarthak',
            'body' => 'Lorem ipsum dolor sit amit consectuatur. hello my name is sarthak and i like this application
            thank for the Lorem ipsum dolor developer. bla bla bla... 
            thank for the is sarthak and i like th Lorem ipsum olor sit amit consectuatur. dolor developer. bla bla bla... '
        ] 
    ];

    public function addcomment()
    {
        array_unshift($this->comments, [
            'created_at' => '1 min ago',
            'creator' => 'Ahmed',
            'body' => 'Hello there, this is new comment'
        ]);
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}
