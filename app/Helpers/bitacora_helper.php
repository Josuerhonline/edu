<?php 
function insert_session($usuario){
	date_default_timezone_set('America/El_Salvador');
	$fecha                   = date("Y")."-". date("m")."-". date("d");
	$hora                    = date("G").":".date("i").":".date("s"); 
	$nombreHost              = gethostname();
	$localIP                 = getHostByName(getHostName());

	$conn = new mysqli('localhost','root','', 'db_edu');

	if ($conn->connect_error) {
		die("la conexión ha fallado: " . $conn->connect_error);
	}

	$tabla = 'reg_bitacorasesion'.'_'.date("Y");
	$_SESSION["tabla"] = $tabla = 'reg_bitacorasesion'.'_'.date("Y");

	try {
		$total = mysqli_num_rows(mysqli_query($conn,("SELECT * FROM $tabla")));
	} catch (Exception $e) {
		$sql = "CREATE TABLE $tabla (
			bitsesionId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			usuarioId INT(11),
			fechaEntrada DATE,
			horaEntrada  TIME,
			fechaSalida  DATE,
			horaSalida   TIME,
			nombreHost   TEXT,
			ip           TEXT,
			obs          TEXT
		)";

		mysqli_query($conn, $sql);
		$sql  = "INSERT INTO $tabla (usuarioId, fechaEntrada, horaEntrada,nombreHost,ip,obs) VALUES ('$usuario','$fecha','$hora','$nombreHost',$localIP,'')";

		$sql  = "SELECT * FROM $tabla WHERE  fechaEntrada ='$fecha' AND  usuarioId='$usuario'";
		mysqli_query($conn, $sql);

		$sql  = "SELECT bitsesionId FROM $tabla WHERE  fechaEntrada ='$fecha' AND  usuarioId='$usuario'";
		$data = mysqli_query($conn, $sql);

		foreach ($data as $key => $value) {
			$_SESSION["idBitacora"] = $value['bitsesionId'];
			return;
		}
	}

	$sql  = "INSERT INTO $tabla (usuarioId, fechaEntrada, horaEntrada,nombreHost,ip,obs) VALUES ('$usuario','$fecha','$hora','$nombreHost','$localIP','')";
	$data = mysqli_query($conn, $sql);

	$sql  = "SELECT bitsesionId FROM $tabla WHERE  fechaEntrada ='$fecha' AND  usuarioId='$usuario'";
	$data = mysqli_query($conn, $sql);

	foreach ($data as $key => $value) {
		$_SESSION["idBitacora"] = $value['bitsesionId'];
	}
}

function cerrar_session(){
	$session = session();
	date_default_timezone_set('America/El_Salvador');
	$conn  = new mysqli('localhost','root','', 'db_edu');
	$fecha = date("Y")."-". date("m")."-". date("d");
	$hora  = date("G").":".date("i").":".date("s"); 
	$id    = $_SESSION["idBitacora"];
	$tabla = $_SESSION["tabla"];

	$sql = "UPDATE $tabla SET fechaSalida ='$fecha',horaSalida='$hora'  WHERE bitsesionId = '$id'";
	mysqli_query($conn, $sql);
}

function insert_acciones($actividad,$detalles){
	$session = session();
	date_default_timezone_set('America/El_Salvador');
	$conn  = new mysqli('localhost','root','', 'db_edu');
	$fecha = date("Y")."-". date("m")."-". date("d");
	$hora  = date("G").":".date("i").":".date("s"); 
	$id    = $_SESSION["idBitacora"];

	if ($conn->connect_error) {
		die("la conexión ha fallado: " . $conn->connect_error);
	}

	$tabla = 'reg_bitacora'.'_'.date("Y");

	$actividad     = utf8_decode($actividad);
	$detalles      = utf8_decode($detalles);

	try {
		$total = mysqli_num_rows(mysqli_query($conn,("SELECT * FROM $tabla")));
	} catch (Exception $e) {
		$sql = "CREATE TABLE $tabla (
			bitacoraId 		INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			bitsesionId     INT(11),
			fecha           DATE,
			hora            TIME,
			actividad       TEXT,
			detalles        TEXT
		)";

		mysqli_query($conn, $sql);

		$sql = "INSERT INTO $tabla (bitsesionId, fecha, hora,actividad,detalles) VALUES ('$id','$fecha','$hora','$actividad','$detalles')";
		mysqli_query($conn, $sql);

		return;
	}

	$sql = "INSERT INTO $tabla (bitsesionId, fecha, hora,actividad,detalles) VALUES ('$id','$fecha','$hora','$actividad','$detalles')";
	mysqli_query($conn, $sql);
}

function crear_view(){
	date_default_timezone_set('America/El_Salvador');
	$conn = new mysqli('localhost','root','', 'db_edu');

	if ($conn->connect_error) {
		die("la conexión ha fallado: " . $conn->connect_error);
	}

	$tabla              = 'view_bitacora_'.date("Y");
	$reg_bitacorasesion = 'reg_bitacorasesion'.'_'.date("Y");
	$reg_bitacora       = 'reg_bitacora'.'_'.date("Y");

	try {
		$total = mysqli_num_rows(mysqli_query($conn,("SELECT * FROM $tabla")));
	} catch (Exception $e) {
		$consulta = "CREATE VIEW $tabla AS ";
		$consulta .= "SELECT ";
		$consulta .= "bs.fechaEntrada, ";
		$consulta .= "bs.horaEntrada, ";
		$consulta .= "bs.fechaSalida, ";
		$consulta .= "bs.horaSalida, ";
		$consulta .= "bs.nombreHost, ";
		$consulta .= "bs.ip, ";
		$consulta .= "bs.obs, ";
		$consulta .= "bd.fecha, ";
		$consulta .= "bd.hora, ";
		$consulta .= "bd.actividad, ";
		$consulta .= "bd.detalles ";
		$consulta .= "FROM ";
		$consulta .= "$reg_bitacorasesion as bs ";
		$consulta .= "LEFT JOIN $reg_bitacora as bd ";
		$consulta .= "ON bd.bitsesionId = bs.bitsesionId; ";
		mysqli_query($conn, $consulta);
		return;
	}
}
?>