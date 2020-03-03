	    <?php
       session_start();
        if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }
	    
     $id = $_REQUEST['id'];
      
    
     try {
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
       
   

		$statement = $conexion->prepare(" SELECT MAX(id_pedido) 
              from pedidos_ventas1 ");
     $statement->execute();
     $resultado = $statement->fetchAll();
     foreach ($resultado as $row ) {
       $_SESSION['upedido'] = $row[0];
     }
         
	
				 ?> 
         <?php
       $statement1 = $conexion->prepare("INSERT INTO pedidos(id_cliente) VALUES('$id')");     
        
        $statement1->execute(); 

          ?>
        <?php
        $statement = $conexion->prepare('SELECT MAX(numero_pedido) FROM pedidos');
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row1) {  
        $_SESSION['n_pedido'] = $row1[0];
          }
     
        $_SESSION['cliente']= $id; 
           
          header("location: form_pedidos.php");
         ?>