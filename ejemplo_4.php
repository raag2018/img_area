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
	<input type="button" id="boton_de_recorte" value="recortar">
	<p>&nbsp;</p>

	<figure id="zona_de_recorte" style="width: 100px; height: 100px; overflow: hidden;">
	</figure>
	
	<script src="js/jquery.js"></script>
	<script src="img_area_select/js/jquery.imgareaselect.js"></script>

	<!-- Al pulsar un botón, la zona seleccionada es recortada y almacenada como un fichero aparte.
	Por supuesto, esto debe hacerse en el lado del servidor. 
	El script nos da las coordenadas de la selección y es un script en el servidor el que genera 
	un archivo con la zona recortada. 
	Para ello, en el lado del cliente (este documento), las variables de coordenadaas deben ser globales,
	para que el plugin las esciba y la llamada al servidor pueda leerlas. -->
	<script type="text/javascript" language="javascript">
		var x1 = 0, y1 = 0, x2 = 0, y2 = 0, anchura = 0, altura = 0;

		$('#mi_imagen').imgAreaSelect({
			fadeSpeed: 300, 
			handles: true, 
			onSelectEnd: function(img, sel){
				x1 = sel.x1;
				y1 = sel.y1;
				x2 = sel.x2;
				y2 = sel.y2;
				anchura = sel.width;
				altura = sel.height;
			}
		});

		$('#boton_de_recorte').on('click', function(){
			if (anchura == 0 || altura == 0) return;
			$.ajax({
				url:'includes/crear_recorte.php', 
				type:'POST', 
				data:{
					'x1':x1,
					'y1':y1,
					'x2':x2,
					'y2':y2,
					'anchura':anchura,
					'altura':altura,
					'imagen':'ordenador_3.jpg'
				}, 
				success:function(){
					$('#zona_de_recorte').html('');
					var r = Math.random();
					var recorte = '<img src="images/recorte.jpg?' + r + '" alt="" border="0">';
					$('#zona_de_recorte').html(recorte);
				}
			});
		});
	</script>

</body>
</html>