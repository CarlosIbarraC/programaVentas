<?php
   session_start();

       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  } 
        
     try {
     
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
       
    $statement = $conexion->prepare("SELECT MAX(id_pedido) FROM pedidos_ventas1");
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row) {         
    $_SESSION['max']=$row[0];
       } 

   

      $statement2=$conexion->prepare("SELECT*FROM pedidos_ventas1 where(id_pedido=$item)");      
      $statement2->execute();
      $resultado2 = $statement2->fetchAll();
      foreach ($resultado2 as $row1) {
        
        $a=$row1[0];
        $b=$row1[1];
        $c=$row1[2];
        $d=$row1[3];
        $e=$row1[4];
        $f=$row1[5];
        $g=$row1[6];
        $h=$row1[7];
        $i=$row1[8];
       }  
      

    $statement1 = $conexion->prepare("INSERT INTO entregas(id_entrega,id_item,numero_pedido,cliente,referencia,color,metros,precio) VALUES(null,'$b','$a','$c','$d','$e','$f','$g')");
    $statement1->execute();
   
   if ($statement1) {
    


     header("location: form_pedidos.php");
      
    } 
    else{
      echo("INSERCION NO EXITOSA");
      echo $_SESSION['max'];
    }
 ?>      