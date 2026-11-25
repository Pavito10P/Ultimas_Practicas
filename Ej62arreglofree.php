<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<title>Tienda</title>
</head>
<body>

	<form method="POST">

		<label>Introduce el top: </label>
		<input type="text" name="etop" id="etop">

		<br>

		<button type="button" onclick="agregar()">Agregar top</button>

		<input type="hidden" name="tops" id="tops">
		<br><br>

		<p id="mensaje">0/3 Tops guardados</p>

		<button type="submit" name="guardar" id="guardar" disabled>Mostrar Top</button>
	</form>

	<script>
		let listaTop = [];

		function agregar() {
			let dato = document.getElementById("etop").value;

			if (dato == "") {
				alert("Introduce un valor");
				return;
			}

			if (listaTop.length < 3) {
				listaTop.push(dato);

				document.getElementById("tops").value = JSON.stringify(listaTop);

				document.getElementById("etop").value = "";

				document.getElementById("mensaje").innerHTML = listaTop.length + "/3 Valores capturados";

				if (listaTop.length == 3) {
					document.getElementById("guardar").disabled = false;
					document.getElementById("mensaje").innerHTML = "¡Ya capturaste los 3 valores!";
				}
			}
		}
	</script>

	<?php
	if (isset($_POST['guardar'])) {
		$top = json_decode($_POST['tops'], true);
		$c = 0;

		echo "<h3>Contenido del vector</h3>";

		echo "<table border='1' cellpadding='8' cellspacing='0'>";

		for ($i = 0; $i < 3; $i++) { 
			$c++;

			echo "<tr>";
			echo "<td>" . $c . ".-</td>";
			echo "<td>" . $top[$i] . "</td>";
			echo "</tr>";
		}

		echo "</table>";
	}
	?>

</body>
</html>
