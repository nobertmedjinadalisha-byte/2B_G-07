<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION['modo_escuro'] = isset($_POST['modo_escuro']);
    $_SESSION['notificacoes'] = isset($_POST['notificacoes']);

    $mensagem = "Configurações salvas com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Configurações</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Configurações</h1>

    <div>
        <a href="index.php">Dashboard</a>
        <a href="logout.php">Sair</a>
    </div>
</header>

<main style="padding:20px;">

    <h2>Configurações da Conta</h2>

    <p><strong>Usuário:</strong> <?php echo $_SESSION['usuario']; ?></p>

    <p><strong>Tipo:</strong> <?php echo $_SESSION['tipo']; ?></p>

    <?php
    if(isset($mensagem)){
        echo "<p style='color:green;'><strong>$mensagem</strong></p>";
    }
    ?>

    <form method="POST">

        <label>
            <input
                type="checkbox"
                name="notificacoes"
                <?php
                if(isset($_SESSION['notificacoes']) && $_SESSION['notificacoes']){
                    echo "checked";
                }
                ?>
            >
            Receber notificações
        </label>

        <br><br>

        <label>
            <input
                type="checkbox"
                name="modo_escuro"
                <?php
                if(isset($_SESSION['modo_escuro']) && $_SESSION['modo_escuro']){
                    echo "checked";
                }
                ?>
            >
            Ativar modo escuro
        </label>

        <br><br>

        <button type="submit">Salvar Configurações</button>

    </form>

</main>

</body>
</html>