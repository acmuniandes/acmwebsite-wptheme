<?php
/**
 * Sube un archivo al servidor.
 * Asume que solo se pueden subir dos tipos de archivo:
 * @Torneo de Robocode - (Archivos ZIP)
 * @Fotografia - (Archivos ZIP)
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL);


if(isset($_POST["login"]) && isset($_POST["submission"]))
{

	//Ocurrio un error al subir el archivo.
	if($_FILES["file-input"]["error"] > 0){
		echo "Ocurrio un error al subir el archivo. Por favor intentarlo de nuevo";
	}else
	{
		$type = $_FILES["file-input"]["type"];
		$login = $_POST["login"];
		$submission = $_POST["submission"];

		//Validar el tipo de archivo.
		$allowedExtension = "zip";
		$extension = end(explode(".", $_FILES["file-input"]["name"]));
		$size = $_FILES["file-input"]["size"]/1024;
		$maxSize = ($submission = "robocode") ? 1000 : 5000 ;


		if($allowedExtension == $extension && $size <= $maxSize && $type == "application/zip"){

			$ruta = ($submission == "robocode") ? "./robocode/uploads/" : "./fotografia/uploads/";

			$ruta .=  $login . ".zip";

			//Solo un archivo por persona.
			if(file_exists($ruta))
			{
				unlink($ruta);
			}

			//Sube el archivo.
			if(move_uploaded_file($_FILES["file-input"]["tmp_name"], $ruta))
				echo json_encode(array('type'=>'success' , 'msg' =>'El archivo se subio de forma correcta'));
			else
				echo json_encode(array('type'=>'error', 'msg'=> 'Oh Uh! Se presento un error al escribir el archivo. Intentalo nuevamente'));

		}else
		{
			echo json_encode(array('type'=>'error', 'msg' => 'No se cumple con los requisitos de subida'));
		}

	}

}
?>
