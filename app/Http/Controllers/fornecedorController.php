<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fornecedores;

use App\Models\Empresas;

class FornecedorController extends Controller
{
    public function index(){
        return view('home');
    }

    public function create(){

        $empresas = Empresas::all();

        return view('fornecedores.create', ['empresas' => $empresas]);
    }

    public function store(Request $request){

        $fornecedores = new Fornecedores();

        $fornecedores->nome = $request->nome;
        $fornecedores->cpf_cnpj = $request->cpf_cnpj;
        $fornecedores->rg = $request->rg;
        $fornecedores->data_nasc = $request->data_nasc;

        $arr_date = explode('-', $request->data_nasc);

        $fornecedores->telefone = $request->telefone;
        $fornecedores->tipo = $request->tipo;

        $arr = explode('-', $request->id_empresa);
        $fornecedores->id_empresa = $arr[0];

        $fornecedores->telefone2 = $request->telefone2;
        $fornecedores->telefone3 = $request->telefone3;
        $fornecedores->telefone4 = $request->telefone4;

        if($request->nome && $request->telefone && $request->id_empresa && strlen($request->cpf_cnpj) == 14 || strlen($request->cpf_cnpj) == 11){
            if($arr[1] == 'PR' && (date('Y') - $arr_date[0]) >= 18){

            $fornecedores->save();

            return Redirect('/fornecedores')->with('msg_ok', 'Cadastro criado com sucesso!');

        } else {
            return Redirect('/fornecedores/create')->with('msg_erro', 'Você não pode cadastrar Pessoa Física menor de idade nesta empresa!');
        }

        } else {
        return Redirect('/fornecedores/create')->with('msg_erro', 'Erro ao cadastrar, verifique os campos!');
        }
    }

    public function home(){

        $filter = request('filter');

        if($filter){

            $fornecedores = Fornecedores::orderBy($filter, 'asc')->get();
        } else {

            $fornecedores = Fornecedores::all();
        }

        return view('fornecedores.home', ['fornecedores' => $fornecedores, 'filter' => $filter]);
    }

    public function show($id, $id_empresa){

        $fornecedores = Fornecedores::findOrFail($id);

        $empresas = Empresas::findOrFail($id_empresa);

        return view('fornecedores.show', ['fornecedores' => $fornecedores, 'empresas' => $empresas]);
    }
    
    public function destroy($id){

        Fornecedores::findOrFail($id)->delete();

        return redirect('/fornecedores')->with('msg', 'Fornecedor deletado com sucesso!');
    }

    public function edit($id, $id_empresa){

        $fornecedores = Fornecedores::findOrFail($id);

        $empresas = Empresas::findOrFail($id_empresa);

        return view('fornecedores.edit', ['fornecedores' => $fornecedores, 'empresas' => $empresas]);
    }

    public function update(Request $request){

        if($request->nome && $request->telefone && $request->id_empresa && strlen($request->cpf_cnpj) == 14 || strlen($request->cpf_cnpj) == 11){

        Fornecedores::findOrFail($request->id)->update($request->all());

        return redirect('/fornecedores')->with('msg_ok', 'Fornecedor editado com sucesso!');

        } else {
            return redirect('/fornecedores')->with('msg_erro', 'Erro ao editar, verifique os campos!');
        }

    }
}

?>