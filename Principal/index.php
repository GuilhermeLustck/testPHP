<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title> TrocaTroca</title>
    <link rel="stylesheet" href="style.css">
    <!--<Link type="text/css" href="../style.css" rel="stylesheet">-->
    
</head>
<body>
    <header>

        <img src="logo.png" class="imglogo" alt="logo da empresa">

        <div class="search-container">
        <input type="text" class="abadepesquisa" placeholder="Pesquisar...">
        <div class="vertical-bar"></div>
        <a href="perfil">
            <img src="perfil.png" alt="Imagem de perfil" class="imgperfil">
        </a>
        </div>

    </header>
    <main>
        <?php
                include("../config/dados.php");
                include_once("../config/config.php");
                session_start();
                global $CONECT;
                
                echo($_SESSION["ID"]);

                $SQL=$CONECT->prepare("SELECT * FROM registro");
                $SQL->execute();

                $result=$SQL->fetchALL(PDO::FETCH_ASSOC);

                if($result){
                   session_start();
                   

                    for( $i=0;$i<count($result);$i++ ){

                       echo("
                            <div class=post>
                                <form method=GET action=update/update.php class=form >
                                    <section class=cont>
                                        <img class=imglivro src=../fotos/".$result[$i]["imagen"]."> 
                                        <section class=boxTexto >
                                            <h3>".$result[$i]["TLivro"]."</h3>
                                            <p> ".$result[$i]["Genero"]."</p>
                                            <p> ".$result[$i]["Sinopse"]."</p>
                                            <p>".$result[$i]["NAutor"]."</p>
                                            
                                            <p>false</p>
                                            
                                        </section> 
                                        <input type=hidden name=id value=".$result[$i]["IDCont "].">
                                        <input type=submit value=edit class=button1  >
                                    </section>
                                </form>
                            </div>
                        
                        ");
                       

                    }
                }
                

            ?>
        <div class="novo-post">
            <a href="../registro" ><button type="button" class="button"> Novo Post </button></a>
        </div>
    </main>
    

</body>
</html>