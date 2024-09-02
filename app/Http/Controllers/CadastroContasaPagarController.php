<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CadastroContasaPagar;

class CadastroContasaPagarController extends Controller
{
    // public function index()
    // {
    //     $cadastros = CadastroContasaPagar::all();

    //     return view('contasAPagar')->with('cadastros', $cadastros);
    // }
    public function index(Request $request)
    {
        // Aplicar filtros se existirem
        $query = CadastroContasaPagar::query();

        if ($request->has('filtro_descricao')) {
            $query->where('descricaoPagamento', 'like', '%'.$request->input('filtro_descricao').'%');
        }

        if ($request->has('filtro_forma_pagamento')) {
            $query->where('formaPagamento', $request->input('filtro_forma_pagamento'));
        }

        // Outros filtros podem ser adicionados conforme necessário

        $cadastros = $query->get();

        // Calcular o total das contas a pagar
        $totalContasPagar = $cadastros->sum('valorBruto');

        return view('contasAPagar')->with([
            'cadastros' => $cadastros,
            'totalContasPagar' => $totalContasPagar
        ]);
    }


    public function visualizarContasPagarById($id)
    {
        $aPagar = CadastroContasaPagar::findOrFail($id);

        return view('visualizarPagar',  ['aPagar' => $aPagar]);
    }

    public function paginaCadastro()
    {
        return view('cadastroPagar');
    }

    public function store(Request $request)
    {
        $cadastro = new CadastroContasaPagar();
        $cadastro->descricaoPagamento = $request->input('descricaoPagamento');
        $cadastro->formaPagamento = $request->input('formaPagamento');
        $cadastro->pagamentoQuitado = $request->input('pagamentoQuitado');
        $cadastro->vencimento = $request->input('vencimento');
        $cadastro->contaBancaria = $request->input('contaBancaria');
        $cadastro->valorBruto = $request->input('valorBruto');
        $cadastro->juros = $request->input('juros');
        $cadastro->desconto = $request->input('desconto');
        $cadastro->valorTotal = $request->input('valorTotal');

        $cadastro->save();

        return redirect('/contas_a_pagar/list');
    }

    public function edit($id)
    {
        $aPagar = CadastroContasaPagar::findOrFail($id);
        return view('editContasAPagar', ['aPagar' => $aPagar]);
    }


    public function update(Request $request, $id)
    {
        $cadastro = CadastroContasaPagar::findOrFail($id);
        $cadastro->fill($request->all());

        $cadastro->save();
        return redirect('/contas_a_pagar/list');
    }

    public function destroy($id)
    {
        CadastroContasaPagar::findOrFail($id)->delete();

        return redirect('/contas_a_pagar/list')->with('msg', 'Cadastro excluido com sucesso !');
    }
}
