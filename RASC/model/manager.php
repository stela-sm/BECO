<?php
require 'conexao.php';

class Manager extends Conexao{



    public function loginCliente($email, $senha){
        $sql = "SELECT * FROM usuario WHERE email = '{$email}' and senha = '{$senha}'";
        $res = $this->connect()->query($sql);
       
        echo var_dump($res);
 if(mysqli_num_rows($res) > 0){
    $dados=array();
    $dados["result"] = 1;
    while($row=$res->fetch_assoc()){
        $dados["ID_USUARIO"] = $row["ID_USUARIO"];
        $dados["nome"] = $row["nome"];
        $dados["pfp"] = $row["pfp"];
        $dados["cidade"] = $row["cidade"];
        $dados["pais"] = $row["pais"];
        $dados["datan"] = $row["datan"];
        $dados["resumo"] = $row["resumo"];
        $dados["bio"] = $row["bio"];
        $dados["status"] = $row["status"];
        $dados["email"] = $row["email"];
        $dados["cpf"] = $row["cpf"];
    }
    $this->connect()->close();
    $dados['result'] = 1;
    return $dados; 
}else{
            $this->connect()->close();
            $dados['result'] = 0;
            return $dados;
        }
    }

    
}
?>