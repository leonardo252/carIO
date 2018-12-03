<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function index(){
		$title = 'Bem vindo a Auto Center São Francisco';
		return view('welcome')->with('title', $title);
	}
	
	public function entrada(){
		$marcas = DB::select('SELECT * FROM marca');
		$garagens = DB::select('SELECT * FROM garagem');
		
		return view('entrada')->with('marcas', $marcas)->with('garagens', $garagens);
	}
	
	public function clientes(){
		
		$clientes = DB::select('SELECT * FROM cliente');
        
        return view('clientes')->with('clientes', $clientes);

	}

	public function carros(){
		$carros = DB::select('SELECT * FROM carro');
		$clientes = DB::select('SELECT * FROM cliente');
		$garagens = DB::select('SELECT * FROM garagem');
		if($carros){
			return view('carros')->with('carros', $carros)->with('clientes', $clientes)->with('garagens', $garagens);
		}
		else{
			$carros = 0;
			return view('carros')->with('carros', $carros);
		}
		
	}

	public function saida(){
		return view('saida');
	}

}
