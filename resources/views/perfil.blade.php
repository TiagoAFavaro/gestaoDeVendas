@extends('layouts.app')

@section('title', 'Meu Perfil')

<!-- @push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush -->

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="sub_header">
            <h4>Meu Perfil</h4>
            <div class="navegador">
                <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
                <a href="/dashboard">Início</a>
                <span class="separator">&gt;</span>
                <a href="/perfil">Perfil</a>
            </div>
        </div>
        <br>
        <form>
            <div class="d-flex align-items-start">
                <div class="text-center"> <!-- Centraliza o conteúdo dentro deste div -->
                    <img src="{{ asset('img/Seu_Logo.png') }}" class="img_perfil img-fluid mb-1" alt="Imagem do Menu" id="trocarLogo">
                    <a href="#" class="d-block mt-1 alterar-foto-link">Alterar a foto de perfil</a> <!-- d-block e mt-1 garantem que o link fique colado abaixo da imagem -->
                </div>
                <div class="ml-3">
                    <h1>"Nome do Usuário"</h1>
                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="color: white; margin-top: 20px;">Salvar</button>
        </form>
    </main>
@endsection 