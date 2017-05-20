<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Pedido extends Controller
{
    public function __construct()
    {
    }

    public function todo()
    {
        $results = DB::select("SELECT * FROM pedido");

        if(count($results)>0)
            $respuesta = array(
                "datos"=> $results,
                "error" => false,
                "msg" => "Pedidos encontrados"
            );
        else
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "No se encontraron los pedidos"
            );

        return $respuesta;
    }

    public function por_id($id)
    {
        $results = DB::select("SELECT * FROM pedido WHERE ID = $id");

        if(count($results)>0)
            $respuesta = array(
                "datos"=> $results,
                "error" => false,
                "msg" => "Pedidos encontrados"
            );
        else
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "No se encontraron los pedidos"
            );

        return $respuesta;
    }
}