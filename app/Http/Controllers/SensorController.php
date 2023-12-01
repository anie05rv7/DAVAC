<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    public function create(Request $request)
    {
        // Valida los datos
        $request->validate([
            'tipo_sensor' => 'required|string|max:100',
            'nombre_sensor' => 'required|string|max:100',
            'fecha_registro' => 'required|date',
        ]);

        // Crea un nuevo sensor
        $sensor = new Sensor([
            'tipo_sensor' => $request->input('tipo_sensor'),
            'nombre_sensor' => $request->input('nombre_sensor'),
            'fecha_registro' => $request->input('fecha_registro'),
        ]);

        $sensor->save();

        return response()->json(['message' => 'Sensor creado exitosamente'], 201);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos
        $request->validate([
            'tipo_sensor' => 'required|string|max:100',
            'nombre_sensor' => 'required|string|max:100',
            'fecha_registro' => 'required|date',
        ]);

        // Encuentra el sensor por su ID
        $sensor = Sensor::findOrFail($id);

        // Actualiza los datos del sensor
        $sensor->update([
            'tipo_sensor' => $request->input('tipo_sensor'),
            'nombre_sensor' => $request->input('nombre_sensor'),
            'fecha_registro' => $request->input('fecha_registro'),
        ]);

        return response()->json(['message' => 'Sensor actualizado exitosamente']);
    }
}
