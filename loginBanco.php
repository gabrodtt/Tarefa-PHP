<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form action="" method="POST">
        <label>Usuário: </label>
        <input type="text" name="user" placeholder="Digite um usuario" value="<?php if (isset($_POST['user'])) echo $_POST["user"] ?>"><br><br>
        <label>Senha: </label>
        <input type="password" name="password" placeholder="Digite sua senha"><br><br>
        <input type="submit" name="acessar" value="Acessar"><br><br>
    </form>
    <?php

    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: paginaPrincipalBanco.php');
    }
    if (isset($_POST['acessar'])) {

        $user = $_POST['user'];
        $password = ($_POST['password']);
        $banco = new PDO('mysql:host=localhost;dbname=Tarefa', 'root', '');

        $query = $banco->prepare("SELECT * FROM users WHERE nmUsuario = :user AND dsSenha = :password");
        $query->bindValue(":user", $user);
        $query->bindValue(":password", "$password");
        $query->execute();
        $found = false;

        while ($userdb = $query->fetch(PDO::FETCH_ASSOC)) {
            if($user == $userdb['nmUsuario'] && $password == $userdb['dsSenha']){
                $_SESSION['user'] = $user;
                $found = true;
                header('Location: paginaPrincipalBanco.php');
            }  
        }

        if($found == false){ 
            echo "Usuário ou senha incorreta";
        }
    }


    ?>
</body>

</html>