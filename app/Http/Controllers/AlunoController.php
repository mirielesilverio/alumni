<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\UsuarioAluno;
use App\Login;
use App\Genero;
use Session;

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
        
        return view('perfil.index')->with(compact(('aluno'),('login'),('genero')));   
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
