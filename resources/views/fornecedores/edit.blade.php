@extends('layouts.main')

@section('title', 'RestAPI - Editar')

@section('content')

@if(session('msg_erro'))
    <div class="alert alert-danger" role="alert">
        {{ session('msg_erro') }}
    </div>
@endif

<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <div class="card bg-light">
            <div class="card-title">
                <h4 class="text-black-50 p-3 display-3">Editar fornecedor</h4>
            </div>
            <div class="card-body p-4 pt-0">
                <form action="/fornecedores/update/{{ $fornecedores->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="row">
                            <p class="text-dark display-5">Empresa</p>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Id Empresa:</label>
                                    <input type="number" name="" class="form-control" value="{{ $empresas->id }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome da empresa:</label>
                                    <input type="text" name="" class="form-control" value="{{ $empresas->nome_fantasia }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ:</label>
                                    <input type="number" class="form-control" value="{{ $empresas->cnpj }}" disabled>
                                </div>
                            </div>

                        </div>

                    <hr class="mt-5">
                        
                        <div class="row">
                            <p class="text-dark display-5">Dados</p>
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label>Selecione o tipo:</label>
                                    <select class="form-control" onclick="verifiFisica()" name="tipo" id="tipo" required>
                                        <option value="0">Pessoa Jurídica</option>
                                        <option value="1" 
                                        @if ($fornecedores->tipo == 1)
                                            selected
                                        @endif
                                        >Pessoa Física</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Nome completo:</label>
                                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $fornecedores->nome }}" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>CPF ou CNPJ:</label>
                                    <input type="number" name="cpf_cnpj" id="cpf_cnpj" class="form-control" onmouseup="verifiCpfCnpj()" onclick="verifiCpfCnpj()" onkeydown="verifiCpfCnpj()" onkeyup="verifiCpfCnpj()" value="{{ $fornecedores->cpf_cnpj }}" required>
                                </div>
                            </div>
                        </div>
                        
                    <div class="hidden" id="hidden"> 
                        <div class="row">
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label>Data de nascimento: </label>
                                    <input type="date" name="data_nasc" id="data_nasc" value="{{ $fornecedores->data_nasc }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label>RG:</label>
                                        <input type="number" class="form-control" name="rg" id="rg" value="{{ $fornecedores->rg }}" placeholder="00.000.000-0">
                                </div>
                            </div>
                        </div> 
                    </div>

                    <hr class="mt-5">

                        <div class="row p-2">
                            <p class="text-dark display-5">Contato</p>
                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 1: </label>
                                <input type="number" name="telefone" id="telefone" class="form-control" value="{{ $fornecedores->telefone }}" required>
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 2: </label>
                                <input type="number" name="telefone2" id="telefone2" class="form-control" value="{{ $fornecedores->telefone2 }}">
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 3: </label>
                                <input type="number" name="telefone3" id="telefone3" class="form-control" value="{{ $fornecedores->telefone3 }}">
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 4: </label>
                                <input type="number" name="telefone4" id="telefone4" class="form-control" value="{{ $fornecedores->telefone4 }}">
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Cadastrar fornecedor">
                            </div>
                        </div>

                </form>

            </div>

        </div>
    </div>
</div>

<script src="/js/verifiCnpj.js"></script>
<script src="/js/verifiCpfCnpj.js"></script>
<script src="/js/verifiFisica.js"></script>

@endsection