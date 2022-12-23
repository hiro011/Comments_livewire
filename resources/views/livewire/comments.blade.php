

<div class="flex justify-center">
    <style>
        .imgBox:hover{
            opacity: .7;
            color: blue;
        }
    </style>
    <div class="bg-blue-200 p-3" style="border-radius: 5px">
        
        <h2 class="font-bold text-center text-3xl">Comments</h2>
 
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
            @if($image)
                <label for="image" class="cursor-pointer"> <img src="{{$image}}" width="200"> </label>
                </br> 
            @else
                <label for="image" class="border rounded px-5 py-3 border-black bg-white shadow imgBox cursor-pointer"> Add image </label>
                </br> 
            @endif
            <input type="file" name="imageFile" id="image" class="cursor-pointer d-none" wire:change="$emit('fileChoosen')">
        </section>
       
		@error('newComment')
			<span class="text-red-500 text-sm">{{$message}}</span>
		@enderror
        @error('searchKey')
			<span class="text-red-500 text-sm">{{$message}}</span>
		@enderror

        <form class="my-4 flex" wire:submit.prevent="addcomment">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="write a comment" 
            wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button type="submit" class="p-2 bg-info w-20 rounded shadow text-white" >Add</button>
            </div>
        </form> 
        
		<hr>
        <div>
			<input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Search comments..." 
			wire:model="searchKey">
        </div>
 {{-- wire:loading.@class(['p-4', 'font-bold' => true]) --}}
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2 bg-blue-100" >
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                    @if ($comment->creator->email == session('LoggedUser'))
                        <i class="fas fa-times text-red-400 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
                    @endif

                </div>

                <p>{{$comment->body}}</p>
                @if ($comment->image) 
                    <img src="{{ $comment->imagePath }}" alt="image" width="500" class="rounded">
                @endif
                <div class="flex my-3">
                    <div class="flex mx-2">
                        @if ($comment->likes and ($comment->likes) != 0) 
                            <p class="mx-1">{{$comment->likes}}</p>
                        @endif
                        
                        @if ($likeList->contains('comment_id', $comment->id))
                            <button wire:click="like({{$comment->id}})" class="text-blue-500"> <i class="fa-solid fa-thumbs-up"></i>like</button>
                        @else
                            <button wire:click="like({{$comment->id}})"> <i class="fa-regular fa-thumbs-up"></i>like</button>
                        @endif
				
                    </div>
                    <a href="#"> <i class="fa-solid fa-replay"></i>Replay</a>
                </div>
            </div>
        @endforeach	
        

        {{ $comments->links() }}
        <hr>
        <div class="flex rounded border shadow p-3 my-2 bg-gray-200">
            
            <h2> Knowledge will give you power, But character will give you respect </h2>
        </div>
        
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>
 