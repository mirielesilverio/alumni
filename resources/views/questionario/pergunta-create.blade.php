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
                    <h3>Cadastrar Perguntas</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div id="formulario">
                            <div class="form-group form-row">
                                <select class="form-control form-control-alternative col-2" name="tipo" id="tipo">
                                    <option value="A">Alternativa</option>
                                    <option value="D">Dissertativa</option>
                                </select>
                                <input type="text" name="pergunta[]" placeholder="Nova pergunta" class="form-control form-control-alternative col-8 ml-2">
                                <button type="button" id="add-campo" class="btn btn-success ml-md-2"> <i class="fas fa-plus"> </i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="salvar" name="salvar" class="btn btn-success float-right"> Salvar Perguntas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var cont = 1;
        
        $('#add-campo').click(function () {
            cont++;
            
            $('#formulario').append('<div class="form-group form-row" id="campo' + cont + '"><select class="form-control form-control-alternative col-2" name="tipo' + cont + '" id="tipo' + cont + '"><option value="A">Alternativa</option><option value="D">Dissertativa</option></select><input type="text" name="pergunta[]" placeholder="Nova pergunta" class="form-control form-control-alternative col-8 ml-2"> <button type="button" id="' + cont + '" class="btn btn-danger ml-2 btn-apagar"> <i class="fas fa-minus"></i> </button></div>');
        });

        $('form').on('click', '.btn-apagar', function () {
            var button_id = $(this).attr("id");
            $('#campo' + button_id + '').remove();
        });

    </script>
@endsection