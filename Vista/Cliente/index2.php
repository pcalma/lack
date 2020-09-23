<?php include 'Vista_p/partials/head.php';?>
<?php



if (isset($_SESSION["sesiones"])) {
 if ($_SESSION["sesiones"]["id_rol"] == 1) {
        header("location:inicio.php");
    }

}
else {
    header("location:login.php");
}

?>
<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>

<?php include 'Vista_p/partials/menu.php';?>
<div class="container">
  <div class="starter-template">
    <br>
    <br>
    <br>
    <div class="jumbotron">
      <div class="container text-center">
<!-- video 16 /https://www.youtube.com/watch?v=ljMW0PC-SPY&list=PL2cY4BWatePFE_5UchOt1amQBPLHzYj0X-->
        <h1><strong>Bienvenido PAULITA </strong> <?php echo $_SESSION["sesiones"]["nombre_cliente"]; ?></h1>
        <p>
          Panel de control | <span class="label label-info"><?php echo $_SESSION["sesiones"]["id_rol"]==1?'Admin':'Cliente'; ?></span> <!--entonces el usuario va a ser admin:--> 
        </p>
        <p>
          <a href="cerrar-session.php" class="btn btn-primary btn-lg">cerrar sessión</a>
        </p>
      </div>
    </div>
  </div>
</div><!-- /.container -->
  <?php include 'Vista_p/partials/footer.php';?>