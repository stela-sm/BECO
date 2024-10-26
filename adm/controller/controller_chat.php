<?php
session_start();

$key= "FCRIiJHS139fJvs91euZCdVqmgmiC8EK";
if (isset($_REQUEST["inserir"])) {
    require_once('../model/ferramentas.class.php');
    $ferramentas = new Ferramentas();
     
    $conn = new mysqli('localhost', 'root', '', 'beco_bd');


    $idConversa = $_REQUEST["id_conversa"];
    $idRemetente = $_REQUEST["id_remetente"];
    $textoMensagem = $_REQUEST["texto_mensagem"];
   $texto =  $ferramentas->criptografar($textoMensagem,$key);

    $sql = "INSERT INTO mensagens (id_conversa, id_remetente, texto_mensagem, datahora) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('iis', $idConversa, $idRemetente, $texto);
    $result = $stmt->execute();

    if ($result) {
        echo json_encode(['result' => 'sucesso']);
    } else {
        echo json_encode(['result' => 'erro', 'error' => 'Erro ao enviar mensagem: ' . $stmt->error]);
    }


    $stmt->close();
    $conn->close();
}


if (isset($_REQUEST["inserir_file"])) {
    require_once('../model/ferramentas.class.php');
    $ferramentas = new Ferramentas();
     
    $conn = new mysqli('localhost', 'root', '', 'beco_bd');

    $idConversa = $_REQUEST["id_conversa"];
    $idRemetente = $_REQUEST["id_remetente"];

    $img = $_FILES["arquivo"];
    require_once "../model/ferramentas.class.php";
    $ferramentas = new ferramentas();
    $ext = $ferramentas->pegaExtensao($img["name"]);
    $newName = $ferramentas->geradorMicroTime() . "." . $ext;
    $resp = move_uploaded_file($img["tmp_name"],"../assets/media/chat/".$newName);


    $sql = "INSERT INTO mensagens (id_conversa, id_remetente, file, datahora) VALUES ('$idConversa', '$idRemetente', '$newName', NOW())";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        echo json_encode(['result' => $sql]);
    } else {
        echo json_encode(['result' => 'erro', 'error' => 'Erro ao enviar mensagem: ' . $stmt->error]);
    }


    $stmt->close();
    $conn->close();
}




if(isset($_REQUEST["select"])){

    header('Content-Type: application/json');
    require "../model/manager.class.php";

    $manager = new Manager();
    $idConversa = $_GET['id_conversa']; // Substitua '1' pelo ID da conversa desejada
   
$r = $manager->showMessages($idConversa,$key);

echo json_encode($r);
exit; 
}


if(isset($_REQUEST["conversas"])){

    header('Content-Type: application/json');
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> showConversas($_SESSION["ADM_ID"]);


echo json_encode($r);
exit; 
}



if (isset($_REQUEST['search'])) {
  

    $query = $_REQUEST['search'];

    require "../model/manager.class.php";
    $manager = new Manager();

    $results = $manager->searchConversas($query);

    header('Content-Type: application/json');
    echo json_encode($results);
    exit();
}



if (isset($_REQUEST['inserir_conv'])) {
    require "../model/manager.class.php";
    $manager = new Manager();
    $id_user1 = $_POST['id_user1'];
    $id_user2 = $_POST['id_user2'];

    $result = $manager->inserirConversa($id_user1, $id_user2);

    if ($result) {
        $room = $result; 
        
        echo json_encode(['result' => 1, 'room' => $room]);
    } else {
        echo json_encode(['result' => 0, 'error' => 'Erro ao inserir conversa']);
    }

}
?>
