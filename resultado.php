<?php
    //Importando arquivo capturadorTag.php
    include 'capturadorTag.php';

    //Verificando e obtendo arquivo de audio de index.php (Upload)
    if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio")
    {
        
        //Definição do local de armazenamento do arquivo de audio (Pasta raiz)
        $dir='';
        $audio_path=$dir.basename($_FILES['audioFile']['name']);
        
        //Verificando dados
        if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
        
        {
            //Enviando arquivo de audio para capturadorTag.php, obtendo seus dados e armazenando os mesmos em $dadosaudio
            $dadosaudio = tagReader($audio_path);
        
            //Separando dados do Array $dadosaudio
            $nomearquivo = $dadosaudio[FileName];
            $album = $dadosaudio[Album];
            $artista = $dadosaudio[Artista];
            
        }
        
        //Validando erros
        if ($nomearquivo == null){
            $nomearquivo = "Indefinido";
        }
        if ($album == null){
            $album = "Desconhecido";
        }
        if ($artista == null){
            $artista = "Desconhecido";
        }
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
		
		<title>Análise Música</title>
		
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		
		<!-- MATERIAL DESIGN LITE IMPORTS-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        
    </head>
    
    <body>
        
    <div class="mdl-grid center-items">
        <div class="mdl-cell mdl-cell--4-col">
                
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Achamos!</h2>
                </div>
                <div class="mdl-card__supporting-text">
                <?php 
                    echo'<span>Nome do arquivo de música: '.$nomearquivo.'</span></br>';
                    echo'<span>Álbum: '.$album.'</span></br>';
                    echo'<span>Artista: '.$artista.'</span></br>';
                ?>
                    
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="index.php"> 
                        <button id="pesquisar" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                              <i class="material-icons">replay</i>
                              
                        </button>
                    </a> 
                </div>
                
            </div>
        </div>    
        
    </body>
        
</html>