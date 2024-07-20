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





        public function registrosAdd($nome){
            $sql = "INSERT INTO registros (nome, datahora) VALUES ('{$nome}', now());";
            $res = $this->connect()->query($sql);
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










    public function userTable($busca, $campo) {
        if($busca == "0" || $campo =="0"){
        $sql = "SELECT * FROM usuario;";
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








    public function verifyMailTabCliente($email){
        $sql = "SELECT * FROM cliente WHERE email = '{$email}'";
        $res = $this->connect()->query($sql);
        $dados=array();
        $dados["result"] = 1;
        while($row=$res->fetch_assoc()){
            $dados["id"] = $row["ID_CLIENTE"];
            $dados["nome"] = $row["nome"];
            $dados["email"] = $row["email"];
        }
        //exit(); 
        if($res->num_rows > 0){
            $this->connect()->close();
            $dados['result'] = 1;
            return $dados;
        }else{
            $this->connect()->close();
            $dados['result'] = 0;
            return $dados;
        }
    }

    public function insertNewClientTemp($dados){

        $sql = "INSERT INTO cliente_temp (string,pnome,snome,email,senha,cidade,uf,datahora,status) VALUES ('{$dados["string"]}','{$dados["pnome"]}','{$dados["snome"]}','{$dados["email"]}','{$dados["senha"]}','{$dados["cidade"]}','{$dados["uf"]}',now(),1)";
        
        $res = $this->connect()->query($sql);
        if($res->num_rows > 0){
            $this->connect()->close();
            $data['result'] = 1;
            return $data;
        }else{
            $this->connect()->close();
            $data['result'] = 0;
            return $data;
        }
    }

    public function insertNewClient($dados){

        $sql = "INSERT INTO cliente (pnome,snome,email,senha,cidade,uf,datahora,status) VALUES ('{$dados["pnome"]}','{$dados["snome"]}','{$dados["email"]}','{$dados["senha"]}','{$dados["cidade"]}','{$dados["uf"]}',now(),1)";
        
        $res = $this->connect()->query($sql);
        if($res->num_rows > 0){
            $this->connect()->close();
            $data['result'] = 1;
            return $data;
        }else{
            $this->connect()->close();
            $data['result'] = 0;
            return $data;
        }
    }




    public function showMessages($idConversa) {
        $sql = "SELECT m.ID_MENSAGEM, m.texto_mensagem, m.datahora, u.ID_ADM AS id_remetente, u.nome AS nome_remetente, 
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
                    'texto_mensagem' => $row['texto_mensagem'],
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
            $sql = "INSERT INTO mensagens (id_conversa, id_remetente, texto_mensagem, datahora) VALUES (('{$dados["id_conversa"]}','{$dados["id_remetente"]}','{$dados["txt"]}', NOW())";
            $res = $this->connect()->query($sql);
            $this->connect()->close();
            return $res;
        }

        public function getUserInfo($id_user){
            $sql= "SELECT * FROM administradores where ID_ADM = {$id_user}";              
            $res = $this->connect()->query($sql);
            $dados = [];
            while($row=$res->fetch_assoc()){
                $dados["nome"] = $row["nome"];
                $dados["pfp"] = $row["pfp"];
            }
            
            $this->connect()->close();
            return $dados;
         }

        public function showConversas($idRemetente){

            $sql= "SELECT * FROM conversas where id_user1 = {$idRemetente} or id_user2 = {$idRemetente}";  
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


        public function inserirConversa($id_user1, $id_user2) {
            
           $verif = $this-> verificarConversa($id_user1,$id_user2);
           if($verif['result'] == 0){
            $sql = "INSERT INTO conversas (id_user1, id_user2, datahora) VALUES ({$id_user1}, {$id_user2}, NOW())";
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
    }
?>