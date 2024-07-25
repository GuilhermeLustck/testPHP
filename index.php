<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <Link type="text/css" href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
    <?php
        function edit($id){

            echo("ID do objeto".$id);

        }

    ?>
</head>

<body>

    <header class="cabe">
        
        <section id="registrar">
            <button type="button" class="button" >registrar</button>
        </section>

    </header>

    <main class="corpo">

        <h1 id="erro"></h1>
        <article class="conteudo">
            <?php
                include("config/dados.php");
                include_once("config/config.php");

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
                            <img class=image src=fotos/".$result[$i]["img"]." alt=".$result[$i]["descricao"].">
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
        </article>
        
    </main>
        
</body>