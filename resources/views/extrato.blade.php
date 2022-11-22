@extends('template')

@section('titulo', 'Extrato')

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="{{ route('seus_gastos') }}">Entenda os seus gastos</a>
</li>
@endsection

@section('conteudo')
<header class="text-center fw-bold @if($totReceitas - $totDespesas <0 )text-danger @endif">
    EXTRATO - Saldo: R$ {{$totReceitas - $totDespesas}}
</header>


<div class="container d-flex">
    <div class="col-md-6 p-3">
        <h2>Receitas: R$ {{$totReceitas}}</h2>

        @if(count($receitas) == 0)
            <p>Não há movimentações de receitas</p>
        @else
            @foreach($receitas as $receita)
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{$receita->descricao}}</p>
                        <p class="card-text">R$ {{$receita->valor}}</p>
                    </div>
                    <div class="card-footer">
                    <span>{{ \Carbon\Carbon::parse($receita->created_at)->format('d/m/Y')}}</span>
                        <a href="#" class="mx-3"><i class="fa-solid fa-trash"></i></i></a>
                        <a href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="col-md-6 p-3">
        <h2>Despesas: R$ {{$totDespesas}}</h2>

        @foreach($despesas as $despesa)
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{$despesa->descricao}}</p>
                    <p class="card-text">R$ {{$despesa->valor}}</p>
                </div>
                <div class="card-footer">
                    <span>{{ \Carbon\Carbon::parse($despesa->created_at)->format('d/m/Y')}}</span>
                    <a href="#" class="mx-3"><i class="fa-solid fa-trash"></i></a>
                    <a href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

@endsection