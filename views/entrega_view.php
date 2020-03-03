<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	  <link rel="stylesheet" href="css/estilos.css">
	   <link rel="stylesheet" href="css/bootstrap.min.css">
	   <style type="text/css">p{ font-size : 8px;}.form-control{ padding-bottom: 0px; padding-top: :0px;}</style>
	<title>modificar pedido</title>
</head>
<body>	
	<center>		
		<form action="ope_entrega.php" class="form-group" method="POST">	       
			<table class=" table  table-border table-hover table-sm table-responsive mb-4">
				<tbody>
				<tr>
                        <td bgcolor="LightSeaGreen " colspan="2"><center>
                    	
			item <input type="text"  name="id_item" readonly class="form-control" value="<?php echo $row['id_item'];?>"></center></td>
			<td bgcolor="LightSeaGreen" colspan="1" ><center>mts pedidos<input type="text" REQUIRED name="metros" readonly  class="form-control" value="<?php echo $row['metros'];?>"></center></td>
			<td bgcolor="LightSeaGreen " colspan="1"><center>mts entregados<input type="text" REQUIRED name="metros_e" readonly placeholder="entregado" class="form-control" value="<?php echo $row['metros_e'];?>"></center></td>     
            			   
			 <td colspan="1"><center>
			referencia<input type="text"  name="referencia" placeholder="referencia" class="form-control" value="<?php echo $row['referencia'];?>"></center></td>
			<td colspan="3"><center>
			color<input type="text"  name="color" placeholder="color"  class="form-control"value="<?php echo $row['color'];?>"></center></td>
			<td colspan="2"><center>precio<input type="text"  name="precio" placeholder="precio" class="form-control" value="<?php echo $row['precio'];?>"></center></td>
			
				<td><center>entrega<input type="number"  REQUIRED name="entrega" placeholder="entrega" class="form-control" value="<?php echo $row['entrega'];?>" ></center></td>
			  </tr>
			  <tr>
			  	
			<td colspan="3"><center> 
				         parcial<input type="radio" required name="estado" value="parcial">
                         total<input type="radio" required name="estado" value="total">
                         cancelado<input type="radio" required name="estado" value="cancelado">

                        </center></td>
			 
			  	
			 <td colspan="2"><center><input type="text"  name="observaciones" placeholder="observaciones" class="form-control" value="<?php echo $row['observaciones'];?>"></center></td>
			 <td colspan="3"><center><input type="text" readonly class="form-control" value="<?php echo $row['estado'];?>"></center></td> 

			<td><td colspan="1"><center><input  class="btn btn-xs btn-info" type="submit" class="form-control" value="modificar"/></td>
					<td> <a class="btn btn-xs btn-info" href="consulta_admin.php">volver</a>   </td> </td>
			  </tr>
			</tbody>
		    </table>

		</form>
	</center>
	
	
</body>
</html>