<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\UsuarioAluno;
use App\Login;
use App\Genero;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');   
    }
    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        $login = Login::where('email',$request->email)->first();

        if($login)
        { 
            if(Hash::check($request->password,$login->password))
            {
                if ($login->idTipoUsuario == 1) 
                {
                   $aluno = DB::table('usuarioaluno')->where('idLogin', $login->id)->first();

                    Session::put('aluno',$aluno);

                    $genero = Genero::find($aluno->idGenero);
                    $login = Login::find($aluno->idLogin);                    


                    return view('perfil.index')->with(compact(('aluno'),('login'),('genero'))); 
                }
                else
                {
                    echo('ADM');
                }
            }
            else
            {
                return view('login.index')->with('erro','Senha Incorreta!');
            }
        }
        else{
            return view('login.index')->with('erro','Email Incorreto!');
        }
    }


    public function logout(){
        Session::flush();
        return redirect('login');
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
