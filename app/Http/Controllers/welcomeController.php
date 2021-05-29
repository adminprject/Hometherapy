<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class welcomeController extends Controller
{
	/**
	 * Controlador para el cliente
	 * 
	 */
	function homeCliente(){
		$categorias = Categoria::all();
		$productos = Producto::all();
    	return view('welcome',['categorias' => $categorias,'productos' => $productos]);
	}

    function detalleProducto($id){
    	$producto = Producto::find($id);
    	return view('productos.detalle',['producto' => $producto]);
    }
}
