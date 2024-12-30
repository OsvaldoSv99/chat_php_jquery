<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/chat.js')}}"></script>
    <title>Chat</title>
</head>
<body class="bg-gray-100 flex flex-col h-screen">
  <p class="text-center text-2xl">Chat</p>
<div class="container-auto justify-self-center w-90" >
  <div class="flex-1 p-4">
    <center>
      <img src="{{asset('imagenes/mensajes_nuevos.png')}}" alt="" width="10%" class="flechas" id="flechas" style="cursor: pointer">
    </center>
    {{-- Contenedor de los mensajes --}}
    <div class="bg-white p-4 rounded-lg shadow-md div_chat" id="div_chat" style="overflow: auto !important; height:70vh !important;" onscroll="esElFinal()">
    </div>
</div>
<div class="p-4 bg-white shadow-md">
  <input type="hidden" class="id" value="{{$id}}">
    <input type="text" name="mensaje" placeholder="Mensaje..." class="border rounded-lg p-2 w-full mensaje">
    <br><br>
    <button type="button" class="py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75" id="boton_enviar">
      Enviar
    </button>
</div>
</div>
</body>
</html>
