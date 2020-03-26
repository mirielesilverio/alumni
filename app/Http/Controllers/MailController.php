<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class MailController extends Controller
{

    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        $login = DB::table('login')->where('email',$request->email)->first();

        if($login) { 
            if ($login->idTipoUsuario == 1) 
            {
               $aluno = DB::table('usuarioaluno')->where('idLogin', $login->id)->first();
               $nome = $aluno->nome;
               $id = $aluno->cpf;
            }
            elseif ($login->idTipoUsuario == 2) {
                $ext = DB::table('usuariocex')->where('idLogin', $login->id)->first();
                $nome = $ext->nome;
                $id = $ext->id;

            }
            try {

                Mail::send('mail.password',['nome'=>$nome, 'id'=>base64_encode($login->email)], function($m) use ($login) {
                    $m->from('ifspalumni@gmail.com','Alumni');
                    $m->to($login->email);
                    $m->subject('Recuperação de Senha');
                });
                return view('login.senha')->with('success','Foi enviado um email para recuperação de sua senha');

                
            } catch (Exception $e) {
                return view('login.senha')->with('erro','Falha ao enviar email! Entre em contato com a CEX de seu cãmpus');

            }
            
        }
        else {
            return view('login.senha')->with('erro','O email digitado não está cadastrado no Alumni!');
        }
    }

    public function recover($email) {
        return view('login.redefinir')->with(compact(('email')));
    }

    public function update(Request $request) {

        $this->validate($request, [
            'senha' => 'required',
            'confirmar' => 'required'
        ]);

        $email = $request->get('email');

        if($request->get('senha') == $request->get('confirmar')) {
            $email_decoded = base64_decode($request->get('email'));
            $login = DB::table('login')->where('email',$email_decoded)->first();
            if($login) { 
                try {

                    DB::table('login')->where('email', $email_decoded)->update(['password' => Hash::make($request->get('senha'))]);
                    $success = 'Senha alterada com sucesso!';
                    return view('login.redefinir')->with(compact(('email'),('success')));

                } catch (Exception $e) {
                    $erro = 'Ocorreu um erro ao atualizar sua senha!';
                    return view('login.redefinir')->with(compact(('email'),('erro')));

                }
            }
            $erro = 'O email solicitado não está cadastrado no Alumni!';
            return view('login.redefinir')->with(compact(('email'),('erro')));
        }
        $erro = 'As senhas digitadas devem idênticas!';
        return view('login.redefinir')->with(compact(('email'),('erro')));

    }

}
