@extends('base')

@section('content')
<!-- Profile Image -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Perfil</h1>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body" >
                        <div class="row justify-content-end">
                            <a href="{{route('perfil.aluno.editar')}}" class="btn btn-sm btn-outline-primary rounded-pill">Editar Perfil <i class="fas fa-pen"></i></a>
                        </div>

                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                               src="{{asset('dist/img/user4-128x128.jpg')}}"
                               alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center mb-4">{{$aluno->nome}}</h3>


                        <div class="row justify-content-center">
                            <div class="list-group list-group-horizontal col-md-9 mb-4 text-center" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-pessoais" role="tab" aria-controls="home">Dados Pessoais</a>
                                <a class="list-group-item list-group-item-action" id="list-academicos-list" data-toggle="list" href="#list-academicos" role="tab" aria-controls="academicos">Dados Acadêmicos</a>
                                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Dados Profissionais</a>
                            </div>
                            <div class="tab-content col-md-8 mt-5 mb-5" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-pessoais" role="tabpanel" aria-labelledby="list-pessoais-list">
                                    <div class="row pb-2" >
                                        <div class="col-md-6">
                                            <b>Nome:</b>{{$aluno->nome}}
                                        </div>
                                        <div class="col-md-6">
                                            <b>Data de nascimento:</b> {{$aluno->dataNasc}}
                                        </div>
                                    </div>
                                    <hr style="border: 1px #e8eaed dashed;">
                                    <div class="row mt-3 pb-2" >
                                        <div class="col-md-6">
                                            <b>RG:</b> {{$aluno->rg}}
                                        </div>
                                        <div class="col-md-6">
                                            <b>CPF:</b> {{$aluno->cpf}}
                                        </div>
                                    </div>
                                    <hr style="border: 1px #e8eaed dashed;">
                                    <div class="row mt-3 pb-2" >
                                        <div class="col-md-6">
                                            <b>Gênero:</b> {{$genero->genero}}
                                        </div>
                                        <div class="col-md-6">
                                            <b>Email:</b> {{$login->email}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-academicos" role="tabpanel" aria-labelledby="list-academicos-list">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
 </section>
    
@endsection
