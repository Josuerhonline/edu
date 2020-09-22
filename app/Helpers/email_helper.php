<?php 
function enviarEmail($email,$clave){
	date_default_timezone_set('America/El_Salvador'); 
	$para   = $email;
	$titulo = 'Activar usuario - EDU';

	$mensaje = ' 
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>EDU</title>
	</head>
	<body style="background-color: #ecf0f1 ">
		<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
			<tr>
				<td style="background-color: #fff; text-align: left; padding: 0">
					<img width="100%" style="display:block;" src="#">
				</td>
			</tr>
			<tr>
				<td style="background-color: #ffffff">
					<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
						<h2 style="color: #003366; margin: 0 0 7px">Buen día, le damos la bienvenida a EDU.</h2><br>
						<p style="margin: 2px; font-size: 15px">
							Le informamos que su usuario ha sido activado satisfactoriamente.<br><br>
							A continuación, dejamos la contraseña temporal con la que debe ingresar:<br>
						</p>
						<h1 style="font-weight: bold; text-align: center;">'.$clave.'</h1>
						<br>
						<p style="margin: 2px; font-size: 15px;"><p style="margin: 2px; font-size: 15px; font-weight: bold; display: inline;">Nota:</p>Recuerde que la contraseña temporal es personal y no debe compartirla con nadie más. En su primer inicio de sesión, el sistema le solicitará cambiar su contraseña por motivos de seguridad.</p>
						<p style="margin: 2px; font-size: 15px;">Por favor, no responda a este mensaje ya que ha sido generado de forma automática.</p>
						<div style="width: 100%; text-align: center; margin-top: 10%">
							<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #172D44" href="#">Ingresar a EDU</a>	
						</div>
						<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Universidad Cristiana de las Asambleas de Dios - '.date('Y').'</p>
					</div>
				</td>
			</tr>
		</table>
	</body>
	</html>
	';

	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: edu@gmail.com';
	$enviado   = mail($para, $titulo, $mensaje, $cabeceras);
}

 function recuperarEmail($email,$clave){
	date_default_timezone_set('America/El_Salvador'); 
	$para   = $email;
	$titulo = 'Recuperar Contraseña - EDU';

	$mensaje = ' 
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>EDU</title>
	</head>
	<body style="background-color: #ecf0f1 ">
		<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
			<tr>
				<td style="background-color: #fff; text-align: left; padding: 0">
					<img width="100%" style="display:block;" src="#">
				</td>
			</tr>
			<tr>
				<td style="background-color: #ffffff">
					<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
						<h2 style="color: #003366; margin: 0 0 7px">Buen día, estimado(a).</h2><br>
						<p style="margin: 2px; font-size: 15px">
							Hemos recibido una solicitud para poder restablecer su contraseña.<br><br>
							A continuación, dejamos la contraseña temporal con la que debe ingresar:<br>
						</p>
						<h1 style="font-weight: bold; text-align: center;">'.$clave.'</h1>
						<br>
						<p style="margin: 2px; font-size: 15px;"><p style="margin: 2px; font-size: 15px; font-weight: bold; display: inline;">Nota:</p>Recuerde que la contraseña temporal es personal y no debe compartirla con nadie más. En su próximo inicio de sesión, el sistema le solicitará cambiar su contraseña por motivos de seguridad.</p>
						<p style="margin: 2px; font-size: 15px;">Por favor, no responda a este mensaje ya que ha sido generado de forma automática.</p>
						<div style="width: 100%; text-align: center; margin-top: 10%">
							<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #172D44" href="#">Ingresar a EDU</a>	
						</div>
						<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Universidad Cristiana de las Asambleas de Dios - '.date('Y').'</p>
					</div>
				</td>
			</tr>
		</table>
	</body>
	</html>
	';

	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: edu@gmail.com';
	$enviado   = mail($para, $titulo, $mensaje, $cabeceras);
}
