@extends('base')
@section('content')

<div class="p-4">

    <div class="card">

            <div class="d-flex justify-content-center mt-3">
                    <div>
                        <h3>Cursos Disponíveis</h3>
                    </div>
            </div>

            <div class="p-3">
                <div class="d-flex justify-content-center">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Nível</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                            <tr>
                                <th>{{$curso->id}}</th>
                                <th>{{$curso->nome}}</th>
                                <th>{{$curso->nivel}}</th>
                                <th>
                                    <button class="btn btn-warning">
                                        <i class="fas fa-pencil-alt text-white"></i>
                                    </button>
                                </th>
                                <th>
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </th>
                                <th>
                                    <button class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            </div>


    </div>

</div>
@endsection