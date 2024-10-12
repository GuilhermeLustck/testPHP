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
        <a href="perfil_da_pessoa.html">
            <img src="perfil.png" alt="Imagem de perfil" class="imgperfil">
        </a>
        </div>

    </header>
    <main>
        <?php
                include("../config/dados.php");
                include_once("../config/config.php");

                global $CONECT;

                $SQL=$CONECT->prepare("SELECT * FROM registro");
                $SQL->execute();

                $result=$SQL->fetchALL(PDO::FETCH_ASSOC);

                if($result){
                   session_start();
                   $_SESSION["dados2A"]=$result;

                    for( $i=0;$i<count($result);$i++ ){

                       echo("
                        <form method=GET action=update/update.php class=form >
                            <section class=cont>
                            <img class=image src=../fotos/".$result[$i]["img"].">
                            </br> 
                            <section class=boxTexto >
                                <h3>".$result[$i]["Titulo"]."</h3>
                                <p>".$result[$i]["Item"]."</p></br>
                                <p>".$result[$i]["descricao"]."</p>
                            </section> 
                            <input type=hidden name=id value=".$result[$i]["IDres"].">
                            <input type=submit value=edit class=button1  onclick='edit(".$result[$i]["IDres"].")' >
                            </section>
                        </form>"
                        
                        
                        );
                       

                    }
                }
                

            ?>
        <div class="novo-post">
            <button type="button" class="button"> Novo Post </button>
        </div>
    </main>
    

</body>
</html>