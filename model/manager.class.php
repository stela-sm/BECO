<?php
require_once('conexao.class.php');

class Manager extends ConexaoFront{

   

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



public function getPostagensUser($id){

    $sql = "SELECT p.`ID_POST`, p.`id_user`, p.`titulo`, p.`descricao`,p.`thumbnail`, p.`tipo`, p.`datahora` AS `post_datahora`, p.`status`, 
    m.`ID_MIDIA`, m.`id_postagem`, m.`arquivo`, m.`tipo` AS `midia_tipo`, m.`datahora` AS `midia_datahora`,
    u.`ID_USER`, u.`username`, u.`pfp`
FROM `postagem` p
LEFT JOIN `midia` m ON p.`ID_POST` = m.`id_postagem`
LEFT JOIN `usuario` u ON p.`id_user` = u.`ID_USER`
WHERE p.`ID_POST` = '{$id}'";
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











public function admLoginID($dados){
    // Estabelece a conexão
    $conn = $this->connect();

    // Consulta SQL
    $sql = "SELECT * FROM administradores WHERE ID_ADM = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dados);

    // Executa a consulta
    $stmt->execute();
    $res = $stmt->get_result();

    // Verifica se há resultados
    if ($res->num_rows > 0) {
        $dados = array();
        $dados["result"] = 1;
        $row = $res->fetch_assoc();

        $dados["ID_ADM"] = $row["ID_ADM"];
        $dados["nome"] = $row["nome"];
        $dados["email"] = $row["email"];
        $dados["pfp"] = $row["pfp"];
        $dados["cpf"] = $row["cpf"];
        $dados["cep"] = $row["cep"];
        $dados["celular"] = $row["celular"];
        $dados["rg"] = $row["rg"];
        $dados["poder"] = $row["poder"];
        $dados["numero"] = $row["numero"];
        $dados["datan"] = $row["data_nascimento"];
        $dados["estado_civil"] = $row["estado_civil"];
        
        $stmt->close();
        $conn->close();
        return $dados;
    } else {
        $stmt->close();
        $conn->close();
        $dados['result'] = 0;
        return $dados;
    }
}

        //exit(); 
    




        public function registrosAdd($nome){
            $sql = "INSERT INTO registros (nome, datahora) VALUES ('{$nome}', now());";
            $res = $this->connect()->query($sql);
        }









    
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




       public function getUsersByMonth() {
            $sql = "SELECT MONTH(datahora) AS month, YEAR(datahora) AS year, COUNT(*) AS count 
                    FROM usuario 
                    GROUP BY YEAR(datahora), MONTH(datahora) 
                    ORDER BY YEAR(datahora), MONTH(datahora)";
        
            $result = $this->connect()->query($sql);
    
        
            $months = array_fill(1, 12, 0); // Preenche o array com 0 para cada mês (1 a 12)
            $data = [];
        
            // Verificar se há resultados e preenchê-los no array
            while ($row = $result->fetch_assoc()) {
                $month = (int)$row['month'];
                $year = (int)$row['year'];
                $count = (int)$row['count'];
        
                // Armazenar a contagem de usuários para cada mês
                $data["$year-$month"] = $count;
            }
        
         
            $this->connect()->close();
        
            // Ordenar os meses
            foreach ($months as $month => &$value) {
                $key = date('Y') . '-' . $month; // Adiciona o ano corrente para meses do ano atual
                $value = isset($data[$key]) ? $data[$key] : 0;
            }
            
            return $months;
        }
        
        
        

        function getAccessesByMonth() {
          
            // mano como q isso funciona vsfd
            $sql = "SELECT MONTH(datahora) AS month, COUNT(*) AS count 
                    FROM acessos 
                    GROUP BY MONTH(datahora)";
        
             $result = $this->connect()->query($sql);
        
            $months = array_fill(1, 12, 0); // Preenche o array com 0 para cada mês (1 a 12)
        
            // Verificar se há resultados e preenchê-los no array
            while ($row = $result->fetch_assoc()) {
                $month = (int)$row['month'];  
                $count = (int)$row['count'];
                $months[$month] = $count;
            }
        
            $this->connect()->close();
            return $months;
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
    


    public function chamadosTable(){

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


public function quantidade($tabela){
    $sql = "SELECT COUNT(*) FROM $tabela";
    $res = $this->connect()->query($sql);
    $dados = $res->fetch_row();
    $this->connect()->close();
    return $dados[0];
    
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

    public function novoConcurso($dados){
        $sql = "INSERT INTO concursos (titulo, tag, descricao, img_anuncio, img_banner, data_inicio,
        data_fim, status) VALUES ('{$dados["title"]}','{$dados["tag"]}','{$dados["descricao"]}','{$dados["img_anuncio"]}','{$dados["img_banner"]}', '{$dados["data_inicio"]}', '{$dados["data_fim"]}', '1')";
       $res = $this->connect()->query($sql);
    
       if (!$res) {
           $this->connect()->close();
           return ['result' => -1, 'error' => $this->connect()->error];
       }else{
           $this->connect()->close();
           return ['result' => 1]; 
       
   }
}
    public function novoBanner($dados){
        if ($dados["status"] == "1") {
            $id = $dados["status"] ;
            $this->connect()->query("UPDATE banner SET status = 0 WHERE ID_BANNER <> $id");
        }
        $sql = "INSERT INTO banner (img, datahora, status) VALUES ('{$dados["img"]}',now(), '{$dados["status"]}')";
        $res = $this->connect()->query($sql);
        if (!$res) {
            $this->connect()->close();
            return ['result' => -1, 'error' => $this->connect()->error];
        }else{
            $this->connect()->close();
            return ['result' => 1]; 
        
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
WHERE p.`descricao` LIKE '%{$hashtag}%'";
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
}

?>