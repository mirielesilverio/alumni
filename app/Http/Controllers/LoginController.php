<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\UsuarioAluno;
use App\Login;

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
                    $aluno = UsuarioAluno::where('idLogin',$login->id)->first();
                    Session::put('aluno',$aluno);

                    echo('aluno');
                }
                else
                {
                    echo('ADM');
                }
            }
            else
            {
                echo 'password';
            }
        }
        else{
            echo 'email';
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
