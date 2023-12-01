<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitrina;

class VitrinaController extends Controller
{
    //CRUD Vitrina
    public function index()
    {
        $vitrinas = Vitrina::all();
        return response()->json(['vitrinas' => $vitrinas], 200);
    }

    public function show($id)
    {
        $vitrina = Vitrina::findOrFail($id);
        return response()->json(['vitrina' => $vitrina], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $vitrina = new Vitrina([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
        ]);

        $vitrina->save();

        return response()->json(['message' => 'Vitrina creada exitosamente'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $vitrina = Vitrina::findOrFail($id);
        $vitrina->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'empresa_id' => $request->input('empresa_id'),
        ]);

        return response()->json(['message' => 'Vitrina actualizada exitosamente']);
    }

    public function destroy($id)
    {
        $vitrina = Vitrina::findOrFail($id);
        $vitrina->delete();

        return response()->json(['message' => 'Vitrina eliminada exitosamente']);
    }
}

