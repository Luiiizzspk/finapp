@extends('template')

@section('titulo', 'Extrato')

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="">Entenda os seus gastos</a>
</li>
@endsection

@section('conteudo')
<header class="text-center">
    EXTRATO - SALDO: R$9.999,00
</header>

<div class="row">
    <div class="col-md-6 p-3 ">
        <h2>Receitas</h2>
    </div>
    <div class="col-md-3 p-3">
        <h2>Despessas</h2>
    </div>
</div>


@endsection