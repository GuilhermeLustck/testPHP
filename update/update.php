<?php
    session_start();
    
    include("../config/dados.php");
    include("../config/config.php");

    

    $id=$_GET["id"];
    

   
    $res=getUpdate($id);
    

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <Link type="text/css" href="../regis/regi.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../regis/regi.js"></script>
</head>
<body>
    <main class="corpo">
        <main class="formulary">
            
            <a href="../principal">Voltar</a></br>
            <?php 
            
            echo("
                <section class=img>
                    <img class=image src=../fotos/" .$res["imagen"]. ">
                </section>
            ");
            
            
            
            ?>

            <form class="form" action="upDatabase.php" method="POST" enctype="multipart/form-data">
                
                <?php
                    
                    echo("
                        <label for=Item>Nome do autor</label><br/>
                        <input type=text name=Item id=Item class=input value=". $res["NAutor"] .">
                        <br/>
                        
                        <label for=Titulo>Titulo</label><br/>
                        <input type=text name=Titulo id=Titulo class=input value=". $res["TLivro"] ."> 
                        <br/>

                        <label for=Descriçao>Descrição</label><br/>
                        <textarea rows=10 cols=30 name=Descricao id=desc >". $res["Sinopse"] ."</textarea><br/>
                        
                        

                        <label for=img>Image</label> <br/>
                        <input type=file name=img id=img required><br/>
                    ");

                ?>

                <input type="submit" value="enviar" class="enviar">

            </form>
        </main>
    </main>
    
</body>