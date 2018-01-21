<?php

//Leitura das Tags
function tagReader($audio){
    
    //Definição das tags
    //ID3 Versão 2.3
    $v23 = array("TALB","TPE1");
    //ID3 Versão 2.2
    $v22 = array("TAL","TP1");
    
    //Tamanho
    $ftam = filesize($audio);
    
    $faberto = fopen($audio,"r");
    $tag = fread($faberto,$ftam);
    
    //Limpando
    $dadotmp = "";
    fclose($faberto);
    //Verificando tipo do arquivo e se tem suporte a tags ID3
    if (substr($tag,0,3) == "ID3") {
        //Acesso as tags de nome do arquivo e versionamento.
        $resultado['FileName'] = $audio;
        
        $resultado['Version'] = hexdec(bin2hex(substr($tag,3,1))).".".hexdec(bin2hex(substr($tag,4,1)));
    //Caso não seja um arquivo suportado (Que não tenha suporte as tags ID3)
    }else{
        //Redirecionando para página de erro
        header("location: erro.php");
    }
    //Verificando versões e obtendo dados
    if($resultado['Version'] == "4.0" || $resultado['Version'] == "3.0"){
        for ($i=0;$i<count($v23);$i++){
            if (strpos($tag,$v23[$i].chr(0))!= FALSE){
                $pos = strpos($tag, $v23[$i].chr(0));
                $comp = hexdec(bin2hex(substr($tag,($pos+5),3)));
                $dado = substr($tag, $pos, 9+$comp);
                for ($a=0;$a<strlen($dado);$a++){
                    $char = substr($dado,$a,1);
                    if($char >= " " && $char <= "~") $dadotmp.=$char;
                }
                //Pegando dados das tags TALB e TPE1 (Album e Artista)
                if(substr($dadotmp,0,4) == "TALB") $resultado['Album'] = substr($dadotmp,4);
                if(substr($dadotmp,0,4) == "TPE1") $resultado['Artista'] = substr($dadotmp,4);
                //Limpando
                $dadotmp = "";
            }
        }
    }
    if($resultado['Version'] == "2.0"){
        for ($i=0;$i<count($v22);$i++){
            if (strpos($tag,$v22[$i].chr(0))!= FALSE){
                $pos = strpos($tag, $v22[$i].chr(0));
                $comp = hexdec(bin2hex(substr($tag,($pos+3),3)));
                $dado = substr($tag, $pos, 6+$comp);
                for ($a=0;$a<strlen($dado);$a++){
                    $char = substr($dado,$a,1);
                    if($char >= " " && $char <= "~") $dadotmp.=$char;
                }
                //Pegando dados das tags TAL e TP1 (Album e Artista)
                if(substr($dadotmp,0,3) == "TAL") $resultado['Album'] = substr($dadotmp,3);
                if(substr($dadotmp,0,3) == "TP1") $resultado['Artista'] = substr($dadotmp,3);
                //Limpando
                $dadotmp = "";
            }
        }
    }
    //Apagando arquivo
    unlink($audio);
    //Retornando resultados
    return $resultado;
}
?>