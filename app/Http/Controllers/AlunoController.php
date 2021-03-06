<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\UsuarioAluno;
use App\Login;
use App\Genero;
use Session as Ses;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\DB;


class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = session('aluno');
        $genero = Genero::find($aluno->idGenero);
        $login = Login::find($aluno->idLogin);
        $formacao = DB::table('matricula')->where('cpfAluno',$aluno->cpf)
                ->join('curso','curso.id','=','matricula.idCurso')
                ->join('campus','campus.id','=','matricula.idCampus')
                ->join('statusformacao','statusformacao.id','=','matricula.idStatusFormacao')
                ->select('curso.nome','campus.sigla','statusformacao.status')
                ->get();
        
        return view('perfil.perfil-aluno')->with(compact(('aluno'),('login'),('genero'),('formacao')));   
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        $aluno = session('aluno');
        $generos = DB::table('genero')->get();
        $login = Login::find($aluno->idLogin);

        return view('perfil.edit')->with(compact(('aluno'),('login'),('generos')));   
    }

    public function update(Request $request, $cpf)
    {
        try 
        {
            $this->validate($request, [
                'nome' => 'required',
                'dataNasc' => 'required',
                'genero' => 'required',
                'rg' => 'required'
            ]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('erro','Todos os campos devem ser preenchidos!');
        }

        try 
        {
            $aluno = UsuarioAluno::find($cpf);

            $aluno->nome = $request->get('nome');
            $aluno->dataNasc = date('Y-m-d',strtotime($request->get('dataNasc')));
            $aluno->idGenero = $request->get('genero');
            $aluno->rg = $request->get('rg');

            $aluno->save();

            $aluno = DB::table('usuarioaluno')->where('cpf', $cpf)->first();

            $generos = DB::table('genero')->get();

            $login = Login::find($aluno->idLogin);

            $success = 'Informações alteradas com sucesso!';
                    
            return view('perfil.edit')->with(compact(('aluno'),('login'),('generos'),('success'))); 

        }
        catch (Exception $e) {
            return redirect()->back()->with('erro','Erro ao atualizar registro!');
        }

    }

    public function destroy($id)
    {
        //
    }
}
