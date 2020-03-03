<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos_cli.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <title>Guardar</title>
</head>

<body>
    <div class="logoc mb-0">
        <img src="img/logo-nerpel.png" alt="" width="160">
    </div>
    <H3 class="h3 titulo">TALONARIO DIGITAL NERPEL</H3>
    <?php 
        session_start(); 
        require 'conexion.php';
        if(isset($_SESSION['usuario'])){	
    }else{
	header('location: login.php');
    }      
       	   $id = $_SESSION['cliente'];
           $vend = $_SESSION['usuario'] ;  
           $y = $_SESSION ['n_pedido'];
           $x = $_SESSION ['upedido'];      
       try {
        $datosBD= new Conexion;
        $conexion = new PDO($datosBD->host,$datosBD->usuario, $datosBD->pass);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }       
		$statement = $conexion->prepare('SELECT* FROM clientes WHERE id=:id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {			
         ?>
    <div>
        <div class="row mx-0 logoc">
            <div class="col-12 col-sm-5">cliente<h5> <?php echo $row['nombre']; $_SESSION['nom'] =$row['nombre'];?></h5>
            </div>
            <div class="col-4 col-sm-3">vendedor:<h6> <?php echo $row['vendedor'];?></h6>
            </div>
            <div class="col-4 col-sm-2">nit<h6> <?php echo $row['nit'];?></h6>
            </div>
            <div class="col-4 col-sm-2">pedido:<h5 style="color:Tomato;"> <?php echo $_SESSION ['n_pedido'];  ?></h5>
            </div>
        </div>
        <div class="row mx-0 logoc">
            <div class="col-6 col-sm-3">direccion<h5 class="h6 til"><?php echo $row['direccion'];?></h5>
            </div>
            <div class="col-6 col-sm-3">telefono<h5 class="h6 til"><?php echo $row['telefono'];?></h5>
            </div>
            <div class="col-6 col-sm-2">ciudad<h5 class="h6 til"><?php echo $row['ciudad'];?></h5>
            </div>
            <div class="col-6 col-sm-3"> Fecha<h6>
                    <?php $mes=date("F"); 
                     if ($mes == "January") $mes = "Enero";
                     if ($mes == "February") $mes = "Febrero";
                     if ($mes == "March") $mes = "Marzo";
                     if ($mes == "April") $mes = "Abril";
                     if ($mes == "May") $mes = "Mayo";
                     if ($mes == "June") $mes = "Junio";
                     if ($mes == "July") $mes = "Julio";
                     if ($mes == "August") $mes = "Agosto";
                     if ($mes == "September") $mes = "Setiembre";
                     if ($mes == "October") $mes = "Octubre";
                     if ($mes == "November") $mes = "Noviembre";
                     if ($mes == "December") $mes = "Diciembre"; echo $mes."-".date("d")."-".date("Y");?>
                </h6>
            </div>
        </div>
        <?php    
	}
		 ?>
        <center>
            <table class=" table    table-striped table-border table-hover table-sm " id="formularioVentas">

                <thead class="logoH">
                    <tr>
                        <th>
                            <div class="text-center">
                                ref.
                            </div>
                        </th>
                        <th>
                            <div class="text-center">
                                color
                            </div>
                        </th>
                        <th>
                            <div class="text-center">
                                metros
                            </div>
                        </th>
                        <th>
                            <div class="text-center">
                                precio
                            </div>
                        </th>
                        <th>
                            <div class="text-center">
                                obser..
                            </div>
                        </th>
                        <th colspan="2">
                            <center>edicion</center>
                        </th>
                    </tr>
                </thead>
                <?php     
        $y = $_SESSION ['n_pedido'];
        $x = $_SESSION ['upedido']; 
    $statement = $conexion->prepare('SELECT * FROM pedidos_ventas1 WHERE   numero_pedido = :ped');
		$statement->execute(array(':ped'=>$y));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {    

		$z =  $row["id_pedido"]; 
     ?>
                <tbody class="logoB">
                    <tr>
                        <td align="center"><?php echo $row["referencia"]; ?></td>
                        <td align="center"><?php echo $row["color"]; ?></td>
                        <td align="center"><?php echo $row["metros"]; ?></td>
                        <td align="center"><?php echo $row["precio"]; ?></td>
                        <td align="center"><?php echo $row["observaciones"]; ?></td>
                        <td align="center"><a href="modificar_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>"><i
                                    class="fas fa-edit"></i></a> modificar</td>
                        <td align="center"><a href="eliminar_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>"><i
                                    class="fa fa-times" aria-hidden="true"></i></a>eliminar</td>
                    </tr>
                    <?php
     }     
       ?>
                </tbody>
            </table>
        </center>
        <div class="container forpedido">
            <div class="row mx-0 d-flex justify-content-center">
                <div class="col-md-12 ">
                    <div class="well well-sm ">
                        <form action="guardar_pedido.php?" class="form-horizontal" method="post">
                            <fieldset>
                                <legend class="text-center header">formulario Pedido</legend>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" readonly>
                                <input type="hidden" name="numero_pedido" value="<?php echo $y; ?>" readonly>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row mx-0">
                                            <div class="col-1 mr-2">
                                                <span class=" col-md-offset-2 text-center"><i
                                                        class="fas fa-barcode h4"></i></span>
                                            </div>
                                            <div class="col-10">
                                                <select REQUIRED name="referencia" class="form-control"><i
                                                        class="fas fa-hand-point-up"></i>
                                                    <option value="" disabled selected>seleccione referencia</option>
                                                    <?php
               
            $statement = $conexion->prepare('SELECT referencia FROM referencias ');
            $statement->execute();
            $resultado = $statement->fetchAll();
            foreach ($resultado as $row) {
              ?>
                                                    <option value="<?php echo $row["referencia"]; ?>">
                                                        <?php echo $row["referencia"]; ?></option>
                                                    <?php
            } 
             ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row mx-0">
                                            <div class="col-1 mr-2">
                                                <span class=" col-md-offset-2 text-center"><i
                                                        class="fas fa-paint-brush h5"></i> </span>
                                            </div>
                                            <div class="col-10">
                                                <select REQUIRED name="color" class="form-control"><i
                                                        class="fas fa-hand-point-up"></i>
                                                    <option value="" disabled selected>seleccione color</option>
                                                    <?php
               
            $statement = $conexion->prepare('SELECT titulo FROM fotos order by titulo');
            $statement->execute();
            $resultado = $statement->fetchAll();
            foreach ($resultado as $row) {
              ?>
                                                    <option value="<?php echo $row["titulo"]; ?>">
                                                        <?php echo $row["titulo"]  ; ?></option>
                                                    <?php
            if(isset($row["titulo"])){
            }
            } 
             ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row mx-0">
                                            <div class="col-1 mr-2">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i
                                                        class="fas fa-cart-arrow-down h5"></i></span>
                                            </div>
                                            <div class="col-10">

                                                <input type="number" REQUIRED name="metros" placeholder="metros"
                                                    value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row mx-0">
                                            <div class="col-1 mr-2">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i
                                                        class="fas fa-money-bill-alt h5 mr-2"></i></span>
                                            </div>

                                            <div class="col-10">
                                                <input type="number" REQUIRED name="precio" id="precio"
                                                    placeholder="precio" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row mx-0">
                                            <div class="col-1 pr-1 mr-2">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i
                                                        class="fas fa-binoculars h5 "></i></span>
                                            </div>

                                            <div class="col-10">
                                                <input type="text" name="observaciones" placeholder="observaciones"
                                                    value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <input class="btn btn-info btn-md " id="btnformularioV" type="submit"
                                            value="GUARDAR" name="submit" />
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <CENTER> <br>
            <div class="col-12 col-sm-6 mb-4">
                <a href="correo.php?variable=clientes" class="btn btn-warning btn-md ">
                    <h6>
                        <i class="fas fa-paper-plane"> </i><strong> Enviar<br>y volver a Clientes</strong>
                    </h6>
                </a>
            </div>
            <div class="row mx-0 d-flex justify-content-center">
                <div class="col-12 col-sm-6 ">
                    <a href="correo.php" class="btn btn-warning btn-sm ">
                        <h6>
                            <i class="fas fa-paper-plane"> </i><strong> Enviar<br>y Cerrar</strong>
                        </h6>
                    </a>
                </div>

            </div>
            <br><br><br>
        </CENTER>

</body>

</html>