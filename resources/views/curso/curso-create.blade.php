@extends('base')
@section('content')

<div class="p-4">
    <div class="card">

        <div class="mt-2 ml-4 mr-4 mb-4">
                <div class="d-flex justify-content-center mt-3">
                        <div>
                            <h3>Cadastre um novo usuário extensão</h3>
                        </div>
                </div>
        </div>

        <form class="needs-validation m-3" novalidate>

                <div class="form-row ml-4 mr-4 mt-3 mb-4">

                    <div class="col-sm-6 mb-3">
                        <label for="validationTooltip01">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                            <label for="">Nível</label>
                            <select class="form-control">		
                            </select>
                    </div>

                    <div class="col-sm-12 d-flex justify-content-around mt-4">
                            <button  class="btn btn-default">Adicionar</button>
                            <button  class="btn btn-default" id="btnClean">Limpar</button>
                    </div>

                </div>
        </form>
    </div>
</div>

@endsection