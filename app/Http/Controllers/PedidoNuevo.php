<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PedidoNuevo extends Controller
{
    public function __construct()
    {
    }

    public function guardar(Request $request)
    {
        $input = $request->all();

        $result = DB::table('pedido')->insert([
            'IDUsuario' => $input['idu'],
            'IDMenu' => $input['idm'],
            'IDGuiso' => $input['idg']
        ]);

        if($result)
            $respuesta = array(
                "datos"=> false,
                "error" => false,
                "msg" => "El pedido fue agregado"
            );
        else
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "El pedido no se pudo agregar"
            );

        return $respuesta;
    }
}