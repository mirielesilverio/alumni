<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerEvento extends Controller
{
    public function index()
    {
        return view('evento.index');
    }

    public function create()
    {
        return view('evento.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'required',
            'descricao' => 'required',
            'data' => 'required',
		    'horarioIn' => 'required',
		    'horarioFin' => 'required'
        ]);

        $evento = new Evento([
        	'titulo' => $request->get('titulo'),
		    'descricao' => $request->get('descricao'),
		    'data' => date('Y-m-d',strtotime($request->get('data'))),
		    'horarioIn' => date('H:m:s',strtotime($request->get('horarioIn'))),
		    'horarioFin' => date('H:m:s',strtotime($request->get('horarioFin'))),
		    'local' => $request->get('local'),
		    'qtdVagas' => $request->get('qtdVagas'),
		    'idUsuarioCex' => Session::get('extensao')->id
        ]);

        try 
        {
        	$evento->save();

        	return view('evento.create')->with('success','Evento salvo com sucesso!');
        } 
        catch (Exception $e) 
        {
        	return view('evento.create')->with('erro','Erro ao criar evento!');
        }
        
  
    }

    public function show($id)
    {
        $evento = Evento::find($id);
        return view('evento.show')->with(compact('evento'));
    }

    public function edit($id)
    {
        $evento = DB::table('evento')->where('id',$id);
        return view('evento.create')->with(compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'required',
            'descricao' => 'required',
            'data' => 'required',
		    'horarioIn' => 'required',
		    'horarioFin' => 'required'
        ]);

        $evento = Evento::find($id);

        $evento->titulo = $request->get('titulo');
        $evento->descricao = $request->get('titulo');
        $evento->imagem = $request->get('titulo');
        $evento->data = $request->get('titulo');
        $evento->horarioIn = $request->get('horarioIn');
        $evento->horarioFin = $request->get('horarioFin');
        $evento->local = $request->get('local');
		$evento->qtdVagas = $request->get('qtdVagas');
		$evento->idUsuarioCex = $request->get('idUsuarioCex');

		try 
        {
        	$evento->save();

        	return view('evento.create')->with('success','Evento alterado com sucesso!');
        } 
        catch (Exception $e) 
        {
        	return view('evento.create')->with('erro','Erro ao criar evento!');
        }
    }

    public function destroy($id)
    {
       $evento = Evento::findOrFail($id);

        try
        {
            $evento->delete();
            return redirect()->route('eventos')->with('success', 'Registro removido com sucesso!');
        }
        catch (\PDOException $e)
        {
            return redirect()->route('eventos')->with('error', $e->getCode());
        } 
    }
}
