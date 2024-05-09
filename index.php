<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ADM </title>
</head>
<body>
    <form method="post" action="controller/controller.php">
        <h2>Login Administrador:</h2><br/>
        <input type="hidden" name="login_adm" value="1">
        <label for="">Usuário:</label> 
        <input type="text" id="adm" name="adm"><br/>
        <label>Senha:</label>
        <input type="password" id="senha" name="senha"><br/><br/>
        <input type="submit" value="Entrar"/>
    </form>
    </form>    
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