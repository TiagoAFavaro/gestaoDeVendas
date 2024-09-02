<?php

namespace App\Http\Controllers;

use App\Models\CadastroFornecedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CadastroFornecedoresController extends Controller
{
    public function index()
    {
        $cadastros = CadastroFornecedores::all();

        return view('fornecedores')->with('cadastros', $cadastros);
    }

    public function visualizarFornecedoresById($id)
    {
        $fornecedor = CadastroFornecedores::findOrFail($id);

        return view('visualizarFornecedor',  ['fornecedor' => $fornecedor]);
    }

    public function paginaCadastro()
    {
        return view('cadastrofornecedores');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nome' => 'required|string|max:255',
        'contato' => 'required|string|max:255',
        'telefone' => 'required|string|max:15',
        'cnpj' => 'required|string|max:18|unique:cadastro_fornecedores',
        'email' => 'required|string|email|max:255|unique:cadastro_fornecedores',
        'cep' => 'nullable|string|max:9',
        'endereco' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:255',
        'cidade' => 'nullable|string|max:255',
        'estado' => 'nullable|string|max:2',
    ], [
        'cnpj.unique' => 'CNPJ já cadastrado.',
        'email.unique' => 'E-mail já cadastrado.',
        'nome.required' => 'O campo Nome é obrigatório.',
        'contato.required' => 'O campo Contato é obrigatório.',
        'telefone.required' => 'O campo Telefone é obrigatório.',
        'cnpj.required' => 'O campo CNPJ é obrigatório.',
        'email.required' => 'O campo E-mail é obrigatório.',
        'email.email' => 'O E-mail informado não é válido.',
    ]);

    $validator->after(function ($validator) use ($request) {
        $cnpj = preg_replace('/[^0-9]/', '', $request->input('cnpj'));

        if (!empty($cnpj)) {
            if (strlen($cnpj) != 14) {
                $validator->errors()->add('cnpj', 'CNPJ inválido');
                return;
            }

            if (preg_match('/(\d)\1{13}/', $cnpj)) {
                $validator->errors()->add('cnpj', 'CNPJ inválido');
                return;
            }

            $size = strlen($cnpj) - 2;
            $numbers = substr($cnpj, 0, $size);
            $digits = substr($cnpj, $size);
            $sum = 0;
            $position = 5;

            for ($i = 0; $i < $size; $i++) {
                $sum += $numbers[$i] * $position;
                $position--;
                if ($position < 2) {
                    $position = 9;
                }
            }

            $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

            if ($result != $digits[0]) {
                $validator->errors()->add('cnpj', 'CNPJ inválido');
            }

            $size += 1;
            $numbers = substr($cnpj, 0, $size);
            $sum = 0;
            $position = 6;

            for ($i = 0; $i < $size; $i++) {
                $sum += $numbers[$i] * $position;
                $position--;
                if ($position < 2) {
                    $position = 9;
                }
            }

            $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

            if ($result != $digits[1]) {
                $validator->errors()->add('cnpj', 'CNPJ inválido');
            }
        }
    });

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $cadastro = new CadastroFornecedores();
    $cadastro->fill($request->all());
    $cadastro->save();

    return redirect('/fornecedores/list');
}


    public function edit($id)
    {
        $fornecedor = CadastroFornecedores::findOrFail($id);
        return view('editFornecedor', ['fornecedor' => $fornecedor]);
    }

    public function update(Request $request, $id)
    {
        $cadastro = CadastroFornecedores::findOrFail($id);
        $cadastro->fill($request->all());
        
        $cadastro->save();
        return redirect('/fornecedores/list');
    }

    public function destroy($id)
    {
        CadastroFornecedores::findOrFail($id)->delete();

        return redirect('/fornecedores/list')->with('msg', 'Cadastro excluído com sucesso!');
    }
}
