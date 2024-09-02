@extends('layouts.app')

@section('title', 'Clientes')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h1>
            <span class="align-middle">
                <img src="{{ asset('/img/customer.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
            </span>
            Clientes
        </h1>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/clientes/list">Clientes</a>
        </div>
    </div>

    <div class="container_cliente">
        <div class="botoes">
            <a href="/clientes/cadastro">
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
                <th>CPF</th>
                <th>TELEFONE</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cadastros as $cadastro)
            <tr>
                <td>{{ $cadastro->nome }}</td>
                <td>{{ $cadastro->cpf }}</td>
                <td>{{ $cadastro->telefone }}</td>
                <td>{{ $cadastro->cidade }}</td>
                <td>{{ $cadastro->estado }}</td>
                <td>
                    <a href="{{ url('/clientes/edit/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                        <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                    </a>
                    <form action="/clientes/delete/{{ $cadastro->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                        </button>
                    </form>
                    <a href="{{ url('/visualizarCliente/' . $cadastro->id) }}">
                        <button class="btn btn-warning more-btn">
                            <img src="{{ asset('/img/more.png') }}" alt="Mais">
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </form>
</main>
@endsection
