<?php

require_once('manager.class.php');

class Log extends Manager{

    public $texto;

    public function setTexto($string){
        $today = date("Y-m-d H:i:s");
        $this->texto = $today . " - " . $string;
    }

    public function fileName(){
        $mes = date("m"); 
        $ano = date("Y");
        $nameFile = $ano . "_" . $mes . ".txt";
        return $nameFile;
    }


    public function fileWriter(){

        $nameFile = $this->fileName();
    
        if (!file_exists("../view/log/{$nameFile}")) {
            $arquivo = fopen("../view/log/{$nameFile}","a");
            fwrite($arquivo, $this->texto);
            fclose($arquivo);        

            
             
        } else {
            
            $arquivo = fopen("../view/log/{$nameFile}","a");
            fwrite($arquivo, $this->texto);
            fclose($arquivo);
        }

        $manager = new Manager();
     $manager->registrosAdd($nameFile); //verificar pq nn tá funcionando
     
    }
    
    

}

?>