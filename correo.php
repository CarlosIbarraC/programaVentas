<?php 
session_start();

$cliente = $_SESSION['nom'] ;
$vendedor = $_SESSION['usuario'] ;
$id =$_GET['variable'];
$paso = $_SESSION['paso'];

if ($paso =='paso') {
	

if ($id == 'clientes' ){


$enviar_a = "<ceibarra1@gmail.com>,<bodega@nerpelsas.com>,<asiscomercial@nerpelsas.com>,<gerencia@nerpelsas.com>";
/*$enviar_a ='<ceibarra1@gmail.com>',' '<bodega@nerpelsas.com>','<asiscomercial@nerpelsas.com>','<gerencia@nerpelsas.com>';*/
$asunto ="pedido de: $cliente";
$mensaje ="pedido enviado por: $vendedor \n";
$mensaje .="despachar a: $cliente\n";
$mensaje .="mensaje enviado automaticamente para Nerpel";
mail($enviar_a, $asunto, $mensaje);


	header('Location:tabla_clientes.php');


}else{

$enviar_a = "<ceibarra1@gmail.com>,<bodega@nerpelsas.com>,<asiscomercial@nerpelsas.com>,<gerencia@nerpelsas.com>,<marthaceciliamosquerap@gmail.com>";

// $enviar_a = '<ceibarra1@gamail.com>','<bodega@nerpelsas.com>','<asiscomercial@nerpelsas.com>','<gerencia@nerpelsas.com>',' <marthaceciliamosquerap@gmail.com>';

$asunto ="pedido de: $cliente";
$mensaje="De:$vendedor\n";
$mensaje .="pedido enviado por: $vendedor \n";
$mensaje .="despachar a: $cliente\n ";
$mensaje .="mensaje enviado automaticamente para Nerpel";
mail($enviar_a, $asunto, $mensaje);


	header('Location:cerrar.php');
}
}
elseif ($id== 'clientes' ) {
	header('Location:tabla_clientes.php');
}else{

header('Location:cerrar.php');
}

 ?>