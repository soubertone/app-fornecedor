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
                <h4 class="text-black-50 p-3 display-3">Editar empresa</h4>
            </div>
            <div class="card-body p-4 pt-0">
                <form action="/empresa/update/{{ $empresa->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>UF:</label>
                                    <select class="form-control" name="uf" required>
                                        <option value="{{ $empresa->uf }}">{{ $empresa->uf }}</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome fantasia:</label>
                                <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" value="{{ $empresa->nome_fantasia }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CNPJ: </label>
                                <input type="text" name="cnpj" id="cnpj" class="form-control" onmouseup="verifiCnpj()" onclick="verifiCnpj()" onkeydown="verifiCnpj()" onkeyup="verifiCnpj()" value="{{ $empresa->cnpj }}" required>
                                <small class="text-danger">*Somente números</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <input type="submit" class="btn btn-success" value="Editar empresa">
                        </div>

                </form>

            </div>

        </div>
    </div>
</div>

<script src="/js/verifiCnpj.js"></script>

@endsection