<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Menu extends Controller
{
    public function __construct()
    {
    }

    public function todo()
    {
        $results = DB::select("SELECT * FROM menu");

        if(count($results)>0)
            $respuesta = array(
                "datos"=> $results,
                "error" => false,
                "msg" => "Menu encontrado"
            );
        else
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "No comidita"
            );

        return response()->json($respuesta,200,[
            'Access-Control-Allow-Headers' => 'Origin ,X-Requested-With ,Content-Type ,Accept ,Access-Control-Request-Method',
            'Access-Control-Allow-Methods' => 'GET ,POST ,OPTIONS ,PUT ,PATCH ,DELETE',
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function por_categoria($cat)
    {
        $results = DB::select("SELECT * FROM personas WHERE Categoria LIKE '%$cat%'");

        if(count($results)>0)
            $respuesta = array(
                "datos"=> $results,
                "error" => false,
                "msg" => "Personas encontradas"
            );
        else
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "Personas no encontradas"
            );

        return $respuesta;
    }
}