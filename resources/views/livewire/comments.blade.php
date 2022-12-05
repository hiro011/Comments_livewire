

<div class="flex justify-center">
    <div class="bg-blue-200 p-3" style="border-radius: 5px">
        
        <h1 class="font-bold my-2 text-center text-3xl">Comments</h1>

        @error('newComment')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

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

        <section>
            @if($image)
                <img src="{{$image}}" width="200"> </br>
            @endif
            <input type="file" id="image" class="cursor-pointer" wire:change="$emit('fileChoosen')">
        </section>
       
        <form class="my-4 flex" wire:submit.prevent="addcomment">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="write a comment" 
            wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button type="submit" class="p-2 bg-info w-20 rounded shadow text-white" >Add</button>
            </div>
        </form> 
        
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2 bg-blue-100">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                    <i class="fas fa-times text-red-400 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
                </div>
                {{-- <div class="flex justify-start"> --}}
                    <p>{{$comment->body}}</p>
                    @if ($comment->image) 
                        <img src="{{ $comment->imagePath }}" alt="image" width="500" class="rounded">
                    @endif
                {{-- </div> --}}

            </div>
        @endforeach

        {{ $comments->links() }}

        <div class="flex rounded border shadow p-3 my-2 bg-gray-200">
            <h2>Nothing in the world is as soft and yielding as water.</h2>
            <h2>The best athlete wants his opponent at his best.</h2>
            <h2> To attain knowledge, add things every day.</h2>
            <h2> To attain wisdom, subtract things every day. </h2>
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
 