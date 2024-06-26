<?php

class Ferramentas{

    public $param;
    public $senha;

    public function antiInjection($param) {
        // Define as palavras-chave e caracteres potencialmente perigosos
        $palavras = array(
            "from", "select", "insert", "delete", "where", "drop", "table", "show", 
            "update", "declare", "exec", "set", "alter", "cst", "union", "column", 
            "*", "%", "\"", "'", "\\", "--"
        );
        
        // Converte a string para minúsculas
        $paramL = strtolower($param);
        
        // Remove as palavras-chave e caracteres da string
        $str = str_replace($palavras, "", $paramL);
        
        // Compara o comprimento da string original com a string modificada
        if (strlen($param) != strlen($str)) {
            return 0;
        } else {
            return 1;
        }
    }

    public function sha256($senha){
        $senhaCript = hash('sha256', $senha);
        return $senhaCript;
    }

    public function geradorStringRandom($length){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $var_size = strlen($chars);
        $random_str = "";
        for( $x = 0; $x < $length; $x++ ) {  
            $random_str .= $chars[ rand( 0, $var_size - 1 ) ];  
        }
        return $random_str;
    }
    public function pegaExtensao($arq){
        $ext = explode('.',$arq);
        return $ext[1];
    }

    public function geradorMicroTime(){
        $time = microtime(true);
        $valor = explode('.',$time);
        return $valor[0];
    }
}
?>