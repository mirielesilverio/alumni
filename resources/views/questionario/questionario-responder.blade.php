@extends('base')

@section('headLk')
    <link rel="stylesheet" type="text/css" href="{{asset('css/flutuante.css')}}">
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
                    <h3 class="text-center">{{$questionario->titulo}}</h3>
                    <p class="text-justify">{{$questionario->descricao}}</p>
                </div>
                <div class="card-body pl-md-6 pr-md-6">
                    <form>
                        @foreach($perguntas as $pergunta)
                            <p>{{$pergunta->pergunta}}</p>
                            @if($pergunta->tipo == 'A')
                                <div class="form-row justify-content-center">
                                    @php
                                        print_r((array) $pergunta->alternativas());
                                    @endphp
                                    @foreach($pergunta->alternativas() as $alternativa)
                                        <div class="form-group col-md-6">
                                            <label for="rd1" class="btn btn-primary btn-block pb-3 pt-3">Opção A</label>
                                            <input type="radio" name="rd1" id="rd1" class="d-none">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="form-group ">
                                    <textarea class="form-control-alternative form-control"></textarea>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-row justify-content-end">
                            <button class="btn btn-primary mr-2">Voltar</button>
                            <button class="btn btn-primary">Avançar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
  
@endsection