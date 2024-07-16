<?php
session_start();

if (isset($_REQUEST["inserir"])) {
     
    $conn = new mysqli('localhost', 'root', '', 'beco_bd');

   
    if ($conn->connect_error) {
        die(json_encode(['result' => 'erro', 'error' => 'Falha na conexão com o banco de dados: ' . $conn->connect_error]));
    }

    $idConversa = $_REQUEST["id_conversa"];
    $idRemetente = $_REQUEST["id_remetente"];
    $textoMensagem = $_REQUEST["texto_mensagem"];

    $sql = "INSERT INTO mensagens (id_conversa, id_remetente, texto_mensagem, datahora) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die(json_encode(['result' => 'erro', 'error' => 'Erro na preparação da consulta: ' . $conn->error]));
    }

    $stmt->bind_param('iis', $idConversa, $idRemetente, $textoMensagem);
    $result = $stmt->execute();

    if ($result) {
        echo json_encode(['result' => 'sucesso']);
    } else {
        echo json_encode(['result' => 'erro', 'error' => 'Erro ao enviar mensagem: ' . $stmt->error]);
    }


    $stmt->close();
    $conn->close();
}







if(isset($_REQUEST["select"])){

    require "../model/manager.class.php";

    $manager = new Manager();
    $idConversa = $_GET['id_conversa']; // Substitua '1' pelo ID da conversa desejada
   
$r = $manager->showMessages($idConversa);

echo json_encode($r);
}


if(isset($_REQUEST["conversas"])){

require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> showConversas($_SESSION["ADM_ID"]);


echo json_encode($r);
}
?>
