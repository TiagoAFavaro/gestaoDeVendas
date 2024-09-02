@extends('layouts.app')

@section('title', 'Visualização de Contas a Pagar')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h4>Visualização de Contas a Pagar</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/contaspagar">A Pagar</a>
            <span class="separator">&gt;</span>
            <a href="/visualizarpagar">Visualizar</a>
        </div>
    </div>
    <br>
    <h1>{{ $aPagar->descricaoPagamento }}</h1>
    <form action="/contas_a_pagar/update/{{ $aPagar->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="descricaoPagamento">Descrição do Pagamento</label></td>
                        <td><input type="text" class="form-control" id="descricaoPagamento" name="descricaoPagamento" value="{{ $aPagar->descricaoPagamento }}"></td>
                    </tr>
                    <tr>
                        <td><label for="formaPagamento">Forma de Pagamento</label></td>
                        <td><input type="text" class="form-control" id="formaPagamento" name="formaPagamento" value="{{ $aPagar->formaPagamento }}"></td>
                    </tr>
                    <tr>
                        <td><label for="pagamentoQuitado">Pagamento Quitado</label></td>
                        <td><input type="text" class="form-control" id="pagamentoQuitado" name="pagamentoQuitado" value="{{ $aPagar->pagamentoQuitado }}"></td>
                    </tr>
                    <tr>
                        <td><label for="vencimento">Vencimento</label></td>
                        <td><input type="text" class="form-control" id="vencimento" name="vencimento" value="{{ $aPagar->vencimento }}"></td>
                    </tr>
                    <tr>
                        <td><label for="contaBancaria">Conta Bancária</label></td>
                        <td><input type="text" class="form-control" id="contaBancaria" name="contaBancaria" value="{{ $aPagar->contaBancaria }}"></td>
                    </tr>
                    <tr>
                        <td><label for="valorBruto">Valor Bruto em Reais</label></td>
                        <td><input type="text" class="form-control" id="valorBruto" name="valorBruto" value="{{ $aPagar->valorBruto }}"></td>
                    </tr>
                    <tr>
                        <td><label for="juros">Juros em Reais</label></td>
                        <td><input type="text" class="form-control" id="juros" name="juros" value="{{ $aPagar->juros }}"></td>
                    </tr>
                    <tr>
                        <td><label for="desconto">Desconto em Reais</label></td>
                        <td><input type="text" class="form-control" id="desconto" name="desconto" value="{{ $aPagar->desconto }}"></td>
                    </tr>
                    <tr>
                        <td><label for="valorTotal">Valor Total em Reais</label></td>
                        <td><input type="text" class="form-control" id="valorTotal" name="valorTotal" value="{{ $aPagar->valorTotal }}"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    

</main>
@endsection