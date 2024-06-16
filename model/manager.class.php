<?php
require_once('Conexao.class.php');

class Manager extends Conexao{

   

    public function admLogin($dados){
        $sql = "SELECT * FROM administradores WHERE email = '{$dados['email']}' and senha ='{$dados['senha']}';";
        $res = $this->connect()->query($sql);
       
        //exit(); 
        if($res->num_rows > 0){
            $dados=array();
            $dados["result"] = 1;
            while($row=$res->fetch_assoc()){
                $dados["ID_ADM"] = $row["ID_ADM"];
                $dados["nome"] = $row["nome"];
                $dados["email"] = $row["email"];
            }
            $this->connect()->close();
            return $dados;
        }else{
            $this->connect()->close();
            $dados['result'] = 0;
            return $dados;
        }
    }


        //exit(); 
        public function admTable($busca, $campo) {
            if($busca == "0" || $campo =="0"){
            $sql = "SELECT * FROM administradores;";
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
}
?>