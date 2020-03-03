<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <link rel="stylesheet" href="css/estilos1.css">
    <title>Catalogo foto unica</title>
</head>

<body>
    <div class="logoc mb-0">
        <img src="img/logo-nerpel.png" alt="" width="160">
    </div>

    <?php   

	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE vendedor = :usuario '	);
	$statement->execute(array(
		':usuario' => $usuario	
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$via = "tabla_clientes.php";
	} else {
		$via = "consulta_admin.php";
	}
             ?>

    <h1 class=" h1 titulo">Catalogo Nerpel
        <a class="btn btn-warning btn-sm col-4 col-sm-2" href="cerrar.php">Cerrar Sesion </a>
        <a class="btn btn-warning btn-sm col-4 col-sm-2" href="<?php echo $via ?>">volver </a></h1>
    <header>
        <div class="contenedor logoc">
            <h1 class=" h1">Catalogo de Variantes y Colores</h1>
        </div>
    </header>
    <section class="fotos">
        <div class="contenedor">
            <?php foreach($fotos as $foto):?>
            <div class="thumb">
                <a href="foto.php?id=<?php echo $foto['id']; ?>">
                    <img src="fotos/<?php echo $foto['imagen'] ?>" alt="">
                </a>
                <center>
                    <h6 class="letracolor pt-1"><?php echo $foto['titulo'] ?></h6>
                </center>
            </div>
            <?php endforeach;?>

            <div class="paginacion">
                <?php if ($pagina_actual > 1): ?>
                <a href="index1.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i
                        class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
                <?php endif ?>

                <?php if ($total_paginas != $pagina_actual): ?>
                <a href="index1.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha">Pagina Siguiente <i
                        class="fa fa-long-arrow-right"></i></a>
                <?php endif ?>              
            </div>
        </div>
    </section>

    <footer>
        <p class="copyright">Ibarra&desarrollos</p>
    </footer>
</body>

</html>