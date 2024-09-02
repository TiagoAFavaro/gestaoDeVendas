@extends('layouts.app')

@section('title', 'Visualização de Cliente')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="sub_header">
        <h4>Visualização de Cliente</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/clientes/list">Clientes</a>
            <span class="separator">&gt;</span>
            <a href="{{ url('/visualizarCliente/' . $cliente->id) }}">Visualizar</a>
        </div>
    </div>
    <br>
    <h1>{{ $cliente->nome }}</h1>
    <form action="">
        @csrf
        @method('PUT')
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="nome">Nome</label></td>
                        <td><input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="telefone">Telefone</label></td>
                        <td><input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefone }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cpf">CPF</label></td>
                        <td><input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->cpf }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cep">CEP</label></td>
                        <td><input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->cep }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="endereco">Endereço</label></td>
                        <td><input type="text" class="form-control" id="endereco" name="endereco" value="{{ $cliente->endereco }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="numeroCasa">Número da Casa</label></td>
                        <td><input type="text" class="form-control" id="numeroCasa" name="numeroCasa" value="{{ $cliente->numeroCasa }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="cidade">Cidade</label></td>
                        <td><input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}" disabled></td>
                    </tr>
                    <tr>
                        <td><label for="estado">Estado</label></td>
                        <td><input type="text" class="form-control" id="estado" name="estado" value="{{ $cliente->estado }}" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</main>
@endsection