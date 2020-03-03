<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	<Script Language="JavaScript"> 
function FechaP() { 
var hora = new Date() 
var hrs = hora.getHours(); 
var min = hora.getMinutes(); 
var hoy = new Date(); 
var m = new Array(); 
var d = new Array() 
var an= hoy.getYear(); 
m[0]="Enero"; m[1]="Febrero"; m[2]="Marzo"; 
m[3]="Abril"; m[4]="Mayo"; m[5]="Junio"; 
m[6]="Julio"; m[7]="Agosto"; m[8]="Septiembre"; 
m[9]="Octubre"; m[10]="Noviembre"; m[11]="Diciembre"; 
document.write(" (  "+hrs+":"+min+" del "); 
document.write(hoy.getDate()); 
document.write(" de "); 
document.write(m[hoy.getMonth()]); 
document.write(")"); 
} 
</Script> 
	<title>Guardar</title>
</head>
<body>
	<center>

		<H1>TALONARIO DIGITAL NERPEL</H1>
		<?php 
		session_start(); 		
        if(isset($_SESSION['usuario'])){	
    }else{
	header('location: login.php');
    }      
       	$id = $_SESSION['cliente'];
       	$vend = $_SESSION['usuario'] ;     
      
		try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare('SELECT* FROM clientes WHERE id=:id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
			
		 ?>
		   <table bgcolor="#fff" border="#000">
		<thead>
			<tr>				
				
				<th colspan="10"> vendedor: <?php echo $vend;?></th>
			</tr>
			<tr>				
				<th colspan="10"> cliente </th>
				
			</tr>
		</thead>
			<tbody>
			<tr>
				<td>nombre</td>				
				<td>direccion</td>
				<td>telefono</td>
				<td>ciudad</td>			
            </tr>
			<tr>
			<td><h4 class="til"><?php echo $row['nombre'];?></h4></td>
			<td><h4 class="til"><?php echo $row['direccion'];?></h4></td>			
			<td><h4 class="til"><?php echo $row['telefono'];?></h4></td>
			<td><h4 class="til"><?php echo $row['ciudad'];?></h4></td> 
			</tr>		
			
		</form>
		<?php 
	}

		 ?>
		<br>
	</center>
	<center>
	<table bgcolor="#fff" border="#000">
		<thead>
			<tr>
				
				<th colspan="10"> lista pedido<script> 
FechaP(); 
</script> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>n-pedido</td>
				<td>id-item</td>				
				<td>referencia</td>
				<td>color</td>
				<td>metros</td>
				<td>precio</td>
				<td>observaciones</td>				
				<td colspan="2" ><center>edicion</center></td>
		
		
	    <?php
        $statement = $conexion->prepare('SELECT MAX(numero_pedido) FROM pedidos');
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row1) {	 
        $_SESSION['n_pedido'] = $row1[0];	}


        $y = $_SESSION ['n_pedido'];
	    $x = $_SESSION ['upedido'];	
        
	    $statement = $conexion->prepare('SELECT * FROM pedidos_ventas1 WHERE id= :vend AND id_pedido > :ped');
		$statement->execute(array(':vend'=> $id,':ped'=>$x));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {    	    

		
	 ?>

   <tr>
   	<td><?php echo $y; ?></td>
   	<td><?php echo $row["id_pedido"]; ?></td>
   
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["precio"]; ?></td>
   	<td><?php echo $row["observaciones"]; ?></td>
   	
   	<td><a href="modificar_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
   	<td><a href="eliminar_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
   	 
   </tr>

   <?php
     }
       ?>  
  

      </tbody>
	</table>
  </center>
	
	<center>
		<form action="guardar_pedido.php?" method="POST">
			<br><br>
            <input type="hidden"  name="id"  value="<?php echo $id; ?>" readonly>
             <input type="hidden"  name="numero_pedido" value="<?php echo $y; ?>" readonly> 	
		<tbody>	
			
  <select REQUIRED name="referencia">
  	<option value="" disabled selected>SELECCIONE LA REFERENCIA</option>
    <option value="1919">1989</option>
    <option value="1187">1187</option>
    <option value="1185">1185</option>
    <option value="1188">1188</option>
    <option value="1178">1178</option>
    <option value="1919">1919</option>
    <option value="1183">1183</option>
    <option value="1181">1181</option>
    <option value="1180">1180</option>
    <option value="1320">1320</option>
    <option value="1182">1182</option>
    <option value="1499">1499</option>
    <option value="1184">1184</option>
    <option value="1186">1186</option>
    <option value="1292">1292</option>
    <option value="1714">1714 </option>
  </select>

			<input type="text" REQUIRED name="color" placeholder="color" value=""><br>
			<input type="number" REQUIRED name="metros" placeholder="metros" value=""><br>
			<input type="number" REQUIRED name="precio" placeholder="precio" value=""><br>
			<input type="text"  name="observaciones" placeholder="observaciones" value=""><br>
			<input class="inp"  type="submit" value="GUARDAR" name="submit"/>
		
		</form>
	</center>
	<CENTER>
		<a class="inp" href="cerrar.php"><center>Cerrar Sesion</center></a>
		<a class="inp" href="tabla_clientes.php"><center>clientes</center></a>
	</CENTER>
 </body>
</html>