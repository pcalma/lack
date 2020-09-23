
<?php 
require_once('Modelo/class.conexion.php');
require_once('Modelo/class.cliente.php');
 ?>

<?php include 'Vista/Inicio/partials/head.php';?>
<?php include 'Vista/Inicio/partials/header.php';?>

<?php include 'Vista/Inicio/partials/inicioSesion.php';?>
<?php include 'Vista/Inicio/partials/carrusel.php';?>

<?php include 'Vista/Inicio/partials/promo.php';?>
<?php include 'Vista/Inicio/partials/nosotros.php';?>

<?php include 'Vista/Inicio/partials/comentarios.php';?>
<?php include 'Vista/Inicio/partials/logos.php';?> 

<?php include 'Vista/Inicio/partials/footer.php';?> 


<!-- REGISTRAR -->
  <!-- Bootstrap core JavaScript-->
  <script src="Vista/Cliente/Vista_p/vendor/jquery/jquery.min.js"></script>
  <script src="Vista/Cliente/Vista_p/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Vista/Cliente/Vista_p/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Vista/Cliente/Vista_p/js/sb-admin-2.min.js"></script>



  <!-- Page level custom scripts -->
  <script src="Vista/Cliente/Vista_p/js/demo/datatables-demo.js"></script>



<!-- REGISTRAR -->







    <!-- ALL JS FILES -->
    <script src="Vista/Inicio/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="Vista/Inicio/js/custom.js"></script>


<!-- LOGIN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="Vista/Cliente/Vista_p/js/overhang.min.js"></script>
  <script src="Vista/Cliente/Vista_p/js/app.js"></script>
<!-- LOGIN -->









</body>






   <!---- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>---->




</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Agregar Usuarios");
$('#action').val("Add");
$('#operation').val("Add");

    });



  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var nombre_cliente = $('#nombre_cliente').val();
    var nombre_u = $('#nombre_u').val();
    var edad = $('#edad').val();
    var genero = $('#genero').val();
    var fecha_nacimiento = $('#fecha_nacimiento').val();
    var apellido_cliente = $('#apellido_cliente').val();
    var email = $('#email').val();
    var pass = $('#pass').val();
    var cedula = $('#cedula').val();

  
    if(nombre_cliente != '' && nombre_u != '')
    {
      $.ajax({
        url:"Controller/Cliente/insertLogin.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {


          alert(data);
          $('#user_form')[0].reset();

          $('#Registration').modal('hide');
          dataTable.ajax.reload();


        }

      });

//document.location = "index.php";(REDIRECCIONAR)
    }

    else
    {
      alert("Both Fields are Required");
    } 
  });




  }); 
  
</script>