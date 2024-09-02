@extends('layouts.app')

@section('title', 'Produtos')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h1>
            <span class="align-middle">
                <img src="{{ asset('/img/box.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
            </span>
            Produtos
        </h1>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/produtos/list">Produtos</a>
        </div>
    </div>

    <div class="container_cliente">
        <div class="botoes">
            <a href="/produtos/cadastro">
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
                <th>DESCRIÇÃO</th>
                <th>FORNECEDOR</th>
                <th>PREÇO DE CUSTO</th>
                <th>PREÇO DE VENDA</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cadastros as $cadastro)
            <tr>
                <td>{{ $cadastro->descricao }}</td>
                <td>{{ $cadastro->fornecedor }}</td>
                <td>R$ {{ number_format($cadastro->precoCusto, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($cadastro->precoVenda, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ url('/produtos/edit/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                        <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                    </a>
                    <form action="/produtos/delete/{{ $cadastro->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
    <br>
</main>
@endsection