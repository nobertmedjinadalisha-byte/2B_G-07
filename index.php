<?php
session_start();

$tema = "";

if(isset($_SESSION['modo_escuro']) && $_SESSION['modo_escuro']){
    $tema = "dark";
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="<?php echo $tema; ?>">

<header>

<?php if(!isset($_SESSION['usuario'])){ ?>


<h1>Sistema Dashboard</h1>

<form action="login.php" method="POST">
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>


<?php } else { ?>


<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?></h1>

<div>
    <a href="configuracoes.php">Configurações</a>
    <a href="logout.php">Sair</a>
</div>


<?php } ?>

</header>

<div class="container">

<?php if(isset($_SESSION['usuario'])){ ?>

<aside>

<?php
if($_SESSION['tipo'] == "admin"){
?>


<h3>Menu Administrador</h3>

<ul>
    <li>Usuários</li>
    <li>Relatórios</li>
    <li>Configurações</li>
</ul>


<?php
}
elseif($_SESSION['tipo'] == "mod"){
?>


<h3>Menu Moderador</h3>

<ul>
    <li>Aprovar Conteúdos</li>
    <li>Gerenciar Comentários</li>
    <li>Denúncias</li>
</ul>

<?php
}
else{
?>


<h3>Menu Cliente</h3>

<ul>
    <li>Meu Perfil</li>
    <li>Pedidos</li>
    <li>Suporte</li>
</ul>


<?php
}
?>

</aside>

<?php } ?>

<main>

<?php
if(isset($_SESSION['notificacoes']) && $_SESSION['notificacoes']){
    echo "<div style='background:lightgreen;padding:10px;margin-bottom:15px;'>
            Você possui novas notificações!
          </div>";
}
?>

<?php

if(!isset($_SESSION['usuario'])){
?>


<h2>Página Pública</h2>

<p>Esta é uma área livre para visitantes.</p>


<?php
}
elseif($_SESSION['tipo'] == "admin"){
?>

<h2>Painel do Administrador</h2>

<p>Área exclusiva para gerenciamento do sistema.</p>


<?php
}
elseif($_SESSION['tipo'] == "mod"){
?>


<h2>Painel do Moderador</h2>

<p>Área responsável pela moderação do sistema.</p>


<?php
}
else{
?>


<h2>Painel do Cliente</h2>

<p>Área exclusiva para clientes.</p>


<?php
}
?>

</main>

</div>

</body>
</html>
