<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{

    public function selectClient(Request $request)
    {
        
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');

        $clientes = DB::select('SELECT * FROM cliente WHERE nome=? OR cpf=?', [$nome, $cpf]);
        
        return view('clientes')->with('clientes', $clientes);

    }

    public function insertClient(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'required',
            'placa' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required',
        ]);

        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $cell = $request->input('cell');
        $addr = $request->input('addr');
        $placa = $request->input('placa');
        $modelo = $request->input('modelo');
        $marca = $request->input('marca');
        $ano = $request->input('ano');
        $data_in = $request->input('data_in');
        $data_out = $request->input('data_out');
        $situacao = $request->input('situacao');
        $garagem = $request->input('garagem');
      
        
        $Cliente = DB::select('SELECT idcliente FROM cliente WHERE cpf = ?', [$cpf]);
        
        if($Cliente){
            $idCliente = $Cliente[0]->idcliente;

            DB::insert('INSERT INTO carro (placa, modelo, ano, cliente_idcliente, data_entrada, data_saida, garagem_idgaragem, situacao_idsituacao, marca_idmarca) VALUES (?,?,?,?,?,?,?,?,?)',
                        [$placa, $modelo, $ano, $idCliente, $data_in, $data_out, $garagem, $situacao, $marca]);            

        }
        else{
            DB::insert('INSERT INTO cliente (nome, telefone, endereco, cpf) VALUES (?,?,?,?)', 
                        [$nome,$cell, $addr, $cpf]);
            
            $idCliente = DB::select('SELECT idcliente FROM cliente WHERE cpf = ?', [$cpf]);

            DB::insert('INSERT INTO carro (placa, modelo, ano, cliente_idcliente, data_entrada, data_saida, garagem_idgaragem, situacao_idsituacao, marca_idmarca) VALUES (?,?,?,?,?,?,?,?,?)',
                        [$placa, $modelo, $ano, $idCliente, $data_in, $data_out, $garagem, $situacao, $marca]);        
            
        }
        
        return redirect('clientes_page');
    }


    public function edit($id)
    {
        $cliente = DB::select('SELECT * FROM cliente WHERE idcliente = ?', [$id]);
        $carros = DB::select('SELECT * FROM carro WHERE cliente_idcliente = ?', [$id]);
        
        return view('editclient')->with('client', $cliente)->with('carros', $carros);
        
    }

    
    public function update(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'cpf' => 'required',
            'cell' => 'required',
            'addr' => 'required',
        ]);

        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $cell = $request->input('cell');
        $addr = $request->input('addr');
        $clientes = DB::select('SELECT * FROM cliente');

        $upd = DB::update('UPDATE cliente SET nome = ?, telefone = ?, endereco = ?, cpf = ? WHERE cpf = ?', 
                                    array($nome, $cell, $addr, $cpf, $cpf));
        
        return redirect('clientes_page'); 
        
    }

    public function destroy(Request $request)
    {
        $idCliente = $request->input('idcliente');

        $delCar = DB::delete('DELETE FROM carro WHERE cliente_idcliente = ?', [$idCliente]);
        $del = DB::delete('DELETE FROM cliente WHERE idCliente = ? ', [$idCliente]);
        
        return redirect('clientes_page');   
    }

    public function selectcar(Request $request)
    {
        $submit = $request->input('submitbutton');
        
        if($submit == "Pesquisar por placa"){
            $this->validate($request, [
                'placa' => 'required',
            ]);
            $placa = $request->input('placa');
            $carros = DB::select('SELECT * FROM carro WHERE placa = ?', [$placa]);
            $clientes = DB::select('SELECT * FROM cliente');
            $garagens = DB::select('SELECT * FROM garagem');
            
            return view('carros')->with('carros', $carros)->with('clientes', $clientes)->with('garagens', $garagens);
            
        }

        elseif($submit == "Pesquisar por data"){
            $this->validate($request, [
                'data_in' => 'required',
            ]);
            $data = $request->input('data_in');
            $clientes = DB::select('SELECT * FROM cliente');
            $garagens = DB::select('SELECT * FROM garagem');
            $carros = DB::select('SELECT * FROM carro WHERE data_entrada >= ?', [$data]);

            return view('carros')->with('carros', $carros)->with('clientes', $clientes)->with('garagens', $garagens);
        }

        elseif($submit == "Pesquisar por Garagem"){
            $garagem = $request->input('garagem');

            $carros = DB::select('SELECT * FROM carro WHERE garagem_idgaragem = ?', [$garagem]);
            $clientes = DB::select('SELECT * FROM cliente');
            $garagens = DB::select('SELECT * FROM garagem');
            
            return view('carros')->with('carros', $carros)->with('clientes', $clientes)->with('garagens', $garagens);
        }
        
        elseif($submit == "Pesquisar por Situação"){
            $situacao = $request->input('situacao');

            $carros = DB::select('SELECT * FROM carro WHERE situacao_idsituacao = ?', [$situacao]);
            $clientes = DB::select('SELECT * FROM cliente');
            $garagens = DB::select('SELECT * FROM garagem');

            return view('carros')->with('carros', $carros)->with('clientes', $clientes)->with('garagens', $garagens);
        }



    }

    public function editcar($id)
    {
        $marcas = DB::select('SELECT * FROM marca');
		$garagens = DB::select('SELECT * FROM garagem');
        $car = DB::select('SELECT * FROM carro WHERE idcarro = ?', [$id]);
        $cliente = DB::select('SELECT * FROM cliente WHERE idcliente = ?', [$car[0]->cliente_idcliente]);
        
        return view('editcar')->with('car', $car)->with('marcas',$marcas)->with('garagens', $garagens)->with('cliente', $cliente);
        
    }

    public function destroycar(Request $request)
    {
        $idcarro = $request->input('idcarro');

        $del = DB::delete('DELETE FROM carro WHERE idcarro = ? ', [$idcarro]);
        
        return redirect('carros_page');
    }

    public function updatecar(Request $request)
    {
        
        $this->validate($request, [
            'placa' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
        ]);

        $idcarro = $request->input('idcarro');
        $placa = $request->input('placa');
        $modelo = $request->input('modelo');
        $marca = $request->input('marca');
        $ano = $request->input('ano');
        $data_in = $request->input('data_in');
        $data_out = $request->input('data_out');
        $situacao = $request->input('situacao');
        $garagem = $request->input('garagem');


        $upd = DB::update('UPDATE carro SET placa = ?, modelo = ?, ano = ?, data_entrada = ?, data_saida = ?, garagem_idgaragem = ?, situacao_idsituacao = ?, marca_idmarca = ? WHERE idcarro = ?',
                            [$placa, $modelo, $ano, $data_in, $data_out, $garagem, $situacao, $marca, $idcarro]);
        
        return redirect('carros_page'); 
        
    }

    public function updSituacao(Request $request){
        
        $situacao = $request->input('situacao');
        $carro = $request->input('idcarro');

        $upd = DB::update('UPDATE carro SET situacao_idsituacao = ? WHERE idcarro = ?', [$situacao, $carro]);
        
        return redirect('saida_page');

    }

}
