@extends('layouts.main')

@section('title', 'RestAPI')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <div class="card bg-light">
            <div class="card-title">
                <h4 class="text-black-50 p-3 display-3">Fornecedor</h4>
            </div>
            <hr>
            <div class="card-body p-4 pt-0">

                    <div class="row">

                        <div class="row">
                            <p class="text-dark display-5">Empresa</p>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ID Empresa: </label>
                                    {{ $fornecedores->id_empresa }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome Fantasia: </label>
                                    {{ $empresas->nome_fantasia }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label>CNPJ: </label>
                                @php
                                $cpf_cnpj = preg_replace("/\D/", '', $empresas->cnpj);
                                
                                $cpf_cnpj = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf_cnpj);
                                @endphp
                                {{ $cpf_cnpj }}
                                </div>
                            </div>
                        </div>

                    <hr class="mt-5">
                        
                        <div class="row">
                            <p class="text-dark display-5">Dados</p>
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label>Criado em:</label>
                                    {{ date('d/m/Y', strtotime($fornecedores->created_at)) }}
                                    
                                </div>
                            </div>

                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label>Tipo:</label>
                                    Pessoa 
                                        {{ 
                                            str_replace('0', 'Jurídica',
                                            str_replace('1', 'Física', $fornecedores->tipo)
                                            )}}
                                    
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>Nome completo:</label>
                                    {{ $fornecedores->nome }}
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>CPF ou CNPJ:</label>
                                @php
                                $cpf_cnpj = preg_replace("/\D/", '', $fornecedores->cpf_cnpj);
                                
                                if (strlen($cpf_cnpj) === 11) {
                                    $cpf_cnpj = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf_cnpj);
                                } else {
                                $cpf_cnpj = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf_cnpj);
                                }
                                @endphp
                                {{ $cpf_cnpj }}
                                </div>
                            </div>
                        </div>
                         
                        @if($fornecedores->data_nasc)
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>Data de nascimento: </label>
                                    {{ date('d/m/Y', strtotime($fornecedores->data_nasc)) }}
                                </div>
                            </div>
                        @endif
                        @if($fornecedores->rg)
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label>RG:</label>
                                    {{ $fornecedores->rg }}
                                </div>
                            </div>
                        </div>
                        @endif
                    <hr class="mt-5">

                        <div class="row p-2">
                            <p class="text-dark display-5">Contato</p>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                            <label>Telefone 1: </label>
                                            {{ $fornecedores->telefone }}
                                        </div>
                                    </div>
                                        @if ($fornecedores->telefone2)
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label>Telefone 2: </label>
                                                {{ $fornecedores->telefone2 }}
                                            </div>
                                        </div>
                                        @endif

                                        @if ($fornecedores->telefone3)
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label>Telefone 3: </label>
                                                {{ $fornecedores->telefone3 }}
                                            </div>
                                        </div>
                                        @endif

                                        @if ($fornecedores->telefone4)
                                        <div class="col-md-3 mt-2">
                                            <div class="form-group">
                                                <label>Telefone 4: </label>
                                                {{ $fornecedores->telefone4 }}
                                            </div>
                                        </div>
                                        @endif
                                </div>
                                </div>
                        </div>
            </div>

        </div>
    </div>
</div>

@endsection