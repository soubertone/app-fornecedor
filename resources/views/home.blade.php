@extends('layouts.main')

@section('title', 'RestAPI')

@section('content')

    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <div class="card bg-light">
                <div class="card-title">
                    <h4 class="text-black-50 p-3 display-5"></h4>
                </div>
                <div class="card-body p-2 pt-0">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <a href="/empresas" class="btn btn-outline-light">
                                <h1 class="text-dark" style="font-size: 100px;"><i class="bi bi-list-ul"></i></h1>
                                <p class="font-weight-bold mx-auto">Empresas</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/fornecedores" class="btn btn-outline-light">
                                <h1 class="text-dark" style="font-size: 100px;"><i class="bi bi-person-lines-fill"></i></h1>
                                <p class="font-weight-bold mx-auto">Fornecedores</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection