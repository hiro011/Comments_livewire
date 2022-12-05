@section('content')

<div class="w-10/12 my-10 flex">
    <div class="w-5/12 rounded border bg-gray-100 shadow p-2">
        @livewire('tickets')
    </div>
    <div class="w-7/12 mx-2 rounded shadow border p-2">
        @livewire('comments')
    </div>
</div>

@endsection