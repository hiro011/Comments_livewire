<div style="text-align: center">
    <h1> To attain knowledge, add things every day;</h1>
    <h1> To attain wisdom, subtract things every day. </h1>
    </break>
    {{$newComment}}
    <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="write a comment" 
    wire:model="newComment">
    <div class="py-2">
        <button class="p-2 bg-blue-500 w-20 rounded shadow teaxt-white" wire:click="addcomment">Add</button>
    </div>
    <button wire:click="increment">+</button>
    <h1>{{$count}}</h1>
    <button wire:click="decrement">-</button>
    @foreach ($comments as $comment)
        <div class="rounded border shadow p-3 my-2 ">
            <div class="d-flex justify-content-start my-2">
                <p class="font-bold text-lg">{{$comment['creator']}}</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment['created_at']}}</p>
            </div>
            <p class="text-gray-800">{{$comment['body']}}</p>
        </div>
    @endforeach

</div>

