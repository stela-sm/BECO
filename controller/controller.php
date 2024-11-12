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
$resp[1] = $ferramentas->antiInjection($_REQUEST["senhaLogin"]);

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
    
   // var_dump($r);
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
    
    setcookie("USER_ID", $r['id'], time() + (86400 * 30), "/", "", false, true); 
    // gravar log de acesso
    $_SESSION["USER_ID"] = $r["id"];
    $_SESSION["USER_USERNAME"] = $dados["username"];
    $_SESSION["USER_CPF"] = $dados["cpf"];
    $_SESSION["USER_EMAIL"] = $dados["email"];
    $_SESSION["USER_PFP"] = "nopfp.jpg";
    $_SESSION["USER_BIOGRAFIA"] = "Olá!";
    $_SESSION["USER_NOME"] = "beco_user";
    
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
    //var_dump($r);
  
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
        
   // var_dump($_SESSION);
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

        if(isset($_REQUEST["loadposts"])){
            header('Content-Type: application/json');
            require_once "../model/manager.class.php";
            $manager = new Manager();
            $page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 0;
            $search = $_REQUEST['search'];
            $limit = 8;  // Define quantos posts serão carregados por vez
            $offset = $page;
            $con = "none";
            $posts = $manager->getAllPosts($limit, $offset, $search, $con);
            $posts["offset"] = "essa porra".$page;

            $posts['search'] =  $_REQUEST['search'];;
            echo json_encode($posts);
           
        }

        if(isset($_REQUEST["loadconcurso"])){
            header('Content-Type: application/json');
            require_once "../model/manager.class.php";
            $manager = new Manager();
            $page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 0;
            $search = $_REQUEST['search'];
            $limit = 8;  // Define quantos posts serão carregados por vez
            $offset = $page;
            $con = $_REQUEST["concurso"];
            $posts = $manager->getAllPosts($limit, $offset, $search, $con);
            $posts["offset"] = "essa porra".$page;

            echo json_encode($posts);
           
        }
        if(isset($_REQUEST["getpost"])){
    header('Content-Type: application/json');
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $posts = $manager->getPost($_REQUEST["id"]);
     $posts["postagem"]["software"] = $manager->getSoftware($posts["postagem"]["software"]);
    echo json_encode($posts);
}



if(isset($_REQUEST["editar_user"])){
   

    
require_once "../model/ferramentas.class.php";
$ferramentas = new Ferramentas();
$resp[0] = $ferramentas->antiInjection($_REQUEST["username_edit"]);
$resp[1] = $ferramentas->antiInjection($_REQUEST["nickname_edit"]);
$resp[2] = $ferramentas->antiInjection($_REQUEST["bio_edit"]);
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
}
if(isset($_FILES["changeProfilePhoto"]['name']) && !empty($_FILES["changeProfilePhoto"]['name'])){
   // var_dump($_FILES);
   // var_dump($_SESSION);
    $img = $_FILES["changeProfilePhoto"];
    move_uploaded_file($img['tmp_name'], "../assets/media/pfp/" . $img['name']);
    if($_SESSION["USER_PFP"]!== "nopfp.jpg"){$antigo = "../assets/media/pfp/".$_SESSION["USER_PFP"];
    unlink($antigo);}
    $dados["pfp"] = $img['name'];
    $_SESSION["USER_PFP"] = $dados["pfp"];
}
            $dados["id"] = $_SESSION["USER_ID"];
            $dados["username"] = !empty($_REQUEST["username_edit"]) ? $_REQUEST["username_edit"] : $_SESSION["USER_USERNAME"];
            $dados["nickname"] = !empty($_REQUEST["nickname_edit"]) ? $_REQUEST["nickname_edit"] : $_SESSION["USER_NOME"];
            $dados["biografia"] = !empty($_REQUEST["bio_edit"]) ? $_REQUEST["bio_edit"] : $_SESSION["USER_BIOGRAFIA"];
          //   var_dump($dados);
            require_once "../model/manager.class.php";
            $manager = new Manager();
            $edit = $manager->editUser($dados);
            require_once "../model/log.class.php";
            if($edit["result"]==1){
                $_SESSION["USER_USERNAME"] = $dados["username"];
                $_SESSION["USER_NOME"] = $dados["nickname"];
                $_SESSION["USER_BIOGRAFIA"] = $dados["biografia"];
                
                $log = new Log();    
            $ip = $_SERVER['REMOTE_ADDR'];
            $log->setTexto("{$ip} -Alteração dos dados do do usuário ". $_SESSION["USER_EMAIL"]);
            $log->fileWriter();
            ?>
            <form action="../view/configuracoes.php" name="return" id="return" method="get">
            <input type="hidden" name="success" value="Dados alterados com sucesso!">
            <input type="hidden" name="configperfil" value="1">
            </form>
            <script>

                document.getElementById("return").submit();
            </script>    
        <?php
            }}


            if(isset($_REQUEST["checkUsername"])){
                header('Content-Type: application/json');
                require_once "../model/manager.class.php";
                $manager = new Manager();
                $check = $manager->checkUsername($_REQUEST["user"]);
                 echo json_encode($check);
            }

        
