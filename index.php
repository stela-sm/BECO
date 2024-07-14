<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/login.css">
    <title>Login ADM </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-flex container-center">
        <div class="col-12 div-form">
    <form method="post" action="controller/controller.php">
        <h2>Olá, administrador!</h2><br/>
        <h6>Por Favor, insira seu email e senha</h6>
        <input type="hidden"  name="login_adm" value="1">
        <input type="text" placeholder="Email..." id="adm" name="adm"><br/>
        <input type="password" placeholder="Senha..." id="senha" name="senha"><br/><br/>
        <input type="submit" value="Entrar"/>
    </form>
    </form>    
    </div>
    </div>
    <?php
if(isset($_REQUEST["msg"])){
	$cod = $_REQUEST["msg"];
	require_once "model/msg.php";
	echo "<script>alert('" . $MSG[$cod] . "');</script>";
    unset($cod);
}

?>
</body>
</html>