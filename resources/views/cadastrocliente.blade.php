@extends('layouts.app_sem_sidebar')

@section('title', 'Cadastro de Clientes')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
    <div class="sub_header">
        <h4>Adicionar clientes</h4>
        <div class="navegador">
            <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
            <a href="/dashboard">Início</a>
            <span class="separator">&gt;</span>
            <a href="/clientes/list">Clientes</a>
            <span class="separator">&gt;</span>
            <a href="/clientes/cadastro">Adicionar</a>
        </div>
    </div>
    <br>
    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/edit.png') }}">
            <h5>Cadastro de Clientes</h5>
        </div>
        <hr>
        <div class="forms">
            <form id="cadastrarClientes" action="/criar_cadastro_clientes" method="post">
                @csrf
                <div class="table_form">
                    <label class="obg" for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required value="{{ old('nome') }}">
                    @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label class="obg" for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" maxlength="15" required value="{{ old('telefone') }}">
                    @if ($errors->has('telefone'))
                        <span class="text-danger">{{ $errors->first('telefone') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label class="obg" for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" maxlength="14" required value="{{ old('cpf') }}">
                    @if ($errors->has('cpf'))
                        <span class="text-danger">{{ $errors->first('cpf') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" maxlength="9" value="{{ old('cep') }}">
                    @if ($errors->has('cep'))
                        <span class="text-danger">{{ $errors->first('cep') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" value="{{ old('endereco') }}">
                    @if ($errors->has('endereco'))
                        <span class="text-danger">{{ $errors->first('endereco') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="numeroCasa">Número da Casa</label>
                    <input type="text" id="numeroCasa" name="numeroCasa" value="{{ old('numeroCasa') }}">
                    @if ($errors->has('numeroCasa'))
                        <span class="text-danger">{{ $errors->first('numeroCasa') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="{{ old('cidade') }}">
                    @if ($errors->has('cidade'))
                        <span class="text-danger">{{ $errors->first('cidade') }}</span>
                    @endif
                </div>
                <div class="table_form">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado">
                        <option value="">Selecione o estado</option>
                        <option value="AC" {{ old('estado') == 'AC' ? 'selected' : '' }}>Acre</option>
                        <option value="AL" {{ old('estado') == 'AL' ? 'selected' : '' }}>Alagoas</option>
                        <option value="AP" {{ old('estado') == 'AP' ? 'selected' : '' }}>Amapá</option>
                        <option value="AM" {{ old('estado') == 'AM' ? 'selected' : '' }}>Amazonas</option>
                        <option value="BA" {{ old('estado') == 'BA' ? 'selected' : '' }}>Bahia</option>
                        <option value="CE" {{ old('estado') == 'CE' ? 'selected' : '' }}>Ceará</option>
                        <option value="DF" {{ old('estado') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                        <option value="ES" {{ old('estado') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                        <option value="GO" {{ old('estado') == 'GO' ? 'selected' : '' }}>Goiás</option>
                        <option value="MA" {{ old('estado') == 'MA' ? 'selected' : '' }}>Maranhão</option>
                        <option value="MT" {{ old('estado') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                        <option value="MS" {{ old('estado') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                        <option value="MG" {{ old('estado') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <option value="PA" {{ old('estado') == 'PA' ? 'selected' : '' }}>Pará</option>
                        <option value="PB" {{ old('estado') == 'PB' ? 'selected' : '' }}>Paraíba</option>
                        <option value="PR" {{ old('estado') == 'PR' ? 'selected' : '' }}>Paraná</option>
                        <option value="PE" {{ old('estado') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                        <option value="PI" {{ old('estado') == 'PI' ? 'selected' : '' }}>Piauí</option>
                        <option value="RJ" {{ old('estado') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="RN" {{ old('estado') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                        <option value="RS" {{ old('estado') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                        <option value="RO" {{ old('estado') == 'RO' ? 'selected' : '' }}>Rondônia</option>
                        <option value="RR" {{ old('estado') == 'RR' ? 'selected' : '' }}>Roraima</option>
                        <option value="SC" {{ old('estado') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                        <option value="SP" {{ old('estado') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="SE" {{ old('estado') == 'SE' ? 'selected' : '' }}>Sergipe</option>
                        <option value="TO" {{ old('estado') == 'TO' ? 'selected' : '' }}>Tocantins</option>
                    </select>
                    @if ($errors->has('estado'))
                        <span class="text-danger">{{ $errors->first('estado') }}</span>
                    @endif
                </div>
                <div class="button-container">
                    <button type="submit" style="color: white;">CADASTRAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection
