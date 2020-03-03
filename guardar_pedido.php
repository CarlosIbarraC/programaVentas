<?php
   session_start();

       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }

    $id_pedido = $_POST["numero_pedido"];
    $id = $_POST["id"];
    $referencia = $_POST["referencia"];    
    $color = $_POST["color"];
    $metros = $_POST["metros"];
    $precio = $_POST["precio"];
    $observaciones = $_POST["observaciones"];
        

     try {      
      // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
       
    $statement = $conexion->prepare("INSERT INTO pedidos_ventas1 ( numero_pedido, id_pedido, id, referencia, color, metros, precio, observaciones, fecha ) VALUES ('$id_pedido',null,'$id','$referencia','$color','$metros','$precio','$observaciones',null  )");
    $statement->execute();

     $statement = $conexion->prepare("SELECT MAX(id_pedido) FROM pedidos_ventas1");
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row) {         
    $_SESSION['max']=$row[0];
       } 
     $id_ite =  $_SESSION['max'];

     $statement1 = $conexion->prepare("INSERT INTO entregas(id_entrega,id_item,numero_pedido,cliente,referencia,color,metros,precio,observaciones) VALUES(null,'$id_ite','$id_pedido','$id','$referencia','$color','$metros','$precio','$observaciones')");
    $statement1->execute();

   if ($statement) {
     $_SESSION["paso"]="paso";

     header("location: form_pedidos.php");
      
    } 
    else{
      echo("INSERCION NO EXITOSA");
    }
 ?>      