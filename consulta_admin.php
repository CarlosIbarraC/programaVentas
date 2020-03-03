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
    <a class="btn  btn-sm btn-info mt-1 mx-4" href="cerrar.php">Cerrar Sesion   </a></h1>
   
          <div class="contenedor">
            <div class="row  mt-4">
         <div class="col-12 col-md-4 form-group m-auto ">
            <center> 
           <div class="col-12 mb-2 formulario1  ">                      
             <form action="session_entrega.php" method="POST" name="login">                         
             <p class="fol"><i class="fa fa-truck" aria-hidden="true"></i>.. Entrada de Entregas
             <input type="number"  name="numero_pedido" placeholder="N de pedido" class="form-group  "/>
           <input type="submit" name="submit" class=" btn  btn-sm btn-info mt-2" value="cargar"/></p>                 
             </form>         
          </div>
         </center> 
          <div class="col-12 px-0 ">   
         <center>
         <div class="form-group mt-4 formulario1"  > 
             <form action="entregas_por_cliente.php" method="POST" name="login"> 
              <center>            
                 <p class="fol"><i class="fa fa-folder-open" aria-hidden="true"></i>..<i class="fas fa-user"></i>.. entregas por cliente</p>
                 <?php 
session_start();
if(isset($_SESSION['usuario'])){
  // require'views/contenido_view.php';
}else{
  header('location: login.php');
}

      
       try {
      // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?> 
            <select REQUIRED name="cliente" >
           <option value="" disabled selected>seleccione cliente</option>
    <?php
       
    $statement = $conexion->prepare('SELECT nombre FROM clientes ');
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row) {
      ?>
      
    
    <option value="<?php echo $row["nombre"]; ?>"><?php echo $row["nombre"]; ?></option>
    <?php
    } 
     ?>
                  <input type="submit" name="submit" class=" btn  btn-sm btn-info mt-2" value="cargar"/></p> 
                </center>          
              </form>
           
          </div>
         </center> 
          </div>
          
          </div>  
          
         
				
         <div class=" col-11 col-md-4 form-group  formulario1 m-auto "> 
         
            <form action="tabla_entregas_ref.php"  method="POST" class="formulario3">
               <center><p class="fol">Entregas por estado</p>
               <div class="row">
            <div class="col-6">
              <input type="radio" name="estado" value="parcial" class="usuario"><p>entregas parciales</p>
            </div>
               <div class="col-6">
             <input type="radio" name="estado" value="total" class="usuario"><p>entregas completas </p>
           </div>
              <div class="col-6">
             <input type="radio" name="estado" value="cancelado" class="usuario"><p>ped. cancelados</p>
           </div>
           
              <div class="col-6">
             <input type="radio" name="estado" value="activo" class="usuario"><p>ped. activos</p>
           </div>
            </div>
           <div class="col-12">
             <input type="submit" value="Cargar" class=" btn  btn-sm btn-info mt-2" >
             
             </div></center>
           </form>
            
             <center>
         <div class="form-group mt-2 formulario1 col-12 col-md-10  m-auto"   >
          <a class="btn btn-block btn-md btn-info" href="tabla_entregas_vendedor.php"><i class="fa fa-folder-open" aria-hidden="true"></i>..<i class="fas fa-suitcase"></i> Entregas por Vendedor</a>
          </div>
          </div> 
         </center> 
              
    
           
            <div class=" col-12 col-md-4 form-group    ">      	
		    <form action="tabla_entregas_fec_ref.php" method="POST" class="formulario1   px-5  mt-3" name="login">
      <div class="form-group">
        <center><p class="fol" ><i class="fa fa-folder-open" aria-hidden="true"></i>Entrega por referencia y estado</p></center>
        <p >fecha inicial
        <input REQUIRED type="date" name="fechamin" class="usuario form-group" placeholder="fecha inicial"></p>
        <p >fecha final
        <input REQUIRED type="date" name="fechamax" class="usuario form-group" placeholder="fecha final"></p>
        <center> 

          <center>            
                 
                
           <select REQUIRED name="referencia" class="selectpicker" >
           <option value="" disabled selected>seleccione referencia</option>
    <?php
       
    $statement = $conexion->prepare('SELECT referencia FROM referencias ');
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row) {
      ?>
      
    
    <option value="<?php echo $row["referencia"]; ?>"><?php echo $row["referencia"]; ?></option>
    <?php
    } 
     ?> 
         
          <option value="todas">Todas</option>
                   
                </center> 
          
