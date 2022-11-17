@extends('template')

@section('titulo', 'Nova Entrada')

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="{{ route('seus_gastos') }}">Entenda os seus gastos</a>
</li>
@endsection

@section('conteudo')
<header class="text-center">
    NOVA ENTRADA
</header>

<div class="container d-flex">
    <div class="col-md-12 p-3">
        <p>Inclua uma Receita ou Despesa</p>
    </div>
</div>
@endsection