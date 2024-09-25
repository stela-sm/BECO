<?php 
 session_start();
if(isset($_REQUEST["cookie"])){
    
 require "../model/manager.class.php";
 $manager = new Manager(); 
 
 require "../model/log.class.php";
 $log = new Log();
$cookie = $_COOKIE["ADM_ID"];
 $r = $manager-> admLoginID($_COOKIE["ADM_ID"]);
 $ip = $_SERVER['REMOTE_ADDR'];
     $log->setTexto("{$ip} - Login do administrador {$cookie}, via cookies, pelo dispositivo de ip {$ip}.\n");    $log->fileWriter();
     $_SESSION["ADM_ID"] = $r["ID_ADM"];
     $_SESSION["ADM_NOME"] = $r["nome"];
     $_SESSION["ADM_EMAIL"] = $r["email"];
     $_SESSION["ADM_PFP"] = $r["pfp"];
     $_SESSION["ADM_CPF"] = $r["cpf"];
     $_SESSION["ADM_CEP"] = $r["cep"];
     $_SESSION["ADM_RG"] = $r["rg"]; 
     $_SESSION["ADM_PODER"] = $r["poder"];
     $_SESSION["ADM_NUMERO"] = $r["numero"];
     $_SESSION["ADM_CELULAR"] = $r["celular"];
     $_SESSION["ADM_DATAN"] = $r["datan"];
     $_SESSION["ADM_ESTADO_CIVIL"] = $r["estado_civil"];
     ?>
        <form action="../view/index.php" id="return" method="post">
         <input type="hidden" name="msg" value="FR52">
       </form>
       <script>
         document.getElementById("return").submit();
       </script> <?php
}


