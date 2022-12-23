<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;



class Register extends Component
{
    public $image;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $listeners = [ 'fileUpload' => 'handleFileUpload' ];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    // public $form = [
    //     'name' => '',
    //     'email' => '',
    //     'password' => '',
    //     'password_confirmation' => '',
    //     'image' => '',
    // ];

    public function submit()
    { 
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $image = $this->storeImage();

        // User::create($this->form);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $image,
        ]);

        return redirect(route('login'));
    }

    public function storeImage()
    {
        if(!$this->image){
            return NULL;
        }else{
            $img = Image::make($this->image)->encode('jpg');
            $name = Str::random().'.jpg';
            Storage::disk('public')->put($name, $img);
            return $name;
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}
