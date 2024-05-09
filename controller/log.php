<?php

require "../model/Log.class.php";

$log = new Log();
$log->setTexto("Vou jogar Sniper 5 quando chegar em casa!\n");
$log->fileWriter();
echo $_SERVER['REMOTE_ADDR'];


?>