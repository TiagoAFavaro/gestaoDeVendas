@extends('layouts.app')

@section('title', 'Editando os Dados')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h4>Editando os Dados</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/produtos/list">Produtos</a>
            <span class="separator">&gt;</span>
            <a href="{{ url('/produtos/edit/' . $produto->id) }}">Editar</a>
        </div>
    </div>
    <br>
    <h1>{{ $produto->descricao }}</h1>
    <form action="/produtos/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="descricao">Descrição</label></td>
                        <td><input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto->descricao }}"></td>
                    </tr>
                    <tr>
                        <td><label for="fornecedor">Fornecedor</label></td>
                        <td><input type="text" class="form-control" id="fornecedor" name="fornecedor" value="{{ $produto->fornecedor }}"></td>
                    </tr>
                    <tr>
                        <td><label for="precoCusto">Preço de Custo</label></td>
                        <td><input type="number" class="form-control" id="precoCusto" name="precoCusto" step="0.05" value="{{ $produto->precoCusto }}"></td>
                    </tr>
                    <tr>
                        <td><label for="precoVenda">Preço de Venda</label></td>
                        <td><input type="number" class="form-control" id="precoVenda" name="precoVenda" step="0.05" value="{{ $produto->precoVenda }}"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</main>
@endsection
