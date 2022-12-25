<div>
    <style>
        .imgBox:hover{
            opacity: .7;
            color: blue;
        }
    </style>

    <h1 class="font-bold text-center text-3x1"> Disscussion </h1>

    <div>
        @if(session()->has('message-add'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message-add') }}
            </div>
        @endif
        @if(session()->has('message-remove'))
            <div class="p-3 bg-red-300 text-red-800 rounded shadow-sm">
                {{ session('message-remove') }}
            </div>
        @endif
    </div>

    <section class="flex justify-center my-2">
        @if($disscussionImage)
            <label for="disscussImage" class="cursor-pointer"> <img src="{{$disscussionImage}}" width="200"> </label>
            </br> 
        @else
            <label for="disscussImage" class="border rounded px-5 py-3 border-black bg-white shadow imgBox cursor-pointer"> Add image </label>
            </br> 
        @endif
        <input type="file" id="disscussImage" class="cursor-pointer d-none" wire:change="$emit('fileChoosen2')">
    </section>
  
	@error('newDisscussion')
		<span class="text-red-500 text-sm">{{$message}}</span>
	@enderror

    <form class="my-4 flex" wire:submit.prevent="addDisscussion">
        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Write disscussion" 
        wire:model.debounce.500ms="newDisscussion">
		
        <div class="py-2">
            <button type="submit" class="p-2 bg-info w-20 rounded shadow text-white" >Add</button>
        </div>
    </form> 

    <hr>
    <div class="flex">
    	<input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Search disscussion..." 
			title="search" wire:model="searchKey">
    </div> 

    @foreach ($discussions as $discussion)
        <div class="rounded border shadow p-3 my-2 cursor-pointer {{$active == $discussion->id ? 'bg-blue-200':''}}" wire:click="$emit('discussionSelected', {{$discussion->id}})">
            <div class="flex justify-between">
                <div class="flex">
                    <div class="flex flex-col">
                        <p>{{$discussion->vote}}</p>
                        @if ($voteLists->contains('disscussion_id', $discussion->id))
                            @foreach ($voteLists as $vot)
                                @if ($vot->disscussion_id == $discussion->id)
                                    @if ($vot->vote == 1)
                                        <button wire:click="vote({{$discussion->id}}, {{1}})" class="text-blue-500"> <i class="fa-solid fa-caret-up"></i> </button>
                                        <button wire:click="vote({{$discussion->id}}, {{0}})"> <i class="fa-solid fa-caret-down"></i> </button>
                                        @break
                                    @else
                                        <button wire:click="vote({{$discussion->id}}, {{1}})"> <i class="fa-solid fa-caret-up"></i> </button>
                                        <button wire:click="vote({{$discussion->id}}, {{0}})" class="text-blue-500"> <i class="fa-solid fa-caret-down"></i> </button>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <button wire:click="vote({{$discussion->id}}, {{1}})"> <i class="fa-solid fa-caret-up"></i> </button>
                            <button wire:click="vote({{$discussion->id}}, {{0}})"> <i class="fa-solid fa-caret-down"></i> </button>
                        @endif 
                    </div>
                 
                    <div class="my-2 mx-2">
                        <style>
                            .profile-pic-img{
                                width: 40px;
                                height: 40px;
                                object-fit: cover;
                                border-radius: 50%;
                            }
                        </style>
                        @if(!isset($discussion->creator->image))
                            <img src="img/defualt_profile.png" alt="profile-pic" class="profile-pic-img">
                        @else
                            <img src="{{ $discussion->creator->imagePath }}" alt="profile-pic" class="profile-pic-img">
                        @endif
                        <h2>{{ $discussion->creator->name }}</h2>
                    </div>
                </div>

                @if ($discussion->creator->email == session('LoggedUser'))
                    <i class="fas fa-times text-red-400 hover:text-red-600 cursor-pointer" wire:click="remove({{$discussion->id}})"></i>
                @endif
            </div>

            <p>{{$discussion->question}}</p>
            @if ($discussion->image) 
                <img src="{{ $discussion->imagePath }}" alt="image" width="500" class="rounded">
            @endif
        </div>

    @endforeach

    <script>
        window.livewire.on('fileChoosen2', () => {
            let inputField = document.getElementById('disscussImage')
            let file = inputField.files[0]
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUploadD', reader.result)
            }
            reader.readAsDataURL(file);
        })
    </script>
</div>