if(isset($_REQUEST["selectComent"])){

    header('Content-Type: application/json');
        $id=$_REQUEST["id_post"];
     
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $comentarios = $manager-> showComent($id);
    $response = [
        'number' => count($comentarios),
        'comentarios' => $comentarios
    ];
    echo json_encode($response);
    }
    
if(isset($_REQUEST["coment"])){
    $dados["user"]=$_REQUEST["id_user"];
    $dados["post"]=$_REQUEST["id_post"];
    $dados["texto"]=$_REQUEST["coment"];
    
require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> inserirComent($dados);
}


    if (isset($_REQUEST['checkLike'])) {
        
    $id_post = $_POST['id_post'];
    $id_user = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : 0;
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $result = $manager->checkLike($id_user, $id_post);
    $result2= $manager -> checkSave($id_user, $id_post);
    if($result == 0){$result="no-liked";}
    else{$result="liked";};
    if($result2 == 0){$result2="no-saved";}else{$result2="saved";}
        $r["like"] = $result;
        $r["save"] = $result2;
    echo json_encode($r);
}elseif (isset($_REQUEST['checkLike']) && !isset($_SESSION['USER_ID'])) {
    $result = "no-liked";
    echo json_encode($result);
}




if(isset($_REQUEST["like"])){
    $dados["id_user"]=$_REQUEST["id_user"];
    $dados["id_post"]=$_REQUEST["id_post"];
    
require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> like($dados);

echo json_encode($r);
}




if(isset($_REQUEST["save"])){
    $dados["id_user"]=$_REQUEST["id_user"];
    $dados["id_post"]=$_REQUEST["id_post"];
    
require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> save($dados);

echo json_encode($r);
}

//função pra mídia temporária
if (isset($_REQUEST['temp_midia'])) {
    $img = $_FILES['file'];        
    // Mova o arquivo para a pasta desejada
    if (move_uploaded_file($img['tmp_name'], "../assets/media/temp_midia/" . $img['name'])) {
        echo "Arquivo enviado com sucesso: " . $img['name'];
    } else {
        echo "Falha ao mover o arquivo.";
    }
} 

if (isset($_REQUEST['temp_ativos'])) {
    $img = $_FILES['file'];        
    // Mova o arquivo para a pasta desejada
    if (move_uploaded_file($img['tmp_name'], "../assets/media/temp_ativos/" . $img['name'])) {
        echo "Arquivo enviado com sucesso: " . $img['name'];
    } else {
        echo "Falha ao mover o arquivo.";
    }
}









