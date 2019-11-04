@extends('base')

@section('headLk')
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')

    <div class="pt-2">
        <div class="m-4 card">
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
            <div class="m-4">
                <div class="d-flex justify-content-center">
                    <div>
                        <h3>Cadastre uma Notícia</h3>
                    </div>
                </div>
                <div class="m-3">
                    @if(isset($noticia))
                        <form action="{{route('noticia.atualizar',$noticia->id)}}" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{route('noticia.salvar')}}" method="POST" enctype="multipart/form-data">
                    @endif
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-row">
                            <div class="col-12 mb-3 form-group">
                                <label for="titulo">Título</label>
                                @if(isset($noticia))
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$noticia->titulo}}" />
                                @else
                                    <input type="text" class="form-control" id="titulo" name="titulo"/>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3 form-group">
                                <label for="lide">Lide</label>
                                @if(isset($noticia))
                                    <input type="text" class="form-control" id="lide" name="lide" value="{{$noticia->lide}}" />
                                @else
                                    <input type="text" class="form-control" id="lide" name="lide"/>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 mb-3 form-group">
                                @if(!isset($noticia))
                                    <label for="image" class="btn btn-info">Anexar Imagem <i class="fas fa-image ml-2"></i> 
                                    <span id='file-name'></span>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <textarea cols="70" rows="10" class="form-control" id="desc" name="desc">
                                    @if(isset($noticia))
                                        {{$noticia->texto}}
                                    @endif
                                </textarea>
                            </div>
                        </div>
                        <input type="submit" value="Salvar Notícia" class="btn btn-block btn-success col-md-2 offset-md-10" />
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var $input    = document.getElementById('image'),
        $fileName = document.getElementById('file-name');

        $input.addEventListener('change', function(){
            $fileName.textContent = this.value;
        });
    </script>
@endsection