@extends('base')

@section('headerPg')

<div class="row justify-content-center pl-3 pr-3">
    <form class="mt-4 mb-3 col-12" method="POST" action="{{route('egresso.pesquisar')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Pesquisar aluno por CPF ou nome" aria-label="Search"  name="pesquisa">
            <div class="input-group-prepend">
                <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="row pl-4 pr-4">
    <p class="col-12">Filtros:</p>
    <div class="dropdown">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownCursos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cursos
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownCursos">
            <a href="{{route('egresso.index')}}" class="dropdown-item">TODOS</a>
            @foreach($cursos as $curso)
                <a class="dropdown-item" href="{{route('egresso.filtroC',$curso->id)}}">{{$curso->nome}}</a>
            @endforeach
        </div>
    </div>
    <div class="dropdown">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownSituacao" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Situação de Formação
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownSituacao">
            <a href="{{route('egresso.index')}}" class="dropdown-item">Todos</a>
            @foreach($situacoes as $situacao)
                <a class="dropdown-item" href="{{route('egresso.filtroS',$situacao->id)}}">{{$situacao->status}}</a>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('main')

    <div class="container-fluid mt--4">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0 row">
                        @if(session()->get('success'))
                            <div class="alert alert-dismissible alert-success col-12">
                              {{ session()->get('success') }}  
                            </div>
                        @endif
                        @if(session()->get('erro'))
                            <div class="alert alert-dismissible alert-danger col-12">
                              {{ session()->get('erro') }}  
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-dismissible alert-danger col-12">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div>
                        @endif
                        <h3 class="mb-sm-2 col-9">Alunos Disponíveis ({{$qtd}})</h3>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#insertModal">
                            Cadastrar Alunos <i class="fas fa-plus-square ml-2"></i>
                        </button>
                    </div>
                    <div class="table-responsive">
                        @if($qtd != 0)
                            <table class="table align-items-center table-flush" id="table">
                                <thead class="thead-light">
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
                                            <a href="" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                                {{ $alunos->links() }}
                            </div>
                        @else
                            <p class="text-center">Nenhum resultado encontrado</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel">Cadastrar Alunos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" accept-charset="utf-8" enctype="multipart/form-data" action="{{route ('egresso.salvar')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-row">
                            <p class="text-justify">O cadastro de alunos é feito através de um arquivo com a extensão .CSV, e deve seguir uma estrutura pré determinada.</p>
                            <small class="text-justify text-light">Confira aqui um exemplo da estrutura do arquivo</small>
                            <small class="text-justify text-light">Esse arquivo pode ser conseguido através do sistema SUAP</small>
                        </div>
                        <div class="form-row mt-3">
                            <label for="file" class="btn btn-info">Anexar CSV <i class="fas fa-file-excel ml-2"></i> 
                                <span id='file-name'></span>
                                <input type="file" class="form-control d-none" id="file" name="file"/>
                            </label>
                        </div>
                        <div class="form-row justify-content-end">
                            <button type="submit" class="btn btn-success">Salvar Alunos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')


@endsection



