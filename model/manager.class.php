<?php
require_once('conexao.class.php');

class Manager extends ConexaoFront{

   
//FUNÇÃO PRA LOGIN DO USUÁRIO
    public function userLogin($dados){
    // Estabelece a conexão
    $conn = $this->connect();

    // Consulta SQL
    $sql = "SELECT * FROM usuario WHERE email = '{$dados['email']}' AND senha = '{$dados['senha']}';";
  
    $res = $this->connect()->query($sql);

    // Verifica se há resultados
    if ($res->num_rows > 0) {
        $dados = array();
        $dados["result"] = 1;
        $row = $res->fetch_assoc();

        $dados["ID_USER"] = $row["ID_USER"];
        $dados["username"] = $row["username"];
        $dados["nome"] = $row["nome"];
        $dados["cpf"] = $row["cpf"];
        $dados["email"] = $row["email"];
        $dados["celular"] = $row["celular"];
        $dados["senha"] = $row["senha"];
        $dados["data_nascimento"] = $row["data_nascimento"];
        $dados["estado"] = $row["estado"];
        $dados["pais"] = $row["pais"];
        $dados["pfp"] = $row["pfp"];
        $dados["biografia"] = $row["biografia"];
        $dados["datahora"] = $row["datahora"];
        $dados["status"] = $row["status"];
        $dados["obs"] = $row["obs"];
        
        $conn->close();
        return $dados;
    } else {
        $conn->close();
        $dados['result'] = 0;
        return $dados;
    }
}


//FUNÇÃO PRA SELECIONAR O BANNER
public function banner(){
    $conn = $this->connect();
    $sql = "SELECT `img` FROM `banner` WHERE `status` = 1 ORDER BY `datahora` DESC LIMIT 1;";
    $res = $this->connect()->query($sql);
    $imagem = null;
       
        $row = $res->fetch_assoc();
        $imagem = $row['img'];
    
    $conn->close();
    return $imagem;
}

//FUNÇÃO PRA NOVO USUÁRIO
public function userCadastro($dados){
    
    $conn = $this->connect();
    $cpf = $dados["cpf"];
    $username = $dados["username"];  
    $email = $dados["email"];
    
    $sqlVerificaDuplicados = "CALL VerificaDuplicadosUsuario('$cpf', '$username', '$email', @result);";
    $conn->query($sqlVerificaDuplicados);
    
    $resultQuery = $conn->query("SELECT @result AS resultado;");
    $row = $resultQuery->fetch_assoc();
    
    if ($row['resultado'] == 1) {
        $conn->close();
        $data['result'] = 0;
        return $data;
    }else{
        $sql = "INSERT INTO `usuario` (`username`,  `cpf`, `email`, `senha`, `datahora`, `pfp`, `biografia`,`status`) 
        VALUES ('{$dados["username"]}', '{$dados["cpf"]}', '{$dados["email"]}',  '{$dados["senha"]}', NOW(), 'nopfp.png', 'Olá, estou usando o BECO!','1');";
        $res = $this->connect()->query($sql);

    if($res){
        $sqlObterUltimoID = "CALL ObterUltimoIDUsuario(@p_id_user);";
        $conn->query($sqlObterUltimoID);
        $resultQuery = $conn->query("SELECT @p_id_user AS p_id_user;");
        $row = $resultQuery->fetch_assoc();
        echo $row['p_id_user'];
        $this->connect()->close();
        $data['result'] = $row['p_id_user'];
        return $data;
    }else{
        $this->connect()->close();
        $data['result'] = 0;
        return $data;
    }
    }
}


//FUNÇÃO PRA PEGAR AS POSTAGENS DO USUÁRIO, UTILIZADO NO USUARIO.PHP 
public function getPostagensUser($id){

    $sql = "SELECT p.`ID_POST`, p.`id_user`, p.`titulo`, p.`descricao`,p.`thumbnail`, p.`tipo`, p.`datahora` AS `post_datahora`, p.`status`, 
    m.`ID_MIDIA`, m.`id_postagem`, m.`arquivo`, m.`tipo` AS `midia_tipo`, m.`datahora` AS `midia_datahora`,
    u.`ID_USER`, u.`username`, u.`pfp`
    FROM `postagem` p
    LEFT JOIN `midia` m ON p.`ID_POST` = m.`id_postagem`
    LEFT JOIN `usuario` u ON p.`id_user` = u.`ID_USER`
    WHERE p.`id_user` = '{$id}'";
    $conn = $this->connect();
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
    $dados = array();
    $i = 0;
    
    // Percorrer todos os resultados
    while ($row = $res->fetch_assoc()) {
        $dados[$i] = [
            'ID_USER'   => $row['ID_USER'],
            'username'  => $row['username'],
            'pfp'       => $row['pfp'],
            'thumbnail'       => $row['thumbnail'],
            'ID_POST'   => $row['ID_POST'],
            'titulo'    => $row['titulo'],
            'descricao' => $row['descricao'],
            'tipo'      => $row['tipo'],
            'post_datahora' => $row['post_datahora'],
            'post_status' => $row['status'],
            'ID_MIDIA'  => $row['ID_MIDIA'],
            'arquivo'   => $row['arquivo'],
            'midia_tipo'=> $row['midia_tipo'],
            'midia_datahora' => $row['midia_datahora']
            
        ];
        $i++;
        
        $dados['result']=$i;
    }   $conn->close();
    return $dados;
    } else {
    $conn->close();
    $dados['result'] = 0;
    return $dados;
}

}









 
    



