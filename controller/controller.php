<?php 
 session_start();

if(isset($_REQUEST["login_adm"])){
            if((!isset($_REQUEST["adm"]) || $_REQUEST["adm"] == "") || (!isset($_REQUEST["senha"])) || $_REQUEST["senha"] == "" ){ //se algum dado do formulário de login estiver

                session_destroy();
                ?>
                            <form action="../index.php" name="form" id="myForm" method="POST">
                            <input type="hidden" name="msg" value="FR01"><!--"FR01" => "Dado(s) não preenchido(s).",-->
                            </form> <!--envia um formulario com a variavel "msg", que é o código da mensagem de erro (ver view/msg.php) para o index--> 
                            <script>
                            document.getElementById('myForm').submit();//envio automático submit()
                            </script>  
                <?php
            }else{


            
require "../model/ferramentas.class.php";
$ferramentas = new Ferramentas();
$resp[0] = $ferramentas->antiInjection($_POST["adm"]);
$resp[1] = $ferramentas->antiInjection($_POST["senha"]);;

for($i = 0;$i < 2;$i++){
    //print $resp[$i] . " - <br>"; 
    if($resp[$i] == 0){
        ?>
 <form action="../index.php" name="form" id="myForm" method="POST">
 <input type="hidden" name="msg" value="FR01">
 </form> 
 <script>
 document.getElementById('myForm').submit();
 </script>  
        <?php
        exit();
    }
}


$email = $_REQUEST["adm"];
$senha = $_REQUEST["senha"];
$senhaCript = $ferramentas->sha256($senha);

$dados["email"] = $email;
$dados["senha"] = $senhaCript;

require "../model/manager.class.php";
$manager = new Manager();

// verificar se e-mail existe

$r = $manager-> admLogin($dados);

require "../model/log.class.php";
$log = new Log();



if($r["result"] == 0){
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Erro no login do administrador {$dados['email']} pelo dispositivo de ip {$ip}.\n");
    $log->fileWriter();

    ?>
        <form action="../index.php" name="return" id="return" method="post">
        <input type="hidden" name="cod" value="BD00">
        </form>
        <script>
            document.getElementById("return").submit();
        </script>
    <?php
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Login do administrador {$dados['email']} pelo dispositivo de ip {$ip}.\n");    $log->fileWriter();
    // gravar log de acesso
    $_SESSION["ADM_ID"] = $r["ID_ADM"];
    $_SESSION["ADM_NOME"] = $r["nome"];
    $_SESSION["ADM_EMAIL"] = $r["email"];
    ?>
        <form action="../view/index.php" id="return" method="post">
        <input type="hidden" name="msg" value="FR52">
        </form>
        <script>
            document.getElementById("return").submit();
        </script>
    <?php
}
            }}




// DESATIVAR ACESSO //

if(isset($_REQUEST["desativar_adm"])){

    $id = $_REQUEST["desativar_adm"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> admStatus($id, '0');
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Acesso do adminstrador {$id} desativado\n");
$log->fileWriter();

?>
    <form action="../index.php" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}






if(isset($_REQUEST["reativar_adm"])){

    $id = $_REQUEST["reativar_adm"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> admStatus($id, '1');
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Acesso do adminstrador {$id} reativado\n");
$log->fileWriter();

?>
    <form action="../index.php" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}

?>
           