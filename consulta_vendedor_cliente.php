<?php 
session_start();
require 'conexion.php';
if(isset($_SESSION['usuario'])){
	
}else{
	header('location: login.php');
}

$id = $_REQUEST['nombre'];
$_SESSION['nombreCliente']= $id;

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos_cli.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>tabla</title>
</head>

<body>
    <div class="logoc mb-0">
        <img src="img/logo-nerpel.png" alt="" width="150">
    </div>

    <center>
        <h1 class=" h1 titulo">LISTADO PEDIDOS</h1>

        <div class=" logoc">
            <div class="row mx-0">

                <div class="col-6 col-sm-3 mt-3"><a href="cerrar.php" class="  btn  btn-sm btn-warning">Cerrar
                        Sesion</a>
                </div>
                <div class="col-6 col-sm-3 mt-3">
                    <a href="tabla_clientes.php" class=" btn  btn-sm btn-warning">volver</a></div>
                <div class="col-12 col-sm-6 pt-3 ">
                    <h5>
                        Pedidos de: <strong><?php echo $id ?></strong>
                    </h5>
                </div>

            </div>
        </div>
        <div class=" logoc">
            <h5>Si desea filtrar por fecha por favor digitelas(fecha menor izquierda)</h5>
        </div>
        <form form action="segmentarPedidos.php?" class="logoc" method="post">
            <div class="form-row d-flex justify-content-center mx-0 my-2 ">
                <div class="col-5">
                    <input type="date" class="form-control fechaVentas" name="fechaMenor" placeholder="fecha inicial">
                </div>
                <div class="col-5">
                    <input type="date" class="form-control fechaVentas" name="fechaMayor" placeholder="fecha final">
                </div>
            </div>
            <input class="btn btn-info btn-md my-3"  type="submit" value="Procesar" name="submit" />

        </form>

        <table class="  table  table-bordered   table-bordered table-hover table-sm table-responsive mb-0">

            <thead class="logoH">

                <tr>
                    <th align="center">vendedor</th>
                    <th align="center">pedido N</th>
                    <th align="center">referencia</th>
                    <th align="center">metros</th>
                    <th align="center">color</th>
                    <th align="center">precio</th>
                    <th align="center">observaciones</th>
                    <th align="center">fecha</th>

                </tr>
            </thead>
            <tbody class="logoB">

                <?php
       $vend = $_SESSION['usuario'];
       
       try {
		$datosBD= new Conexion;
		$conexion = new PDO($datosBD->host,$datosBD->usuario, $datosBD->pass);
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
       
		$statement = $conexion->prepare("SELECT c.vendedor,v.numero_pedido, v.referencia, v.metros,v.color,v.precio ,v.observaciones , v.fecha FROM clientes c,pedidos_ventas1 v WHERE c.id=v.id AND c.vendedor = '$vend' AND c.nombre= '$id' ORDER BY v. numero_pedido DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		$s=0;
		foreach ($resultado as $row) {
		 	# code...
		$s = $row['metros'] + $s ;
			
		 ?>

                <tr>
                    <!-- <td align="center"><?php echo $row["nombre"]; ?></td> -->
                    <td align="center"><?php echo $row["vendedor"]; ?></td>
                    <td align="center"><?php echo $row["numero_pedido"]; ?></td>
                    <td align="center"><?php echo $row["referencia"]; ?></td>
                    <td align="center"><?php echo $row["metros"]; ?></td>
                    <td align="center"><?php echo $row["color"]; ?></td>
                    <td align="center"><?php echo $row["precio"]; ?></td>
                    <td align="center"><?php echo $row["observaciones"]; ?></td>
                    <td align="center"><?php echo $row["fecha"]; ?></td>
                    <?php
    // $_SESSION['id']= $row['id'];
     }
   
    ?>
                <tr>
                    <td align="center" colspan="3">total metros</td>
                    <td>
                        <center><?php echo $s ?></center>
                    </td>
                    <td align="center" colspan="4"></td>
                </tr>

            </tbody>
        </table>
        <div class="logoc py-4">
            <a href="cerrar.php" class="btn btn-warning btn-sm ">Cerrar</a>
            <a href="tabla_clientes.php" class="btn btn-warning btn-sm ">Volver</a>
        </div>
    </center>
</body>

</html>