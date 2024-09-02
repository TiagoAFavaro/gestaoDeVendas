<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CadastroCliente;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CadastroClienteController extends Controller
{
    public function index()
    {
        $cadastros = CadastroCliente::all();

        return view('clientes')->with('cadastros', $cadastros);
    }

    public function visualizarClienteById($id)
    {
        $cliente = CadastroCliente::findOrFail($id);

        return view('visualizarCliente',  ['cliente' => $cliente]);
    }

    public function paginaCadastro()
    {
        return view('cadastrocliente');
    }

    public function store(Request $request)
    {
        // Validação personalizada
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'telefone' => ['required', 'unique:cadastro_clientes,telefone'],
            'cpf' => ['nullable', 'unique:cadastro_clientes,cpf'],
            'email' => 'nullable|email|unique:cadastro_clientes,email',
            'cep' => 'nullable',
            'endereco' => 'nullable',
            'numeroCasa' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable',
        ], [
            'telefone.unique' => 'Telefone já cadastrado',
            'cpf.unique' => 'CPF já cadastrado',
            'email.unique' => 'E-mail já cadastrado',
        ]);

        $validator->after(function ($validator) use ($request) {
            $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));

            if (!empty($cpf)) {
                if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
                    $validator->errors()->add('cpf', 'CPF inválido');
                }

                $verificaDig1 = $cpf[9];
                $sum = 0;
                $number_to_multiplicate = 10;

                for ($index = 0; $index < 9; $index++) {
                    $sum += $cpf[$index] * ($number_to_multiplicate--);
                }

                $result = (($sum * 10) % 11);

                if ($result != $verificaDig1) {
                    $validator->errors()->add('cpf', 'CPF inválido');
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $cadastro = new CadastroCliente();
        $cadastro->fill($request->all());
        $cadastro->save();

        return redirect('/clientes/list');
    }


    public function edit($id)
    {
        $cliente = CadastroCliente::findOrFail($id);
        return view('editCliente', ['cliente' => $cliente]);
    }


    public function update(Request $request, $id)
    {
        $cadastro = CadastroCliente::findOrFail($id);
        $cadastro->fill($request->all());

        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));

        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return response()->json(['message', 'CPF Invalido, verifique e tente novamente']);
        }

        $verificaDig1 = $cpf[9];
        $sum = 0;
        $number_to_multiplicate = 10;

        for ($index = 0; $index < 9; $index++) {
            $sum += $cpf[$index] * ($number_to_multiplicate--);
        }

        $result = (($sum * 10) % 11);

        if ($result != $verificaDig1) {
            return response()->json(['message', 'CPF NAO E VALIDO']);
        }
        
        if (CadastroCliente::where('cpf', $request->cpf)->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'CPF já cadastrado']);
        }

        if (CadastroCliente::where('email', $request->email)->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'Email já cadastrado']);
        }

        $cadastro->save();
        return redirect('/clientes/list');
    }


    public function destroy($id)
    {
        CadastroCliente::findOrFail($id)->delete();

        return redirect('/clientes/list')->with('msg', 'Cadastro excluido com sucesso !');
    }
}
