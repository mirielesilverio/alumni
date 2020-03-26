<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
		<style type="text/css">
			.container-email {
			 	display: table !important;
			  	margin: 0 auto !important;
			  	background: #EFF0F1 !important;
			  	font-family: 'Nunito', sans-serif !important;

			}

			.content {
				padding: 4rem 6rem !important;
			 	width:100% !important;
			}

			h1 {
				font-size: 16pt !important;
				font-weight: bold !important;
				color: #EA1A5E !important;
				text-align: justify !important;
			}

			p {
				font-size: 12pt;
				color: #333;
				text-align: justify;
				line-height: 10pt;
			}

			#botao_recuperar {
				text-decoration: none !important;
				color: white !important;
				background: #EA1A5E !important;
				width: 250px !important;
				height: 50px !important;
				border-radius: 5px !important;
				cursor: pointer !important;
			}

		</style>
	</head>
	<body>
		<div class="container-email">
			<div class="content">
				<h1>Recebos uma solicitação para mudança de sua senha</h1>
				<p>Olá, {{$nome}}! Você solicitou na plataforma Alumni a mudança de sua senha</p>
				<p style="margin-bottom: 30px;">Clique no botão abaixo para ser redirecionado até a tela de recuperação de senha</p>
				<a href="http://localhost/blog/public/recuperar/{{$id}}" id="botao_recuperar">Recuperar Senha</a>
			</div>
		</div>
	</body>
</html>