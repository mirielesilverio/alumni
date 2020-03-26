<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Alumni</title>
		<!-- Favicon -->
		<link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
		<!-- Icons -->
		<link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
		<link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
		<!-- CSS Files -->
		<link href="{{ asset('css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

		<script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>

		<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

	</head>
	<body>

		<div class="container">
			<div class="row d-flex align-content-center justify-content-center">
				<div class="card shadow border-0 col-md-5 border-0 pr-0 pl-0 pb-2 mt-5">
					<div class="card-header pl-4 border-0">
						<h3 class="text-center mt-3">Redefinição de senha</h3>
					</div>
					<div class="card-body">
						@if(isset($success))
					        <div class="alert alert-success col-12">
					          {{ $success }}  
					        </div>
					    @endif
					    @if(isset($erro))
					        <div class="alert alert-danger col-12">
					          {{ $erro }}  
					        </div>
					    @endif
					    @if ($errors->any())
					        <div class="alert alert-danger col-12">
					          <ul>
					              @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					              @endforeach
					          </ul>
					        </div>
					    @endif
						<form class="mg-t-3" action="{{route('senha.atualizar')}}" method="POST">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="email" value="{{$email}}">
							<div class="form-group">
			                  	<div class="input-group input-group-alternative">
			                    	<div class="input-group-prepend">
			                      		<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
			                    	</div>
			                    	<input class="form-control" type="password" id="senha" name="senha" placeholder="Digite uma nova senha" required="">
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<div class="input-group input-group-alternative">
			                    	<div class="input-group-prepend">
			                      		<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
			                    	</div>
			                    	<input class="form-control" type="password" id="confirmar" name="confirmar" placeholder="Confirmar nova senha" required="">
			                  	</div>
			                </div>

						    <button class="btn col-8 offset-2 btn-primary mt-4 mb-2">Redefinir Senha</button>
						</form>
						<p class="text-center mg-t-3 text-blue"><a href="{{route('login')}}">Já possuo conta: Login </a></p>
						<p class="text-center mg-t-3 text-blue"><a href="{{route('cadastro')}}">Não possuo conta: Registre-se</a></p>
					</div>
				</div>
			</div>
		</div>

		 <!--   Core   -->
		<script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
		  
		  <!--   Argon JS   -->
		<script src="{{ asset('js/argon-dashboard.min.js?v=1.1.0') }}"></script>
		<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
		<script>
		    window.TrackJS &&
		      TrackJS.install({
		        token: "ee6fab19c5a04ac1a32a645abde4613a",
		        application: "argon-dashboard-free"
		    });
		</script>
	</body>

</html>