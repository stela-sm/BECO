<?php
require_once('Conexao.class.php');

class Manager extends Conexao{

   

    public function admLogin($dados){
    // Estabelece a conexão
    $conn = $this->connect();

    // Consulta SQL
    $sql = "SELECT * FROM administradores WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $dados['email'], $dados['senha']);

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
        public function admTable($busca) {

            if($busca["status"] == "" && $busca["poder"] =="" && $busca["pesquisa"] == ""){
            $sql = "SELECT * FROM administradores;";
            }else if($busca["status"] != "" && $busca["poder"] != ""){
                $sql = "SELECT * FROM administradores WHERE poder = {$busca["poder"]} AND status = {$busca["status"]}";
            }else if($busca["status"] != "" && $busca["poder"] == ""){
                $sql = "SELECT * FROM administradores WHERE status = {$busca["status"]}";
            }else if ($busca["status"] == "" && $busca["poder"] != ""){
                $sql = "SELECT * FROM administradores WHERE poder = {$busca["poder"]}";
            }else if ($busca["pesquisa"] != ""){

                $pesquisa = $busca["pesquisa"];
                $sql = "SELECT * FROM administradores WHERE nome LIKE '%$pesquisa%'  OR email LIKE '%$pesquisa%' ";
            }

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
                        'ID_ADM'   => $row['ID_ADM'],
                        'nome'     => $row['nome'],
                        'email'    => $row['email'],
                        'celular'  => $row['celular'],
                        'poder'    => $row['poder'],
                        'status'   => $row['status'],
                        'data'     => $row['datahora']
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
        
        public function getAdmData($id) {
            $sql = "SELECT * FROM administradores WHERE ID_ADM = {$id};";
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
                        'ID_ADM'   => $row['ID_ADM'],
                        'nome'     => $row['nome'],
                        'pfp'     => $row['pfp'],
                        'email'    => $row['email'],
                        'celular'  => $row['celular'],
                        'poder'    => $row['poder'],
                        'status'   => $row['status'],
                        'data'     => $row['datahora'],
                        'rg'     => $row['rg'],
                        'cpf'     => $row['cpf'],
                        'cep'     => $row['cep'],
                        'obs'     => $row['obs'],
                        'estado'     => $row['estado_civil'],
                        'numero'     => $row['numero'],
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
        



        public function admStatus($id, $status){
            $sql = "UPDATE administradores SET status = {$status} WHERE ID_ADM = {$id};";
            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->close()];
            }else{
                $this->connect()->close();
                return ['result' => 1];
            }
        }

        public function userStatus($id, $status){
            $sql = "UPDATE usuario SET status = {$status} WHERE ID_USER = {$id};";
            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->close()];
            }else{
                $this->connect()->close();
                return ['result' => 1];
            }
        }



        
        public function admExcluir($id){
            $sql = "DELETE FROM administradores WHERE ID_ADM = {$id};";
            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->close()];
            }else{
                $this->connect()->close();
                return ['result' => 1];
            }
        }

        public function userExcluir($id){
            $sql = "DELETE FROM usuario WHERE ID_USER = {$id};";
            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->close()];
            }else{
                $this->connect()->close();
                return ['result' => 1];
            }
        }

        public function admUpdate($dados){
            $sql = "UPDATE administradores SET 
            nome = '{$dados['nome']}', 
            email = '{$dados['email']}', 
            pfp = '{$dados['pfp']}', 
            celular = '{$dados['celular']}', 
            poder = {$dados['poder']}, 
            data_nascimento = '{$dados['data_nascimento']}', 
            rg = '{$dados['rg']}', 
            estado_civil = '{$dados['estado_civil']}', 
            cep = '{$dados['cep']}', 
            numero = '{$dados['numero']}', 
            cpf = '{$dados['cpf']}', 
            obs = '{$dados['obs']}'
        WHERE ID_ADM = '{$dados['id']}';";


            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->close()];
            }else{
                $this->connect()->close();
                return ['result' => 1];
            }
        }


        public function userUpdate($dados){
            $sql = "UPDATE usuario SET 
                    username = '{$dados['username']}', 
                    nome = '{$dados['nome']}', 
                    email = '{$dados['email']}', 
                    celular = '{$dados['celular']}',
                    data_nascimento = '{$dados['data_nascimento']}', 
                    estado = '{$dados['estado']}', 
                    pais = '{$dados['pais']}', 
                    pfp = '{$dados['pfp']}', 
                    biografia = '{$dados['bio']}',  
                    obs = '{$dados['obs']}'
                WHERE ID_USER = '{$dados['id']}';";
       
            $res = $this->connect()->query($sql);
            if (!$res) {
                $this->connect()->close();
                return ['result' => 0, 'error' => $this->connect()->error];
            } else {
                $this->connect()->close();
                return ['result' => 1];
            }
        }


       


    public function admNew($dados){
        $sql = "INSERT INTO administradores (pfp, nome,email,celular,poder,status,rg,cpf,cep,numero,estado_civil,data_nascimento,obs, senha, datahora) VALUES ('{$dados["pfp"]}','{$dados["nome"]}', '{$dados["email"]}', '{$dados["celular"]}', '{$dados["poder"]}', '{$dados["status"]}', '{$dados["rg"]}', '{$dados["cpf"]}', '{$dados["cep"]}', '{$dados["numero"]}', '{$dados["estadoCivil"]}', '{$dados["dataNascimento"]}',  '{$dados["obs"]}',  '{$dados["senha"]}',NOW());";
        $res = $this->connect()->query($sql);

        if($res){
            $this->connect()->close();
            $data['result'] = 1;
            return $data;
        }else{
            $this->connect()->close();
            $data['result'] = 0;
            return $data;
        }
    
    }


    public function userTable($busca) {
        if($busca["status"] == "" && $busca["data"] =="" && $busca["pesquisa"] == ""){
        $sql = "SELECT * FROM usuario;";
        }else if ($busca["pesquisa"] != ""){
            $pesquisa = $busca["pesquisa"];
            $sql = "SELECT * FROM usuario WHERE username LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' ";
        
            }else if($busca["status"] != "" && $busca["data"] != ""){
                $sql = "SELECT * FROM usuario WHERE datahora >= '{$busca["data"]}' AND status = {$busca["status"]}";
            }else if($busca["status"] != "" && $busca["data"] == ""){
                $sql = "SELECT * FROM usuario WHERE status = {$busca["status"]}";
            }else if ($busca["status"] == "" && $busca["data"] != ""){
                $sql = "SELECT * FROM usuario WHERE datahora >= '{$busca["data"]}'";
            }
      
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
                    'email'    => $row['email'],
                    'celular'  => $row['celular'],
                    'status'   => $row['status'],
                    'data'     => $row['datahora']
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
                        'nome'     => $row['nome'],
                        'email'    => $row['email'],
                        'cpf'    => $row['cpf'],
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
        
        
        

    public   function getAccessesByMonth() {
          
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
         
        $sql = "SELECT m.ID_MENSAGEM, m.texto_mensagem, m.datahora, m.file, u.ID_ADM AS id_remetente, u.nome AS nome_remetente, 
                       c.id_user1, a1.nome AS nome_user1, 
                       c.id_user2, a2.nome AS nome_user2
                FROM mensagens m
                JOIN administradores u ON m.id_remetente = u.ID_ADM
                JOIN conversas c ON m.ID_CONVERSA = c.id_conversa
                JOIN administradores a1 ON c.id_user1 = a1.ID_ADM
                JOIN administradores a2 ON c.id_user2 = a2.ID_ADM
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
            $sql= "SELECT * FROM administradores WHERE ID_ADM = '{$id_user}'";              
            $res = $this->connect()->query($sql);
            $dados = [];
            while($row=$res->fetch_assoc()){
                $dados["nome"] = $row["nome"];
                $dados["pfp"] = $row["pfp"];
            }
            
            $this->connect()->close();
            return $dados;
            
         }
 public function getUserInfoArtists($id_user){
            $sql= "SELECT * FROM usuario WHERE ID_USER = '{$id_user}'";              
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
            
            $sql= "SELECT * FROM conversas where tabela = 'administradores' AND id_user1 = '{$idRemetente}' or id_user2 = '{$idRemetente}' ";  
            $res = $this->connect()->query($sql);
            $dados = [];
            $i = 0;
            while($row=$res->fetch_assoc()){
              //  var_dump($row);
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
            $sql = "SELECT * FROM administradores WHERE nome LIKE '%$query%' LIMIT 15";
            $res = $this->connect()->query($sql);
        
            if (!$res) {
                return ['result' => -1, 'error' => $this->connect()->error];
            }
        
            if ($res->num_rows > 0) {
                $dados = [];
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $dados[$i] = [
                        'ID_ADM' => $row['ID_ADM'],
                        'nome' => $row['nome'],
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
            AND id_user2 = '$id_user2' AND tabela = 'administradores' OR id_user1 = '$id_user2'
            AND id_user2 = '$id_user1' AND tabela = 'administradores'";
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
            $sql = "INSERT INTO conversas (id_user1, id_user2, datahora, tabela) VALUES ('{$id_user1}', '{$id_user2}', NOW(), 'administradores')";
           //ver se essa PORRA dessa BUCETA de campo de TABELA tá setado na PORRA do front end
            $res = $this->connect()->query($sql);
           }
           $room = $this-> pegarRoom($id_user1,$id_user2);
            $this->connect()->close();
            return $room;
        }

        public function pegarRoom($id_user1, $id_user2) {
            $sql = "SELECT * FROM conversas WHERE id_user1 = '{$id_user1}'
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
        $sql = "SELECT * FROM chamados";
        $res = $this->connect()->query($sql);
        if (!$res) {
            return ['result' => 0, 'error' => $this->connect()->error];
            }
            if ($res->num_rows > 0) {
                $chamados = array();
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $chamados[$i] = [
                        'ID_CHAMADO' => $row['ID_CHAMADO'],
                        'email' => $row['email'],
                        'mensagem' => $row['mensagem'],
                        'datahora' => $row['datahora'],
                        'status' => $row['status'],                       
                        ];
                        $i++;
                        $chamados['result'] = $i;
                        }
                        return   $chamados;
                        }else{
                            return 2;
                        }

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
    $sql="SELECT * FROM administradores WHERE email = '$email'";
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
    $sql="UPDATE administradores SET senha = '$senha' WHERE email = '$email'";
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


public function quantidadePayment($payway){
    $sql = "SELECT COUNT(*) FROM compras WHERE metodo = '{$payway}'";
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
    echo "$sql";
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
public function transacoesTable($busca){
    if($busca["data"] =="" && $busca["pesquisa"] == "" && $busca["metodo"] == ""){
        $sql = "SELECT * FROM compras";
        }else if ($busca["pesquisa"] !== ""){
            $pesquisa = $busca["pesquisa"];
            $sql = "SELECT * FROM compras WHERE comprador LIKE '%$pesquisa%'  OR vendedor LIKE '%$pesquisa%' ";
        }else if($busca["data"] !== "" && $busca["metodo"] !== ""){
            $sql = "SELECT * FROM compras WHERE datahora > {$busca["data"]} AND metodo = {$busca["metodo"]}";
        }else if($busca["data"] !== "" && $busca["metodo"] == ""){
            $sql = "SELECT * FROM compras WHERE datahora > '{$busca["data"]}'";
        }else if ($busca["data"] == "" && $busca["medoto"] !== ""){
            $sql = "SELECT * FROM compras WHERE metodo = '{$busca["metodo"]}'";
        };
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
                    'ID_COMPRA'   => $row['ID_COMPRA'],
                    'id_prod'     => $row['id_prod'],
                    'valor'     => $row['valor'],
                    'comprador'   => $row['comprador'],
                    'vendedor'    => $row['vendedor'],
                    'metodo'      => $row['metodo'],
                    'status'      => $row['status'],
                    'cod_card_num'      => $row['cod_card_num'],
                    'data'        => $row['datahora']
                ];
                $i++;
            }
            $dados['result'] = $i; // Store count or simply use true to indicate success
            $this->connect()->close();
            $dados['query'] = $sql;
            return $dados;
        } else {
            $this->connect()->close();
            return ['result' => 0]; // No rows found
        }
    }

   
public function postsTable($limit, $search) {
  
    if($search == "none"){
    $sql = "SELECT p.ID_POST, p.id_user, u.username, u.ID_USER AS user_id,  p.thumbnail, p.titulo, p.descricao, p.tipo, p.datahora, p.status 
    FROM postagem p 
    JOIN usuario u ON p.id_user = u.ID_USER 
    ORDER BY p.datahora DESC 
    LIMIT {$limit} 
    
    ;
    ";
    //só busca
    }else if($search !== "none" ){
           $sql = "SELECT p.ID_POST, p.id_user, u.username, u.ID_USER AS user_id,  p.thumbnail, p.titulo, p.descricao, p.tipo, p.datahora, p.status 
            FROM postagem p 
            JOIN usuario u ON p.id_user = u.ID_USER 
            WHERE p.titulo LIKE '%{$search}%' OR p.descricao LIKE '%{$search}%'
            ORDER BY p.datahora DESC 
            LIMIT {$limit}
            ;
            ";
    }
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
                'ID_USER'   => $row['user_id'], 
                'username'  => $row['username'],
                'thumbnail' => $row['thumbnail'],
                'ID_POST'   => $row['ID_POST'],
                'titulo'    => $row['titulo'],
                'descricao' => $row['descricao'],
                'tipo'      => $row['tipo'],
                'post_datahora' => $row['datahora'], 
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
    public function excluirBanner($id){
        $sql = "DELETE FROM banner WHERE ID_BANNER = '{$id}'";
        $res = $this->connect()->query($sql);
        $this->connect()->close();
        return $res;
        
    }

    public function excluirConcurso($id){
        $sql = "DELETE FROM concursos WHERE ID_CONCURSO = '{$id}'";
        $res = $this->connect()->query($sql);
        $this->connect()->close();
        return $res;
        
    }

    
public function selectArtistas(){
    $sql = "SELECT vendedor, COUNT(*) AS total_compras
FROM compras
WHERE status = 2
GROUP BY vendedor
ORDER BY total_compras DESC
LIMIT 3;";
  $conn = $this->connect();
  $res = $conn->query($sql);
  if ($res) {
    $artistas = []; 
    while ($row = $res->fetch_assoc()) {
        $artistas[] = $row; 
    }

    return $artistas; 
} else {
    return []; 
}

}
public function excluirPost($id){
    $sql = "DELETE FROM postagem WHERE ID_POST = '{$id}'";
    $this -> excluirCompras($id);
    $this -> excluirSalvos($id);
    $res = $this->connect()->query($sql);
    $this->connect()->close();
    return $res;
}
public function excluirCompras($id){
    $id2 = $this -> pegarProduto($id);
    $sql = "DELETE FROM compras WHERE id_prod = '{$id2}'";
    $res = $this->connect()->query($sql);
    $this -> excluirProdutos($id);
    $this->connect()->close();
}
public function pegarProduto($id){
    $sql = "SELECT ID_PROD FROM produtos WHERE id_postagem = '{$id}'";
    $res = $this->connect()->query($sql);
    $row = $res->fetch_assoc();    
    return $row['ID_PROD'];
}
public function excluirProdutos($id){
    $sql = "DELETE FROM produtos WHERE id_postagem = '{$id}'";
    $res = $this->connect()->query($sql);
    $this->connect()->close();

}
public function excluirSalvos($id){
    $sql = "DELETE FROM salvos WHERE id_post = '{$id}'";
    $res = $this->connect()->query($sql);
    $this->connect()->close();

}
public function reativarPost($id){
    $sql = "UPDATE postagem SET status = 1 WHERE ID_POST = {$id}";
    $res = $this->connect()->query($sql);
    $this->connect()->close();

}
public function inativarPost($id){
    $sql = "UPDATE postagem SET status = 0 WHERE ID_POST = {$id}";
    $res = $this->connect()->query($sql);
    
    $this->connect()->close();

}
public function concluirChamado($id){
    $sql = "UPDATE chamados SET status = 'Concluído' WHERE ID_CHAMADO = {$id}";
    $res = $this->connect()->query($sql);
    
    $this->connect()->close();

}
}



?>