@extends('layouts.main')

@section('title', 'RestAPI - Cadastrar')

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
                <h4 class="text-black-50 p-3 display-3">Cadastrar fornecedor</h4>
            </div>
            <hr>
            <div class="card-body p-4 pt-0">
                <form action="/fornecedores" method="POST">
                    @csrf
                    <div class="row">

                        <div class="row">
                            <p class="text-dark display-5">Empresa</p>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Selecione a empresa:</label>
                                    <select class="form-control" name="id_empresa" id="id_empresa" onclick="verifiUf()" required>
                                        <option value="">Selecione</option>
                                        @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                                        @endforeach
                                    </select>
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
                                        <option value="1">Pessoa Física</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Nome completo:</label>
                                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome completo" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>CPF ou CNPJ:</label>
                                    <input type="number" name="cpf_cnpj" id="cpf_cnpj" class="form-control" onmouseup="verifiCpfCnpj()" onclick="verifiCpfCnpj()" onkeydown="verifiCpfCnpj()" onkeyup="verifiCpfCnpj()" placeholder="00.000.000/0000-00" required>
                                </div>
                            </div>
                        </div>
                        
                    <div class="hidden" id="hidden"> 
                        <div class="row">
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label>Data de nascimento: </label>
                                    <input type="date" name="data_nasc" id="data_nasc" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label>RG:</label>
                                        <input type="number" class="form-control" name="rg" id="rg" onmouseup="verifiRg()" onclick="verifiRg()" onkeydown="verifiRg()" onkeyup="verifiRg()" placeholder="00.000.000-0">
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
                                <input type="number" name="telefone" id="telefone" class="form-control" placeholder="(00) 0000-0000" required>
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 2: </label>
                                <input type="number" name="telefone2" id="telefone2" class="form-control" placeholder="(00) 0000-0000">
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 3: </label>
                                <input type="number" name="telefone3" id="telefone3" class="form-control" placeholder="(00) 0000-0000">
                            </div>
                        </div>

                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label>Telefone 4: </label>
                                <input type="number" name="telefone4" id="telefone4" class="form-control" placeholder="(00) 0000-0000">
                            </div>
                        </div>
                        <small class="text-danger">*Adicione pelo menos um telefone</small>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Cadastrar fornecedor" name="submit">
                            </div>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="/js/verifiFisica.js"></script>
<script src="/js/verifiCpfCnpj.js"></script>
<script src="/js/verifiRg.js"></script>

@endsection