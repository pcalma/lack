<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.proveedor.php');
 ?>


<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>

<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Proveedor</h1>
          <p class="mb-4">Encontraras todos los proveedor registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Proveedor </h6>
            </div>

            <div class="card-body">





      <div class="table-responsive">
        <br />
        <div>
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-warning btn-lg">Add ++</button>
        </div>


        
        <br /><br />
        <table id="myTable" class="table table-bordered" width="100%">
          <thead>
            <tr>
          
              <th width="5%">cod_proveedor</th>
<!---              <th width="25%">direccion</th>
              <th width="20%">nombre_proveedor</th>
              <th width="10%">tel_proveedor</th>
              
-->
            </tr>
          </thead>
        </table>
        
      </div>
    </div>
        </div>
            </div>
 <?php include 'Vista_p/partials/footerTable.php';?>



<!-------------------------------------------------------------->
<script type="text/javascript" language="javascript" >


$(document).ready(function(){

  
$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Agregar Usuarios");
$('#action').val("Add");
$('#operation').val("Add");

    });



  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Detalle/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});





  });




</script>