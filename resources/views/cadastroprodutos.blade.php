@extends('layouts.app_sem_sidebar')

@section('title', 'Cadastro de Produtos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
    <style>
        .currency-container {
            display: flex;
            align-items: center;
        }
        .currency-container span {
            margin-right: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="sub_header">
        <h4>Adicionar Produtos</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/produtos/list">Produtos</a>
            <span class="separator">&gt;</span>
            <a href="">Adicionar</a>
        </div>
    </div>
    <br>
    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/edit.png') }}">
            <h5>Cadastro de Produtos</h5>
        </div>
        <hr>
        <div class="forms">
        <form id="cadastrarProdutos" action="/criar_cadastro_produtos" method="post">
            @csrf
                <div class="table_form01">
                    <label class="obg" for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" required>
                </div>
                <div class="table_form01">
                    <label class="obg" for="fornecedor">Fornecedor</label>
                    <input type="text" id="fornecedor" name="fornecedor" required>
                </div>
                <div class="table_form01">
                    <label class="obg" for="precoCusto">Preço de Custo</label>
                    <div class="currency-container">
                        <span>R$</span>
                        <input type="number" id="precoCusto" name="precoCusto" step="0.01" required>
                    </div>
                </div>
                <div class="table_form01">
                    <label class="obg" for="precoVenda">Preço de Venda</label>
                    <div class="currency-container">
                        <span>R$</span>
                        <input type="number" id="precoVenda" name="precoVenda" step="0.01" required>
                    </div>
                </div>
                <div class="button-container" style="margin-top: 20px;">
                    <button type="submit" style="color: white;">CADASTRAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection
