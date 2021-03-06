<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // A variávei $tipos é um array (vetor)
        $tipos = DB::select("SELECT *
                             FROM Tipo_produtos");
        return view('TipoProduto/index')->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Eu quero pegar todos os Tipos de Produto que estão no banco de dados e passar eles para a View Produto/create
        // O objetivo de fazer isso é construir uma lista de todos os Tipos de Produto para construir SELECT
        $tiposProduto = DB::select('SELECT * FROM tipo_produtos');

        // Pego a variável construida e passo para a View: Produto/create
        return view('TipoProduto/create')->with('tiposProduto', $tiposProduto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoproduto = new TipoProduto();
        $tipoproduto->nome = $request->nome;
        $tipoproduto->preco = $request->preco;
        $tipoproduto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $tipoproduto->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Faço uma consulta e pego a posição 0 do resultado
        // Os resultados sempre não vetores (não importa se ele ter apenas um elemento)
        $tiporoduto = DB::select("SELECT PRODUTOS.id, 
                                      PRODUTOS.nome, 
                                      PRODUTOS.preco, 
                                      TIPO_PRODUTOS.descricao, 
                                      PRODUTOS.updated_at, 
                                      PRODUTOS.created_at 
                               FROM PRODUTOS
                               JOIN TIPO_PRODUTOS ON Tipo_Produtos_id = TIPO_PRODUTOS.id
                               WHERE PRODUTOS.id = ?", [$id])[0];
        //print_r($produto);
        return view('TipoProduto/show')->with('tipoproduto', $tipoproduto);
    }

    /**
     * Show the form for editing the specified resource.
     * Mostra o formulário para edição de um recurso específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Faço uma consulta e pego a posição 0 do resultado
        // Os resultados sempre não vetores (não importa se ele ter apenas um elemento)
        $produto = DB::select("SELECT PRODUTOS.id, 
                                      PRODUTOS.nome, 
                                      PRODUTOS.preco, 
                                      TIPO_PRODUTOS.descricao, 
                                      PRODUTOS.updated_at, 
                                      PRODUTOS.created_at 
                               FROM PRODUTOS
                               JOIN TIPO_PRODUTOS ON Tipo_Produtos_id = TIPO_PRODUTOS.id
                               WHERE PRODUTOS.id = ?", [$id])[0];
        // Pegar todos os tipos no banco de dados
        $tiposProduto = DB::select('SELECT * FROM tipo_produtos');
        return view('tipoProduto/edit')->with('produto', $tipoproduto)->with('tiposProduto', $tiposProduto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoproduto = Produto::find($id);
        // print_r($produto);
        if($tipoproduto){
            $tipoproduto->nome = $request->nome;
            $tipoproduto->preco = $request->preco;
            $tipoproduto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $tipoproduto->update();
        }
        
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo 'metodo destroy' . $id;
        $tipoproduto = TipoProduto::find($id);
        //print_r($produto);
        if($tipoproduto){
            $tipoproduto->delete();
        }
        
        return $this->index();
    }
}
