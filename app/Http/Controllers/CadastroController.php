<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\UsuarioAluno;
use App\Login;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'dataNasc' => 'required',
            'genero' => 'required',
            'rg' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'confirmaSenha' => 'required'
        ]);

        $aluno =DB::table('usuarioaluno')->where('cpf', $request->get('cpf'))->first();
        $generos = DB::table('genero')->get();

        if ($request->get('senha') != $request->get('confirmaSenha')) 
        {
            $error = 'As senhas devem ser idênticas';
            return view('cadastro.finalizarCadastro', compact(('aluno'),('generos'),('error')));
        }

        else
        {

            if (DB::table('login')->where('email', $request->get('email'))->exists()) 
            {
                $error = 'Email já Cadastrado';
                return view('cadastro.finalizarCadastro', compact(('aluno'),('generos'),('error')));
            }

            else
            {

                $login = new Login([
                    'email' => $request->get('email'),
                    'senha' => $request->get('senha'),
                    'idTipoUsuario' => 1
                ]);

                $login->save();

                $loginDB = DB::table('login')->where('email', $request->get('email'))->first(); 

                $aluno->nome = $request->get('nome');
                $aluno->dataNasc = date("Y-m-d", strtotime($request->get('dataNasc')));
                $aluno->idGenero = $request->get('genero');
                $aluno->idLogin = $loginDB->id;
                $aluno->rg = $request->get('rg');

                $aluno->save();

                return view('cadastro.finalizarCadastro', compact(('aluno'),('generos')))->with('success','teste');
            }
        }
    }

    public function valida(Request $request)
    {
        $this->validate($request, [
            'cpfAluno'=>'required'
        ]);

        if(DB::table('matricula')->where('cpfAluno', $request->get('cpfAluno'))->exists())
        {

            $aluno = DB::table('usuarioaluno')->where('cpf', $request->get('cpfAluno'))->first();
            $generos = DB::table('genero')->get();

            return view('cadastro.finalizarCadastro',compact(('aluno'),('generos')));
        }

        else
            return redirect('cadastro')->with('error', 'CPF inválido!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
