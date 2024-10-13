<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apock web design</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <?php
    include "../config/dados.php";
    //pega o id do usuario
    session_start();
    if(!$id=$_SESSION["ID"]){
      header("location:../index.php");
    }else{
      $DADOS=usuario($id);
    }
  ?>
  </head>

<body>

  <section class="seccion-perfil-usuario">

    <div class="perfil-usuario-header">
      <div class="perfil-usuario-portada">
        <div class="perfil-usuario-avatar">
          <img src="perfil.png" alt="img-avatar">
          <button type="button" class="boton-avatar">
            <i class="far fa-image"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="perfil-usuario-body">
      <div class="perfil-usuario-bio">
        <h3 class="titulo"> <?echo($DADOS["Nome"]); ?></h3>
        <p class="idusuario"> @IDUsuario </p>
      </div>
      <div class="perfil-usuario-footer">
        <ul class="lista-datos">
          <li><i class="icono fas fa-calendar-alt"></i> <?echo($DADOS["DTNasc"]); ?> </li>
          <li><i class="icono fas fa-map-marker-alt"></i> <?echo($DADOS["Ender"]); ?> </li>
          <li><i class="icono fas fa-phone-alt"></i> <?echo($DADOS["Tel"]); ?></li>
          <li><i class="icono fas fa-share-alt"></i> <?echo($DADOS["Email"]); ?> </li>
        </ul>
      </div>
      <div class="redes-sociales">
        <a href="" class="boton-redes whatsapp fab fa-whatsaap"><i class="icon-whatsapp"></i></a>
        <a href="" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
        <a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
        <a href="" class="boton-redes x fab fa-x"><i class="icon-x"></i></a>
      </div>
    </div>
  </section>

</body>

</html>