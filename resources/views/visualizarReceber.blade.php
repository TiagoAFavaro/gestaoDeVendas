@extends('layouts.app')

@section('title', 'Visualização de Contas a Receber')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="sub_header">
            <h4>Visualização de Contas a Receber</h4>
            <div class="navegador">
                <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
                <a href="/dashboard">Início</a>
                <span class="separator">&gt;</span>
                <a href="/contasreceber/list">A Receber</a>
                <span class="separator">&gt;</span>
                <a href="{{ url('/visualizarareceber/' . $aReceber->id) }}">Visualizar</a>
            </div>
        </div>
        <br>
        <h1>{{ $aReceber->descricaoRecebimento }}</h1>
        <form action="">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><label for="descricaoRecebimento">Descrição do Recimento</label></td>
                            <td><input type="text" class="form-control" id="descricaoRecebimento" name="descricaoRecebimento"
                                    value="{{ $aReceber->descricaoRecebimento }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="formaRecebimento">Forma de Recimento</label></td>
                            <td><input type="text" class="form-control" id="formaRecebimento" name="formaRecebimento"
                                    value="{{ $aReceber->formaRecebimento }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="pagamentoRecebido">Pagamento Recebido ?</label></td>
                            <td><input type="text" class="form-control" id="pagamentoRecebido" name="pagamentoRecebido"
                                    value="{{ $aReceber->pagamentoRecebido }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="vencimento">Vencimento</label></td>
                            <td><input type="text" class="form-control" id="vencimento" name="vencimento"
                                    value="{{ $aReceber->vencimento }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="contaBancaria">Conta Bancária</label></td>
                            <td><input type="text" class="form-control" id="contaBancaria" name="contaBancaria"
                                    value="{{ $aReceber->contaBancaria }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="valorBruto">Valor Bruto em Reais</label></td>
                            <td><input type="text" class="form-control" id="valorBruto" name="valorBruto"
                                    value="R$ {{ $aReceber->valorBruto }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="juros">Juros em Reais</label></td>
                            <td><input type="text" class="form-control" id="juros" name="juros"
                                    value="R$ {{ $aReceber->juros }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="desconto">Desconto em Reais</label></td>
                            <td><input type="text" class="form-control" id="desconto" name="desconto"
                                    value="R$ {{ $aReceber->desconto }}" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="valorTotal">Valor Total em Reais</label></td>
                            <td><input type="text" class="form-control" id="valorTotal" name="valorTotal"
                                    value="R$ {{ $aReceber->valorTotal }}" disabled></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </main>
@endsection