//FUNÇÃO PRA ADICIONAR O LOG NO BD
        public function registrosAdd($nome){
            $sql = "INSERT INTO registros (nome, datahora) VALUES ('{$nome}', now());";
            $res = $this->connect()->query($sql);
        }









//FUNÇÃO PRA PEGAR A DATA DO USUAIRO ?
  public function getUserData($id) {
            $sql = "SELECT * FROM usuario WHERE ID_USER = {$id};";
            $res = $this->connect()->query($sql);
        
            if (!$res) {
                $this->connect()->close();
                return ['result' => -1, 'error' => $this->connect()->close()];
            }
        
            if ($res->num_rows > 0) {
                $dados = [];
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $dados[$i] = [
                        'ID_USER'   => $row['ID_USER'],
                        'username'     => $row['username'],
                        'pfp'     => $row['pfp'],
                        'email'    => $row['email'],
                        'bio'    => $row['biografia'],
                        'celular'  => $row['celular'],
                        'status'   => $row['status'],
                        'obs'   => $row['obs'],
                        'data'     => $row['datahora'],
                        'estado'     => $row['estado'],
                        'pais'     => $row['pais'],
                        'datan'     => $row['data_nascimento']

                    ];
                    $i++;
                }
                $dados['result'] = $i; // Store count or simply use true to indicate success
                $this->connect()->close();
                return $dados;
            } else {
                $this->connect()->close();
                return ['result' => 0]; // No rows found
            }
        }





    public function showMessages($idConversa,$key) {
        
        require_once('../model/ferramentas.class.php');
        $ferramentas = new Ferramentas();
         
        $sql = "SELECT m.ID_MENSAGEM, m.texto_mensagem, m.datahora, m.file, u.ID_USER AS id_remetente, u.nome AS nome_remetente, 
                       c.id_user1, a1.username AS nome_user1, 
                       c.id_user2, a2.username AS nome_user2
                FROM mensagens m
                JOIN usuario u ON m.id_remetente = u.ID_USER
                JOIN conversas c ON m.ID_CONVERSA = c.id_conversa
                JOIN usuario a1 ON c.id_user1 = a1.ID_USER
                JOIN usuario a2 ON c.id_user2 = a2.ID_USER
                WHERE m.id_conversa = {$idConversa}
                ORDER BY m.datahora;";
    
        $res = $this->connect()->query($sql);
    
        if (!$res) {
            $this->connect()->close();
            return ['result' => -1, 'error' => $this->connect()->error];
        }
    
        if ($res->num_rows > 0) {
            $mensagens = [];
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $mensagens[$i] = [
                    'ID_MENSAGEM' => $row['ID_MENSAGEM'],
                    'texto_mensagem' => $ferramentas-> descriptografar($row['texto_mensagem'],$key),
                    'file' => $row['file'],
                    'datahora' => $row['datahora'],
                    'id_remetente' => $row['id_remetente'],
                    'id_user1' => $row['id_user1'],
                    'nome_user1' => $row['nome_user1'],
                    'id_user2' => $row['id_user2'],
                    'nome_user2' => $row['nome_user2']
                ];
                $mensagens["number"] = $i;
                $i++;
            }
            $mensagens['result'] = $i; // Armazena a contagem ou simplesmente usa true para indicar sucesso
            $this->connect()->close();
            return $mensagens;
        } else {
            $this->connect()->close();
            return ['result' => 0]; // Nenhuma linha encontrada
        }
    }
    


        public function enviarMsg($dados){
            $sql = "INSERT INTO mensagens (id_conversa, id_remetente, texto_mensagem, datahora) VALUES ('{$dados["id_conversa"]}','{$dados["id_remetente"]}','{$dados["txt"]}', NOW())";
            $res = $this->connect()->query($sql);
            $this->connect()->close();
            return $res;
        }

        public function getUserInfo($id_user){
            $sql= "SELECT * FROM usuario where ID_USER = {$id_user}";              
            $res = $this->connect()->query($sql);
            $dados = [];
            while($row=$res->fetch_assoc()){
                $dados["nome"] = $row["username"];
                $dados["pfp"] = $row["pfp"];
            }
            
            $this->connect()->close();
            return $dados;
         }

        public function showConversas($idRemetente){

            $sql= "SELECT * FROM conversas where id_user1 = {$idRemetente} or id_user2 = {$idRemetente} AND tabela = 'user' ";  
            $res = $this->connect()->query($sql);
            $dados = [];
            $i = 0;
            while($row=$res->fetch_assoc()){
                if ($row["id_user1"]==$idRemetente){
                $infoUsuario = $this->getUserInfo($row["id_user2"]);
                $dados[$i]["id_user"] = $row["id_user2"];
                $dados[$i]["nome2"] = $infoUsuario["nome"];
                    $dados[$i]["pfp2"] = $infoUsuario["pfp"];
            }else{
                $infoUsuario = $this->getUserInfo($row["id_user1"]);
                $dados[$i]["id_user"] = $row["id_user1"];
                $dados[$i]["nome2"] = $infoUsuario["nome"];
                $dados[$i]["pfp2"] = $infoUsuario["pfp"];
            }
                $dados[$i]["id_conversa"] = $row["ID_CONVERSA"];
                $dados[$i]["datahora"] = $row["datahora"];
            
                $dados["result"] = $i;
                $i++;
                
            }
            $this->connect()->close();
            return $dados;
        

        }

       

        public function searchConversas($query) {
            $sql = "SELECT * FROM usuario WHERE username LIKE '%$query%' LIMIT 15";
            $res = $this->connect()->query($sql);
        
            if (!$res) {
                return ['result' => -1, 'error' => $this->connect()->error];
            }
        
            if ($res->num_rows > 0) {
                $dados = [];
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $dados[$i] = [
                        'ID_ADM' => $row['ID_USER'],
                        'nome' => $row['username'],
                        'pfp' => $row['pfp']
                    ];
                    $i++;
                }
                $dados['result'] = $i; // Store count or simply use true to indicate success
                return $dados;
            } else {
                return ['result' => 0]; // No rows found
            }
        }
    

        public function verificarConversa($id_user1, $id_user2){
            $sql = "SELECT * FROM conversas WHERE id_user1 = '$id_user1'
            AND id_user2 = '$id_user2' OR id_user1 = '$id_user2'
            AND id_user2 = '$id_user1'";
            $res = $this->connect()->query($sql);
            if (!$res) {
                return ['result' => -1, 'error' => $this->connect()->error];
                }
                if ($res->num_rows > 0) {
                    return ['result' => 1];
                    } else {
                        return ['result' => 0];
                        }
        }


        public function inserirConversa($id_user1, $id_user2, ) {
            
           $verif = $this-> verificarConversa($id_user1,$id_user2);
           if($verif['result'] == 0){
            $sql = "INSERT INTO conversas (id_user1, id_user2, tabela, datahora) VALUES ({$id_user1}, {$id_user2}, 'user', NOW())";
            $res = $this->connect()->query($sql);
           }
           $room = $this-> pegarRoom($id_user1,$id_user2);
            $this->connect()->close();
            return $room;
        }

        public function pegarRoom($id_user1, $id_user2) {
            $sql = "SELECT * FROM conversas WHERE id_user1 = {$id_user1}
            AND id_user2 = {$id_user2}";
            $res = $this->connect()->query($sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $dados = [
                        'room' => $row['ID_CONVERSA']
                    ];
                
                }}
            $this->connect()->close();
            return $dados;
        }
    


 





 public function inserirCod($codigo){ 
  
   
     $sql="INSERT INTO codigos (codigo, datahora) VALUES ('$codigo', now())";
     $this->connect()->query($sql);
      $this->connect()->close();
     return;
 }


