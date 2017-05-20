<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//Aplicacion Movil y Cliente Web
$app->get('/menu', function () use ($app) {
	$results = DB::select("SELECT * FROM menu");

	if (count($results)>0)
	{
		$respuesta = array(
			"datos"=>$results,
			"error"=>false,
			"total"=>count($results)
		);
	}
	else
	{
		$respuesta = array(
			"datos"=>false,
			"error"=>true,
			"total"=>count($results)
		);
	}
	return response()->json($respuesta,200,[
            'Access-Control-Allow-Headers' => 'Origin ,X-Requested-With ,Content-Type ,Accept ,Access-Control-Request-Method',
            'Access-Control-Allow-Methods' => 'GET ,POST ,OPTIONS ,PUT ,PATCH ,DELETE',
            'Access-Control-Allow-Origin' => '*'
        ]);
});

$app->get('/menu/{categoria}', function ($categoria) use ($app) {
	$results = DB::select("SELECT * FROM menu WHERE Categoria = '$categoria'");

	if (count($results)>0)
	{
		$respuesta = array(
			"datos"=>$results,
			"error"=>false,
			"total"=>count($results)
		);
	}
	else
	{
		$respuesta = array(
			"datos"=>false,
			"error"=>true,
			"total"=>count($results)
		);
	}
	return response()->json($respuesta);
});

$app->get('/pedido/{idusuario}', function ($idusuario) use ($app) {
	$results = DB::select("SELECT * FROM menu WHERE id = $idusuario");

	if (count($results)>0)
	{
		$respuesta = array(
			"datos"=>$results,
			"error"=>false,
			"total"=>count($results)
		);
	}
	else
	{
		$respuesta = array(
			"datos"=>false,
			"error"=>true,
			"total"=>count($results)
		);
	}
	return response()->json($respuesta);
});

//Aplicacion de Escritorio
$app->get('/pedido', function () use ($app) {
	$results = DB::select("SELECT * FROM pedido");

	if (count($results)>0)
	{
		$respuesta = array(
			"datos"=>$results,
			"error"=>false,
			"total"=>count($results)
		);
	}
	else
	{
		$respuesta = array(
			"datos"=>false,
			"error"=>true,
			"total"=>count($results)
		);
	}
	return response()->json($respuesta);
});