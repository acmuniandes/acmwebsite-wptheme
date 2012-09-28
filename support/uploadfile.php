<?php
/**
 * Sube un archivo al servidor.
 * Asume que solo se pueden subir dos tipos de archivo:
 * @Torneo de Robocode - (Archivos ZIP)
 * @Fotografia - (Archivos ZIP)
 */


if(isset($_POST["login"]) && isset($_POST["submission"]))
{

	//Ocurrio un error al subir el archivo.
	if($_FILES["file"]["error"] > 0){
		echo "Ocurrio un error al subir el archivo. Por favor intentarlo de nuevo";
	}else
	{
		$type = $_FILES["file"]["type"];
		$login = $_POST["login"];
		$submission = $_POST["submission"];

		//Validar el tipo de archivo.
		$allowedExtension = "zip";
		$extension = end(explode(".", $_FILES["file"]["name"]));
		$size = $_FILES["file"]["size"]/1024;
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
			move_uploaded_file($_FILES["file"]["tmp_name"], $ruta);
			echo "El archivo se subio de forma correcta";

		}else
		{
			echo "No se cumple con los requisitos de subida";
		}

	}

}
?>
