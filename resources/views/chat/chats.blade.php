<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Modal Example</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Livewire Modal Example</h2>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="myModal" class="modal" x-data="{ open: false }" x-show="open" @click.away="open = false" style="display: none;">
        <div class="modal-content text-center">
            <div class="container px-4">
                <span class="close" @click="open = false">&times;</span>
                <p class="font-bold text-xl">Nuevo Chat</p>
                <form action="{{route('nuevo_chat')}}" method="post">
                    @csrf
                        <input type="text" name="asunto" class="w-full" placeholder="Asunto"><br>
                        <textarea name="mensaje" id="" cols="30" rows="5" class="w-full" placeholder="Mensaje"></textarea>
                    </div>
                    <button class="bg-indigo-600 text-white px-6 pb-2 pt-2.5 rounded focus:outline-none">Enviar</button>
                </form>
        </div>
    </div>

    @livewireScripts
    <script>
        document.getElementById('myBtn').onclick = function() {
            document.getElementById('myModal').style.display = "block";
        }
        
        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                document.getElementById('myModal').style.display = "none";
            }
        }
    </script>
</body>
</html>
