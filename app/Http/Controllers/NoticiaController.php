<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();

        return view('noticia.index')->with(compact('noticias'));
        //return view('noticia.index');
    }

    public function create()
    {
        return view('noticia.create');
    }

    public function store(Request $request)
    {
        
        
  
    }

    public function show()
    {
        return view('noticia.read');
    }
    /*public function show($id)
    {
       
    }*/

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
