<?php
/////ATENÇÃO //////////
/* ##########-Criado por XKrypt-######
________________________________________________________________________________

    NÃO ME RESPONSABILIZO POR USO INCORRETO OU INDEVIDO DESTE CÓDIGO.
________________________________________________________________________________
*/
class JUConfig
{
  protected $File;
  public function __construct ( $File ) {
    if(is_file($File))
        $this->File = $File;
    else if(is_dir($File))//se for um diretorio retorna um erro
          echo "Erro: Esperado: arquivo, encontrado: diretorio";
    else {    //Se o arquivo não existir ele o cria
      $F = fopen($File,"w");
      $Default = "{
}";
      fwrite($F,$Default);
      fclose($F);
      $this->File = $File; unset($F);
    }

    }
  public function Get($Is_Array = false){
    //Pega uma Configuração e a retorna
     $File_Configs = file_get_contents($this->File);
          $Configs = json_decode($File_Configs,$Is_Array);
     unset($File_Configs);
     return $Configs;
   }

  public function New($Name,$Value){
    $Settings = file_get_contents($this->File);
    $Configs = json_decode($Settings,true);
    $Configs[$Name] = $Value;
    $To_Save  = json_encode($Configs);
    $f = fopen($this->File,"w");
    fwrite($f,$To_Save);
      //Escreve e salva os dados
    fclose($f);
    unset($f);
   }

   public function Modify($Name,$Value){
     $Settings = file_get_contents($this->File);
     $Configs = json_decode($Settings,true);
    if(array_key_exists($Name,$Configs))
      $Configs[$Name] = $Value;
      $To_Save  = json_encode($Configs);
      $f = fopen($this->File,"w");
      fwrite($f,$To_Save);
        //Escreve e salva os dados
      fclose($f);
      unset($f);
   }

   public function Del($Key_Name){
     $Settings = file_get_contents($this->File);
     $Configs = json_decode($Settings,true);
     unset($Configs[$Key_Name]);
     $To_Save  = json_encode($Configs);
     $f = fopen($this->File,"w");
     fwrite($f,$To_Save);
       //Escreve e salva os dados
     fclose($f);
     unset($f);
   }

}


 ?>
