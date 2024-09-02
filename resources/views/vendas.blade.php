@extends('layouts.app')

@section('title', 'Vendas')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h1>
            <span class="align-middle">
                <img src="{{ asset('/img/offer.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
            </span>
            Vendas
        </h1>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/vendas">Vendas</a>
        </div>
    </div>

    <div class="container_cliente">
        <div class="botoes">
            <a href="/vendas/cadastro">
                <button class="botoes_cliente" style="background-color: green;">
                    <img src="{{ asset('/img/plus.png') }}" alt="Mais">
                    Adicionar
                </button>
            </a>
        </div>

        <div class="caixa_pesquisa">
            <input type="text" id="input_pesquisa" placeholder="Buscar por nome">
            <button id="botao_pesquisa">
                <img src="{{ asset('/img/lupa.png') }}" alt="Pesquisar">
            </button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>CLIENTE</th>
                <th>SITUAÇÃO</th>
                <th>DATA DE ENTREGA</th>
                <th>DATA DE RECEBIMENTO</th>
                <th>VALOR TOTAL</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cadastros as $cadastro)
            <tr>
                <td>{{ $cadastro->cliente->nome }}</td>
                <td>{{ $cadastro->situacao }}</td>
                <td>{{ $cadastro->dataEntregaMercadoria }}</td>
                <td>{{ $cadastro->dataRecebimento }}</td>
                <td>{{ $cadastro->valorTotal }}</td>
                <td>
                    <a href="{{ url('/editarVendas/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                        <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                    </a>
                    <form action="/vendas/delete/{{ $cadastro->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                        </button>
                    </form>
                    <a href="{{ url('/visualizarVendas/' . $cadastro->id) }}">
                        <button class="btn btn-warning more-btn">
                            <img src="{{ asset('/img/more.png') }}" alt="Mais">
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
</main>
@endsection
