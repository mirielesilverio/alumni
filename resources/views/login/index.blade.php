<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      	<meta name="description" content="plataforma Alumni do Instituto Federal de São Paulo">
      	<meta name="author" content="IFSP-JCR">
		<title>Login - Alumni</title>
		<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap-grid.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap-reboot.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/padrao.css')}}">
		<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

	</head>
	<body>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 card border-0 pr-0 pl-0 shadow pb-2 mg-t-5">
					<div class="card-header pl-4 border-0" id="cardLogin">
						<h3>Bem-vindo ao Alumni</h3>
						<p>Encontre ex-alunos e estabeleça contato pessoal e profissional.</p>
					</div>
					<div class="card-body">
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
					    @if ($errors->any())
					        <div class="alert alert-danger">
					          <ul>
					              @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					              @endforeach
					          </ul>
					        </div>
					    @endif
						<form class="mg-t-3" action="{{route('logar')}}" method="POST">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="col-12 my-1 mt-4">
						      	<label class="sr-only" for="email">Email</label>
						      	<div class="input-group rounded-pill border">
						        	<div class="input-group-prepend">
						          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-user"></i></div>
						        	</div>
						        	<input type="email" class="form-control border-0 rounded-pill" id="email" name="email" placeholder="Digite seu email" maxlength="120" required="">
						      	</div>
						    </div>
						    <div class="col-12 my-1 mt-4 mb-2">
						      	<label class="sr-only" for="password">Senha</label>
						      	<div class="input-group rounded-pill border">
						        	<div class="input-group-prepend">
						          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-lock"></i></div>
						        	</div>
						        	<input type="password" class="form-control border-0 rounded-pill" id="password" name="password" placeholder="Digite sua senha" required="">
						      	</div>
						    </div>
						    <button class="btn col-8 offset-2 btn-alumni rounded-pill mt-4 mb-2">Login</button>
						</form>
						<p class="text-center">Esqueci minha senha</p>
						<p class="text-center mg-t-3 text-blue"><a href="{{route('cadastro')}}">Não possuo conta: Registre-se</a></p>
					</div>
				</div>
			</div>
		</div>

		
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	</body>
</html>n