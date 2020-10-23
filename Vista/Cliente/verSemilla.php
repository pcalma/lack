<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');
/*
require_once('../../Controller/Semilla/cargar.php');
*/
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
              <th width="25%">nombre_semilla</th>
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

    <label for="">nombre_semilla</label>
    <input  class="form-control mx-sm-3" name="nombre_semilla2" id="nombre_semilla2" readonly        > 
    
  </div>
  <br>
     <div class="form-group">

    <label for="">id_especieS</label>
    <input type="text" id="id_especieS2" class="form-control mx-sm-3" name="id_especieS2" readonly>
  </div>
  <br>
   <div class="form-group">

    <label for="fecha_registro">fecha_registro</label>
    <input type="date" id="fecha_registro2" class="form-control mx-sm-3"  name="fecha_registro2" readonly>
    
  </div>
    <br>

   <div class="form-group">

    <label for="">observacion</label>
     <textarea type="textarea" id="observacion2" class="form-control mx-sm-3" name="observacion2" readonly> </textarea>
    
  </div>
  <br>


   <div class="form-group">

    <label for="">nombre_proveedor</label>
    <input type="text" id="nombre_proveedor2" class="form-control mx-sm-3"  name="nombre_proveedor2" readonly>
    
  </div>
      <br>
   <div class="form-group">

    <label for="estado">estado</label>
    <input type="text" id="estado2" class="form-control mx-sm-3"  name="estado2" readonly>
    
  </div>

        <br>
   <div class="form-group">

    <label for="">tipoS</label>
    <input type="text" id="tipoS2" class="form-control mx-sm-3"  name="tipoS2" readonly>
    
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
    <form method="post" id="user_form" enctype="multipart/form-data" class="form-inline" >
      <!-----action="../Controlador/Cliente/cargar.php"------->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Semilla</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">
<!----
    <?php 
   // dropdownSemillas();
   // echo "<br>";
     ?>

        <div class="col-sm-5">        
          <label>Rol: </label>
    <select name="nombre" required id="nombre" class="form-control">
      <option value=""> --Selecciona-- </option>
      <option value="nombre"></option>

    
    </select>
                                </div>
<div id="selectLista" ></div>
-------->
   <div class="form-group">

    <label for="">nombre_semilla</label>
        <textarea type="textarea" id="nombre_semilla" class="form-control mx-sm-3" name="nombre_semilla" > </textarea>
 
  </div>

  <br>
   <div class="form-group">

    <label for="">id_especieS</label>
      <select class="form-control" required name="id_especieS" id="id_especieS">
      <option value="id_especieS"></option>
      <option value="1">indica</option>
      <option value="2">sativa</option>
      <option value="3">otro</option>
    
    </select>

    
  </div>
  <br>
   <div class="form-group">

    <label for="">fecha_registro</label>
    <input id="fecha_registroS" class="form-control mx-sm-3" name="fecha_registroS" type="date" >
   
    
  </div>
  <br>

     <div class="form-group">

    <label for="">observacion</label>
        <textarea type="textarea" id="observacionS" class="form-control mx-sm-3" name="observacionS" > </textarea>
 
  </div>

  <br>
   <div class="form-group">

    <label for="">cod_proveedor</label>
      <select class="form-control" required name="cod_proveedor" id="cod_proveedor">
      <option value="cod_proveedor"></option>
      <option value="1">semi</option>
      <option value="2">agro</option>
      <option value="3">otro</option>
    
    </select>

    
  </div>
    <br>
   <div class="form-group">

    <label for="estado">estado</label>
    <input type="text" id="estado" class="form-control mx-sm-3"  name="estado" >
    
  </div>
      <br>
   <div class="form-group">

    <label for="tipoS">tipoS</label>
    <input type="text" id="tipoS" class="form-control mx-sm-3"  name="tipoS" >
    
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
$('.modal-title').text("Ver Semillas");

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
      url:"../../Controller/Semilla/fetch_dato.php",
      method:"POST",
      data:{cod_semilla:cod_semilla},
      dataType:"json",
      success:function(data)
      {

        $('#Modal2').modal('show');
        $('#cod_semilla2').val(data.cod_semilla);
        $('#nombre_semilla2').val(data.nombre_semilla);
        $('#id_especieS2').val(data.nombreS);
        $('#fecha_registro2').val(data.fecha_registroS);
        $('#observacion2').val(data.observacionS);
        $('#nombre_proveedor2').val(data.nombre_proveedor);
        $('#estado2').val(data.estado);
        $('#tipoS2').val(data.tipoS);

        $('.modal-title').text("Ver semilla");
        $('#cod_semilla2').val(cod_semilla);

  
      }
    })
  });



  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var nombre_semilla = $('#nombre_semilla').val();
    var id_especieS = $('#id_especieS').val();
    var fecha_registroS = $('#fecha_registroS').val();
    var observacionS = $('#observacionS').val();
    var cod_proveedor = $('#cod_proveedor').val();
    var estado = $('#estado').val();
    var tipoS = $('#tipoS').val();
   
    if(observacionS != '' && fecha_registroS != ''&& estado != '')
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
        $('#nombre_semilla').val(data.nombre_semilla);
        $('#id_especieS').val(data.id_especieS);
        $('#fecha_registroS').val(data.fecha_registroS);
        $('#observacionS').val(data.observacionS);
        $('#nombre_proveedor').val(data.nombre_proveedor);
        $('#estado').val(data.estado);
        $('#tipoS').val(data.tipoS);


        $('.modal-title').text("Edit semilla");
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

