@extends('layouts.app')

@section('title', 'Visualização de Fornecedor')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="sub_header">
            <h4>Visualização de Fornecedor</h4>
            <div class="navegador">
                <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
                <a href="/dashboard">Início</a>
                <span class="separator">&gt;</span>
                <a href="/fornecedores/list">Fornecedores</a>
                <span class="separator">&gt;</span>
                <a href="{{ url('/visualizarFornecedor/' . $fornecedor->id) }}">Visualizar</a>
            </div>
        </div>
        <br>
        <h1>{{ $fornecedor->nome }}</h1>
    <form action="">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="nome">Nome</label></td>
                        <td><input type="text" class="form-control" id="nome" name="nome" value="{{ $fornecedor->nome }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cnpj">CNPJ</label></td>
                        <td><input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="contato">Contato</label></td>
                        <td><input type="text" class="form-control" id="contato" name="contato" value="{{ $fornecedor->contato }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="telefone">Telefone</label></td>
                        <td><input type="text" class="form-control" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" value="{{ $fornecedor->email }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="endereco">Endereço</label></td>
                        <td><input type="text" class="form-control" id="endereco" name="endereco" value="{{ $fornecedor->endereco }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="numero">Número</label></td>
                        <td><input type="text" class="form-control" id="numero" name="numero" value="{{ $fornecedor->numero }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cidade">Cidade</label></td>
                        <td><input type="text" class="form-control" id="cidade" name="cidade" value="{{ $fornecedor->cidade }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="estado">Estado</label></td>
                        <td><input type="text" class="form-control" id="estado" name="estado" value="{{ $fornecedor->estado }}" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    </main>
@endsection
