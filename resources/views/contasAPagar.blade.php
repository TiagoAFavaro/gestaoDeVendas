@extends('layouts.app')

@section('title', 'Contas a Pagar')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-registration-pages.css') }}">
<style>
    .filtro-concretizado {
        margin-top: 5px; /* Adiciona margem para separar da caixa de pesquisa */
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        margin-left: 82%;
    }

    .filtro-concretizado label {
        margin-left: 10px; /* Espaçamento entre o label e o select */
    }

    .filtro-concretizado select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
</style>
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h1>
            <span class="align-middle">
                <img src="{{ asset('/img/wallet.png') }}" class="page_icon img-fluid icon-img" alt="Ícone">
            </span>
            Compras
        </h1>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/contas_a_pagar/list">A Pagar</a>
        </div>
    </div>

    <div class="container_cliente">
        <div class="botoes">
            <a href="/cadastropagar">
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

    <div class="filtro-concretizado">
            <select id="filtroConcretizado">
                <option value="">Todos</option>
                <option value="sim">sim</option>
                <option value="nao">nao</option>
            </select>
            <label for="filtroConcretizado">Filtrar por Concretizado:</label>
        </div>

    <table class="table">
        <thead>
            <tr>
                <th>DESCRIÇÃO</th>
                <th>FORMA DE PAGAMENTO</th>
                <th>CONCRETIZADO</th>
                <th>DATA DE VENCIMENTO</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cadastros as $cadastro)
            <tr>
                <td>{{ $cadastro->descricaoPagamento }}</td>
                <td>{{ $cadastro->formaPagamento }}</td>
                <td>{{ $cadastro->pagamentoQuitado }}</td>
                <td>{{ $cadastro->vencimento }}</td>
                <td>R$ {{ $cadastro->valorBruto }}</td>
                <td>
                    <a href="{{ url('/contas_a_pagar/edit/' . $cadastro->id) }}" class="btn btn-info edit-btn">
                        <img src="{{ asset('/img/lapis.png') }}" class="icone_botao" alt="Editar">
                    </a>
                    <form action="/contas_a_pagar/delete/{{ $cadastro->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <img src="{{ asset('/img/trash.png') }}" class="icone_botao" alt="Deletar">
                        </button>
                    </form>
                    <a href="{{ url('/visualizarContas/' . $cadastro->id) }}">
                        <button class="btn btn-warning more-btn">
                            <img src="{{ asset('/img/more.png') }}" alt="Mais">
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
    </table>
    <br>
    <div class="total-contas">
        <h3>Total das Contas a Pagar: R$ {{ number_format($totalContasPagar, 2, ',', '.') }}</h3>
    </div>
    <br>
</main>

<script>
    // Script para filtrar por "Concretizado"
    document.getElementById('filtroConcretizado').addEventListener('change', function() {
        var filtro = this.value;
        var linhas = document.querySelectorAll('.table tbody tr');

        linhas.forEach(function(linha) {
            var concretizado = linha.querySelector('td:nth-child(3)').textContent;

            if (filtro === '' || concretizado === filtro) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    });
</script>

@endsection
