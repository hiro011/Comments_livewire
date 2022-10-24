<div>
    {{-- Be like water. --}}
    <h1 class="text-center font-bold text-3x1"> Support Tickets</h1>

    @foreach ($tickets as $ticket)
        <div class="rounded border shadow p-3 my-2 cursor-pointer {{$active == $ticket->id ? 'bg-green-200':''}}" wire:click="$emit('ticketSelected', {{$ticket->id}})">
            <p>{{$ticket->question}}</p>
        </div>
    @endforeach

</div>
