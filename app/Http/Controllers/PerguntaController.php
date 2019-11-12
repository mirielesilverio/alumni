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

    public function create()
    {
        return view('questionario.pergunta-create');
    }
    
    public function store(Request $request)
    {
        
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
