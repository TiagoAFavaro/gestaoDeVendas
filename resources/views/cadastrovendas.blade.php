@extends('layouts.app_sem_sidebar')

@section('title', 'Cadastro de Vendas')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style-forms.css') }}">
@endpush

@section('content')
<div class="sub_header">
    <h4>Cadastre a sua Venda</h4>
    <div class="navegador">
        <img src="{{ asset('/img/velo.png') }}" style="width: 23px;">
        <a href="/home">Início</a>
        <span class="separator">&gt;</span>
        <a href="/vendas">Vendas</a>
        <span class="separator">&gt;</span>
        <a href="/cadastrar-vendas">Cadastro de Vendas</a>
    </div>
</div>
<br>

<form id="cadastrarVendas" action="/criar_cadastro_vendas" method="post">
    @csrf
    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/edit.png') }}">
            <h5>Dados Gerais</h5>
        </div>
        <hr>
        <div class="forms">
            <div class="table_form">
                <label class="obg" for="cliente_nome">Cliente</label>
                <select id="cliente_nome" name="cliente_nome" onchange="populateClienteData(this.value)" required>
                    <option value="" disabled selected>Selecione o cliente</option>
                    @foreach ($cadastrosClientes as $cadastro)
                    <option value="{{ $cadastro->id }}" data-cadastro="{{ json_encode($cadastro) }}">
                        {{ $cadastro->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="table_form">
                <label for="endereco_rua">Rua</label>
                <input type="text" id="endereco_rua" name="endereco_rua" disabled>
            </div>
            <div class="table_form">
                <label for="endereco_numero">Número</label>
                <input type="text" id="endereco_numero" name="endereco_numero" disabled>
            </div>
            <div class="table_form">
                <label for="endereco_cidade">Cidade</label>
                <input type="text" id="endereco_cidade" name="endereco_cidade" disabled>
            </div>
            <div class="table_form">
                <label for="endereco_estado">Estado</label>
                <input type="text" id="endereco_estado" name="endereco_estado" disabled>
            </div>
            <div class="table_form">
                <label class="obg" for="dataEntregaMercadoria">Data de Entrega</label>
                <input type="date" id="dataEntregaMercadoria" name="dataEntregaMercadoria" required>
            </div>
            <div class="table_form">
                <label class="obg" for="dataRecebimento">Data de Recebimento</label>
                <input type="date" id="dataRecebimento" name="dataRecebimento" required>
            </div>
            <div class="table_form">
                <label class="obg" for="situacao">Situação</label>
                <select id="situacao" name="situacao" required>
                    <option value="Pendente">Pendente</option>
                    <option value="Entregue">Entregue</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
            </div>
        </div>
    </div>

    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/box.png') }}">
            <h5>Produtos</h5>
        </div>
        <hr>
        <div id="produtos_container">
            <div class="produto">
                <div class="forms">
                    <div class="table_form">
                        <label class="obg" for="produto_descricao_0">Produto</label>
                        <select id="produto_descricao_0" name="produto_descricao[]" onchange="populateProdutoData(this, 0)" required>
                            <option value="" disabled selected>Selecione o produto</option>
                            @foreach ($cadastrosProdutos as $produto)
                            <option value="{{ $produto->id }}" data-produto="{{ json_encode($produto) }}">
                                {{ $produto->descricao }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table_form">
                        <label for="detalhes_0">Detalhes</label>
                        <input type="text" id="detalhes_0" name="detalhes[]">
                    </div>
                    <div class="table_form">
                        <label class="obg" for="quantidade_0">Quantidade</label>
                        <input type="number" id="quantidade_0" name="quantidade[]" oninput="updateSubtotal(0)" required>
                    </div>
                    <div class="table_form">
                        <label class="obg" for="precoVenda_0">Preço Unitário</label>
                        <input type="text" id="precoVenda_0" name="precoVenda[]" oninput="updateSubtotal(0)" required>
                    </div>
                    <div class="table_form">
                        <label class="obg" for="subtotal_0">Subtotal</label>
                        <input type="text" id="subtotal_0" name="subtotal[]" readonly required>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="add-row-button" onclick="addProduto()">Adicionar Produto</button>
    </div>

    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/notes.png') }}">
            <h5>Observações</h5>
        </div>
        <hr>
        <p><i>Essa observação será impressa no recibo.</i></p>
        <textarea id="observacoes" style="width: 50%;" name="observacoes" rows="4" cols="50"></textarea>
    </div>

    <div class="cadastro">
        <div style="display: flex;">
            <img src="{{ asset('/img/dindin.png') }}">
            <h5>Total</h5>
        </div>
        <hr>
        <div class="forms">
            <div class="table_form">
                <label for="valorTotal">Quantidade de Produtos</label>
                <input type="number" id="qnt_produtos" name="qnt_produtos" readonly>
            </div>
            <div class="table_form" style="margin-right: auto; margin-left: 10px;">
                <label for="valorTotal">Valor Total</label>
                <input type="text" id="valorTotal" name="valorTotal" readonly required>
            </div>
        </div>
    </div>

    <div style="display: flex;">
        <button type="submit" class="botao_endpage" style="background-color: green; color: white; margin-left: 20px;">
            CADASTRAR
        </button>

        
            <button type="button" class="botao_endpage" style="background-color: red; color: white;"
                onclick="window.location.href='/vendas/list'">CANCELAR</button>
        
    </div>
</form>

<script>
    let produtoIndex = 1;

    function tornarString(valorFloat) {
        if (typeof valorFloat !== 'number') {
            return valorFloat;
        } else {
            const valorString01 = valorFloat.toFixed(2);
            const valorString02 = valorString01.replace('.', ',');
            const valorString = 'R$ ' + valorString02;
            return valorString;
        }
    }

    function tornarFloat(valorString) {
        if (typeof valorString !== 'string') {
            return valorString;
        } else {
            const valorFloat01 = valorString.replace('R$ ', '');
            const valorFloat02 = valorFloat01.replace(',', '.');
            const valorFloat = parseFloat(valorFloat02);
            return isNaN(valorFloat) ? valorString : valorFloat;
        }
    }

    function populateClienteData(clienteId) {
        const clienteSelect = document.querySelector(`#cliente_nome option[value="${clienteId}"]`);
        const cadastro = JSON.parse(clienteSelect.getAttribute('data-cadastro'));

        document.getElementById('endereco_rua').value = cadastro.endereco;
        document.getElementById('endereco_numero').value = cadastro.numeroCasa;
        document.getElementById('endereco_cidade').value = cadastro.cidade;
        document.getElementById('endereco_estado').value = cadastro.estado;
    }

    function populateProdutoData(select, index) {
        const produto = JSON.parse(select.options[select.selectedIndex].dataset.produto);
        const precoFormatado = tornarString(produto.precoVenda);
        document.getElementById(`precoVenda_${index}`).value = precoFormatado;
        updateSubtotal(index);
    }

    function updateSubtotal(index) {
        const quantidade = parseFloat(document.getElementById(`quantidade_${index}`).value) || 0;
        const precoVenda = tornarFloat(document.getElementById(`precoVenda_${index}`).value);
        const subtotal = quantidade * precoVenda;
        document.getElementById(`subtotal_${index}`).value = tornarString(subtotal);
        calcularTotais();
    }

    function calcularTotais() {
        let totalQuantidade = 0;
        let totalValor = 0;

        const quantidades = document.getElementsByName('quantidade[]');
        const precos = document.getElementsByName('precoVenda[]');

        quantidades.forEach((element, index) => {
            const quantidade = parseFloat(element.value) || 0;
            const precoVenda = tornarFloat(precos[index].value);
            totalQuantidade += quantidade;
            totalValor += quantidade * precoVenda;
        });

        document.getElementById('qnt_produtos').value = totalQuantidade;
        document.getElementById('valorTotal').value = tornarString(totalValor);
    }

    function addProduto() {
        const produtosContainer = document.getElementById('produtos_container');

        const novoProduto = `
        <div class="produto">
            <div class="forms">
                <div class="table_form">
                    <label class="obg" for="produto_descricao_${produtoIndex}">Produto</label>
                    <select id="produto_descricao_${produtoIndex}" name="produto_descricao[]" onchange="populateProdutoData(this, ${produtoIndex})" required>
                        <option value="" disabled selected>Selecione o produto</option>
                        @foreach ($cadastrosProdutos as $produto)
                        <option value="{{ $produto->id }}" data-produto="{{ json_encode($produto) }}">
                            {{ $produto->descricao }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="table_form">
                    <label for="detalhes_${produtoIndex}">Detalhes</label>
                    <input type="text" id="detalhes_${produtoIndex}" name="detalhes[]">
                </div>
                <div class="table_form">
                    <label class="obg" for="quantidade_${produtoIndex}">Quantidade</label>
                    <input type="number" id="quantidade_${produtoIndex}" name="quantidade[]" oninput="updateSubtotal(${produtoIndex})" required>
                </div>
                <div class="table_form">
                    <label class="obg" for="precoVenda_${produtoIndex}">Preço Unitário</label>
                    <input type="text" id="precoVenda_${produtoIndex}" name="precoVenda[]" oninput="updateSubtotal(${produtoIndex})" required>
                </div>
                <div class="table_form">
                    <label class="obg" for="subtotal_${produtoIndex}">Subtotal</label>
                    <input type="text" id="subtotal_${produtoIndex}" name="subtotal[]" readonly required>
                </div>
            </div>
        </div>
        `;

        produtosContainer.insertAdjacentHTML('beforeend', novoProduto);
        produtoIndex++;
    }

    // Inicializa os eventos e cálculos iniciais
    document.addEventListener('DOMContentLoaded', () => {
        const quantidadeInputs = document.getElementsByName('quantidade[]');
        const precoInputs = document.getElementsByName('precoVenda[]');

        quantidadeInputs.forEach((element, index) => {
            element.addEventListener('input', () => updateSubtotal(index));
        });

        precoInputs.forEach((element, index) => {
            element.addEventListener('input', () => updateSubtotal(index));
        });

        calcularTotais();
    });
</script>

@endsection