public function verificar_cod($dados){

    $sql="SELECT * FROM codigos WHERE codigo = '$dados' ";
    $res = $this->connect()->query($sql);

    if($res->num_rows > 0){
      $dados = "1";
      $this->connect()->close();
        return $dados;
    }    else{
        $this->connect()->close();
        $dados = "0";
        return $dados;
   }


 } 



public function emailVerif($email){
    $sql="SELECT * FROM usuario WHERE email = '$email'";
    $res = $this->connect()->query($sql);
    if($res->num_rows > 0){
        $dados = "1";
        $this->connect()->close();
        return $dados;
        }    else{
            $this->connect()->close();
            $dados = "0";
            return $dados;
            }
}

public function alterarSenha($senha, $email){
    $sql="UPDATE usuario SET senha = '$senha' WHERE email = '$email'";
    $res = $this->connect()->query($sql);
    if($res){
        $dados = "1";
        $this->connect()->close();
        return $dados;
        }    else{
            $this->connect()->close();
            $dados = "0";
            return $dados;
            }
            

}




public function getClientIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    if ($ipaddress == '::1') {
        $ipaddress = '127.0.0.1'; // Converter IPv6 loopback para IPv4 loopback
    }
    return $ipaddress;
}

public function novoAcesso($ip){
        try {
            $conn = $this->connect();
            $sql = "CALL novoAcesso('$ip')";
                     
            $conn->close();
            
        } catch (Exception$e) {
        }
        
        return;
    }
    



    public function getConcursoData() {
        $sql = "SELECT * FROM concursos";
        $res = $this->connect()->query($sql);
    
        if (!$res) {
            $this->connect()->close();
            return ['result' => -1, 'error' => $this->connect()->error];
        }
    
        if ($res->num_rows > 0) {
            $dados = [];
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $dados[$i] = [
                    'ID_CONCURSO' => $row['ID_CONCURSO'],
                    'titulo'      => $row['titulo'],
                    'tag'         => $row['tag'],
                    'descricao'   => $row['descricao'],
                    'img_anuncio' => $row['img_anuncio'],
                    'img_banner'  => $row['img_banner'],
                    'data_inicio' => $row['data_inicio'],
                    'data_fim'    => $row['data_fim'],
                    'status'      => $row['status']
                ];
                $i++;
            }
            $dados['result'] = $i;
            $this->connect()->close();
            return $dados;
        } else {
            $this->connect()->close();
            return ['result' => 0];
        }
    }
    

    public function getUltimaDataFim() {
        $sql = "SELECT data_fim FROM concursos ORDER BY data_fim DESC LIMIT 1;";
        $res = $this->connect()->query($sql);
    
        if (!$res) {
            $this->connect()->close();
            return ['result' => -1, 'error' => $this->connect()->error];
        }    
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->connect()->close();
    
            // Convertendo a data para um objeto DateTime e adicionando um dia
            $date = new DateTime($row['data_fim']);
            $date->modify('+1 day');
    
            return ['result' => 1, 'data_fim' => $date->format('Y-m-d')];
        } else {
            $this->connect()->close();
            return ['result' => 0];
        }
    }
    


    public function getBannerData() {
        $sql = "SELECT * FROM banner"; 
        $res = $this->connect()->query($sql);
    
        if (!$res) {
            $this->connect()->close();
            return ['result' => -1, 'error' => $this->connect()->error];
        }
    
        if ($res->num_rows > 0) {
            $dados = [];
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $dados[$i] = [
                    'ID_BANNER' => $row['ID_BANNER'],
                    'img' => $row['img'],
                    'datahora' => $row['datahora'],
                    'status' => $row['status']
                ];
                $i++;
            }
            $dados['result'] = $i; 
            $this->connect()->close();
            return $dados;
        } else {
            $this->connect()->close();
            return ['result' => 0]; 
        }
    }






    public function getConcursoAtual() {
        $sql = "SELECT * FROM concursos WHERE NOW() BETWEEN data_inicio AND data_fim;
"; 
$res = $this->connect()->query($sql);
    
if (!$res) {
    $this->connect()->close();
    return ['result' => -1, 'error' => $this->connect()->error];
}

if ($res->num_rows > 0) {
    $dados = [];
    while ($row = $res->fetch_assoc()) {
        $dados = [
            'ID_CONCURSO' => $row['ID_CONCURSO'],
            'titulo'      => $row['titulo'],
            'tag'         => $row['tag'],
            'descricao'   => $row['descricao'],
            'img_anuncio' => $row['img_anuncio'],
            'img_banner'  => $row['img_banner'],
            'data_inicio' => $row['data_inicio'],
            'data_fim'    => $row['data_fim'],
            'status'      => $row['status']
        ];
    }
    $dados['result'] = 1;
    $this->connect()->close();
    return $dados;
} else {
    $this->connect()->close();
    return ['result' => 0];
}
    }