//função de criar post
if(isset($_REQUEST['criarPost']) && isset($_SESSION['USER_ID'])){
    $dados["id_user"] = $_SESSION['USER_ID'];
    $dados["titulo"] = $_REQUEST['ttlPortifolio'];
    if(isset($_REQUEST['store'])){
        $dados['direcionamento'] = '1';
        $dados['valor'] = $_REQUEST['precoPost'];
        $dados['licenca'] = $_REQUEST['licenca'];
        $dados['banco'] = $_REQUEST['banco_produto'];
        $dados['agencia'] = $_REQUEST['agencia_produto'];
        $dados['conta'] = $_REQUEST['conta_produto'];
    }elseif(isset($_REQUEST['service'])){
        $dados['direcionamento'] = '2';
        $dados['ETA'] = 'tempoEntrega';
        $dados['precoInicial'] = 'precoInicial';
    }
    $dados["descricao"] = $_REQUEST['descricaoPortifolio'];
    $dados["software"] = $_REQUEST['software'];
    require_once "../model/ferramentas.class.php";
            $ferramentas = new ferramentas();
            $ext = $ferramentas->pegaExtensao($_FILES['thumbnail']['name']);
            $newName = $ferramentas->geradorMicroTime() . "." . $ext;
    $dados["thumbnail"] = $newName;
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../assets/media/thumbnail/" . $newName);
   
    
    if (!empty($_REQUEST['tagsCheck'])) {
        $inputs = $_REQUEST['tagsCheck'];
        $i = 0;
        $tagsString = '';
                                 foreach ($inputs as $input) {
                                     $tagsString .= $input . ' ';
                                     $dados['tags'][$i] = $input; 
                                     $i++;
                                }
                                $tagsString = trim($tagsString);
                                $dados["descricao"] = $dados["descricao"] .' '. $tagsString;

      
    } else {
        echo "Nenhum input foi enviado.";
    }


    if (!empty($_REQUEST['imagemPort'])) {
        $inputs = $_REQUEST['imagemPort'];
        $i = 0;
        foreach ($inputs as $input) { 
            $file = $input; // Nome do arquivo que você salvou

            $sourcePath = '../assets/media/temp_midia/' . $file; // Caminho original
            require_once "../model/ferramentas.class.php";
            $ferramentas = new ferramentas();
            $ext = $ferramentas->pegaExtensao($file);
            $newName = $ferramentas->geradorMicroTime() . "." . $ext;
            $destinationPath = '../assets/media/port_midia/' . $newName; // Caminho de destino
            rename($sourcePath, $destinationPath);
            
            $dados['img'][$i] = $newName;
            $i++;
        }
    } else {
        // echo "Nenhum input foi enviado.";
    }

    if (!empty($_REQUEST['videoPort'])) {
        $inputs = $_REQUEST['videoPort'];
        $i = 0;
        foreach ($inputs as $input) { 
            $file = $input; // Nome do arquivo que você salvou
            $sourcePath = '../assets/media/temp_midia/' . $file; // Caminho original
            $ferramentas = new ferramentas();
            $ext = $ferramentas->pegaExtensao($file);
            $newName = $ferramentas->geradorMicroTime() . "." . $ext;
            $destinationPath = '../assets/media/port_midia/' . $newName; // Caminho de destino
            
            $dados['video'][$i] = $newName;
            rename($sourcePath, $destinationPath);
            $i++;
        }
    } else {
        // echo "Nenhum input foi enviado.";
    }
    if (!empty($_REQUEST['ativos'])) {
        $inputs = $_REQUEST['ativos'];
        $i = 0;
        foreach ($inputs as $input) {
            $file = $input; // Nome do arquivo que você salvou
            $sourcePath = '../assets/media/temp_ativos/' . $file; // Caminho original
            $ext = $ferramentas->pegaExtensao($file);
            $newName = $ferramentas->geradorMicroTime() . "." . $ext;
            $destinationPath = '../assets/media/port_ativos/' . $newName; // Caminho de destino
            
            $dados['ativos'][$i] = $newName; 
            rename($sourcePath, $destinationPath);
            $i++;
        }
    } else {
        // echo "Nenhum input foi enviado.";
    }

        
require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> criarPublicacao($dados);
//var_dump($dados);
//echo "<br><br>";
  //  var_dump($_REQUEST);
    ?>
     <form action="../index.php" name="return" id="return" method="get">
     <input type="hidden" name="success" value="Publicado com sucesso!">
     </form>
     <script>

         document.getElementById("return").submit();
     </script>   
 <?php
}
if(isset($_REQUEST["payment"])){
    if(!isset($_SESSION['USER_ID'])){
        header("Location: ../view/login.php");
exit();
    }
require_once "../model/manager.class.php";
$manager = new Manager();
$dados["id_post"] = $_REQUEST["id_post"];
$dados["vendedor"] = $_REQUEST["id_vend"];
$dados["valor"] = $_REQUEST["valor"];
$dados["id_user"] = $_SESSION["USER_ID"];
$res = $manager-> newCompra($dados);
$r = $manager-> getAtivos($dados["id_post"]);
$_SESSION['id_compra'] = $res;
$_SESSION['id_vend'] = $dados['vendedor'];
$_SESSION['ativos'] = $r; // Armazena o array na sessão
?>
    <form action="../view/payment.php?amount=<?php echo $dados["valor"] ?>" name="return" id="return" method="post">
     </form>
     <script>

         document.getElementById("return").submit();
     </script>   
 <?php
}
if(isset($_REQUEST['download'])){
    $id= $_REQUEST['id'];
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $res = $manager-> getAtivos($id);
    if (is_array($res)) {
        echo json_encode($res);
    } else {
        echo json_encode(['error' => 'Não foi possível obter os dados.']);
    }
    
}

if(isset($_REQUEST['chamado'])){
    $dados['email'] = $_REQUEST['email'];
    $dados['text'] = $_REQUEST['text'];
//    var_dump($dados);
require_once "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> newChamado($dados);
if($r==true){
    ?>
    <form action="../view/atendimento.php?finalizado=1" name="return" id="return" method="post">
    </form>
    <script>

        document.getElementById("return").submit();
    </script>
    <?php
}} 

if(isset($_REQUEST['payed'])){
    $id = $_REQUEST['id'];
    $card= $_REQUEST['card'];
    if($_REQUEST['type'] == 'input-cred'){
        $method = 'credito';
    }else{
        $method = 'debito';
    }
    require_once "../model/manager.class.php";
   // var_dump($_REQUEST);
$manager = new Manager();
$r = $manager-> updateCompra($id,$card,$method);
?>
  <form action="../index.php" name="return" id="return" method="post">
    </form>
    <script>
        document.getElementById("return").submit();
    </script> 
    <?php
}
if(isset($_REQUEST['cancelar'])){
    $id = $_REQUEST['id'];
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $r = $manager-> cancelarCompra($id);
    ?>
    <form action="../index.php" name="return" id="return" method="post">
        </form>
        <script>
            document.getElementById("return").submit();
            </script>
            <?php
            
}

if(isset($_REQUEST['findUser'])){
    
    header('Content-Type: application/json');
    
    $id = $_REQUEST['findUser'];
    require_once "../model/manager.class.php";
    $manager = new Manager();
    $r = $manager-> getUserData($id);
    $_SESSION['artista'] = $r;    
    echo json_encode($r);
}
if(isset($_REQUEST['destruirArtista'])){
    //destroy de session artista
    unset($_SESSION['artista']);
}
?>