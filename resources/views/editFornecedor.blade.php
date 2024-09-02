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
            <a href="/fornecedores/list">Fornecedores</a>
            <span class="separator">&gt;</span>
            <a href="{{ url('fornecedores/edit/' . $fornecedor->id) }}">Editar</a>
        </div>
    </div>
    <br>
    <h1>{{ $fornecedor->nome }}</h1>
    <form action="/fornecedores/update/{{ $fornecedor->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                        <td><label for="nome">Nome</label></td>
                        <td><input type="text" class="form-control" id="nome" name="nome" value="{{ $fornecedor->nome }}"></td>
                    </tr>
                    <tr>
                        <td><label for="cnpj">CNPJ</label></td>
                        <td><input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}"></td>
                    </tr>
                    <tr>
                        <td><label for="contato">Contato</label></td>
                        <td><input type="text" class="form-control" id="contato" name="contato" value="{{ $fornecedor->contato }}"></td>
                    </tr>
                    <tr>
                        <td><label for="telefone">Telefone</label></td>
                        <td><input type="text" class="form-control" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}"></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" value="{{ $fornecedor->email }}"></td>
                    </tr>
                    <tr>
                        <td><label for="endereco">Endereço</label></td>
                        <td><input type="text" class="form-control" id="endereco" name="endereco" value="{{ $fornecedor->endereco }}"></td>
                    </tr>
                    <tr>
                        <td><label for="numero">Número</label></td>
                        <td><input type="text" class="form-control" id="numero" name="numero" value="{{ $fornecedor->numero }}"></td>
                    </tr>
                    <tr>
                        <td><label for="cidade">Cidade</label></td>
                        <td><input type="text" class="form-control" id="cidade" name="cidade" value="{{ $fornecedor->cidade }}"></td>
                    </tr>
                    <tr>
                        <td><label for="estado">Estado</label></td>
                        <td><input type="text" class="form-control" id="estado" name="estado" value="{{ $fornecedor->estado }}"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</main>
@endsection
