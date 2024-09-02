@extends('layouts.app')

@section('title', 'Fornecedores')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h1>
            <span class="align-middle">
                <img src="{{ asset('/img/parcel.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
            </span>
            Fornecedores
        </h1>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/fornecedores/list">Fornecedores</a>
        </div>
    </div>

    <div class="container_cliente">
        <div class="botoes">
            <a href="/fornecedores/cadastro">
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
                <th>NOME</th>
                <th>CNPJ</th>
                <th>CONTATO</th>
                <th>TELEFONE</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
            </tr>
        <tbody>
            @foreach($cadastros as $cadastro)
            <tr>
                <td>{{ $cadastro->nome }}</td>
                <td>{{ $cadastro->cnpj }}</td>
                <td>{{ $cadastro->contato }}</td>
                <td>{{ $cadastro->telefone }}</td>
                <td>{{ $cadastro->email }}</td>
                <td>
                    <a href="{{ url('/fornecedores/edit/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                        <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                    </a>
                    <form action="/fornecedores/delete/{{ $cadastro->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                        </button>
                    </form>
                    <a href="{{ url('/visualizarFornecedor/' . $cadastro->id) }}">
                        <button class="btn btn-warning more-btn">
                            <img src="{{ asset('/img/more.png') }}" alt="Mais">
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    </form>
    <br>
    Mostrando 1 a 1 de um total de 1
</main>
@endsection