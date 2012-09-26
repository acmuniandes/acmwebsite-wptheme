<?php
/*
 * Funcion que envia una solicitud de adminision al correo.
 * Asume que llegan por el post los siguientes parametros no vacios.
 * Nombre, Email, Programa, Mensaje.
 */

require('Mail.php');
ini_set('display_errors','On');
error_reporting(E_ALL);

if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["programa"]) && isset($_POST["mensaje"]))
{
	$password = loadPassword();
	echo $password;
	$smtp = Mail::factory('smtp', array('host'=>'smtp.gmail.com', 'auth'=> true, 'username'=> 'acmuniandes', 'password' => $password));

	$nombre = sanitizeString($_POST["nombre"]);
	$email = sanitizeString($_POST["email"]);
	$programa = sanitizeString($_POST["programa"]);
	$mensaje = sanitizeString($_POST["mensaje"]);
	$website = isset($_POST["website"]) ? $_POST["website"]: "";

	$subject = utf8_decode("Solicitud de Adminisión - $email");


	$body = "Buen día<br /><br />
		La siguiente persona lleno una solicitud de adminisión al capítulo de la ACM. <br /><br />
		<strong>Nombre:</strong> $nombre,<br />
		<strong>Email:</strong> $email,<br />
		<strong>Programa:</strong> $programa,<br />
		<strong>Comentarios:</strong> $mensaje,<br />
		<strong>Website:</strong> $website <br />
		<br /><br />
		Cordialmente,<br /><br />
		Chuck Norris <br />
		<em> Always on watch. </em>
		";
	
	$to = "acm@uniandes.edu.co";
	$from = "acmuniandes@gmail.com";

	$body = utf8_decode($body);
	$headers = array('Subject' => $subject,'From'=>"From:".$from,'Content-type'=>'text/html','charset'=>'utf-8'); 

	$mail = $smtp->send($to,$headers,$body);
	
	if(PEAR::isError($mail))
		echo false;
	else
		echo true;

}

function sanitizeString($var) {
	$var = stripslashes($var);
	$var = strip_tags($var);
	return $var;
}

function loadPassword()
{
	$file = fopen("./data/infocorreo.txt", "r") or exit("No se pudo leer el archivo establecido");
	if(!feof($file))
	$pass = fgets($file);

	return $pass;	

}
 ?>
