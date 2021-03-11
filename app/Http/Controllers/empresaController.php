<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresas;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    public function index(){
        return view('home');
    }

    public function create(){
        return view('empresa.create');
    }

    public function store(Request $request){
        $empresa = new Empresas;

        $empresa->uf = $request->uf;
        $empresa->nome_fantasia = $request->nome_fantasia;
        $empresa->cnpj = $request->cnpj;

        if(strlen($request->cnpj) < 14){

            return Redirect('/empresa/create')->with('msg_erro', 'CNPJ inválido! (CNPJ:'. $request->cnpj . ')');
        }

        $empresa->save();

        return Redirect('/empresas')->with('msg_ok', 'Cadastro criado com sucesso!');
    }

    public function home(){

        $empresas = Empresas::all();

        return view('empresa.home', ['empresas' => $empresas]);
    }

    public function destroy($id){

        Empresas::findOrFail($id)->delete();
        
        return redirect('/empresas')->with('msg', 'Empresa deletada com sucesso!');
    }

    public function edit($id){

        $empresa = Empresas::findOrFail($id);

        return view('empresa.edit', ['empresa' => $empresa]);
    }

    public function update(Request $request){

        Empresas::findOrFail($request->id)->update($request->all());

        return redirect('/empresas')->with('msg', 'Empresa editada com sucesso!');
    }

}

?>