@extends('base')

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
                    <h3>Cadastrar Questionário</h3>
                </div>
                <div class="row justify-content-center">   
                    <nav class="nav nav-pills flex-column flex-sm-row col-10">
                        <a class="flex-sm-fill text-sm-center nav-link active mr-2" href="#">Questionário</a>
                        @if(isset($questionario))
                            <a class="flex-sm-fill text-sm-center nav-link" href="{{route('pergunta.criar')}}">Perguntas</a>
                        @else
                            <a class="flex-sm-fill text-sm-center nav-link disabled" data-toggle="tooltip" data-placement="top" title="Cadastre um questionário para habilitar">Perguntas</a>
                        @endif
                    </nav>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('questionario.salvar')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            @if(isset($questionario))
                                <input type="text" class="form-control form-control-alternative" id="titulo" name="titulo" required="" value="{{$questionario->titulo}}">
                            @else
                                <input type="text" class="form-control form-control-alternative" id="titulo" name="titulo" required="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>

                            <textarea class="form-control form-control-alternative" id="descricao" name="descricao" required="" style="resize: none" rows="5"> @if(isset($questionario)){{$questionario->descricao}}@endif
                            </textarea>
                        </div>
                        <button type="submit" id="salvar" name="salvar" class="btn btn-success float-right"> Salvar Questionário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
