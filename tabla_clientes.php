<?php 
session_start();
unset($_SESSION['paso']);
require 'conexion.php';
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
 $usuario=$_SESSION['usuario'];
 try {
	$datosBD= new Conexion;
	$conexion = new PDO($datosBD->host,$datosBD->usuario, $datosBD->pass);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
	$statement = $conexion->prepare('
		SELECT * FROM admin WHERE administrador = :usuario '
	);
	$statement->execute(array(
		':usuario' => $usuario		
	));
	$resultado = $statement->fetch();
	if ($resultado !== false) {		
		header('Location: tabla_clientes_admin.php');
	} 
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
        <img src="img/logo-nerpel.png" alt="" width="160">
    </div>
    <center>
        <h1 class=" h1 titulo">LISTADO DE SUS CLIENTES INSCRITOS</h1>

        <div class=" logoc">
            <div class="row mb-3 mx-0">
                <div class="col-3 d-flex align-items-center"><a href="form_clientes.php"
                        class="btn btn-warning btn-sm"><i class="fas fa-coffee"></i>Nuevo Cliente </a></div>
                <div class="col-3 d-flex align-items-center">
                    <h5>
                        Listado Clientes <br>
                        <strong><?php echo($_SESSION['usuario']) ?></strong></h5>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <a href="Cerrar.php" class=" btn  btn-sm btn-warning ">Cerrar Sesion</a>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <a href="index1.php" class=" btn  btn-sm btn-warning ">Catalogo</a>
                </div>
            </div>
        </div>
        <table class=" table     table-bordered table-hover table-sm table-responsive mb-0">
            <thead class="logoH">
                <tr>
                    <th >id</th>
                    <th >nombre</th>
                    <th >ciudad</th>
                    <th >telefono</th>
                    <th  colspan="2">
                        <center>edicion</center>
                    </th>
                </tr>
            </thead>
            <tbody class="logoB">
                <?php 	 	
      ?>
                <?php
       $vend = $_SESSION['usuario'];
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare('SELECT * FROM clientes WHERE vendedor= :vend order by nombre ');
		$statement->execute(array(':vend'=> $vend));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {		
		 ?>

                <tr>
                    <td align="center"><?php echo $row["id"]; ?></td>
                    <td align="center"><?php echo $row["nombre"]; ?></td>
                    <td align="center"><?php echo $row["ciudad"]; ?></td>
                    <td align="center"><?php echo $row["telefono"]; ?></td>
                    <td align="center"><a href="consulta_vendedor_cliente.php?nombre=<?php echo $row['nombre']; ?>"
                            class="fa-file-alt"><i class="fas fa-file-alt"></i></a>..record</td>
                    <td align="center"><a href="trans_pedido.php?id=<?php echo $row['id'];?>"><i
                                class="fas fa-edit"></i></a>pedido</td>
                </tr>
                <?php
    $_SESSION['id']= $row['id'];
     }
   
    ?>

            </tbody>
        </table>


        <div class="logoc py-4">
            <a href="Cerrar.php" class="btn btn-warning btn-sm ">Cerrar Sesion</a>
            <a href="consulta_vendedor.php" class="btn btn-warning btn-sm ">listado de pedidos</a>
        </div>

    </center>
</body>

</html>