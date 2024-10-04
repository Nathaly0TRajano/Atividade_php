<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request){
        $cliente = Cliente::create($request->all());

        return response()->json([
            'status'=> true,
            'message'=> 'Cadastrado com sucesso'
        ]);
    }

    public function findById(Request $request){
        $cliente = Cliente::find($request->id);

        if($cliente == null){
            return response()->json([
                'status'=> false,
                'message'=> 'Cliente não encontrado'
            ]);
        }

        return response()->json([
            'status'=> true,
            'data'=> $cliente
        ]);
    }

    public function show($id){
        $clientes = Cliente::find($id);

        
        if($clientes == null){
            return response()->json([
                'status'=> false,
                'message'=> 'Não encontrado, show'
            ]);
        }

        return response()->json([
            'status'=> true,
            'data'=> $clientes
        ]);

    }

    public function index(){
        $clientes = Cliente::all();  

        return response()->json([
            'status'=> true,
            'data'=> $clientes
        ]);      
    }

    public function update(Request $request){
        $cliente = Cliente::find($request->id);

        if($cliente == null){
            return response()->json([
                'status'=> false,
                'message'=> 'Cliente não encontrado'
            ]);
        }

        if(isset($request->nome)){
            $cliente->nome = $request->nome;
        }

        if(isset($request->celular)){
            $cliente->celular = $request->celular;
        }

        if(isset($request->cpf)){
            $cliente->cpf = $request->cpf;
        }

        if(isset($request->email)){
            $cliente->email = $request->email;
        }

        if(isset($request->data_nascimento)){
            $cliente->data_nascimento = $request->data_nascimento;
        }

        if(isset($request->cidade)){
            $cliente->cidade = $request->cidade;
        }

        if(isset($request->estado)){
            $cliente->estado = $request->estado;
        }

        if(isset($request->pais)){
            $cliente->pais = $request->pais;
        }

        if(isset($request->rua)){
            $cliente->rua = $request->rua;
        }

        if(isset($request->numero)){
            $cliente->numero = $request->numero;
        }

        if(isset($request->bairro)){
            $cliente->bairro = $request->bairro;
        }

        if(isset($request->cep)){
            $cliente->cep = $request->cep;
        }

        $cliente->update();

        return response()->json([
            'status'=> true,
            'message'=> 'Atualizado com sucesso'
        ]);

    }

    public function delete(Request $request){
        $cliente = cliente::find($request->id);

        if($cliente == null){
            return response()->json([
                'status'=> false,
                'message'=> 'Cliente não encontrado'
            ]);
        }

        $cliente->delete();

        return response()->json([
            'status'=> true,
            'message'=> 'Deletado com sucesso'
        ]);
    }

    public function findByEmail(Request $request){
        $cliente = Cliente::where('email', $request->email);

        if($cliente == null){
            return response()->json([
                'status'=> false,
                'message'=> 'Email não encontrado'
            ]);
        }

        return response()->json([
            'status'=> true,
            'data'=> $cliente
        ]);
    }


}
