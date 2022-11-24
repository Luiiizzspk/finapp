<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Conexão com o model Fin_Movimento
use App\Models\Fin_movimento;

class MovimentoController extends Controller
{
    //carrega os movimentos do usuario logado

    public function get_movimentos(){
        $user_id = auth()->user()->id;
        //load registros onde o tipo=receita e user_id=$user_id
        $receitas = Fin_movimento::where('user_id', $user_id)->where('tipo', 'receita')->get();
        $despesas = Fin_movimento::where('user_id', $user_id)->where('tipo', 'despesa')->get();    
        $totReceitas = $receitas->sum('valor');
        $totDespesas = $despesas->sum('valor');

        $parametros = [
            'totDespesas' => $totDespesas,
            'totReceitas' => $totReceitas,
            'receitas' => $receitas,
            'despesas' => $despesas
        ];


        //carrega a view extrato enviando as variaveis $despesas e $receitas
        return view('extrato', $parametros);
    }
    
    //Metodo gravar para armazenar o movimento
    public function gravar(Request $request){
        //Instancia a tabela fin_movimentos
        //$movimento representa a tabela e 
        //$request representa os campos do formulario
        $movimento = new Fin_movimento;
        
        $movimento->user_id = auth()->user()->id;
        $movimento->descricao = $request->descricao;
        $movimento->tipo= $request->tipo;
        $movimento->valor = $request->valor;

        $movimento->save();

        //Após gravar os dados, redireciona para a rota "extrato"
        return redirect('extrato');
    }

    //Carre o formulario de edição com os dados do registro
    public function get_movimento($id){
        //carrega o movimento  onde o id = $id
        $movimento = Fin_movimento::findOrFail($id);

        return view('form_atualiza', ['movimento' => $movimento]);
    }

    public function atualizar(Request $request){
        Fin_movimento::findOrFail($request->id)->update($request->all());

        return redirect('extrato');
    }

    public function deletar($id){
        Fin_movimento::findOrFail($id)->delete();

        return redirect('extrato');
    }
}
