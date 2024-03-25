<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="login_section">
    <h1>Login</h1>
    <form action="controller/controller.php?action=login" method="post">
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email_label"><br><br>
    <label for="senha">Senha:</label><br>
    <input type="password" name="senha" id="senha_label"><br><br>
    <input type="submit" value="Logar">
    </form> <br>
    <button type="button">Não tenho Login</button>
    </section>
    <?php

if(isset($_REQUEST["cod"])){

 $cod = $_REQUEST["cod"];
 require_once "model/msg.php";
echo "<script>alert('" . $MSG[$cod] . "');</script>";

}

?>
</body>
</html>