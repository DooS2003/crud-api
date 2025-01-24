<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\usuarioRequest;
use App\Models\user\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class usuarioController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'nullable|string',
            'primerNombre' => 'required|string',
            'segundoNombre' => 'nullable|string',
            'idDepartamento' => 'required|integer',
            'idCargo' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
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

    public function update(Request $request, $id){
        $user   = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'nullable|string',
            'primerNombre' => 'required|string',
            'segundoNombre' => 'nullable|string',
            'idDepartamento' => 'required|integer',
            'idCargo' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
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
