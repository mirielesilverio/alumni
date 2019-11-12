<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestionarioController extends Controller
{
    public function index()
    {
        if(Session::has('extensao'))
        {

            $questionarios = DB::table('questionario')
                    ->whereIn('idUsuarioCex',DB::table('usuariocex')
                    ->where('idCampus',Session::get('extensao')->idCampus)
                    ->select('id'))
                    ->orderBy('id','desc')
                    ->get();

            return view('questionario.questionario-listar')->with(compact('questionarios'));
        }

        //return view('noticia.index');
    }

    public function create()
    {
        return view('questionario.questionario-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'required'
        ]);

        
        $questionario = new Questionario([
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao'),
            'idUsuarioCex' => Session::get('extensao')->id
        ]);

        try 
        {
            $questionario->save();

            return redirect()->route('questionario.editar', $questionario->id)->with('success', 'Questionario salvo com sucesso!');

        } 
        catch (Exception $e) 
        {
            return redirect('questionario/criar')->with('erro','Erro ao salvar questionario!');
        }       
  
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $questionario = DB::table('questionario')->where('id',$id)->first();
        return view('questionario.questionario-create')->with(compact('questionario'));
    }
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
         
    }
}
