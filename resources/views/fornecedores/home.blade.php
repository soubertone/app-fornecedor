@extends('layouts.main')

@section('title', 'RestAPI - Fornecedores')

@section('content')

@if(session('msg_ok'))
    <div class="alert alert-success" role="alert">
        {{ session('msg_ok') }}
    </div>
@endif

@if(session('msg_erro'))
    <div class="alert alert-danger" role="alert">
        {{ session('msg_erro') }}
    </div>
@endif

<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <div class="card bg-light">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-black-50 p-3 display-5">Fornecedores</h4>
                    </div>
                    <div class="col-md-6 p-3 d-flex flex-row-reverse">
                                <form action="/fornecedores" action="GET">
                                    <div class="form-group">
                                        <label class="m-1">Filtrar por:</label>
                                            <select class="form-control p-2" name="filter" id="filter">
                                                <option value="">Selecione</option>
                                                <option value="nome">Nome</option>
                                                <option value="cpf_cnpj">CPF/CNPJ</option>
                                                <option value="created_at">Data de cadastro</option>
                                            </select>
                                    </div>
                                        <input type="submit" value="Filtrar" class="btn btn-sm btn-outline-primary mt-2">
                                </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 pt-0">
                @if($filter)
                @php str_replace('created_at', 'Data de criação', $filter); @endphp
                <p class="text-dark">Filtrando resultados por: 
                    {{ strtoupper($filter) }}
                </p>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Criado em:</th>
                            <th>Nome</th>
                            <th>ID Empresa</th>
                            <th>Tipo</th>
                            <th>CPF/CNPJ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($fornecedor->created_at)) }}</td>
                            <td>
                                <a href="/fornecedores/{{ $fornecedor->id }}/{{ $fornecedor->id_empresa }}">
                                {{ $fornecedor->nome }}
                                </a>
                            </td>
                            <td>{{ $fornecedor->id_empresa }}</td>
                            <td>{{ 
                                str_replace('0', 'Jurídica',
                                str_replace('1', 'Física', $fornecedor->tipo)
                                )}}
                            </td>
                            <td>
                                @php
                                $cpf_cnpj = preg_replace("/\D/", '', $fornecedor->cpf_cnpj);
                                
                                if (strlen($cpf_cnpj) === 11) {
                                    $cpf_cnpj = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf_cnpj);
                                } else {
                                $cpf_cnpj = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf_cnpj);
                                }
                                @endphp
                                {{ $cpf_cnpj }}
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2 mx-2">
                                        <a href="/fornecedores/edit/{{ $fornecedor->id }}/{{ $fornecedor->id_empresa }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                    <div class="col-sm-2 mx-2">
                                        <form action="/fornecedores/{{ $fornecedor->id }}" method="POST"> 
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="/fornecedores/create">
                    <button class="btn btn-outline-primary" name="create"><i class="bi bi-plus"></i>Adicionar fornecedor</button>
                </a>
            </div>
        </div>
    </div>


</div>

@endsection