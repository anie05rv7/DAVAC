<?php

/*namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class adafruitController extends Controller
{
    
    public function createData(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'value' => 'required',
                'username' => 'required',
                'feedKey' => 'required',
            ],
            [
                "value.required" => "El campo :attribute es obligatorio",
                "username.required" => "El campo :attribute es obligatorio",
            ]
        );
        if($validate->fails())
        {
            return response()->json([
                "status"    => 400,
                "message"   => "Alguno de los campos no se ha llenado",
                "error"     => [$validate->errors()],
                "data"      => []
            ],400);
        }

        $response = Http::withHeaders([
            'X-AIO-Key' => $request->aio_key
        ])->post('https://io.adafruit.com/api/v2/'.$request->username.'/feeds/'. $request->feedKey .'/data',
        [
            "value" => $request->value
        ]);
        if($response->successful())
        {
            return response()->json([
                "status"    => 200,
                "message"   => "Datos enviados correctamente",
                "value" => $request->value
            ],200);
        }
        return response()->json([
            "status"    => 400,
            "message"   => "Error al enviar los datos",
            "error"     => $response
        ],400);
    }

    public function seeData(Request $request)
    {
        $response = Http::withHeaders([
            'X-AIO-Key' => $request->aio_key
        ])->get('https://io.adafruit.com/api/v2/'.$request->username.'/feeds/'. $request->feedKey .'/data/retain');
        if($response->successful())
        {
            return $response;
        }
        return response()->json([
            "status"    => 400,
            "message"   => "Error al recuperar los datos",
        ],400);
    }
}*/