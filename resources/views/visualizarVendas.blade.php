@extends('layouts.app')

@section('title', 'Visualização de Vendas')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h4>Visualização de Venda</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/vendas">Vendas</a>
            <span class="separator">&gt;</span>
            <a href="{{ url('/visualizarVendas/' . $venda->id) }}">Visualizar</a>
        </div>
    </div>
    <br>
    <h1>{{ $venda->cliente->nome }}</h1>
    <form action="">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="cliente_nome">Nome do Cliente</label></td>
                        <td><input type="text" class="form-control" id="cliente_nome" name="cliente_nome" value="{{ $venda->cliente->nome }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="situacao">Situação</label></td>
                        <td><input type="text" class="form-control" id="situacao" name="situacao" value="{{ $venda->situacao }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="dataEntregaMercadoria">Data de Entrega</label></td>
                        <td><input type="text" class="form-control" id="dataEntregaMercadoria" name="dataEntregaMercadoria" value="{{ $venda->dataEntregaMercadoria }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="dataRecebimento">Data de Recebimento</label></td>
                        <td><input type="text" class="form-control" id="dataRecebimento" name="dataRecebimento" value="{{ $venda->dataRecebimento }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="valorTotal">Valor Total</label></td>
                        <td><input type="text" class="form-control" id="valorTotal" name="valorTotal" value="R$ {{ number_format($venda->valorTotal, 2, ',', '.') }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="observacoes">Observações</label></td>
                        <td><textarea class="form-control" id="observacoes" name="observacoes" disabled>{{ $venda->observacoes }}</textarea></td>
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
                        <td>{{ $produto->produto->descricao }}</td>
                        <td>{{ $produto->detalhes }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($produto->subtotal, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</main>
@endsection
