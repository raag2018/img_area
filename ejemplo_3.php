<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recorte de imágenes</title>
	<link rel='stylesheet' href='img_area_select/css/imgareaselect-animated.css'>
	<link rel='stylesheet' href='img_area_select/css/imgareaselect-default.css'>
</head>
<body>

	<figure>
		<img src="images/ordenador_3.jpg" id="mi_imagen" alt="">
	</figure>
	<p>&nbsp;</p>

	X1:
	<input type="text" id="x1" size="4">
	<br>
	
	Y1:
	<input type="text" id="y1" size="4">
	<br>
	
	X2:
	<input type="text" id="x2" size="4">
	<br>
	
	Y2:
	<input type="text" id="y2" size="4">
	<br>
	
	Anchura:
	<input type="text" id="ancho" size="4">
	<br>
	
	Altura:
	<input type="text" id="alto" size="4">
	<br>

	<p>&nbsp;</p>

	<figure id="zona_de_miniatura" style="width: 160px; height: 90px; overflow: hidden;">
		<img src="images/ordenador_3.jpg" style="width: 100px; height: 100px;" />
	</figure>
	
	<script src="js/jquery.js"></script>
	<script src="img_area_select/js/jquery.imgareaselect.js"></script>

	<!-- Al cambio de la seleccción en tiempo real se muestra la parte 
	seleccionada en una zona de tamaño fijo, adaptando el tamaño de la selección 
	al de la zona de destino. 
	Además se incluye un color de la capa que cubre la imagen, 
	y un efecto de fundido de la misma. 
	También se fuerza una relación de aspecto de la selección a 1:1 -->
	<script type="text/javascript" language="javascript">
		$('#mi_imagen').imgAreaSelect({
			fadeSpeed: 300, 
			aspectRatio: '16:9', 
			outerColor: '#F00', 
			handles: true, 
			onSelectChange: function(img, sel){

				if (!sel.width || !sel.height) return;
    
				var proporcionX = parseInt($('#zona_de_miniatura').css('width')) / sel.width;
				var proporcionY = parseInt($('#zona_de_miniatura').css('height')) / sel.height;

				$('#zona_de_miniatura img').css({
					width: Math.round(proporcionX * $('#mi_imagen').prop('width')),
					height: Math.round(proporcionY * $('#mi_imagen').prop('height')),
					marginLeft: -Math.round(proporcionX * sel.x1),
					marginTop: -Math.round(proporcionY * sel.y1)
				});


				$('#x1').prop('value', sel.x1);
				$('#y1').prop('value', sel.y1);
				$('#x2').prop('value', sel.x2);
				$('#y2').prop('value', sel.y2);
				$('#ancho').prop('value', sel.width);
				$('#alto').prop('value', sel.height);
			}
		});
	</script>

</body>
</html>