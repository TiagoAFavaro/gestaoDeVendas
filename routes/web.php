<?php

use App\Http\Controllers\CadastroClienteController;
use App\Http\Controllers\CadastroContasaPagarController;
use App\Http\Controllers\CadastroContasaReceberController;
use App\Http\Controllers\CadastroFornecedoresController;
use App\Http\Controllers\CadastroProdutosController;
use App\Http\Controllers\CadastroVendasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ROTA DE LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/', function () {
    return redirect('/dashboard');
});

//ROTA PARA CADASTRAR USUARIO
Route::get('/cadastrarusuario', [UsersController::class, 'create'])->name('cadastrarusuario');
Route::post('/cadastrarusuario', [UsersController::class, 'store'])->name('cadastrarusuariostore');


//ROTA PARA RECUPERAR SENHA
Route::get('/recuperarsenha', function () {
    return view('/recuperarSenha');
});

//ROTA PARA A CRIAÇÃO DE UMA NOVA SENHA
Route::get('/novasenha', function () {
    return view('/novaSenha');
});



//TODAS AS ROTAS OU PÁGINAS QUE NECESSITAM QUE O USUÁRIO ESTEJA LOGADO, DEVEM ESTAR DENTRO DO MIDDLEWARE ABAIXO:

Route::middleware([Autenticador::class])->group(function () {


    //ROTA DE HOMEPAGE
    Route::get('/dashboard', function () {
        return view('welcome');
    });

    //ROTA DE PERFIL
    Route::get('/perfil', function () {
        return view('perfil');
    });

    // ROTA PARA PÁGINA DE VENDAS
    Route::get('/vendas', function () {
        return view('vendas');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::post('/upload/logo', [LogoController::class, 'upload'])->name('upload.logo');    

    // ROTAS CONTAS A RECEBER
    Route::get('/cadastroreceber', [CadastroContasaReceberController::class, 'paginaCadastro']);
    Route::post('/cadastrar_novo_recebimento', [CadastroContasaReceberController::class, 'store']);
    Route::get('/contasreceber/list', [CadastroContasaReceberController::class, 'index']);
    Route::delete('/contas_a_receber/delete/{id}', [CadastroContasaReceberController::class, 'destroy']);
    Route::get('/visualizarareceber/{id}', [CadastroContasaReceberController::class, 'visualizarContasReceberById']);
    Route::get('/contas_a_receber/edit/{id}', [CadastroContasaReceberController::class, 'edit']);
    Route::put('/contas_a_receber/update/{id}', [CadastroContasaReceberController::class, 'update']);

    // ROTAS CONTAS A PAGAR
    Route::get('/cadastropagar', [CadastroContasaPagarController::class, 'paginaCadastro']);
    Route::post('/cadastrar_nova_conta', [CadastroContasaPagarController::class, 'store']);
    Route::get('/contas_a_pagar/list', [CadastroContasaPagarController::class, 'index']);
    Route::delete('/contas_a_pagar/delete/{id}', [CadastroContasaPagarController::class, 'destroy']);
    Route::get('/visualizarContas/{id}', [CadastroContasaPagarController::class, 'visualizarContasPagarById']);
    Route::get('/contas_a_pagar/edit/{id}', [CadastroContasaPagarController::class, 'edit']);
    Route::put('/contas_a_pagar/update/{id}', [CadastroContasaPagarController::class, 'update']);


    // ROTAS CADASTRO DE CLIENTES
    Route::get('/clientes/list', [CadastroClienteController::class, 'index']);
    Route::get('/clientes/cadastro', [CadastroClienteController::class, 'paginaCadastro']);
    Route::post('/criar_cadastro_clientes', [CadastroClienteController::class, 'store']);
    Route::delete('/clientes/delete/{id}', [CadastroClienteController::class, 'destroy']);
    Route::get('/visualizarCliente/{id}', [CadastroClienteController::class, 'visualizarClienteById']);
    Route::get('/clientes/edit/{id}', [CadastroClienteController::class, 'edit']);
    Route::put('/clientes/update/{id}', [CadastroClienteController::class, 'update']);

    // ROTAS CADASTRO DE FORNECEDORES
    Route::get('/fornecedores/list', [CadastroFornecedoresController::class, 'index']);
    Route::get('/fornecedores/cadastro', [CadastroFornecedoresController::class, 'paginaCadastro']);
    Route::post('/criar_cadastro_fornecedores', [CadastroFornecedoresController::class, 'store']);
    Route::delete('/fornecedores/delete/{id}', [CadastroFornecedoresController::class, 'destroy']);
    Route::get('/visualizarFornecedor/{id}', [CadastroFornecedoresController::class, 'visualizarFornecedoresById']);
    Route::get('/fornecedores/edit/{id}', [CadastroFornecedoresController::class, 'edit']);
    Route::put('/fornecedores/update/{id}', [CadastroFornecedoresController::class, 'update']);

    // ROTAS CADASTRO DE PRODUTOS
    Route::get('/produtos/list', [CadastroProdutosController::class, 'index']);
    Route::get('/produtos/cadastro', [CadastroProdutosController::class, 'paginaCadastro']);
    Route::post('/criar_cadastro_produtos', [CadastroProdutosController::class, 'store']);
    Route::delete('/produtos/delete/{id}', [CadastroProdutosController::class, 'destroy']);
    Route::get('/produtos/edit/{id}', [CadastroProdutosController::class, 'edit']);
    Route::put('/produtos/update/{id}', [CadastroProdutosController::class, 'update']);

    // ROTAS CADASTRO DE VENDAS
    Route::get('/vendas/list', [CadastroVendasController::class, 'index']);
    Route::get('/vendas/cadastro', [CadastroVendasController::class, 'paginaCadastro']);
    Route::post('/criar_cadastro_vendas', [CadastroVendasController::class, 'store']);
    Route::delete('/vendas/delete/{id}', [CadastroVendasController::class, 'destroy']);
    Route::get('/editvendas', function () {
        return view('editVendas');
    });
    Route::get('/visualizarVendas/{id}', [CadastroVendasController::class, 'show'])->name('vendas.show');
    // Rota para exibir o formulário de edição
    Route::get('/editarVendas/{id}', [CadastroVendasController::class, 'edit'])->name('vendas.edit');

    // Rota para atualizar a venda
    Route::put('/vendas/edit/{id}', [CadastroVendasController::class, 'update'])->name('vendas.update');


    // ROTAS VINCULAR VENDAS E PRODUTOS
    Route::get('/vendas', [CadastroVendasController::class, 'index'])->name('vendas.index');
    Route::get('/vendas/cadastrar', [CadastroVendasController::class, 'paginaCadastro'])->name('vendas.create');
    Route::post('/vendas', [CadastroVendasController::class, 'store'])->name('vendas.store');
    Route::delete('/vendas/{id}', [CadastroVendasController::class, 'destroy'])->name('vendas.destroy');
});
