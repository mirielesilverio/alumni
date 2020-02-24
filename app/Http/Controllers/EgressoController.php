<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\UsuarioAluno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class EgressoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = DB::table('usuarioaluno')
        ->join('matricula','matricula.cpfAluno','=','cpf')
        ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
        ->select('matricula.prontuario','usuarioaluno.*')
        ->paginate(15);

        $cursos = DB::table('curso')
        ->join('cursocampus', 'curso.id', '=', 'cursocampus.idCurso')
        ->where('cursocampus.idCampus','=',Session::get('extensao')->idCampus)
        ->select('curso.id', 'curso.nome')
        ->get();

        $situacoes = DB::table('statusformacao')->get();

        $qtd = DB::table('usuarioaluno')
        ->join('matricula','matricula.cpfAluno','=','cpf')
        ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
        ->select('matricula.prontuario','usuarioaluno.*')
        ->count();

        return view('usuarioaluno.usuarioaluno-listar')->with(compact(('alunos'),('cursos'),('situacoes'),('qtd')));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $fh = fopen($_FILES['file']['tmp_name'], 'r+');
        fgets($fh);
        while ($row = fgets($fh))
        {

            $row = str_replace('á', 'a', $row);
            $row = str_replace('à', 'a', $row);
            $row = str_replace('Á', 'A', $row);
            $row = str_replace('À', 'A', $row);
            $row = str_replace('ã', 'a', $row);
            $row = str_replace('Ã', 'A', $row);
            $row = str_replace('â', 'a', $row);
            $row = str_replace('Â', 'A', $row);
            $row = str_replace('é', 'e', $row);
            $row = str_replace('É', 'E', $row);
            $row = str_replace('ê', 'e', $row);
            $row = str_replace('Ê', 'E', $row);
            $row = str_replace('í', 'i', $row);
            $row = str_replace('Í', 'I', $row);
            $row = str_replace('ó', 'o', $row);
            $row = str_replace('Ó', 'o', $row);
            $row = str_replace('ô', 'o', $row);
            $row = str_replace('Ô', 'O', $row);
            $row = str_replace('Ú', 'U', $row);
            $row = str_replace('ú', 'u', $row);
            $row = str_replace('ç', 'c', $row);
            $row = str_replace('Ç', 'C', $row);

            $data = explode(';', $row);

            //VERIFICAÇÕES DE ERRO CPF
            if (strlen(trim($data[1])) != 14 ) 
            {
                return redirect('egresso')->with('erro','Falha ao salvar egressos! Motivo: o CPF de '.$data[0].' está incorreto'); 
            }

            
            $curso = DB::table('curso')
            ->where('nome','=',preg_replace( "/\r|\n/", "", strtoupper($data[3]) ))
            ->select('id')
            ->first();

            if(!$curso)
            {
                return redirect('egresso')->with('erro','Falha ao salvar egressos! Motivo: o curso de '.$data[0].' não foi encontrado'); 
            }

            if($data[4] == 'Cancelamento Compulsorio')
                $data[4] = 'Cancelado';

            elseif ($data[4] == 'Matricula Vinculo Institucional') 
                $data[4] = 'Matriculado';

            elseif ($data[4] == 'Trancado Voluntariamente') 
                $data[4] = 'Trancado';


            $status = DB::table('statusformacao')
            ->where('status','=',preg_replace( "/\r|\n/", "", $data[4] ))
            ->select('id')
            ->first();

            if(!$status)
            {
                return redirect('egresso')->with('erro','Falha ao salvar egressos! Motivo: a situação de '.$data[0].' não foi encontrada'); 
            }

            $aluno = UsuarioAluno::find($data[1]);

            if($aluno)
            {
                $aluno->cpf =$data[1];
                $aluno->nome = $data[0];
            }

            else
            {
                $aluno = new UsuarioAluno([
                    'cpf' => $data[1],
                    'nome' => $data[0]
                ]);
            }

            try 
            {
                $aluno->save();
            } 
            catch (Exception $e) 
            {
                return redirect('egresso')->with('erro','Erro ao salvar egressos!');
            } 

            $matricula = Matricula::find($data[2]);

            if($matricula)
            {
                $matricula->cpfAluno = $data[1];
                $matricula->prontuario = $data[2];
                $matricula->idCurso = $curso->id;
                $matricula->idStatusFormacao = $status->id;
                $matricula->idCampus = Session::get('extensao')->idCampus;
            }
            else
            {
                $matricula = new Matricula([
                    'cpfAluno' => $data[1],
                    'prontuario' => $data[2],
                    'idCurso' => $curso->id,
                    'idStatusFormacao' => $status->id,
                    'idCampus' => Session::get('extensao')->idCampus
                ]);
            }

            try 
            {
                $matricula->save();
            } 
            catch (Exception $e) 
            {
                return redirect('egresso')->with('erro','Erro ao salvar egressos!');
            } 
            
        }      

        return redirect('egresso')->with('success','Alunos salvos com sucesso!');
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

    public function pesquisa(Request $request)
    {
        if ($request->get('pesquisa') == '') 
            return redirect('egresso');

        $qtd = DB::table('usuarioaluno')
        ->where('nome','like','%'.$request->get('pesquisa').'%')
        ->orWhere('cpf','like','%'.$request->get('pesquisa').'%')
        ->join('matricula','matricula.cpfAluno','=','cpf')
        ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
        ->select('matricula.prontuario','usuarioaluno.*')
        ->count();

        if ($qtd == 0) {
            $alunos = DB::table('usuarioaluno')
            ->where('nome','like','%'.$request->get('pesquisa').'%')
            ->orWhere('cpf','like','%'.$request->get('pesquisa').'%')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->get();
        }
        else
        {
            $alunos = DB::table('usuarioaluno')
            ->where('nome','like','%'.$request->get('pesquisa').'%')
            ->orWhere('cpf','like','%'.$request->get('pesquisa').'%')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->paginate($qtd);
        }

        $cursos = DB::table('curso')
        ->join('cursocampus', 'curso.id', '=', 'cursocampus.idCurso')
        ->where('cursocampus.idCampus','=',Session::get('extensao')->idCampus)
        ->select('curso.id', 'curso.nome')
        ->get();

        $situacoes = DB::table('statusformacao')->get();

        return view('usuarioaluno.usuarioaluno-listar')->with(compact(('alunos'),('cursos'),('situacoes'),('qtd')));
    }

    public function filtroCurso($curso)
    {

        $qtd = DB::table('usuarioaluno')
        ->join('matricula','matricula.cpfAluno','=','cpf')
        ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
        ->where('matricula.idCurso','=',$curso)
        ->select('matricula.prontuario','usuarioaluno.*')
        ->count();

        if ($qtd == 0) {
            $alunos = DB::table('usuarioaluno')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->where('matricula.idCurso','=',$curso)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->get();
        }
        else{
            $alunos = DB::table('usuarioaluno')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->where('matricula.idCurso','=',$curso)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->paginate($qtd);
        }
    

        $cursos = DB::table('curso')
        ->join('cursocampus', 'curso.id', '=', 'cursocampus.idCurso')
        ->where('cursocampus.idCampus','=',Session::get('extensao')->idCampus)
        ->select('curso.id', 'curso.nome')
        ->get();

        $situacoes = DB::table('statusformacao')->get();

        return view('usuarioaluno.usuarioaluno-listar')->with(compact(('alunos'),('cursos'),('situacoes'),('qtd')));
    }

    public function filtroStatus($status)
    {

        $qtd =  DB::table('usuarioaluno')
        ->join('matricula','matricula.cpfAluno','=','cpf')
        ->where('matricula.idStatusFormacao','=',trim($status))
        ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
        ->select('matricula.prontuario','usuarioaluno.*')
        ->count();

        if ($qtd == 0)
        {
            $alunos = DB::table('usuarioaluno')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idStatusFormacao','=',trim($status))
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->get();
        }
        
        else
        {
            $alunos = DB::table('usuarioaluno')
            ->join('matricula','matricula.cpfAluno','=','cpf')
            ->where('matricula.idStatusFormacao','=',trim($status))
            ->where('matricula.idCampus','=',Session::get('extensao')->idCampus)
            ->select('matricula.prontuario','usuarioaluno.*')
            ->paginate($qtd);
        }
        

        $cursos = DB::table('curso')
        ->join('cursocampus', 'curso.id', '=', 'cursocampus.idCurso')
        ->where('cursocampus.idCampus','=',Session::get('extensao')->idCampus)
        ->select('curso.id', 'curso.nome')
        ->get();

        $situacoes = DB::table('statusformacao')->get();

        return view('usuarioaluno.usuarioaluno-listar')->with(compact(('alunos'),('cursos'),('situacoes'),('qtd')));
    }

    
}
