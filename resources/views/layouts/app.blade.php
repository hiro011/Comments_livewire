
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/css/font.css">
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

    <script src="{{asset('js/app.js')}}"></script>

</head>

<body class="flex flex-wrap justify-center bg-blue-100">

    <div class="flex w-full justify-between px-4 bg-purple-900 text-white">
        <a class="mx-3 py-4" href="/">Home</a>
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
    </div>
    <div class="my-10 w-full flex justify-center">
        @yield('content')
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
</body>

</html>

