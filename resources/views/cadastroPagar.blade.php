@extends('layouts.app_sem_sidebar')

@section('title', 'Cadastro de Contas a Pagar')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<div class="sub_header">
    <h4>Cadastre a sua Conta</h4>
    <div class="navegador">
        <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
        <a href="/dashboard">Início</a>
        <span class="separator">&gt;</span>
        <a href="/contas_a_pagar/list">A Pagar</a>
        <span class="separator">&gt;</span>
        <a href="/cadastropagar">Cadastro de Contas a Pagar</a>
    </div>
</div>
<br>
<div class="cadastro">
    <div style="display: flex;">
        <img src="{{ asset('/img/edit.png') }}">
        <h5>Dados Gerais</h5>
    </div>
    <hr>
    <form id="cadastrarContas" action="/cadastrar_nova_conta" method="post">
        @csrf
        <div class="forms">
            <div class="table_form">
                <label class="obg" for="descricaoPagamento">Fornecedor</label>
                <input type="text" id="descricaoPagamento" name="descricaoPagamento" required>
            </div>
            <div class="table_form">
                <label class="obg" for="formaPagamento">Forma de Pagamento</label>
                <select id="formaPagamento" name="formaPagamento" required>
                    <option value="" disabled selected>Selecione a forma de pagamento</option>
                    <option value="A vista">A vista</option>
                    <option value="A Prazo">A prazo</option>
                    <option value="A negociar">A negociar</option>
                </select>
            </div>
            <div class="table_form">
                <label for="pagamentoQuitado">Pagamento Quitado</label>
                <select id="pagamentoQuitado" name="pagamentoQuitado">
                    <option value="" disabled selected>Selecione</option>
                    <option value="sim">sim</option>
                    <option value="nao">nao</option>
                </select>
            </div>
            <div class="table_form">
                <label class="obg" for="vencimento">Data Compra</label>
                <input type="date" id="vencimento" name="vencimento" required>
            </div>
            <div class="table_form">
                <label class="obg" for="contaBancaria">Número da Nota</label>
                <input type="text" id="contaBancaria" name="contaBancaria" required>
            </div>
            <div class="table_form">
                <label class="obg" for="vencimento">Data Vencimento</label>
                <input type="date" id="vencimento" name="vencimento" required>
            </div>
        </div>
</div>

<div class="cadastro">
    <div style="display: flex;">
        <img src="{{ asset('/img/dindin.png') }}">
        <h5>Valores</h5>
    </div>
    <hr>
    <div class="forms">
        <div class="table_form">
            <label class="obg" for="valorBruto">Valor Bruto em R$</label>
            <input type="number" id="valorBruto" name="valorBruto" step="0.01" required oninput="calcularValorTotal()">
        </div>
        <div class="table_form">
            <label for="juros">Juros em R$</label>
            <input type="number" id="juros" name="juros" step="0.01" required oninput="calcularValorTotal()">
        </div>
        <div class="table_form">
            <label for="desconto">Desconto em R$</label>
            <input type="number" id="desconto" name="desconto" step="0.01" required oninput="calcularValorTotal()">
        </div>
        <div class="table_form">
            <label for="valorTotal">Valor Total em R$</label>
            <input type="number" id="valorTotal" name="valorTotal" step="0.01" required readonly>
        </div>
    </div>
</div>
<div>
    <a>
        <button class="botao_endpage" style="background-color: green; color: white; margin-left: 20px;">CADASTRAR</button>
    </a>
    <a href="/contas_a_pagar/list">
        <button type="button" class="botao_endpage" style="background-color: red; color: white;" onclick="window.location.href='/contas_a_pagar/list'">CANCELAR</button>
    </a>
</div>
</form>
@endsection
@push('scripts')
<script>
function calcularValorTotal() {
    var valorBruto = parseFloat(document.getElementById('valorBruto').value) || 0;
    var juros = parseFloat(document.getElementById('juros').value) || 0;
    var desconto = parseFloat(document.getElementById('desconto').value) || 0;

    var valorTotal = valorBruto - desconto + juros;
    
    // Verifica se o valor total é menor que 0 e define como 0 se for o caso
    if (valorTotal < 0) {
        valorTotal = 0;
    }

    document.getElementById('valorTotal').value = valorTotal.toFixed(2);
}
</script>
@endpush

