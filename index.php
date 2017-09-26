<?php
require 'JUConfig.php';
//Exemplos
$Controller =  new JUConfig("My_New_Config.json");

$Controller->New("New_Config","Hello i a new config");

$Controller->Modify("New_Config","i will be modfied!");

$My_Saved_Configs_Array = $Controller->Get(true);//true para Array keys
$My_Saved_Configs_Object = $Controller->Get();//Vazio para objeto

echo $My_Saved_Configs_Array["New_Config"]."\n Array";
echo $My_Saved_Configs_Object->{"New_Config"}."\n Objeto";

$Controller->Del("New_Config");

echo "\n ;)";


?>
