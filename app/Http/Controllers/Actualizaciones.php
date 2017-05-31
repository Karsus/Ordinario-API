<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Menu extends Controller
{

    public function actualizarestatus(Request $request)
    {
        $input = $request->all();

        $results = DB::table('pedido')->where('ID', $input['idp'])->update(['Estatus' => $input['esta']]);

         if($result){
            $respuesta = array(
                "datos"=> false,
                "error" => false,
                "msg" => "El pedido fue agregado"
            );
        }else{
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "El pedido no se pudo agregar"
            );
        }
        return response()->json($respuesta,200,[
            'Access-Control-Allow-Headers' => 'Origin ,X-Requested-With ,Content-Type ,Accept ,Access-Control-Request-Method',
            'Access-Control-Allow-Methods' => 'GET ,POST ,OPTIONS ,PUT ,PATCH ,DELETE',
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
}