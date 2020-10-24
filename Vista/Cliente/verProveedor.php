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
            <th width="25%"> nombre_proveedor</th>
            <th width="20%"> direccion</th>
            <th width="10%">tel_proveedor</th>
              


 
              <th width="20%">Ver</th>      
               <th width="10%">Edit</th>
              <th width="13%">Delete</th>
   <!---                
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
<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="user_form" enctype="multipart/form-data" class="form-inline" >
      <!-----action="../Controlador/Cliente/cargar.php"------->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Proveedor</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">
     <!------
   <div class="form-group">

    <label for="">onservacion</label>
        <textarea type="textarea" id="direccion" class="form-control mx-sm-3" name="nombre_semilla" > </textarea>
 
  </div>

  <br>
------>
 

   <div class="form-group">

    <label for="">nombre_proveedor</label>
    <input id="nomP" class="form-control mx-sm-3" name="nomP" type="text" >
   
    
  </div>
  <br>


   <div class="form-group">

    <label for="">tel_proveedor</label>
    <input id="tel_proveedor" class="form-control mx-sm-3" name="tel_proveedor" type="text" >
   
    
  </div>
    <br> 

     <div class="form-group">

    <label for="">direccion</label>
    <input id="direccion" class="form-control mx-sm-3" name="direccion" type="text" >
       
  </div>

        </div>

        <div class="modal-footer">
          <input type="hidden" name="cod_proveedor" id="cod_proveedor" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </form>

  </div>
</div>


<!-------------------------------------------------------------->

<!-------------------------------------------------------------->
<div id="userModal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="user_form2" enctype="multipart/form-data" class="form-inline" >
      <!-----action="../Controlador/Cliente/cargar.php"------->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Proveedor</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">
     <!------
   <div class="form-group">

    <label for="">onservacion</label>
        <textarea type="textarea" id="direccion" class="form-control mx-sm-3" name="nombre_semilla" > </textarea>
 
  </div>

  <br>
------>
 

   <div class="form-group">

    <label for="">nombre_proveedor</label>
    <input id="nomP2" class="form-control mx-sm-3" name="nomP2" type="text" readonly >
   
    
  </div>
  <br>


   <div class="form-group">

    <label for="">tel_proveedor</label>
    <input id="tel_proveedor2" class="form-control mx-sm-3" name="tel_proveedor2" type="text" readonly>
   
    
  </div>
    <br> 

     <div class="form-group">

    <label for="">direccion</label>
    <input id="direccion2" class="form-control mx-sm-3" name="direccion2" type="text" readonly>
       
  </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </form>

  </div>
</div>


<!-------------------------------------------------------------->
<script type="text/javascript" language="javascript" >


$(document).ready(function(){

  
$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Agregar Proveedor");
$('#action').val("Add");
$('#operation').val("Add");

    });


$('#add_button2').click(function(){
$('#user_form2')[0].reset();
$('.modal-title').text("Ver Proveedor");

});


  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Proveedor/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});


    $(document).on('click', '.ver', function(){
    var cod_proveedor = $(this).attr("cod_proveedor");
    $.ajax({
      url:"../../Controller/Proveedor/fetch_dato.php",
      method:"POST",
      data:{cod_proveedor:cod_proveedor},
      dataType:"json",
      success:function(data)
      {

        $('#userModal2').modal('show');
        $('#cod_proveedor2').val(data.cod_proveedor);
        $('#nomP2').val(data.nomP);
        $('#tel_proveedor2').val(data.tel_proveedor);
        $('#direccion2').val(data.direccion);
     
        $('.modal-title').text("Ver proveedor");
        $('#cod_proveedor2').val(cod_proveedor);

  
      }
    })
  });

   $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
  
    var nomP = $('#nomP').val();
    var tel_proveedor = $('#tel_proveedor').val();
    var direccion = $('#direccion').val();
  
    if(nomP != '' && tel_proveedor != '')
    {
      $.ajax({
        url:"../../Controller/Proveedor/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();

          $('#userModal').modal('hide');
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

    $(document).on('click', '.update', function(){
    var cod_proveedor = $(this).attr("cod_proveedor");
    $.ajax({
      url:"../../Controller/Proveedor/fetch_dato.php",
      method:"POST",
      data:{cod_proveedor:cod_proveedor},
      dataType:"json",
      success:function(data)
      {

        $('#userModal').modal('show');
        $('#nomP').val(data.nomP);
        $('#tel_proveedor').val(data.tel_proveedor);
        $('#direccion').val(data.direccion);

        $('.modal-title').text("Edit Proveedor");
        $('#cod_proveedor').val(cod_proveedor);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });


      $(document).on('click', '.delete', function(){
    var cod_proveedor = $(this).attr("cod_proveedor");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Proveedor/delete.php",
        method:"POST",
        data:{cod_proveedor:cod_proveedor},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });

  });




</script>