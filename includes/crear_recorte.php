<?php
	// Recuperamos las variables recibidas por post
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$anchura = $_POST["anchura"];
	$altura = $_POST["altura"];
	$imagen = $_POST["imagen"];

	$imagenDeOrigen = '../images/'.$imagen;
	$manejadorDeOrigen = imagecreatefromjpeg($imagenDeOrigen);
	$manejadorDeDestino = imagecreatetruecolor($anchura, $altura);
	imagecopyresampled(
		$manejadorDeDestino,
		$manejadorDeOrigen,
		0,
		0,
		$x1,
		$y1,
		$anchura,
		$altura,
		$anchura,
		$altura
	);
	imagejpeg($manejadorDeDestino, "../images/recorte.jpg", 100);
?>
