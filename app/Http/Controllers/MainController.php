<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MainController extends Controller
{
    public function home(){
        return Inertia::render('Home');
    }

    public function signup() {
        return Inertia::render('Signup');
    }

    public function login(){
        return Inertia::render('Login');
    }

    public function homeSubmit(Request $request){
        $request->validate(
            [
                'sexo' => 'required',
                'idade' => 'required',
                'altura' => 'required',
                'peso' => 'required',

            ],
            [
                'sexo.required' => 'Escolha o seu sexo!',
                'idade.required' => 'Digite a sua idade!',
                'altura.required' => 'Digite a sua altura!',
                'peso.required' => 'Digite o seu peso!',
            ]
        );;
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $idade = $request->input('idade');
        $imc = $request->input('imc');
        $sexo = $request->input('sexo');
        $gordura = $request->input('gordura');
        $status = $request->input('status');
        $recomendacao = $request->input('recomendacao');

        // Cálculo do IMC
        $imc = $peso / ($altura ** 2);

        // Cálculo do percentual de gordura
        if ($sexo === "masculino") {
            $gordura = 1.20 * $imc + 0.23 * $idade - 16.2;
        } else {
            $gordura = 1.20 * $imc + 0.23 * $idade - 5.4;
        }

        // Determinação de status e recomendação
        if ($imc < 18.5) {
            $status = "Abaixo do peso";
            $recomendacao = "Consuma alimentos calóricos e ricos em nutrientes.";
          } else if ($imc >= 18.5 && $imc <= 24.9) {
            $status = "Peso ideal";
            $recomendacao = "Mantenha uma dieta equilibrada e pratique exercícios regularmente.";
          } else {
            $status = "Acima do peso";
            $recomendacao = "Adote uma alimentação saudável e pratique atividades físicas.";
          }
        
        //salvar banco de dados
        $dadosImc = new Imc();
        $dadosImc->user_id = session('user.id');
        $dadosImc->imc = $imc;
        $dadosImc->gordura = $gordura;
        $dadosImc->status = $status;
        $dadosImc->created_at = date('Y-m-d H:i:s');
        $dadosImc->save();

        
        return Inertia::render('Home', ['resultados' => ['imc' => $imc, 'gordura' => $gordura, 'mostrar' => true, 'status' => $status, 'recomendacao' => $recomendacao]]);
    }

    public function tabela(){
        $id = session('user.id');
        $imcs = User::find($id)->imc()->get()->toArray();
        //dd($imcs);
        return Inertia::render('Tabela', ['imcs' => $imcs], ['id' => $id]);
    }
}
