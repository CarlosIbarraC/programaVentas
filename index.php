<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: tabla_clientes.php');
} else {
	header('Location: login.php');
}

 ?>