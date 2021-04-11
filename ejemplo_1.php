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
		<img src="images/ordenador_1.jpg" id="mi_imagen" alt="">
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
	
	
	<script src="js/jquery.js"></script>
	<script src="img_area_select/js/jquery.imgareaselect.js"></script>


	<!-- Determinación de coordenadas al acabar la selección -->
	<script type="text/javascript" language="javascript">
		$('#mi_imagen').imgAreaSelect({
			handles: true, 
			onSelectEnd: function(img, sel){
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