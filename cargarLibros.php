<?php
	/**
	*
	*index.php
	*@author: FOC / Oscar
	*@version: 1.0
	*
	*/

	/**
	*
	*Este script cargará la información de la base datos.
	*Primeramente solicita el acceso a la BD
	*Luego, ejecuta las sentencias SQL, con el dato recogido en el input del formulario
	*A continuación, los datos se incorporan a un array
	*
	*@param string $q 
	*@return array $salida
	*@return array $salida1
	*
	*/

	$salida = "";
	$salida1 = "";

	if (isset($_GET["q"]))
	{
		$nombre = $_GET["q"];
		$mysqli = new mysqli("localhost", "oscar", "oscar", "libros");
		if (!$mysqli->connect_error)
		{
			$mysqli->set_charset("utf8");
			$sql = "SELECT * FROM autor WHERE nombre LIKE '%$nombre%' ORDER BY nombre";
			if (($resultado = $mysqli->query($sql)) && (!$mysqli->error))
			{
				while ($fila[] = $resultado->fetch_assoc())
				{
					$salida = $salida . "<br>". $fila[0]["nombre"]." ".$fila[0]["apellidos"];

				}			
			}
			$sql1 = "SELECT * FROM libro WHERE id_autor='{$fila[0]["id"]}' ORDER BY titulo";
			if (($resultado1 = $mysqli->query($sql1)) && (!$mysqli->error))
			{
				while ($fila1 = $resultado1->fetch_assoc())
				{
					$salida1 = $salida1 . "<br>". $fila1["titulo"];
				}			
				$resultado->free();
				$resultado1->free();
				$mysqli->close();
			}
		}
	}
	echo $salida;
	echo $salida1;
?>

