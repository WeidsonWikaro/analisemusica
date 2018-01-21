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
        
        <!-- Os dados submetidos daqui serão enviados para o arquivo resultado.php-->
        <form action="resultado.php" method="post" enctype="multipart/form-data">
            
            <div class="mdl-grid center-items">
                <div class="mdl-cell mdl-cell--4-col">
                
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Selecione a música</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            e iremos te informar de que álbum pertence e qual o seu artista.
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                        <div id="selecao" class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                          
                          
                            <input class="mdl-textfield__input" placeholder="sem música" type="text" id="nome_arquivo" onkeypress="return false;" required data-readonly/>
                       
                            <div class="mdl-button mdl-button--icon mdl-button--file">
                                <i class="material-icons">add</i>
                                
                                <input type="file" name="audioFile" id="id" accept=".mp3" onchange="document.getElementById('nome_arquivo').value=this.files[0].name;" />
                            </div>
                            
                        </div>   
                        <button id="pesquisar" type="submit" value="Upload Audio" name="save_audio" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                              <i class="material-icons">search</i>
                              
                        </button>
                    </div>
                
                </div>
            </div>
            
        </form>
        
        
    </body>
       
       <!--Por Weidson Nascimento --> 
</html>