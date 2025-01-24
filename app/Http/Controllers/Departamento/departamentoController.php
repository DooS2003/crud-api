<?php

namespace App\Http\Controllers\Departamento;

use App\Http\Controllers\Controller;
use App\Http\Requests\departamentoRequest;
use App\Models\departamento\Departamento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class departamentoController extends Controller
{

    public function index()
    {
        return Departamento::all();
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
        $departamento = Departamento::create($request->all());
        return response()->json(['message' => 'departamento creado', 'data' => $departamento], 201);

    }

    public function show($id)
    {
        $departamento = Departamento::find($id);
        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        return response()->json(['data' => $departamento]);
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'activo' => 'required|boolean'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $departamento->update($request->all());
        return response()->json(['message' => 'Departamento actulizado', 'data' => $departamento]);
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);
        if (!$departamento) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        $departamento->delete();
        return response()->json(['message' => 'Usuario Eliminado'], 201);
    }
}
