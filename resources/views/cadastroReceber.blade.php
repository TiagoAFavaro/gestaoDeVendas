@extends('layouts.app_sem_sidebar')

@section('title', 'Cadastro de Contas a Receber')

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
            <a href="/contasreceber/list">A Receber</a>
            <span class="separator">&gt;</span>
            <a href="/cadastroreceber">Cadastro de Contas a Receber</a>
        </div>
    </div>
    <br>
    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/edit.png') }}">
            <h5>Dados Gerais</h5>
        </div>
        <hr>
        <form id="cadastrarRecebimentos" action="/cadastrar_novo_recebimento" method="post">
            @csrf
            <div class="forms">
                <div class="table_form">
                    <label class="obg" for="descricaoRecebimento">Descrição do Recebimento</label>
                    <input type="text" id="descricaoRecebimento" name="descricaoRecebimento" required>
                </div>
                <div class="table_form">
                    <label class="obg" for="formaRecebimento">Forma de Recebimento</label>
                    <select id="formaRecebimento" name="formaRecebimento" required>
                        <option value="" disabled selected>Selecione a forma de recebimento</option>
                        <option value="boleto">Boleto</option>
                        <option value="cartao">Cartão</option>
                        <option value="transferencia">Transferência</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>
                <div class="table_form">
                    <label for="pagamentoRecebido">Pagamento Recebido</label>
                    <select id="pagamentoRecebido" name="pagamentoRecebido">
                        <option value="" disabled selected>Selecione</option>
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>
                <div class="table_form">
                    <label class="obg" for="vencimento">Vencimento</label>
                    <input type="date" id="vencimento" name="vencimento" required>
                </div>
                <div class="table_form">
                    <label class="obg" for="contaBancaria">Conta Bancária</label>
                    <input type="text" id="contaBancaria" name="contaBancaria" required>
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
                <label class="obg" for="valorBruto">Valor Bruto</label>
                <input type="number" id="valorBruto" name="valorBruto" required oninput="calcularValorTotal()">
            </div>
            <div class="table_form">
                <label for="juros">Juros</label>
                <input type="number" id="juros" name="juros" required oninput="calcularValorTotal()">
            </div>
            <div class="table_form">
                <label for="desconto">Desconto</label>
                <input type="number" id="desconto" name="desconto" required oninput="calcularValorTotal()">
            </div>
            <div class="table_form">
                <label for="valorTotal">Valor Total</label>
                <input type="number" id="valorTotal" name="valorTotal" required readonly>
            </div>
        </div>
    </div>
    <div>
        <a>
            <button class="botao_endpage"
                style="background-color: green; color: white; margin-left: 20px;">CADASTRAR</button>
        </a>
        <a>
            <button type="button" class="botao_endpage" style="background-color: red; color: white;"
                onclick="window.location.href='/contasreceber/list'">CANCELAR</button>
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