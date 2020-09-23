

<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.domicilio.php');
 ?>
<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>


<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Domicilio</h1>
          <p class="mb-4">Encontraras todos los Domicilio registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Domicilio </h6>
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
  <!-----------
  	cod_domicilio
  	direccion
  	estado
  	fechaEnrega
cod_cliente
cod_empleado
fecha
hora
tel_cliente
---------------->        
              <th width="5%">cod_domicilio</th>
              <th width="25%">direccion</th>
              <th width="20%">estado</th>
              <th width="10%">fechaEnrega</th>
              
              <th width="20%">Ver</th>      
              <th width="10%">Edit</th>
              <th width="13%">Delete</th>
            </tr>
          </thead>
        </table>
        
      </div>
    </div>
        </div>
            </div>

 <?php include 'Vista_p/partials/footerTable.php';?>

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
      url:"../../Controller/Domicilio/fetch.php",
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