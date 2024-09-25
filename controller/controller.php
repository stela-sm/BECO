<?php
session_start();


//login do usuário SEM COOKIES
if(isset($_REQUEST["login"])){
   
    if((!isset($_REQUEST["emailLogin"]) || $_REQUEST["senhaLogin"] == "")){ //se algum dado do formulário de login estiver vazio

        session_destroy();
        ?>
                    <form action="../view/login.php" name="form" id="myForm" method="get">
                    <input type="hidden" name="erro" value="Dados não preenchidos">
                    </form> <!--envia um formulario com a variavel "msg", que é o código da mensagem de erro (ver view/msg.php) para o index--> 
                    <script>
                    document.getElementById('myForm').submit();
                    </script>  
        <?php
 }else{

    
require_once "../model/ferramentas.class.php";
$ferramentas = new Ferramentas();
$resp[0] = $ferramentas->antiInjection($_REQUEST["emailLogin"]);
$resp[1] = $ferramentas->antiInjection($_REQUEST["senhaLogin"]);;

for($i = 0;$i < 2;$i++){
if($resp[$i] == 0){
?>
 <form action="../view/login.php" name="form" id="myForm" method="get">
<input type="hidden" name="erro" value="Comandos não permitidos">
</form> 
<script>
document.getElementById('myForm').submit();
</script>   
<?php
exit();
}
}


$dados["email"] = $_REQUEST["emailLogin"];
$senha = $_REQUEST["senhaLogin"];
$senhaCript = $ferramentas->sha256($senha);
$dados["senha"] = $senhaCript;

require_once "../model/manager.class.php";
$manager = new Manager();

// // verificar se os dados estão certos

$r = $manager-> userLogin($dados);

require_once "../model/log.class.php";
$log = new Log();


if($r["result"] == 0){
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Erro no login do usuario {$dados['email']} pelo dispositivo de ip {$ip}.\n");
$log->fileWriter();


?>
<form action="../view/login.php" name="return" id="return" method="get">
<input type="hidden" name="erro" value="Dados incorretos, por favor preencha novamente">
</form>
<script>
          document.getElementById("return").submit();
</script> 
<?php
}else{
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Login do usuario {$dados['email']} pelo dispositivo de ip {$ip}.\n");    $log->fileWriter();

setcookie("USER_ID", $r["ID_USER"], time() + (86400 * 30), "/", "", false, true); 
// gravar log de acesso
$_SESSION["USER_ID"] = $r["ID_USER"];
$_SESSION["USER_USERNAME"] = $r["username"];
$_SESSION["USER_NOME"] = $r["nome"];
$_SESSION["USER_CPF"] = $r["cpf"];
$_SESSION["USER_EMAIL"] = $r["email"];
$_SESSION["USER_CELULAR"] = $r["celular"];
$_SESSION["USER_DATAN"] = $r["data_nascimento"];
$_SESSION["USER_ESTADO"] = $r["estado"];
$_SESSION["USER_PAIS"] = $r["pais"];
$_SESSION["USER_PFP"] = $r["pfp"];
$_SESSION["USER_BIOGRAFIA"] = $r["biografia"];
$_SESSION["USER_DATAHORA"] = $r["datahora"];

?>
 <form action="../index.php" id="return" method="post">
 <input type="hidden" name="msg" value="FR52">
</form>
<script>
 document.getElementById("return").submit();
</script>
<?php 
}
}}




//cadastro novo usuário

