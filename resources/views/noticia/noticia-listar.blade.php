@extends('base')
@section('content')

<div class="p-4">

    <div class="card">

        <div class="row justify-content-center mt-5 mb-3">
            <div class="col-5">
                <h3 class="mb-2">Notícias Disponíveis</h3>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('noticia.criar')}}" class="btn btn-success">Cadastrar Notícia <i class="fas fa-plus-square ml-2"></i></a>
            </div>
        </div>

        <div class="justify-content-center row">
            <table class="table-striped table col-11 mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">id</th>
                        <th scope="col" class="text-center">Titulo</th>
                        <th scope="col" class="text-center">Data de Criação</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if($noticias->count() == 0)
                    <tr>
                        <td class="text-center" colspan="4">Nenhuma notícia cadastrada</td>
                    </tr>
                    @else
                        @foreach($noticias as $noticia)
                        <tr>
                            <td class="text-center">{{$noticia->id}}</td>
                            <td class="text-center">{{$noticia->titulo}}</td>
                            <td class="text-center">{{$noticia->data}}</td>
                            <td class="text-center">
                                <a href="{{route('noticia.editar',$noticia->id)}}" class="btn btn-light  text-success" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-pencil-alt "></i>
                                </a>
                                <a href="{{route('noticia.deletar',$noticia->id)}}" class="btn btn-light text-danger" data-toggle="tooltip" data-placement="top" title="Deletar">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="{{route('noticia.ler',$noticia->id)}}" class="btn btn-light text-info" data-toggle="tooltip" data-placement="top" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>  
        </div>
    </div>

</div>
@endsection