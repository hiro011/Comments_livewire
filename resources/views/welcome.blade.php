<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/css/font.css">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    
    <style>
        button{
            cursor: pointer;
            border-color: blueviolet;
        }
        button:hover{
            background-color: lightblue;
            border-radius: 20%;
            border-color: blueviolet;
            transition: 0.3;
            outline-color: transparent;
        }
        button:active{
            background-color: blue;
        }
    </style> 
    
    @livewireStyles
    @livewireScripts

</head>

<body class="flex justify-center bg-blue-200">
    {{-- @livewire('counter') --}}
    <div class="w-10/12 my-10 flex">
        <div class="w-5/12 rounded border bg-gray-100 shadow p-2">
            @livewire('tickets')
        </div>
        <div class="w-7/12 mx-2 rounded shadow border p-2">
            @livewire('comments')
        </div>
    </div>
    
</body>

</html>