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
		<img src="images/ordenador_1.jpg" id="mi_imagen">
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
	<button id="recorte" >Recortar</button>
	<br>
	<figure id="zona" style="width: 100px; height: 100px; overflow: hidden;">
		<img src="images/ordenador_1.jpg" style="width: 100px; height: 100px;">
	</figure>
	<script src="js/jquery.js"></script>
	<script src="img_area_select/js/jquery.imgareaselect.js"></script>
	<script type="text/javascript">
		/*$('#mi_imagen').imgAreaSelect({
			handles: true, //la seccion que seleccione la imagen tenfa los manejadores  
			onSelectEnd: function(img, sel){
				$('#x1').prop('value', sel.x1);
				$('#y1').prop('value', sel.y1);
				$('#x2').prop('value', sel.x2);
				$('#y2').prop('value', sel.y2);
				$('#ancho').prop('value', sel.width);
				$('#alto').prop('value', sel.height);
			}
		});
		$('#mi_imagen').imgAreaSelect({
			fadeSpeed: 300, //el tiempo en aparecer la mascara
			aspectRatio: '1:1', //la anchura y altura se mantienen
			outerColor: '#f00', //color de la mascara
			handles: true,
			onSelectChange: function(img, sel){
				if(!sel.width || !sel.height) return;
				var proporcionX = parseInt($('#zona').css('width')) / sel.width;
				var proporcionY = parseInt($('#zona').css('height')) / sel.height;
				$('#zona img').css({
					width: Math.round(proporcionX * $('#mi_imagen').prop('width')),
					height: Math.round(proporcionY * $('#mi_imagen').prop('height')),
					marginLeft: -Math.round(proporcionX * sel.x1),
					marginTop: -Math.round(proporcionY * sel.y1),
				});
				$('#x1').prop('value', sel.x1);
				$('#y1').prop('value', sel.y1);
				$('#x2').prop('value', sel.x2);
				$('#y2').prop('value', sel.y2);
				$('#ancho').prop('value', sel.width);
				$('#alto').prop('value', sel.height);
			}
		});
		*/
		//coordenada de la esquina superior izquierda del area seleccionada
		var x1 = 0; 
		var y1 = 0;
		//coordenada de la esquina inferior derecha del area seleccionada
		var x2 = 0;
		var y2 = 0;
		var anchura = 0; //ancho de la seccion
		var altura = 0; //altura de la seccion
		$('#mi_imagen').imgAreaSelect({x1:0,y1:0,x2:320,y2:240});
		$('#mi_imagen').imgAreaSelect({
			fadeSpeed: 300,
			//handles: true,
			maxHeight: 320,
			maxWidth: 240,
			minHeight: 320,
			minWidth: 240,
			persistent: true,
			resizable: false,
			onSelectEnd: function(img, sel){
				x1 = sel.x1;
				y1 = sel.y1;
				x2 = sel.x2;
				y2 = sel.y2;
				altura = sel.width;
				anchura = sel.height;
				console.log(x1 +" " +y1 );
				console.log(x2 +" " + y2 );
				console.log(anchura +" " +altura );
			}
		});
		$('#recorte').on('click', function(){
			if(anchura == 0 || altura == 0) return;
			$.ajax({
				url: ('includes/crear_recorte.php'),
				type: 'POST',
				data: {
					'x1': x1,
					'y1': y1,
					'x2': x2,
					'y2': y2,
					'anchura': anchura,
					'altura': altura,
					'imagen': 'ordenador_1.jpg'
				},
				success: function(){
					$('#zona').html('');
					var r = Math.random();
					var recorte = "<img src='images/recorte.jpg?'"+r+">";
					$('#zona').html(recorte);
				}
			});
		});

	</script>
</body>
</html>