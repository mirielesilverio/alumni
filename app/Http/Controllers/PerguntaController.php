<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PerguntaController extends Controller
{
    public function index()
    {
        if(Session::has('extensao'))
        {

        }
    }

    public function create($id)
    {
        $questionario = Questionario::find($id);
        return view('questionario.pergunta-create')->with(compact('questionario'));
    }
    
    public function store(Request $request)
    {
        $i = 0;
        if($alternativas = $request->get('alternativa'))
        {
            if ($cont = $request->get('idAlt')) 
            {
                foreach ($alternativas as $alternativa) 
                {
                    echo($alternativa.'<br>');
                    echo($cont[$i].'<br>');
                    if ($opcoes = $request->get('opcaoInput'.$cont[$i])) 
                    {
                        foreach ($opcoes as $opcao) 
                        {
                            echo($opcao.'<br>');
                        }
                    }
                    else
                        echo('Erro');
                    $i++;

                    echo('<hr style="border-style: dashed;">');
                    
                }
            }
        }
        if ($dissertativas = $request->get('dissertativa')) 
        {
            foreach ($dissertativas as $dissertativa) 
            {
                echo($dissertativa.'<br>');
                echo('<hr style="border-style: dashed;">');
            }
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
         
    }
}
