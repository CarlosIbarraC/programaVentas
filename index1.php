<?php 
session_start();   
require 'conexion.php';
       if (isset($_SESSION['usuario'])) {
      
       }
              else{
                header('Location: index.php');
                  }      
         
	 $usuario = $_SESSION['usuario'];	 
$fotos_por_pagina = 24;
$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;

try {
	$datosBD= new Conexion;
	$conexion = new PDO($datosBD->host,$datosBD->usuario, $datosBD->pass);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$statement = $conexion->prepare("
	SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina
");

$statement->execute();
$fotos = $statement->fetchAll();

if (!$fotos) {
	header('Location: index1.php');
}

$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];

$total_paginas = ceil($total_post / $fotos_por_pagina);


require 'views/index.view.php';

?>