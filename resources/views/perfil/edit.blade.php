@extends('base')

@section('content')
<!-- Profile Image -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Perfil - Editar</h1>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body" >
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                              {{ session()->get('success') }}  
                            </div>
                        @endif
                        @if(isset($erro))
                            <div class="alert alert-danger">
                              {{ $erro }}  
                            </div>
                        @endif
                        @if(isset($success))
                            <div class="alert alert-success">
                              {{ $success }}  
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <form class="mt-3 col-md-10" action="{{route('perfil.aluno.atualizar',$aluno->cpf)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-row">
                                    <div class="col-12 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control border-0 rounded-pill" id="nome" name="nome" placeholder="Digite seu nome" required="" value="{{$aluno->nome}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="fas fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" class="form-control border-0 rounded-pill" id="dataNasc" name="dataNasc" required="" onkeypress="$(this).mask('00/00/0000');" value="{{date('d-m-Y',strtotime($aluno->dataNasc))}}">
                                        </div>
                                    </div>
                                    <div class="col-6 my-1 mt-4 mb-2">
                                        <select class="form-control rounded-pill" name="genero" id="genero">
                                            @foreach($generos as $genero)
                                                @if($genero->id == $aluno->idGenero)
                                                    <option value="{{$genero->id}}" selected="">{{$genero->genero}}</option>
                                                @else
                                                    <option value="{{$genero->id}}">{{$genero->genero}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
                                            </div>
                                            <input type="text" class="form-control border-0 rounded-pill" id="rg" name="rg" value="{{$aluno->rg}}" required="" onkeypress="$(this).mask('00.000.000-A');">
                                        </div>
                                    </div>

                                    <div class="col-6 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
                                            </div>
                                            <input type="text" class="form-control border-0 rounded-pill" id="cpf" name="cpf" placeholder="Digite seu CPF" required="" readonly="" value="{{$aluno->cpf}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input type="email" class="form-control border-0 rounded-pill" id="email" name="email" value="{{$login->email}}" placeholder="Digite seu email" required="" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 my-1 mt-4">
                                        <div class="input-group rounded-pill border">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text border-0 bg-transparent"><i class="fas fa-phone-alt"></i></div>
                                            </div>
                                            <input type="text" class="form-control border-0 rounded-pill" id="telefone" name="telefone" placeholder="Digite seu telefone" 
                                            >
                                        </div>
                                    </div>

                                    <div class="col-6 my-1 mt-4">
                                        <div class="form-group">
                                            <input type='file' id="perfilImg" name="perfilImg" accept="image/*" class="form-control border-0" />
                                        </div>
                                    </div>
                                </div>

                                <button class="btn col-8 offset-2 btn-alumni rounded-pill mt-4 mb-2" type="submit">Salvar  <i class="fas fa-save ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                  <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
 </section>
    
@endsection

@section('script')

    <script>
        $(document).ready(function()
        {
            var mascara = function (val) 
            {
                return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
            },
            mascaraOp = 
            {
                onKeyPress: function(val, e, field, options) 
                {
                    field.mask(mascara.apply({}, arguments), options);
                }
            };

              $('#telefone').mask(mascara, mascaraOp);
        });
    </script>

@endsection