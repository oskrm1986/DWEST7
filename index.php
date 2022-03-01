<!--index.php-->

<!DOCTYPE html>

<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			$("#texto").keyup(function(){
			$("#sugerencias").load("cargarLibros.php?q=" + $("#texto").val());
			});
			});
		</script>
		
	</head>
	
	<body>
	
		<p><b>Búsqueda de autores y libros:</b></p>
		<form>
		<!--
		Cada vez que tecleamos algo, en este field se mostraran las sugerencias
		-->
		Nombre del autor: <input type="text" id="texto">
		</form>
		<!-- En el span con id="sugerencias" mostraremos las coincidencias -->
		<p><strong>Sugerencias:</strong> <span id="sugerencias" style="color: #0080FF;"></span></p>
	
	</body>
	
</html>