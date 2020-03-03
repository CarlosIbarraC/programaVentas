<?php
   session_start();

       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }

    // $id_pedido = $_POST["numero_pedido"];
    // $id = $_POST["id"];
    // $referencia = $_POST["referencia"];    
    // $color = $_POST["color"];
    // $metros = $_POST["metros"];
    // $precio = $_POST["precio"];
    // $observaciones = $_POST["observaciones"];
        

     try {
      // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
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

    $item = $_SESSION['max'];

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
       }  
      $a,$b,$c,$d,$e,$f,$g;

    $statement1 = $conexion->prepare("INSERT INTO entregas(id_entrega, id_item, numero_pedido, cliente, referencia, color, metros, metros_e, precio, observaciones, fecha, estado) VALUES(null,'$b','$a','$c','$d','$e','$f',null,'$g',null,null,null)");
    $statement1->execute();
    $statement = $conexion->prepare("INSERT INTO clientes(id,vendedor,nombre,direccion,ciudad,telefono,observaciones) VALUES(null,'$vendedor','$nombre','$direccion','$ciudad','$telefono','$observaciones')");
    $statement->execute();

   if (($stament2)&&($statement1)) {
     header("location: form_pedidos.php");
      
    } 
    else{
      echo("INSERCION NO EXITOSA");
      echo $_SESSION['max'];
    }
 ?>      