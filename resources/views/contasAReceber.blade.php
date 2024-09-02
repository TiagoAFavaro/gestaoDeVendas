@extends('layouts.app')

@section('title', 'Contas a Receber')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
@endpush

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="sub_header">
            <h1>
                <span class="align-middle">
                    <img src="{{ asset('/img/wallet.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
                </span>
                Contas a Receber
            </h1>
            <div class="navegador">
                <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
                <a href="/dashboard">Início</a>
                <span class="separator">&gt;</span>
                <a href="/contasreceber/list">A Receber</a>
            </div>
        </div>

        <div class="container_cliente">
            <div class="botoes">
                <a href="/cadastroreceber">
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
                    <th>FORMA DE RECEBIMENTO</th>
                    <th>PAGAMENTO QUITADO ?</th>
                    <th>DATA DE VENCIMENTO</th>
                    <th>VALOR</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cadastros as $cadastro)
                    <tr>
                        <td>{{ $cadastro->descricaoRecebimento }}</td>
                        <td>{{ $cadastro->formaRecebimento }}</td>
                        <td>{{ $cadastro->pagamentoRecebido }}</td>
                        <td>{{ $cadastro->vencimento }}</td>
                        <td>R$ {{ $cadastro->valorBruto }}</td>
                        <td>
                            <a href="{{ url('/contas_a_receber/edit/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                                <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                            </a>
                            <form action="/contas_a_receber/delete/{{ $cadastro->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                                </button>
                            </form>
                            <a href="{{ url('/visualizarareceber/' . $cadastro->id) }}">
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
        <div class="total-contas">
            <h3>Total das Contas a Receber: R$ {{ number_format($totalContasReceber, 2, ',', '.') }}</h3>
        </div>
        <br>
    </main>
@endsection
