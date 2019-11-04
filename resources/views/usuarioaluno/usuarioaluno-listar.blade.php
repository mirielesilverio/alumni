@extends('base')
@section('content')

<div class="p-4">

    <div class="card">
        <div class="col-12 pt-2">
            @if(session()->get('success'))
                <div class="alert alert-dismissible alert-success">
                  {{ session()->get('success') }}  
                </div>
            @endif
            @if(session()->get('erro'))
                <div class="alert alert-dismissible alert-danger">
                  {{ session()->get('erro') }}  
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center mt-5 mb-3">
            <div class="col-5">
                <h3 class="mb-2">Alunos Disponíveis</h3>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('egresso.criar')}}" class="btn btn-success">Cadastrar Egresso <i class="fas fa-plus-square ml-2"></i></a>
            </div>
        </div>

        <div class="justify-content-center row">
            <table class="table-striped table col-11 mt-4">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">CPF</th>
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col" class="text-center">Matrícula</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                    <tr>
                        <td class="text-center">{{$aluno->cpf}}</td>
                        <td class="text-center">{{$aluno->nome}}</td>
                        <td class="text-center">{{$aluno->prontuario}}</td>
                        <td class="text-center">
                            <a href="{{route('egresso.editar',$aluno->cpf)}}" class="btn btn-light  text-success" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-pencil-alt "></i>
                            </a>
                            <a href="{{route('egresso.deletar',$aluno->cpf)}}" class="btn btn-light text-danger" data-toggle="tooltip" data-placement="top" title="Deletar">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            <a href="" class="btn btn-light text-info" data-toggle="tooltip" data-placement="top" title="Visualizar">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>


    </div>

</div>
@endsection