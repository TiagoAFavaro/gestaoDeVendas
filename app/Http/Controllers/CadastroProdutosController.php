<?php

namespace App\Http\Controllers;

use App\Models\CadastroProdutos;
use Illuminate\Http\Request;

class CadastroProdutosController extends Controller
{
    public function index()
    {
        $cadastros = CadastroProdutos::all();

        return view('produtos')->with('cadastros', $cadastros);
    }

    public function paginaCadastro()
    {
        return view('cadastroprodutos');
    }

    public function store(Request $request)
    {
        $cadastro = new CadastroProdutos();
        $cadastro->descricao = $request->input('descricao');
        $cadastro->fornecedor = $request->input('fornecedor');
        $cadastro->precoCusto = $request->input('precoCusto');
        $cadastro->precoVenda = $request->input('precoVenda');

        if (CadastroProdutos::where('descricao', $request->descricao)->exists()) {
            return response()->json(['message', 'Produto ja cadastrado']);
        }

        $cadastro->save();

        return redirect('/produtos/list');
    }

    public function edit($id)
    {
        $produto = CadastroProdutos::findOrFail($id);
        return view('editProdutos', ['produto' => $produto]);
    }


    public function update(Request $request, $id)
    {
        $cadastro = CadastroProdutos::findOrFail($id);
        $cadastro->fill($request->all());

        $existeDescricao = CadastroProdutos::where('descricao', $request->descricao)
            ->where('id', '!=', $id)
            ->exists();

        if ($existeDescricao) {
            return response()->json(['message' => 'Produto ja cadastrado']);
        }

        $cadastro->save();
        return redirect('/produtos/list');
    }

    public function destroy($id)
    {
        CadastroProdutos::findOrFail($id)->delete();

        return redirect('/produtos/list')->with('msg', 'Cadastro excluido com sucesso !');
    }
}
