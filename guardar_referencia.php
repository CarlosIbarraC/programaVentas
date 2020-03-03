<?php
   session_start();

       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }

    $referencia = $_POST["referencia"];   
        

     try {
      // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
       
    $statement = $conexion->prepare("INSERT INTO referencias ( id_ref, referencia) VALUES (null,'$referencia' )");
    $statement->execute();

   if ($statement) {
     header("location: consulta_admin.php");
      
    } 
    else{
      echo("INSERCION NO EXITOSA");
    }
 ?>      