if(isset($_REQUEST["cadastro"])){
 
    if((!isset($_REQUEST["nomeCadastro"]) || $_REQUEST["senhaCadastro"] == "") || (!isset($_REQUEST["cpfCadastro"]) || $_REQUEST["emailCadastro"] == "")){ //se algum dado do formulário de login estiver vazio

        session_destroy();
        ?>
                    <form action="../view/login.php" name="form" id="myForm" method="get">
                    <input type="hidden" name="erro" value="Dados não preenchidos">
                    </form> <!--envia um formulario com a variavel "msg", que é o código da mensagem de erro (ver view/msg.php) para o index--> 
                    <script>
                    document.getElementById('myForm').submit();
                    </script>  
        <?php
 }else{

//antinjection
    
    require_once "../model/ferramentas.class.php";
    $ferramentas = new Ferramentas();
    $resp[0] = $ferramentas->antiInjection($_REQUEST["emailCadastro"]);
    $resp[1] = $ferramentas->antiInjection($_REQUEST["senhaCadastro"]);
    $resp[1] = $ferramentas->antiInjection($_REQUEST["cpfCadastro"]);
    $resp[2] = $ferramentas->antiInjection($_REQUEST["nomeCadastro"]);
    
    for($i = 0;$i < 3;$i++){
    if($resp[$i] == 0){
    ?>
     <form action="../view/login.php" name="form" id="myForm" method="get">
    <input type="hidden" name="erro" value="Comandos não permitidos">
    </form> 
    <script>
    document.getElementById('myForm').submit();
    </script>   
    <?php
    exit();
    }
    }//sai do for do antinjection


    $dados["email"] = $_REQUEST["emailCadastro"];
    $dados["username"] = $_REQUEST["nomeCadastro"];
    $dados["cpf"] = $_REQUEST["cpfCadastro"];
    $senha = $_REQUEST["senhaCadastro"];
    $senhaCript = $ferramentas->sha256($senha);
    $dados["senha"] = $senhaCript;
    
    // var_dump($dados); dados chegando certinhos
    require_once "../model/manager.class.php";
    $manager = new Manager();
    
    // // verificar se os dados estão certos
    
    $r = $manager-> userCadastro($dados);
    
    require_once "../model/log.class.php";
    $log = new Log();
    
    var_dump($r);
    if($r["result"] == 0){
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Erro na Criação do usuario {$dados['email']} pelo dispositivo de ip {$ip}.\n");
    $log->fileWriter();
    
    
    ?>
    <form action="../view/login.php" name="return" id="return" method="get">
    <input type="hidden" name="erro" value="As informações são pertencentes a um usuário já existente, por favor tente novamente">
    </form>
    <script>
              document.getElementById("return").submit();
    </script>  
    <?php
    }else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Criação do usuario {$dados['email']} pelo dispositivo de ip {$ip}.\n");    $log->fileWriter();
    
    setcookie("USER_ID", $r["ID_USER"], time() + (86400 * 30), "/", "", false, true); 
    // gravar log de acesso
    $_SESSION["USER_ID"] = $r["result"];
    $_SESSION["USER_USERNAME"] = $dados["username"];
    $_SESSION["USER_CPF"] = $dados["cpf"];
    $_SESSION["USER_EMAIL"] = $dados["email"];
    
    ?>
      <form action="../index.php" id="return" method="post">
     <input type="hidden" name="msg" value="FR52">
    </form>
    <script>
     document.getElementById("return").submit();
    </script> 
    <?php 
    }
    }

}


//recuperação de senha do usuário


if(isset($_REQUEST["recuperar"])){
    
    $email = $_REQUEST["emailEsqueciSenha"];
    require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> emailVerif($email);

if($r!=1){
    ?>
    <form action="../view/login.php" name="return" id="return" method="get">
    <input type="hidden" name="erro" value="Usuário não encontrado">
    <input type="hidden" name="form_recuperar_resposta" value="recuperar_senha">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php
}else{
    require('../mailer/mailer.php');
    $dados["pessoa"] = "Usuário";
    $dados["assunto"] = "Recuperação de senha";
    $dados["email"] = $email;

    $r = enviarEmail($dados);

    $_SESSION["email"] = "$email";
  ?>
    <form action="../view/login.php" name="return" id="return" method="get">
    <input type="hidden" name="form_recuperar_resposta" value="confirmacao_codigo">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>  
<?php
}
}



if(isset($_REQUEST["verificar"])){
    $cod = $_REQUEST["codigoVerificacao"];

    $code1 = $_REQUEST['code1'];
    $code2 = $_REQUEST['code2'];
    $code3 = $_REQUEST['code3'];
    $code4 = $_REQUEST['code4'];
    $code5 = $_REQUEST['code5'];
    $code6 = $_REQUEST['code6'];
    $cod = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;
    
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $r = $manager-> verificar_cod($cod);
    var_dump($r);
  
    if($r!=1){
        ?>
        <form action="../view/login.php?erro='Código inválido ou expirado'" name="return" id="return" method="get">        
    <input type="hidden" name="form_recuperar_resposta" value="confirmacao_codigo">
        </form>
        <script>
            document.getElementById("return").submit();
        </script>   
    <?php
    }else{
        ?>
        <form action="../view/login.php?success=1" name="return" id="return" method="get">
        <input type="hidden" name="form_recuperar_resposta" value="nova_senha">
        </form>
        <script>
            document.getElementById("return").submit();
        </script>  
    <?php
    }
}

    if(isset($_REQUEST["newpass"])){
        $senha = $_REQUEST["senhaEsqueciSenha"];
        require_once "../model/ferramentas.class.php";
        $ferramentas = new Ferramentas();
        
    var_dump($_SESSION);
        $senhaCript = $ferramentas->sha256($senha);
        require_once "../model/manager.class.php";
        $manager = new Manager();
        $email = $_SESSION["email"];
        $r = $manager-> alterarSenha($senhaCript, $email);
        
        require_once "../model/log.class.php";
        $log = new Log();    
        $ip = $_SERVER['REMOTE_ADDR'];
        $log->setTexto("{$ip} -Alteração de senha do usuário ". $_SESSION["email"]);
        $log->fileWriter();
     ?>
        <form action="../view/login.php" name="return" id="return" method="get">
        <input type="hidden" name="form_recuperar_resposta" value="login">
        <input type="hidden" name="success" value="Senha alterada com sucesso!">
        </form>
        <script>
            document.getElementById("return").submit();
        </script> 
    <?php
        }
?>