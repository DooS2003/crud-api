<?php

namespace App\Http\Controllers\Departamento;

use App\Http\Controllers\Controller;
use App\Http\Requests\departamentoRequest;
use App\Models\departamento\Departamento;
use Exception;
use Illuminate\Http\Request;

class departamentoController extends Controller
{

    public function index(){
        return Departamento::all();
    }
    public function store(departamentoRequest $request)
    {
        try {
            $departamento = Departamento::create($request->all());
            return response()->json(['message'=> 'departamento creado', 'data' => $departamento], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }
    }

    public function show($id){
        $departamento = Departamento::find($id);
        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        return response()->json(['data' => $departamento]);
    }

    public function update(departamentoRequest $request, $id){
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        $departamento->update($request->all());
        return response()->json(['message'=> 'Departamento actulizado', 'data'=> $departamento]);
    }

    public function destroy($id){
        $departamento= Departamento::find($id);
        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        $departamento->delete();
        return response()->json(['message'=>'Usuario Eliminado'],201);
    }
}