public function concursosPostagens($hashtag) {
    // Criar conexão
    $sql = "SELECT p.`ID_POST`, p.`id_user`, p.`titulo`, p.`descricao`,p.`thumbnail`, p.`tipo`, p.`datahora` AS `post_datahora`, p.`status`, 
    m.`ID_MIDIA`, m.`id_postagem`, m.`arquivo`, m.`tipo` AS `midia_tipo`, m.`datahora` AS `midia_datahora`,
    u.`ID_USER`, u.`username`, u.`pfp`
FROM `postagem` p
LEFT JOIN `midia` m ON p.`ID_POST` = m.`id_postagem`
LEFT JOIN `usuario` u ON p.`id_user` = u.`ID_USER`
WHERE p.`descricao` LIKE '%{$hashtag}%' AND p.status = 1";
 $conn = $this->connect();
 $res = $conn->query($sql);
 if ($res->num_rows > 0) {
    $dados = array();
    $i = 0;
    
    // Percorrer todos os resultados
    while ($row = $res->fetch_assoc()) {
        $dados[$i] = [
            'ID_USER'   => $row['ID_USER'],
            'username'  => $row['username'],
            'pfp'       => $row['pfp'],
            'thumbnail'       => $row['thumbnail'],
            'ID_POST'   => $row['ID_POST'],
            'titulo'    => $row['titulo'],
            'descricao' => $row['descricao'],
            'tipo'      => $row['tipo'],
            'post_datahora' => $row['post_datahora'],
            'post_status' => $row['status'],
            'ID_MIDIA'  => $row['ID_MIDIA'],
            'arquivo'   => $row['arquivo'],
            'midia_tipo'=> $row['midia_tipo'],
            'midia_datahora' => $row['midia_datahora']
            
        ];
        $i++;
        
        $dados['result']=$i;
    }   $conn->close();
    return $dados;
} else {
    $conn->close();
    $dados['result'] = 0;
    return $dados;
}

}