if(isset($_REQUEST["login_adm"])){
            if((!isset($_REQUEST["adm"]) || $_REQUEST["adm"] == "") || (!isset($_REQUEST["senha"])) || $_REQUEST["senha"] == "" ){ //se algum dado do formulário de login estiver

                session_destroy();
                ?>
                            <form action="../index.php" name="form" id="myForm" method="get">
                            <input type="hidden" name="erro" value="FR01"><!--"FR01" => "Dado(s) não preenchido(s).",-->
                            </form> <!--envia um formulario com a variavel "msg", que é o código da mensagem de erro (ver view/msg.php) para o index--> 
                            <script>
                            document.getElementById('myForm').submit();//envio automático submit()
                            </script>  
                <?php
         }else{

            
 require "../model/ferramentas.class.php";
 $ferramentas = new Ferramentas();
 $resp[0] = $ferramentas->antiInjection($_REQUEST["adm"]);
 $resp[1] = $ferramentas->antiInjection($_REQUEST["senha"]);;

 for($i = 0;$i < 2;$i++){
    //print $resp[$i] . " - <br>"; 
   if($resp[$i] == 0){
        ?>
 <form action="../index.php" name="form" id="myForm" method="get">
 <input type="hidden" name="erro" value="FR01">
 </form> 
 <script>
 document.getElementById('myForm').submit();
 </script>   
        <?php
        exit();
    }
 }


 $dados["email"] = $_REQUEST["adm"];
 $senha = $_REQUEST["senha"];
 $senhaCript = $ferramentas->sha256($senha);
 $dados["senha"] = $senhaCript;

 require "../model/manager.class.php";
 $manager = new Manager();

// // verificar se e-mail existe

 $r = $manager-> admLogin($dados);

 require "../model/log.class.php";
 $log = new Log();


if($r["result"] == 0){
    $ip = $_SERVER['REMOTE_ADDR'];
     $log->setTexto("{$ip} - Erro no login do administrador {$dados['email']} pelo dispositivo de ip {$ip}.\n");
     $log->fileWriter();

     ?>
      <form action="../index.php" name="return" id="return" method="get">
      <input type="hidden" name="erro" value="BD00">
       </form>
        <script>
                  document.getElementById("return").submit();
        </script> 
     <?php
 }else{
     $ip = $_SERVER['REMOTE_ADDR'];
     $log->setTexto("{$ip} - Login do administrador {$dados['email']} pelo dispositivo de ip {$ip}.\n");    $log->fileWriter();

     setcookie("ADM_ID", $r["ID_ADM"], time() + (86400 * 30), "/", "", false, true); 
// gravar log de acesso
     $_SESSION["ADM_ID"] = $r["ID_ADM"];
     $_SESSION["ADM_NOME"] = $r["nome"];
     $_SESSION["ADM_EMAIL"] = $r["email"];
     $_SESSION["ADM_PFP"] = $r["pfp"];
     $_SESSION["ADM_CPF"] = $r["cpf"];
     $_SESSION["ADM_CEP"] = $r["cep"];
     $_SESSION["ADM_RG"] = $r["rg"]; 
     $_SESSION["ADM_PODER"] = $r["poder"];
     $_SESSION["ADM_NUMERO"] = $r["numero"];
     $_SESSION["ADM_CELULAR"] = $r["celular"];
     $_SESSION["ADM_DATAN"] = $r["datan"];
     $_SESSION["ADM_ESTADO_CIVIL"] = $r["estado_civil"];
     
 ?>
        <form action="../view/index.php" id="return" method="post">
         <input type="hidden" name="msg" value="FR52">
       </form>
       <script>
         document.getElementById("return").submit();
       </script> <?php
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
    <form action="../view/adm.php?success=1" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}


// DESATIVAR ACESSO //

if(isset($_REQUEST["desativar_user"])){

    $id = $_REQUEST["desativar_user"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> userStatus($id, '0');
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Acesso do usuário {$id} desativado\n");
$log->fileWriter();

?>
    <form action="../view/users.php?success=1" name="return" id="return" method="post">
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
    <form action="../view/adm.php?success=1" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}

if(isset($_REQUEST["reativar_user"])){

    $id = $_REQUEST["reativar_user"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> userStatus($id, '1');
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Acesso do usuario {$id} reativado\n");
$log->fileWriter();

?>
    <form action="../view/users.php?success=1" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}




if(isset($_REQUEST["excluir_adm"])){

    $id = $_REQUEST["excluir_adm"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> admExcluir($id);
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Exclusão do adminstrador {$id} ");
$log->fileWriter();

?>
    <form action="../view/adm.php?success=1" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}

if(isset($_REQUEST["excluir_user"])){

    $id = $_REQUEST["excluir_user"];
    
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> userExcluir($id);
require "../model/log.class.php";
$log = new Log();
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Exclusão do usuário {$id} ");
$log->fileWriter();

?>
    <form action="../view/users.php?success=1" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}





if(isset($_REQUEST["adm_update"])){
    
    $dados = [
        'id' => $_REQUEST['adm_update'],
        'nome' => $_REQUEST['nome'],
        'email' => $_REQUEST['email'],
        'celular' => $_REQUEST['celular'],
        'poder' => $_REQUEST['poder'],
        'data_nascimento' => $_REQUEST['data_nascimento'],
        'rg' => $_REQUEST['rg'],
        'estado_civil' => $_REQUEST['estado_civil'],
        'cep' => $_REQUEST['cep'],
        'numero' => $_REQUEST['numero'],
        'cpf' => $_REQUEST['cpf'],
        'obs' => $_REQUEST['obs']
    ];



    if(isset($_FILES["pfp"]["name"]) and $_FILES["pfp"]["name"]!=""){
        $img = $_FILES["pfp"];
        require_once "../model/ferramentas.class.php";
        $ferramentas = new ferramentas();
        $ext = $ferramentas->pegaExtensao($img["name"]);
        $newName = $ferramentas->geradorMicroTime() . "." . $ext;
        $dados["pfp"] = $newName;

        // echo "$newName";
    }else{
        $dados["pfp"] = $_REQUEST["old_pfp"];
    }
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> admUpdate($dados);

require "../model/log.class.php";

$id = $dados["id"];
if($r["result"]!=1){

    $log = new Log();    
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Falha na alteração de dados do adminstrador {$dados["id"]} ");
$log->fileWriter();
?>
<form action="../view/adm_view.php?id=<?php echo $id; ?>" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
</form>
<script>
    document.getElementById("return").submit();
</script>
<?php


}else{

    if(isset($_FILES["pfp"]["name"]) and $_FILES["pfp"]["name"]!="" ){
    $resp = move_uploaded_file($img["tmp_name"],"../assets/media/pfp/".$newName);
    $old_pfp = "../assets/media/pfp/".$_REQUEST["old_pfp"];
    unlink($old_pfp);
    }
}

?>
     <form action="../view/adm_view.php?id=<?php echo $id; ?>" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}




//USER UPDATE
if(isset($_REQUEST["user_update"])){
    
    $dados = [
        'id' => $_REQUEST['user_update'],
        'username' => $_REQUEST['username'],
        'nome' => $_REQUEST['nome'],
        'email' => $_REQUEST['email'],
        'celular' => $_REQUEST['celular'],
        'bio' => $_REQUEST['bio'],
        'data_nascimento' => $_REQUEST['data_nascimento'],
        'pais' => $_REQUEST['pais'],
        'estado' => $_REQUEST['estado'],
        'obs' => $_REQUEST['obs']
    ];


    if(isset($_FILES["pfp"]["name"]) and $_FILES["pfp"]["name"]!=""){
        $img = $_FILES["pfp"];
        require_once "../model/ferramentas.class.php";
        $ferramentas = new ferramentas();
        $ext = $ferramentas->pegaExtensao($img["name"]);
        $newName = $ferramentas->geradorMicroTime() . "." . $ext;
        $dados["pfp"] = $newName;

        // echo "$newName";
    }else{
        $dados["pfp"] = $_REQUEST["old_pfp"];
    }
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> userUpdate($dados);

require "../model/log.class.php";

$id = $dados["id"];
if($r["result"]!=1){

    $log = new Log();    
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Falha na alteração de dados do adminstrador {$dados["id"]} ");
$log->fileWriter();
?>
<form action="../view/user_view.php?id=<?php echo $id; ?>" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
</form>
<script>
    document.getElementById("return").submit();
</script>
<?php


}else{

    if(isset($_FILES["pfp"]["name"]) and $_FILES["pfp"]["name"]!="" ){
    $resp = move_uploaded_file($img["tmp_name"],"../assets/media/pfp/".$newName);
    $old_pfp = "../assets/media/pfp/".$_REQUEST["old_pfp"];
    unlink($old_pfp);
    }
}

?>
     <form action="../view/user_view.php?id=<?php echo $id; ?>" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}








if(isset($_REQUEST["adm_new"])){
    $img = $_FILES["pfp"];
    require_once "../model/ferramentas.class.php";
    $ferramentas = new ferramentas();
    $ext = $ferramentas->pegaExtensao($img["name"]);
    $newName = $ferramentas->geradorMicroTime() . "." . $ext;
    $resp = move_uploaded_file($img["tmp_name"],"../assets/media/pfp/".$newName);

    $senhaCript = $ferramentas->sha256("123456");
    $dados = array(
        "pfp" => $newName,
        "nome" => $_POST["nome"],
        "estadoCivil" => $_POST["estado"],
        "email" => $_POST["email"],
        "celular" => $_POST["celular"],
        "cpf" => $_POST["cpf"],
        "dataNascimento" => $_POST["data_nascimento"],
        "rg" => $_POST["rg"],
        "poder" => $_POST["poder"],
        "cep" => $_POST["cep"],
        "obs" => $_POST["obs"],
        "numero" => $_POST["numero"],
        "status" => "1",
        "senha" => $senhaCript
    );
    require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> admNew($dados);

require "../model/log.class.php";
if($r["result"]!=1){

    $log = new Log();    
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Falha na criação de um novo adm");
$log->fileWriter();
?>
<form action="../view/adm_new.php" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
</form>
<script>
    document.getElementById("return").submit();
</script>
<?php


}else{
    $log = new Log();    
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Criação do administrador ". $_POST["email"]);
    $log->fileWriter();

?>

    <form action="../view/adm.php" name="return" id="return" method="post">
    <input type="hidden" name="cod" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php


}

}


if(isset($_REQUEST["recuperar"])){
    
    $email = $_REQUEST["email"];
    require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> emailVerif($email);

if($r!=1){
    ?>
    <form action="../index.php" name="return" id="return" method="get">
    <input type="hidden" name="erro" value="OP50">
    </form>
    <script>
        document.getElementById("return").submit();
    </script>
<?php
}else{
    require('../mailer/mailer.php');
    $dados["pessoa"] = "Administrador";
    $dados["assunto"] = "Recuperação de senha";
    $dados["email"] = $email;

    $r = enviarEmail($dados);

    $_SESSION["email"] = "$email";
  ?>
   <form action="../index.php" name="return" id="return" method="get">
    <input type="hidden" name="form2" value=1>
    </form>
    <script>
        document.getElementById("return").submit();
    </script> 
<?php
}
}



if(isset($_REQUEST["verificar"])){
    $cod = $_REQUEST["codigo"];
    require "../model/manager.class.php";
    $manager = new Manager();
    $r = $manager-> verificar_cod($cod);
  
    if($r!=1){
        ?>
        <form action="../index.php" name="return" id="return" method="get">
        <input type="hidden" name="form2" value="OP50">
        </form>
        <script>
            document.getElementById("return").submit();
        </script>
    <?php
    }else{
        ?>
        <form action="../index.php" name="return" id="return" method="get">
        <input type="hidden" name="senha" value=1>
        </form>
        <script>
            document.getElementById("return").submit();
        </script>
    <?php
    }
}

    if(isset($_REQUEST["newpass"])){
        
        $senha = $_REQUEST["senha"];
        require "../model/ferramentas.class.php";
        $ferramentas = new Ferramentas();
        $senhaCript = $ferramentas->sha256($senha);
        require "../model/manager.class.php";
        $manager = new Manager();
        $email = $_SESSION["email"];
        $r = $manager-> alterarSenha($senhaCript, $email);
        require "../model/log.class.php";
        $log = new Log();    
        $ip = $_SERVER['REMOTE_ADDR'];
        $log->setTexto("{$ip} - Criação do administrador ". $_POST["email"]);
        $log->fileWriter();
     ?>
        <form action="../index.php?success=1" name="return" id="return" method="get">
        <input type="hidden" name="sucesso" value=1>
        </form>
        <script>
            document.getElementById("return").submit();
        </script>
    <?php
        echo "AAAAAAA";
        }
    
        if(isset($_REQUEST["newConcurso"])){
        
                            $img = $_FILES["img_anuncio"];
        
                            require_once "../model/ferramentas.class.php";
                            $ferramentas = new ferramentas();
                            $ext = $ferramentas->pegaExtensao($img["name"]);
                            $newNameAnuncio = $ferramentas->geradorMicroTime() . "." . $ext;
                            $resp = move_uploaded_file($img["tmp_name"],"../assets/media/concursos/".$newNameAnuncio);
                        

                            $img2 = $_FILES["img_banner"];                                                  
                            $ext2 = $ferramentas->pegaExtensao($img2["name"]);
                            $microtime = $ferramentas->geradorMicroTime();
                            $newNameBanner = $microtime + 1;
                            $newNameBanner = $newNameBanner . "." . $ext2;
                            $resp2 = move_uploaded_file($img2["tmp_name"],"../assets/media/concursos/".$newNameBanner);
                           
    
            $dados["title"] = $_REQUEST["title"];
            $dados["tag"] = $_REQUEST["tag"];
            $dados["descricao"] = $_REQUEST["descricao"];
            $dados["img_anuncio"] =  $newNameAnuncio;
            $dados["img_banner"] = $newNameBanner;
            $dados["data_inicio"] = $_REQUEST["data_inicio"];
            $dados["data_fim"] = $_REQUEST["data_fim"];
            require "../model/manager.class.php";
            $manager = new Manager();
            $manager->novoConcurso($dados);
            require "../model/log.class.php";
            $log = new Log();    
            $ip = $_SERVER['REMOTE_ADDR'];
            $log->setTexto("{$ip} - Novo concurso criado por ". $_SESSION["ADM_EMAIL"]);
            $log->fileWriter();
            ?>
            <form action="../view/developers.php?success=1" name="return" id="return" method="get">
            <input type="hidden" name="sucesso" value=1>
            </form>
            <script>
                document.getElementById("return").submit();
            </script>
        <?php
        }
        
if(isset($_REQUEST["newBanner"])){
        $img = $_FILES["img_banner_new"];
        require_once "../model/ferramentas.class.php";
        $ferramentas = new ferramentas();
        $ext = $ferramentas->pegaExtensao($img["name"]);
        $newName = $ferramentas->geradorMicroTime() . "." . $ext;
        $resp = move_uploaded_file($img["tmp_name"],"../assets/media/banner/".$newName);
        $dados["img"] = $newName;
        $dados["status"] = $_REQUEST["status"];
     require "../model/manager.class.php";
    $manager = new Manager();
    $manager->novoBanner($dados);
    require "../model/log.class.php";
    $log = new Log();    
    $ip = $_SERVER['REMOTE_ADDR'];
    $log->setTexto("{$ip} - Novo banner adicionado por ". $_SESSION["ADM_EMAIL"]);
    $log->fileWriter();
    ?>
    <form action="../view/developers.php?success=1" name="return" id="return" method="get">
    <input type="hidden" name="sucesso" value=1>
    </form>
    <script>
        document.getElementById("return").submit();
    </script>

<?php
}
       
if(isset($_REQUEST["excluir_banner"])){
 require "../model/manager.class.php";
$manager = new Manager();
$manager->excluirBanner($_REQUEST["excluir_banner"]);
require "../model/log.class.php";
$log = new Log();    
$ip = $_SERVER['REMOTE_ADDR'];
$log->setTexto("{$ip} - Banner excluido por ". $_SESSION["ADM_EMAIL"]);
$log->fileWriter();
?>
<form action="../view/developers.php?success=1" name="return" id="return" method="get">
<input type="hidden" name="sucesso" value=1>
</form>
<script>
    document.getElementById("return").submit();
</script>

<?php
}

       
if(isset($_REQUEST["excluir_concurso"])){
    require "../model/manager.class.php";
   $manager = new Manager();
   $manager->excluirConcurso($_REQUEST["excluir_concurso"]);
   require "../model/log.class.php";
   $log = new Log();    
   $ip = $_SERVER['REMOTE_ADDR'];
   $log->setTexto("{$ip} -Concurso excluido por ". $_SESSION["ADM_EMAIL"]);
   $log->fileWriter();
   ?>
   <form action="../view/developers.php?success=1" name="return" id="return" method="get">
   <input type="hidden" name="sucesso" value=1>
   </form>
   <script>
       document.getElementById("return").submit();
   </script>
   
   <?php
   }
       
?>
           
           