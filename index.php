<?php

#Bienvenidos al Ejemplo de Paginación


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listar</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<style>
	ul {
		display: flex;
		justify-content: center;
		gap: 10px;
	}
</style>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper right" style="display: flex; align-items: center; margin-right: 15px;">
				<button data-target="modal1" class="btn green darken-2 modal-trigger material-icons">add</button>
			</div>
		</nav>
	</div>

	<div class="row">
		<div style="height: 80vh; display: grid; place-items: center;">
			<div style="width: 500px;">
				<?php
				require_once 'paginador.php';
				?>
			</div>
		</div>
	</div>

	<!-- Modal Structure -->
	<div class="container">
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h5 style="margin-bottom: 30px;">Ingrese sus datos.</h5>
				<div class="row">
					<form class="col s12" id="form" method="POST">
						<div class="row">
							<div class="input-field col s6">
								<input id="first_name" type="text" class="validate" name="nombre">
								<label for="first_name">Nombre</label>
							</div>
							<div class="input-field col s6">
								<input id="last_name" type="text" class="validate" name="apellido">
								<label for="last_name">Apellido</label>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close red darken-2 waves-effect waves-red btn-flat white-text">Cancelar</a>
				<input type="submit" class="btn green darken-2 btn-flat white-text" form="form" name="enviar" value="Registro">
			</div>
		</div>
	</div>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.modal');
			var instances = M.Modal.init(elems);
		});
	</script>
	<?php
	include("./agregar.php"); ?>

</body>

</html>