public function getAllPosts($limit, $offset) {
    $sql = "SELECT p.ID_POST, p.id_user, u.username, u.ID_USER AS user_id,  p.thumbnail, p.titulo, p.descricao, p.tipo, p.datahora, p.status 
    FROM postagem p 
    JOIN usuario u ON p.id_user = u.ID_USER 
    WHERE p.status = 1 
    ORDER BY p.datahora DESC 
    LIMIT {$limit} OFFSET {$offset}
    
    ;
    ";

    $conn = $this->connect();
    $res = $conn->query($sql);

    $dados = array();
    
    if ($res->num_rows > 0) {
        // Inicializa o contador de postagens
        $dados['result'] = $res->num_rows; // Número total de postagens
        $i=0;
        // Percorrer todos os resultados
        while ($row = $res->fetch_assoc()) {
            $dados[$i][] = [
                'ID_USER'   => $row['user_id'], // Usar 'user_id' que é o alias no SQL
                'username'  => $row['username'],
                'thumbnail' => $row['thumbnail'],
                'ID_POST'   => $row['ID_POST'],
                'titulo'    => $row['titulo'],
                'descricao' => $row['descricao'],
                'tipo'      => $row['tipo'],
                'post_datahora' => $row['datahora'], // Corrigido para 'datahora'
                'post_status' => $row['status'],
            ];
                $i++;
                $dados['result'] = $i;
        }
    } else {
        $dados['result'] = 0; // Se não houver postagens
        
    }
    
    $dados['query'] = $sql;
    $conn->close(); // Fechar a conexão
    return $dados; // Retornar os dados
}


