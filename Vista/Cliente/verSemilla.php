<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');
 ?>

<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>

<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Semilla</h1>
          <p class="mb-4">Encontraras todos las Semilla registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Semilla </h6>
            </div>

            <div class="card-body">





      <div class="table-responsive">
        <br />
        <div>
         
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-warning btn-lg">Add ++</button>


        
        <br /><br />
        <table id="myTable" class="table table-bordered" width="100%">
          <thead>
            <tr>


            	<!-------
     cod_semilla  
     id_especieS
     observacion
     fecha_registro     		
cod_proveedor
estado


--------->
          
              <th width="5%">cod_semilla</th>
              <th width="25%">nombre</th>
              <th width="20%">observacion</th>
              <th width="10%">fecha_registro</th>
              
         
              <th width="20%" >Ver</th> 
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

<!-------------------------------------->
<div id="Modal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="userform2" enctype="multipart/form-data" class="form-inline">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Semilla</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">

 <div class="form-group">

    <label for="">cod_semilla</label>
    <input  class="form-control mx-sm-3" name="cod_semilla2" id="cod_semilla2" readonly        > 
    
  </div>
  <br>
   <div class="form-group">

    <label for="nombre">nombre</label>
    <input class="form-control mx-sm-3" id="nombre2" name="nombre2" readonly>
    
  </div>
  <br>
   <div class="form-group">

    <label for="observacion">observacion</label>
    <textarea type="text" id="observacion2" class="form-control mx-sm-3" name="observacion2" readonly> </textarea>
    
  </div>
  <br>
   <div class="form-group">

    <label for="fecha_registro">fecha_registro</label>
    <input type="date" id="fecha_registro2" class="form-control mx-sm-3"  name="fecha_registro2" readonly>
    
  </div>
    <br>
   <div class="form-group">

    <label for="nombre_proveedor">nombre_proveedor</label>
    <input type="text" id="nombre_proveedor2" class="form-control mx-sm-3"  name="nombre_proveedor2" readonly>
    
  </div>
      <br>
   <div class="form-group">

    <label for="estado">estado</label>
    <input type="text" id="estado2" class="form-control mx-sm-3"  name="estado2" readonly>
    
  </div>


        </div>

        <div class="modal-footer">
    
      
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </form>

  </div>
</div>

<!------------------------------------------------------------------>

<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="user_form" enctype="multipart/form-data" class="form-inline">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Semilla</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">

 <div class="form-group">

    <label for="">id_especieS</label>
    <input id="id_especieS" class="form-control mx-sm-3" name="id_especieS"         > 
    
  </div>
  <br>
   <div class="form-group">

    <label for="">observacion</label>
        <textarea type="date" id="observacion" class="form-control mx-sm-3" name="observacion" > </textarea>
 
  </div>
  <br>
   <div class="form-group">

    <label for="">fecha_registro</label>
    <input id="fecha_registro" class="form-control mx-sm-3" name="fecha_registro" >
   
    
  </div>
  <br>
   <div class="form-group">

    <label for="">cod_proveedor</label>
    <input type="text" id="cod_proveedor" class="form-control mx-sm-3"  name="cod_proveedor" >
    
  </div>
    <br>
   <div class="form-group">

    <label for="estado">estado</label>
    <input type="text" id="estado" class="form-control mx-sm-3"  name="estado" >
    
  </div>


        </div>

        <div class="modal-footer">
          <input type="hidden" name="cod_semilla" id="cod_semilla" />
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

<script type="text/javascript" language="javascript" >



$(document).ready(function(){

$('#add_button').click(function(){
$('#user_form')[0].reset();
$('.modal-title').text("Agregar Semillas");
$('#action').val("Add");
$('#operation').val("Add");

    });



$('#add_button2').click(function(){
$('#userform2')[0].reset();
$('.modal-title').text("Ver Usuarios");

});

 
  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Semilla/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});





  $(document).on('click', '.ver', function(){
    var cod_semilla = $(this).attr("cod_semilla");
    $.ajax({
      url:"../../Controller/Semilla/fetch_single.php",
      method:"POST",
      data:{cod_semilla:cod_semilla},
      dataType:"json",
      success:function(data)
      {

        $('#Modal2').modal('show');
        $('#cod_semilla2').val(data.cod_semilla);
        $('#observacion2').val(data.observacion);
        $('#fecha_registro2').val(data.fecha_registro);
        $('#nombre2').val(data.nombre);
        $('#nombre_proveedor2').val(data.nombre_proveedor);
        $('#estado2').val(data.estado);

        $('.modal-title').text("Ver User");
        $('#cod_semilla2').val(cod_semilla);

  
      }
    })
  });



  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var id_especieS = $('#id_especieS').val();
    var observacion = $('#observacion').val();
    var fecha_registro = $('#fecha_registro').val();
    var cod_proveedor = $('#cod_proveedor').val();
    var estado = $('#estado').val();
   
    if(observacion != '' && fecha_registro != ''&& cod_proveedor != ''&& estado != '')
    {
  
      $.ajax({
        url:"../../Controller/Semilla/insert.php",
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
      alert("todos los campos son requeridos ");
    } 
  });



    $(document).on('click', '.update', function(){
    var cod_semilla = $(this).attr("cod_semilla");
    $.ajax({
      url:"../../Controller/Semilla/fetch_single.php",
      method:"POST",
      data:{cod_semilla:cod_semilla},
      dataType:"json",
      success:function(data)
      {

        $('#userModal').modal('show');
        $('#id_especieS').val(data.nombre);
        $('#observacion').val(data.observacion);
        $('#fecha_registro').val(data.fecha_registro);
        $('#cod_proveedor').val(data.nombre_proveedor);
        $('#estado').val(data.estado);

        $('.modal-title').text("Edit User");
        $('#cod_semilla').val(cod_semilla);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });

  $(document).on('click', '.delete', function(){
    var cod_semilla = $(this).attr("cod_semilla");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Semilla/delete.php",
        method:"POST",
        data:{cod_semilla:cod_semilla},
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