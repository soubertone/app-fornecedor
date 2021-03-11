@extends('layouts.main')

@section('title', 'RestAPI - Fornecedores')

@section('content')

@if(session('msg_ok'))
    <div class="alert alert-success" role="alert">
        {{ session('msg_ok') }}
    </div>
@endif

@if(session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
@endif

<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <div class="card bg-light">
            <div class="card-title">
                <h4 class="text-black-50 p-3 display-5">Empresas</h4>
            </div>
            <div class="card-body p-4 pt-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>UF</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($empresas as $empresa)
                            <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nome_fantasia }}</td>
                            <td>
                                @php
                                $cnpj = preg_replace("/\D/", '', $empresa->cnpj);
                            
                                if (strlen($cnpj) === 14) {
                                    $cnpj = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj);
                                } else {
                                    $cnpj = $empresa->cnpj;
                                }
                                @endphp
                                {{ $cnpj }}
                            </td>
                            <td>{{ $empresa->uf }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="/empresa/edit/{{ $empresa->id }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                    <div class="col-sm-2">
                                        <form action="/empresas/{{ $empresa->id }}" method="POST"> 
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
                    <a href="/empresa/create">
                        <button class="btn btn-outline-primary" name="create"><i class="bi bi-plus"></i>Adicionar empresa</button>
                    </a>
                </div>
        </div>
    </div>


</div>

@endsection