public function showComent($id){
    $sql = "SELECT comentario.*, usuario.pfp, usuario.username AS nome_usuario
    FROM comentario
    JOIN usuario ON comentario.id_user = usuario.ID_USER
    WHERE comentario.id_post = $id
    ORDER BY datahora DESC
    ";
     $conn = $this->connect();
     $res = $conn->query($sql);

     $comentarios = [];
     $i = 0;

     if ($res->num_rows > 0) {
         while($row = $res->fetch_assoc()) {
           
                $comentarios[$i] = [
                    'ID_COMENTARIO' => $row['ID_COMENTARIO'],
                    'id_user' => $row['id_user'],
                    'id_post' => $row['id_post'],
                    'texto' => $row['texto'],
                    'datahora' => $row['datahora'],
                    'username' => $row['nome_usuario'],
                    'pfp' => $row['pfp']
                 ];

                $i++;
                
         $comentarios["number"] = $i;
            
         }
         
     }

     $conn->close();
     return $comentarios;
 }

public function editUser($dados){
    $sql = "UPDATE usuario SET username = '{$dados['username']}' , nome = '{$dados['nickname']}', biografia = '{$dados['biografia']}' WHERE ID_USER = '{$dados['id']}';";
 $conn = $this->connect();
    $res = $conn->query($sql);
    if($res){
        $dados['result'] = 1;
        $conn->close(); // Fechar a conexão
    return $dados;
    }else{
        $dados['result'] = 0; 
        $conn->close(); // Fechar a conexão
    return $dados;
    }
}

