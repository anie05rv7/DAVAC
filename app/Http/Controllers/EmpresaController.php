<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    //CRUD Empresa
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json(['empresas' => $empresas], 200);
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return response()->json(['empresa' => $empresa], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $empresa = new Empresa([
            'nombre' => $request->input('nombre'),
        ]);

        $empresa->save();

        return response()->json(['message' => 'Empresa creada exitosamente'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $empresa = Empresa::findOrFail($id);
        $empresa->update([
            'nombre' => $request->input('nombre'),
        ]);

        return response()->json(['message' => 'Empresa actualizada exitosamente']);
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return response()->json(['message' => 'Empresa eliminada exitosamente']);
    }
}
