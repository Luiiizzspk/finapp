@extends('template')

@section('titulo', 'Extrato')

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="{{ route('seus_gastos') }}">Entenda os seus gastos</a>
</li>
@endsection

@section('conteudo')
<header class="text-center">
    EXTRATO - Saldo: R$ 9.999,00
</header>


<div class="container d-flex">
    <div class="col-md-6 p-3">
        <h2>Receitas</h2>

        <div class="card">
            <div class="card-body">
                <p class="card-title">Title</p>
                <p class="card-text">R$ 999.999,99</p>
            </div>
            <div class="card-footer">18/11/2022</div>
        </div>
    </div>

    <div class="col-md-6 p-3">
        <h2>Despesas</h2>

        <div class="card">
            <div class="card-body">
                <p class="card-title">Title</p>
                <p class="card-text">R$ 999.999,99</p>
            </div>
            <div class="card-footer">18/11/2022</div>
        </div>
    </div>
    </div>
</div>

@endsection