</center>
        <center><input class="btn  btn-sm btn-info mt-3"  type="submit" value="cargar" name="submit"/></center>
    
      </div>
       </form>
         </div>
       		   
          </div>                 
         
		    	<div class="row "> 

         <!--   <div class=" col-12 col-md-4 form-group   m-auto">  
			<form action="tabla_ped_fecha.php" method="POST" class="formulario1 mx-3 mt-2" name="login">
		
				<center><p class="fol" ><i class="fa fa-folder" aria-hidden="true"></i> pedidos por fecha</p></center><br>
				   <center> <p >fecha inicial
				     <input type="date" required name="fechamin" class=" usuario form-group usuario" placeholder="fecha inicial"></p>
				     <p >fecha final
           <input type="date" required name="fechamax" class=" usuario form-group usuario" placeholder="fecha final"></p></center>
				<center><input class="btn  btn-sm btn-info mt-2"  type="submit" value="cargar" name="submit"/></center>		

		</form> 
  </div> -->
		
		
          
            <div class=" col-12 col-md-4 form-group  m-auto ">
              <div class="form-group col-12 formulario1 mt-3">
       
		<a class="btn btn-block  btn-info" href="tabla_vendedores.php"><i class="fa fa-folder-open" aria-hidden="true"></i> consulta vendedor</a>
              
       </div>
       <div class="form-group col-12 formulario1">       
		<a class="btn btn-block  btn-info" href="tabla_clientes_admin.php"><i class="fa fa-folder-open" aria-hidden="true"></i> consulta clientes</a>
       </div>   
               
        
         <div class="form-group col-12 formulario1">         
		<a class="btn btn-block  btn-info" href="cerrar_admin.php"><i class="fa fa-folder-open" aria-hidden="true"></i> ingreso vendedores</a>
        </div>

        <div class="form-group col-12 formulario1">        
    <a class="btn btn-block  btn-info" href="views/referencia_view.php"><i class="fa fa-folder-open" aria-hidden="true"></i> ingreso referencias</a>
       </div>
     </div>
   <div class=" col-12 col-md-4 form-group  m-auto ">
        <div class="form-group col-12 formulario1 mt-3">        
    <a class="btn btn-block  btn-info" href="eliminar_referencia.php"><i class="fa fa-folder-open" aria-hidden="true"></i> eliminar referencias</a>
       </div>

       <div class="form-group col-12 formulario1">        
    <a class="btn btn-block  btn-info" href="index1.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Catalogo Colores/Variantes </a>
       </div>

        <div class="form-group col-12 formulario1">        
    <a class="btn btn-block  btn-info" href="subir.php"><i class="fa fa-folder-open" aria-hidden="true"></i> ingreso Colores/variantes</a>
       </div>

        <div class="form-group col-12 formulario1">        
    <a class="btn btn-block  btn-info" href="eliminar_color.php"><i class="fa fa-folder-open" aria-hidden="true"></i> eliminar Colores/variantes</a>
       </div>
          
        
     </div>
     <div class=" col-12 col-md-4 form-group  m-auto"">
         <form action="consulta_por_referencia.php" method="POST" class="formulario1 mt-2  " name="login">
			<div class="form-group px-4">
				<center><p class="fol" ><i class="fa fa-folder-open" aria-hidden="true"></i> Pedidos por fecha y ref</p></center>
				<center><p >fecha inicial
				<input REQUIRED type="date" name="fechamin" class=" usuario form-group usuario" placeholder="fecha inicial"></p>
				<p >fecha final
				<input REQUIRED type="date" name="fechamax" class=" usuario form-group usuario" placeholder="fecha final"></p></center>
				 <center>            
                 
                
           <select REQUIRED name="referencia" >
           <option value="" disabled selected>seleccione referencia</option>
    <?php
       
    $statement = $conexion->prepare('SELECT referencia FROM referencias ');
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row) {
      ?>
      
    
    <option value="<?php echo $row["referencia"]; ?>"><?php echo $row["referencia"]; ?></option>
    <?php
    } 
     ?>
          <option value="todas"];">Todas</option>         
                </center>
				<center><input class="btn  btn-sm btn-info mt-3 "  type="submit" value="cargar" name="submit"/></center>
		
			
	    	</form>
       
      </div>

    </div> 

   </div> 
        <center>
    <a class="btn  btn-sm btn-info mt-1" href="cerrar.php">Cerrar Sesion</a>
    </center><br>
    <br>
    <br> 
   
		</body>
</html>