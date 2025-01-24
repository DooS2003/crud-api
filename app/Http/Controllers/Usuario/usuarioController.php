<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\usuarioRequest;
use App\Models\user\User;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function store(usuarioRequest $request){
        $users = User::create($request->all());
        return response()->json(['messagge' => 'Usuario creado', 'data' => $users ],201);
    }

    public function index(){
        return User::all();
    }

    public function show($id){
        $user = User::with('departamento', 'cargo')->find($id);
        if (!$user) {
            return response()->json(['message', 'Usuario no encontrado'],404);
        }
        return response()->json($user);
    }

    public function update(usuarioRequest $request, $id){
        $user   = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id){
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message'=> 'Usuario no encontrado'], 404);
        }
        $user->delete();
        return response()->json(['message'=>'Usuario Eliminado'],201);
    }
}
