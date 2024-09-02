@extends('layouts.app')

@section('title', 'Edição de Vendas')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h4>Edição de Venda</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/vendas">Vendas</a>
            <span class="separator">&gt;</span>
            <a href="{{ url('/editarVendas/' . $venda->id) }}">Editar</a>
        </div>
    </div>
    <br>
    <h1>{{ $venda->cliente->nome }}</h1>
    <form action="{{ url('/vendas/edit/' . $venda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="cliente_id">Nome do Cliente</label></td>
                        <td>
                            <select class="form-control" id="cliente_id" name="cliente_id" style="height: 35px;">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $cliente->id == $venda->cliente_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="situacao">Situação</label></td>
                        <td><input type="text" class="form-control" id="situacao" name="situacao" value="{{ $venda->situacao }}"></td>
                    </tr>
                    <tr>
                        <td><label for="dataEntregaMercadoria">Data de Entrega</label></td>
                        <td><input type="date" class="form-control" id="dataEntregaMercadoria" name="dataEntregaMercadoria" value="{{ $venda->dataEntregaMercadoria }}"></td>
                    </tr>
                    <tr>
                        <td><label for="dataRecebimento">Data de Recebimento</label></td>
                        <td><input type="date" class="form-control" id="dataRecebimento" name="dataRecebimento" value="{{ $venda->dataRecebimento }}"></td>
                    </tr>
                    <tr>
                        <td><label for="valorTotal">Valor Total</label></td>
                        <td><input type="text" class="form-control" id="valorTotal" name="valorTotal" value="{{ number_format($venda->valorTotal, 2, ',', '.') }}"></td>
                    </tr>
                    <tr>
                        <td><label for="observacoes">Observações</label></td>
                        <td><textarea class="form-control" id="observacoes" name="observacoes">{{ $venda->observacoes }}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Produtos</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Detalhes</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venda->produtos as $produto)
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="produtos[{{ $produto->id }}][descricao]" value="{{ $produto->produto->descricao }}" disabled>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="produtos[{{ $produto->id }}][detalhes]" value="{{ $produto->detalhes }}">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="produtos[{{ $produto->id }}][quantidade]" value="{{ $produto->quantidade }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="produtos[{{ $produto->id }}][valor]" value="{{ number_format($produto->valor, 2, ',', '.') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="produtos[{{ $produto->id }}][subtotal]" value="{{ number_format($produto->subtotal, 2, ',', '.') }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</main>
@endsection
