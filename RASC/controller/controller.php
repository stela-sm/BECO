<?php
session_start();

if(isset($_REQUEST['action']) && $_REQUEST[ 'action' ] == "login") {
        if($_REQUEST["email"] !== "" && $_REQUEST["senha"] !==""){   
            $email = trim($_REQUEST['email']);
            $senha = trim($_REQUEST['senha']);
            require "../model/ferramentas.php";
            $ferramentas = new Ferramentas();
            $resp[0] = $ferramentas->antiInjection($_POST["email"]);
            $resp[1] = $ferramentas->antiInjection($_POST["senha"]);                    
            for($i = 0;$i < 2;$i++){
                if($resp[$i] == 0){
                    ?>
                    <form action="../login.php" name="return" id="return" method="post">
                    <input type="hidden" name="cod" value="FR02">
                    </form>
                    <script>
                        document.getElementById("return").submit();
                    </script>
                    <?php
                    exit();
                }
            } 
            
            $senhaCript = $ferramentas->sha256($senha);            
            require "../model/manager.php";
            $manager = new Manager();
            $resp = $manager->loginCliente($email, $senhaCript);
            if($resp["result"]==1){
                //cria a sessao do usuario
                $_SESSION['ID_USUARIO']= $resp["ID_USUARIO"];
                $_SESSION['NOME_USUARIO']= $resp["nome"];
                $_SESSION['PFP_USUARIO']= $resp["pfp"];
                $_SESSION['CIDADE_USUARIO']= $resp["cidade"];
                $_SESSION['PAIS_USUARIO']= $resp["usuario"];
                $_SESSION['CPF_USUARIO']= $resp["cpf"];
                $_SESSION['EMAIL_USUARIO']= $resp["email"];
                $_SESSION['DATAN_USUARIO']= $resp["datan"];
                $_SESSION['RESUMO_USUARIO']= $resp["resumo"];
                $_SESSION['BIO_USUARIO']= $resp["bio"];
                $_SESSION['STATUS_USUARIO']= $resp["status"];
                ?>
                <form action="../view/meuperfil.php" name="return" id="return" method="post">
                <input type="hidden" name="cod" value="">
                </form>
                <script>
                    document.getElementById("return").submit();
                </script>
                <?php

            }else{
                ?>
                <form action="../login.php" name="return" id="return" method="post">
                <input type="hidden" name="cod" value="FR02">
                </form>
                <script>
                    document.getElementById("return").submit();
                </script>
                <?php
            }
            
        } else{
            ?>
            <form action="../login.php" name="return" id="return" method="post">
            <input type="hidden" name="cod" value="FR01">
            </form>
            <script>
                document.getElementById("return").submit();
            </script>
            <?php
}}
?>