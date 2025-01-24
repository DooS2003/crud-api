<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Http\Requests\cargoRequest;
use App\Models\cargo\Cargo;
use Illuminate\Http\Request;

class cargoController extends Controller
{
    public function index(){
        return Cargo::all();
    }   

    public function store(cargoRequest $request)
    {
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

    public function update(cargoRequest $request, $id){
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['message' => 'No encontrado'],404);
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
