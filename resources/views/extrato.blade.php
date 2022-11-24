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
        <h2>Receitas: R$ {{ number_format($totReceitas, 2,',','.')}}</h2>

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
                        
                        <form method="POST" action="{{route('deletar', [$receita->id])}}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onClick="if(!confirm('Tem certeza que deseja excluir?')){return false}"
                            class="btn btn-link mx-3"><i class="fa-solid fa-trash"></i></i></botton>
                        </form>

                        <a href="{{route('editar',[$receita->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="col-md-6 p-3">
        <h2>Despesas: R$ {{number_format($totDespesas, 2,',','.')}}</h2>

        @if(count($despesas) == 0)
            <p>Não há movimentações de despesas</p>
        @else
            @foreach($despesas as $despesa)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-title">{{$despesa->descricao}}</p>
                        <p class="card-text">R$ {{$despesa->valor}}</p>
                    </div>
                    <div class="card-footer">
                        <span>{{ \Carbon\Carbon::parse($despesa->created_at)->format('d/m/Y')}}</span>

                        <form method="POST" action="{{route('deletar', [$despesa->id])}}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onClick="if(!confirm('Tem certeza que deseja excluir?')){return false}"
                            class="btn btn-link mx-3"><i class="fa-solid fa-trash"></i></i></botton>
                        </form>
                        <a href="{{route('editar',[$despesa->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                </div>
            @endforeach
        @endif        
    </div>
</div>
</div>

@endsection