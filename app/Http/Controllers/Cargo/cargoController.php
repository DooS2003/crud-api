<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Http\Requests\cargoRequest;
use App\Models\cargo\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cargoController extends Controller
{
    public function index(){
        return Cargo::all();
    }   

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'activo' => 'required|boolean'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $cargo = Cargo::create($request->all());
        return response()->json(['message' => 'cargo creado', 'data' => $cargo], 201);
    }

    public function show($id){
        $cargo = Cargo::find($id);
        if (!$cargo) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        return response()->json($cargo);
    }

    public function update(Request $request, $id){
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['message' => 'No encontrado'],404);
        }

        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'activo' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $cargo->update($request->all());
        return response()->json(['message' => 'Cargo Actualizado', 'data' => $cargo],201);
    }

    
    public function destroy($id){
        $cargo= Cargo::find($id);
        if (!$cargo) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        $cargo->delete();
        return response()->json(['message'=>'cargo Eliminado'],201);
    }
}