public function checkUsername($username){
    
}
public function getPost($id){
    $conn = $this->connect();

    $sql = "
   SELECT 
    p.ID_POST, p.id_user, p.thumbnail, p.titulo, p.descricao, 
    p.tipo AS postagem_tipo, p.datahora AS postagem_datahora, p.status AS postagem_status,
    
    -- Campos da tabela produtos
    pr.ID_PROD, pr.licenca, pr.valor, pr.banco, 
    pr.agencia, pr.conta, pr.datahora AS produto_datahora, pr.status AS produto_status,

    -- Campos da tabela midia
    m.ID_MIDIA, m.arquivo, m.tipo AS midia_tipo, m.datahora AS midia_datahora,

    -- Campos da tabela usuario
    u.nome, u.username, u.pfp

FROM 
    postagem AS p

-- Join com a tabela produtos
LEFT JOIN 
    produtos AS pr ON pr.id_postagem = p.ID_POST

-- Join com a tabela midia
LEFT JOIN 
    midia AS m ON m.id_postagem = p.ID_POST

-- Join com a tabela usuario 
LEFT JOIN 
    usuario AS u ON u.ID_USER = p.id_user

WHERE 
    p.ID_POST = $id;
";

$res = $conn->query($sql);
$dados = $res->fetch_all(MYSQLI_ASSOC);

        // Array para armazenar os dados
        if ($dados) {
            // Criar array para armazenar os dados organizados
            $result = [
                'postagem' => null,
                'produtos' => [],
                'midia' => [],
                'user' => []
            ];

            // Percorrer os dados e organizar em 'postagem', 'produtos' e 'midia'
            foreach ($dados as $row) {
                // Preencher os dados da postagem, caso ainda não esteja preenchido
                if ($result['postagem'] === null) {
                    $result['postagem'] = [
                        'ID_POSTAGEM' => $row['ID_POST'],
                        'id_user' => $row['id_user'],
                        'thumbnail' => $row['thumbnail'],
                        'titulo' => $row['titulo'],
                        'descricao' => $row['descricao'],
                        'postagem_tipo' => $row['postagem_tipo'],
                        'postagem_datahora' => $row['postagem_datahora'],
                        'postagem_status' => $row['postagem_status'],
                    ];
                    $result['user'] = [
                        'ID_USER' => $id,
                        'nickname' => $row['nome'],
                        'username' => $row['username'],
                        'pfp' => $row['pfp']];
                }

               
                   
                    
                // Adicionar produtos ao array de produtos
                if ($row['ID_PROD'] !== null) {
                    $result['produtos'] = [
                        'ID_PROD' => $row['ID_PROD'],
                        'licenca' => $row['licenca'],
                        'valor' => $row['valor'],
                        'banco' => $row['banco'],
                        'agencia' => $row['agencia'],
                        'conta' => $row['conta'],
                        'produto_datahora' => $row['produto_datahora'],
                        'produto_status' => $row['produto_status'],
                    ];
                }

                // Adicionar midia ao array de midia
                if ($row['ID_MIDIA'] !== null) {
                    $result['midia'][] = [
                        'ID_MIDIA' => $row['ID_MIDIA'],
                        'arquivo' => $row['arquivo'],
                        'midia_tipo' => $row['midia_tipo'],
                        'midia_datahora' => $row['midia_datahora'],
                    ];
                }
            }

            $tags = $this -> getTags($id);
            
            $result["tags"]= $tags;
           
            return $result; // Retornar os dados organizados
        } else {
            return false; // Nenhuma postagem encontrada
        }


}

public function getTags($id){
    $sql = "SELECT * FROM `tags` WHERE id_post = $id";
    $conn = $this->connect();
    $res = $conn->query($sql);
    $i = 0;
    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $tags[$i] = [
                $row['tag'], // Supondo que você tenha uma coluna 'usuario'
                 ];
            $i++; // Incrementar o contador
            
            $tags["result"] = $i;
        }
    }else{
        $tags["result"] = 0;
    }

    return $tags; // Retornar o array de comentários
}
public function inserirComent($dados){
    $sql = "INSERT INTO `comentario`(`id_user`,  `id_post`, `texto`, `datahora`) VALUES ('{$dados['user']}','{$dados['post']}','{$dados['texto']}',now());";
    $conn =$this->connect();
    $res = $conn->query($sql);
}

}



?>