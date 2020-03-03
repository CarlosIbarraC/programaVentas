<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>Registrate</title>
</head>
<body>
  <div class="logoc">
      <h3>Ibarra&desarrollos</h3>     
      </div>
	<!-- <div class="contenedor"> -->
		<h1 class=" h1 titulo">Consultas Nerpel
    <a class="btn  btn-sm btn-info mt-1 mx-4" href="cerrar.php">Cerrar Sesion   </a>
    <a href="consulta_admin.php"  class=" btn  btn-sm btn-outline-info ">volver</a></h1>

    <center>
    <div class=" col-12 col-md-4 form-group  d-flex justify-content-center  my-auto ">      	
		    <form action="alertas.php" method="POST" class="formulario1 mt-2 mx-2 px-5">
      <div class="form-group">
        <center><p class="fol" ><i class="fa fa-folder-open" aria-hidden="true"></i>seleccione titulo</p></center>
        
        <center> 

          <center>            
                 
                
           <select REQUIRED name="titulo" >
           <option value="" disabled selected>seleccione titulo</option>
    <?php
    try {
	
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
    $statement1 = $conexion->prepare('SELECT titulo FROM fotos ');
    $statement1->execute();
    $resultado = $statement1->fetchAll();
    foreach ($resultado as $row) {
      ?>
      
    
    <option value="<?php echo $row["titulo"]; ?>"><?php echo $row["titulo"]; ?></option>
    <?php
   

    } 
     ?>                
               
     </center>     
</center>
        <center>
          <input class="btn  btn-sm btn-info mt-3"  type="submit" value="eliminar" name="submit"/>
    </center>
      </div>
       </form>
         </div> </center>
