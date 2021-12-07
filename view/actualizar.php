<?php
    include '../private/db.php';
    $id= $_GET['upd'];

    $cont = mysqli_query($conexion, "SELECT * FROM producto WHERE id = '$id' ");
    while ($row = $cont->fetch_assoc()) {
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
		$marca = $row['marca'];
		$plataforma = $row['plataforma'];    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/producto.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
		<div class="cont-titulo">
			<h2 class="titulo">Crear un nuevo producto</h2>
		</div>

        <form action="../private/actualizar_producto.php?upd=<?php echo $id?>" method="POST" id="formulario" class="formulario" enctype="multipart/form-data">

			<div class="formulario__grupo" id="grupo__img">
				<div class="formulario__grupo-input">
                    <input type="file"  class="formulario__input"  name="file" accept="image/*">
				</div>
			</div>

			<div class="formulario__grupo" id="grupo__titulo">
				<div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" id="titulo" value="<?php echo $nombre?>" name="titulo">
				</div>
				<p class="formulario__input-error">El titulo debe de ser menor a 25 letras</p>
			</div>

			<div class="formulario__grupo" id="grupo__"> 
				<div class="formulario__grupo-input">
					<textarea class="formulario__descripcion" id="descripcion" name="descripcion"><?php echo $descripcion?></textarea>
				</div>
				<p class="formulario__input-error">Es necesaria una descripcion</p>
			</div>

            <div class="formulario__grupo" id="grupo__precio">
				<div class="formulario__grupo-input">
                    <input type="number" min="0" step="any" class="formulario__input" id="precio" value="<?php echo $precio?>" name="precio">
				</div>
				<p class="formulario__input-error">Es necesario un precio</p>
			</div>

			<div class="formulario__grupo" id="grupo__marca">
				<div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" id="marca" value="<?php echo $marca?>" name="marca">
				</div>
				<p class="formulario__input-error">Es necesario una marca</p>
			</div>

			<div class="formulario__grupo" id="grupo__plataforma">
				<div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" id="plataforma" value="<?php echo $plataforma?>" name="plataforma">
				</div>
				<p class="formulario__input-error">Es necesario una plataforma</p>
			</div>

			<div class="formulario__grupo" id="grupo__descuento">
				<div class="formulario__grupo-input">
                    <input type="number" min="0" step="any" class="formulario__input" id="descuento" placeholder="algun descuento?" name="descuento">
				</div>
			</div>

			<div class="formulario__grupo" id="grupo__precio">
                <div class="formulario__grupo-input">
                    <select name="disponible" require="required" class="formulario__input">
                        <option>Disponiblle</option>
                        <option>Agotado</option>
                    </select>
				</div>
			</div>


            <div class="formulario__grupo">
                <div class="formulario__grupo-input">
                    <select name="categoria" require="required" class="formulario__input">
                        <option selected disabled></option>
                        <option>Consolas</option>
                        <option>Accesorios</option>
                        <option>videojuegos</option>
                        <option>Promociones</option>
                        <option>Edicion ilimitada</option>
                    </select>
				</div>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
			</div>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<a href="../home/admin.php"><input type="button" value="Cancelar" class="cancelar"></a>
			</div>
		</form>
    </div>
    <script src="./js/producto.js"></script>
</body>
</html>