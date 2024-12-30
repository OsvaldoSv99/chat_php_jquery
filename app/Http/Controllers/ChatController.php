<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Mensajes;
use Carbon\Carbon;
use Auth;

class ChatController extends Controller
{
    public function index ()
    {
        $usuarios = User::all();
        return view('chat.chats',compact('usuarios'));
    }

    public function nuevo_chat(Request $request)
    {
        $guardar = new Chat();
        $guardar->id_user = Auth::id();
        $guardar->asunto = $request->asunto;
        $guardar->created_at = Carbon::now();
        $guardar->updated_at = Carbon::now();
        $guardar->Save();

        $max = Chat::max('id_chat');

        $mensaje = new Mensajes();
        $mensaje->mensaje = $request->mensaje;
        $mensaje->id_chat = $max;
        $mensaje->id_user = Auth::id();
        $mensaje->created_at = Carbon::now();
        $mensaje->updated_at = Carbon::now();
        $mensaje->Save();

        return redirect('chat/'.$max);
    }

    public function chat ($id)
    {
        $mensajes=Chat::join('mensajes','mensajes.id_chat','chats.id_chat')->where('chats.id_chat',$id)->get();
        return view('chat.index',compact('mensajes','id'));
    }

    public function obtener_chat(Request $request)
    {
        $mensajes=Chat::join('mensajes','mensajes.id_chat','chats.id_chat')->select('mensajes.*')->where('chats.id_chat',$request->id_chat)->get();
        $chat='';
        foreach ($mensajes as $m) {
            if ($m->id_user == auth()->user()->id) {
                $chat .= '<div class="flex justify-end mt-2">';
                $chat .= '<div class="bg-green-500 text-white p-2 rounded-lg max-w-xs">';
                $chat .= $m->mensaje;
                $chat .= '</div>';
                $chat .= '</div>';
            } else {
                $chat .= '<div class="flex justify-start mt-2">';
                $chat .= '<div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs">';
                $chat .= $m->mensaje;
                $chat .= '</div>';
                $chat .= '</div>';
            }   
        }
        return response()->json($chat);
    }

    public function guardar_mensaje(Request $request,$id)
    {
        Mensajes::insert([
            'mensaje' => $request->mensaje,
            'id_chat' => $id,
            'id_user' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
