<?php

namespace App\Http\Controllers;

use App\Models\CadastroCliente;
use App\Models\CadastroProdutos;
use App\Models\CadastroVendaProdutos;
use App\Models\CadastroVendas;
use Illuminate\Http\Request;

class CadastroVendasController extends Controller
{
    public function index()
    {
        $cadastros = CadastroVendas::with('cliente')->get();

        return view('vendas', compact('cadastros'));
    }

    public function paginaCadastro()
    {
        $cadastrosClientes = CadastroCliente::all();
        $cadastrosProdutos = CadastroProdutos::all();

        return view('cadastrovendas', compact('cadastrosClientes', 'cadastrosProdutos'));
    }

    public function show($id)
    {
        $venda = CadastroVendas::with(['cliente', 'produtos.produto'])->findOrFail($id);
        return view('visualizarVendas', compact('venda'));
    }

    public function store(Request $request)
    {
        $venda = CadastroVendas::create([
            'cliente_id' => $request->input('cliente_nome'),
            'situacao' => $request->input('situacao'),
            'dataEntregaMercadoria' => $request->input('dataEntregaMercadoria'),
            'dataRecebimento' => $request->input('dataRecebimento'),
            'observacoes' => $request->input('observacoes'),
            'valorTotal' => $this->convert($request->input('valorTotal'))
        ]);

        $produtos = $request->input('produto_descricao');
        $detalhes = $request->input('detalhes');
        $quantidades = $request->input('quantidade');
        $valores = $request->input('precoVenda');
        $subtotais = $request->input('subtotal');

        foreach ($produtos as $index => $produto_id) {
            CadastroVendaProdutos::create([
                'venda_id' => $venda->id,
                'produto_id' => $produto_id,
                'detalhes' => $detalhes[$index],
                'quantidade' => $quantidades[$index],
                'valor' => $this->convert($valores[$index]),
                'subtotal' => $this->convert($subtotais[$index])
            ]);
        }

        return redirect('/vendas/list');
    }


    public function convert($string)
    {
        $sem_sifrao = str_replace("R$", "", $string);

        $sem_sifrao = str_replace(",", ".", $sem_sifrao);

        $sem_sifrao = trim($sem_sifrao);

        $valor_float = floatval($sem_sifrao);

        return $valor_float;
    }

    public function edit($id)
    {
        $venda = CadastroVendas::with('cliente', 'produtos.produto')->findOrFail($id);
        $clientes = CadastroCliente::all();

        return view('editVendas', compact('venda', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $venda = CadastroVendas::findOrFail($id);

        $venda->update([
            'cliente_id' => $request->input('cliente_id'),
            'situacao' => $request->input('situacao'),
            'dataEntregaMercadoria' => $request->input('dataEntregaMercadoria'),
            'dataRecebimento' => $request->input('dataRecebimento'),
            'valorTotal' => $this->convertCurrencyToFloat($request->input('valorTotal')),
            'observacoes' => $request->input('observacoes')
        ]);

        foreach ($request->input('produtos') as $produto_id => $produto_data) {
            $produto = CadastroVendaProdutos::findOrFail($produto_id);
            $produto->update([
                'detalhes' => $produto_data['detalhes'],
                'quantidade' => $produto_data['quantidade'],
                'valor' => $this->convertCurrencyToFloat($produto_data['valor']),
                'subtotal' => $this->convertCurrencyToFloat($produto_data['subtotal'])
            ]);
        }

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }


    private function convertCurrencyToFloat($value)
    {
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);
        return floatval($value);
    }



    public function destroy($id)
    {
        $venda = CadastroVendas::findOrFail($id);
        $venda->delete();

        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
