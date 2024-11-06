<?php
session_start();
unset($_SESSION["ADM_ID"]);
unset($_SESSION["ADM_NOME"]);
unset($_SESSION["ADM_EMAIL"]);
unset($_SESSION["ADM_PFP"]);
unset($_SESSION["ADM_CPF"]);
unset($_SESSION["ADM_CEP"]);
unset($_SESSION["ADM_RG"]);
unset($_SESSION["ADM_PODER"]);
unset($_SESSION["ADM_NUMERO"]);
unset($_SESSION["ADM_CELULAR"]);
unset($_SESSION["ADM_DATAN"]);
unset($_SESSION["ADM_ESTADO_CIVIL"]);

require '../model/ferramentas.class.php';
$ferramentas = new Ferramentas();
$ferramentas -> unsetCookie('ADM_ID');
?>
            <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="" value=""><!--"FR01" => "Dado(s) não preenchido(s).",-->
            </form> <!--envia um formulario com a variavel "msg", que é o código da mensagem de erro (ver view/msg.php) para o index--> 
            <script>
            document.getElementById('myForm').submit();//envio automático submit()
            </script>  
<?php

?>
