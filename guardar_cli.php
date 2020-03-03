     
 <?php
 session_start();

  $_SESSION['admin'];

  $amd = $_SESSION['admin'];

       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }

    $vendedor = $_POST["vendedor"];
    $nombre = $_POST["nombre"];  
    $nit  = $_POST["nit"];
     $direccion = $_POST["direccion"];
      $ciudad = $_POST["ciudad"];
       $telefono = $_POST["telefono"];
       $observaciones = $_POST["observaciones"];
   
   try {
    
     $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage ();  }
       
    $statement = $conexion->prepare("INSERT INTO clientes(id,vendedor,nombre,nit,direccion,ciudad,telefono,observaciones) VALUES(null,'$vendedor','$nombre','$nit','$direccion','$ciudad','$telefono','$observaciones')");
    $statement->execute();

    

   if (($statement)&&($amd)) {
       
       
         header("location: tabla_clientes_admin.php");
      }
      elseif ($statement) {
       
     
   	 header("location: tabla_clientes.php");
    	
    } 

    else{
    	echo("INSERCION NO EXITOSA");
    }

 
 ?> 