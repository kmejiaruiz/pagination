<?php
$CantidadMostrar = 5;
//Conexion  al servidor mysql
include("./conector.php");
if ($conectar->connect_errno) {
	echo "Fallo al conectar a MySQL: (" . $conectar->connect_errno . ") " . $conectar->connect_error;
} else {
	// Validado  la variable GET
	$compag         = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
	$TotalReg       = $conectar->query("SELECT * FROM personas");
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  = ceil($TotalReg->num_rows / $CantidadMostrar);
	//La cantidad de resgistro se dividio a: </b>".$TotalRegistro." para mostrar 5 en 5<br>";
	//Consulta SQL
	$consultavistas = "SELECT personas.id, personas.Nombre, personas.Apellido FROM personas ORDER BY personas.id ASC LIMIT " . (($compag - 1) * $CantidadMostrar) . " , " . $CantidadMostrar;
	// echo $consultavistas;
	$consulta = $conectar->query($consultavistas);
	echo "<table class=\"centered responsive-table highlight\"><thead><tr><th>Codigo</th><th>Nombre</th><th>Apellido</th></tr></thead>";
	while ($lista = $consulta->fetch_row()) {
		echo "<tr><td>" . $lista[0] . "</td><td>" . $lista[1] . "</td><td>" . $lista[2] . "</td></tr>";
	}
	echo "</table>";

	/*Sector de Paginacion */

	//Operacion matematica para boton siguiente y atras 
	$IncrimentNum = (($compag + 1) <= $TotalRegistro) ? ($compag + 1) : 1;
	$DecrementNum = (($compag - 1)) < 1 ? 1 : ($compag - 1);

	echo "<ul class = \"pagination\"><li class=\"waves-effect\"><a href=\"?pag=" . $DecrementNum . "\"><i class=\"material-icons\">chevron_left</i></a></li>";
	//Se resta y suma con el numero de pag actual con el cantidad de 
	//numeros  a mostrar
	$Desde = $compag - (ceil($CantidadMostrar / 2) - 1);
	$Hasta = $compag + (ceil($CantidadMostrar / 2) - 1);

	//Se valida
	$Desde = ($Desde < 1) ? 1 : $Desde;
	$Hasta = ($Hasta < $CantidadMostrar) ? $CantidadMostrar : $Hasta;
	//Se muestra los numeros de paginas
	for ($i = $Desde; $i <= $Hasta; $i++) {
		//Se valida la paginacion total
		//de registros
		if ($i <= $TotalRegistro) {
			//Validamos la pag activo
			if ($i == $compag) {
				echo "<li class=\"active\"><a href=\"?pag=" . $i . "\">" . $i . "</a></li>";
			} else {
				echo "<li class=\"waves-effect\"><a href=\"?pag=" . $i . "\">" . $i . "</a></li>";
			} 
		}
	}
	echo "<li class=\"waves-effect\"><a href=\"?pag=" . $IncrimentNum . "\"><i class=\"material-icons\">chevron_right</i></a></li></a></li></ul>";
}
