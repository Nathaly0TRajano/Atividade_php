<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function store(Request $request)
    {

        $produto = Produto::create([
            'nome' => $request->nome,
            'marca' => $request->marca,
            'valor' => $request->valor
        ]);

        return response()->json([
            'status' => true,
            'message' => 'cadastrado',
            'data' => $produto
        ]);
    }

    // A variavel que nós criamos $produto, que antes era nula, agora é um arrey de dados, por causa do all. 
    public function index()
    {
        $produtos = Produto::all();

        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function update(Request $request)
    {
        $produto = Produto::find($request->id); //Procura o id do usuário, para então altera-lo

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        if (isset($request->nome)) {
            $produto->nome = $request->nome;
        }

        if (isset($request->marca)) {
            $produto->marca = $request->marca;
        }

        if (isset($request->valor)) {
            $produto->valor = $request->valor;
        }

        $produto->update();

        return response()->json([
            'status' => true,
            'message' => 'Atualizado'
        ]);
    }

    public function delete($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        $produto->delete();

        return response()->json([
            'status' => true,
            'message' => 'Produto deletado'
        ]);
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    //Ja que vamos fazer uma pesquisa, vamos usar request.
    /*Where: Vamos procurar na "coluna" nome, utilizando o like para procurar os produtos pelo nome, independente do que você colocar,
    por causa do like. Ex: Pesquisamos Note, todos os nomes de produto que tem Note vai aparecer, mesmo se estiver no meio ou no fim*/
    public function findByName(Request $request)
    {
        $produto = Produto::where('nome', 'like', '%'.$request->nome.'%')->get(); //get porque vai fazer um array dos dados.

        //Se o isEmpty (está vazio), for falso, ele vai ignorar esse if, e vai executar o resto. Se for true,ele vai retornar que é falso
        if ($produto->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produto
            ]);
    }

    //Na coluna valor ("valor",), quando for maior ou igual (">=",) ao valor colocado no request, ele vai aparecer o array de dados.
    public function pesquisarMaiorValorQue(Request $request){
        $produto = Produto::where('valor', '>=', $request->valor)->get();

        if ($produto->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produto
            ]);
    }
    
    //Primeiro, a coluna, depois os dois paramentros, ou seja onde começa e onde termina no WhereBetween(estão entre) Vi e Vf.
    public function pesquisarEntreValores(Request $request){
        $produtos = Produto::whereBetween('valor', [$request->valorInicial, $request->valorFinal])->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produtos
            ]);
    }

    public function encontrarPorMarca(request $request){
        $produtos = Produto::where('marca', $request->marca)->get();

        
        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produtos
            ]);
    }

    //whereYear para ano
    public function pesquisarPorAno(Request $request){
        $produtos = Produto::whereYear('created_at', '=', $request->ano)->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produtos
            ]);
        
    }

    public function pesquisarPorMes(Request $request){
        $produtos = Produto::whereMonth('created_at', $request->mes)->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sem resultados para pesquisa'
            ]);
        }
            return response()->json([
                'status' => true,
                'data' => $produtos
            ]);

    }
}

