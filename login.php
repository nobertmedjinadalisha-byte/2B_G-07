<?php

session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario == "admin" && $senha == "123"){

    $_SESSION['usuario'] = "Administrador";
    $_SESSION['tipo'] = "admin";

}
elseif($usuario == "mod" && $senha == "123"){

    $_SESSION['usuario'] = "Moderador";
    $_SESSION['tipo'] = "mod";

}
else{

    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = "cliente";

}

header("Location: index.php");

?>