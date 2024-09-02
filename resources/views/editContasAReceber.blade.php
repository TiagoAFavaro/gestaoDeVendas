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
                <a href="{{ url('/contas_a_receber/edit/' . $aReceber->id) }}">Editar</a>
            </div>
        </div>
        <br>
        <h1>{{ $aReceber->descricaoRecebimento }}</h1>
        <form action="/contas_a_receber/update/{{ $aReceber->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><label for="descricaoRecebimento">Descrição do Recebimento</label></td>
                            <td><input type="text" class="form-control" id="descricaoRecebimento" name="descricaoRecebimento"
                                    value="{{ $aReceber->descricaoRecebimento }}"></td>
                        </tr>
                        <tr>
                            <td><label for="formaRecebimento">Forma de Recebimento</label></td>
                            <td><input type="text" class="form-control" id="formaRecebimento" name="formaRecebimento"
                                    value="{{ $aReceber->formaRecebimento }}"></td>
                        </tr>
                        <tr>
                            <td><label for="pagamentoRecebido">Pagamento Recido ?</label></td>
                            <td><input type="text" class="form-control" id="pagamentoRecebido" name="pagamentoRecebido"
                                    value="{{ $aReceber->pagamentoRecebido }}"></td>
                        </tr>
                        <tr>
                            <td><label for="vencimento">Vencimento</label></td>
                            <td><input type="text" class="form-control" id="vencimento" name="vencimento"
                                    value="{{ $aReceber->vencimento }}"></td>
                        </tr>
                        <tr>
                            <td><label for="contaBancaria">Conta Bancária</label></td>
                            <td><input type="text" class="form-control" id="contaBancaria" name="contaBancaria"
                                    value="{{ $aReceber->contaBancaria }}"></td>
                        </tr>
                        <tr>
                            <td><label for="valorBruto">Valor Bruto em Reais</label></td>
                            <td><input type="text" class="form-control" id="valorBruto" name="valorBruto"
                                    value="{{ $aReceber->valorBruto }}"></td>
                        </tr>
                        <tr>
                            <td><label for="juros">Juros em Reais</label></td>
                            <td><input type="text" class="form-control" id="juros" name="juros"
                                    value="{{ $aReceber->juros }}"></td>
                        </tr>
                        <tr>
                            <td><label for="desconto">Desconto em Reais</label></td>
                            <td><input type="text" class="form-control" id="desconto" name="desconto"
                                    value="{{ $aReceber->desconto }}"></td>
                        </tr>
                        <tr>
                            <td><label for="valorTotal">Valor Total em Reais</label></td>
                            <td><input type="text" class="form-control" id="valorTotal" name="valorTotal"
                                    value="{{ $aReceber->valorTotal }}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </main>
@endsection
