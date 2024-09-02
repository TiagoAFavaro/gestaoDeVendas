<?php

namespace App\Http\Controllers;

use App\Models\CadastroContasaReceber;
use Illuminate\Http\Request;

class CadastroContasaReceberController extends Controller
{
    // public function index()
    // {
    //     $cadastros = CadastroContasaReceber::all();

    //     return view('contasAReceber')->with('cadastros', $cadastros);
    // }
    public function index()
    {
        $cadastros = CadastroContasaReceber::all();

        // Calcular o total das contas a receber
        $totalContasReceber = $cadastros->sum('valorBruto');

        return view('contasAReceber')->with([
            'cadastros' => $cadastros,
            'totalContasReceber' => $totalContasReceber
        ]);
    }

    public function visualizarContasPagarById($id)
    {
        $aReceber = CadastroContasaReceber::findOrFail($id);

        return view('visualizarReceber',  ['aReceber' => $aReceber]);
    }

    public function paginaCadastro()
    {
        return view('cadastroReceber');
    }

    public function store(Request $request)
    {
        $cadastro = new CadastroContasaReceber();
        $cadastro->descricaoRecebimento = $request->input('descricaoRecebimento');
        $cadastro->formaRecebimento = $request->input('formaRecebimento');
        $cadastro->pagamentoRecebido = $request->input('pagamentoRecebido');
        $cadastro->vencimento = $request->input('vencimento');
        $cadastro->contaBancaria = $request->input('contaBancaria');
        $cadastro->valorBruto = $request->input('valorBruto');
        $cadastro->juros = $request->input('juros');
        $cadastro->desconto = $request->input('desconto');
        $cadastro->valorTotal = $request->input('valorTotal');

        $cadastro->save();

        return redirect('/contasreceber/list');
    }

    public function edit($id)
    {
        $aReceber = CadastroContasaReceber::findOrFail($id);
        return view('editContasAReceber', ['aReceber' => $aReceber]);
    }


    public function update(Request $request, $id)
    {
        $cadastro = CadastroContasaReceber::findOrFail($id);
        $cadastro->fill($request->all());

        $cadastro->save();
        return redirect('/contasreceber/list');
    }

    public function destroy($id)
    {
        CadastroContasaReceber::findOrFail($id)->delete();

        return redirect('/contasreceber/list')->with('msg', 'Cadastro excluido com sucesso !');
    }
}
