<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('Location: loginBanco.php');
    }
    if (!isset($_SESSION['user'])) {
        header('Location: loginBanco.php');
    }
    ?>
    <form action="" method="GET">
        <button type="submit" name="logout">Sair</button>
    </form>
    <h1>Conteúdo Principal</h1>
</body>

</html>