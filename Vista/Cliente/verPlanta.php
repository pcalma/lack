<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');
 ?>
 
<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>

<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Planta</h1>
          <p class="mb-4">Encontraras todos los Planta registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Planta </h6>
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
<!-------          	
id_planta
cod_semilla
fecha_registro
id_especieP

estado
observacion
         ----->


              <th width="5%">id_planta</th>
              <th width="25%">nombre_planta</th>
              <th width="20%">fecha_registro</th>
              <th width="10%">observacion</th>

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
 <!------------------>
<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Planta</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">

      <div class="col-sm-5">
      <label>nombre_planta:</label>
       <input type="text" name="nombre_planta" id="nombre_planta" class="form-control" />
     <br />
            </div>

                      <div class="col-sm-3">
            <label>cod_semilla: </label>
        <select class="form-control"  name="cod_semilla" id="cod_semilla">
      <option value=""></option>
      <option value="12">chcolopez</option>
      <option value="20">Bluberry</option>

    
    </select>
                            <br />
          </div> 


      <div class="col-sm-5">
      <label>fecha_registro:</label>
       <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" />
     <br />
            </div>
                      <div class="col-sm-3">
            <label> id_especie: </label>
        <select class="form-control"  name="id_especieP" id="id_especieP">
      <option value=""></option>
      <option value="1">Indica</option>
      <option value="2">Sativa</option>
    
    </select>
                            <br />
          </div> 
      <div class="col-sm-5">
      <label>observacion:</label>
       <textarea type="text" name="observacion" id="observacion" class="form-control"></textarea>
     <br />
            </div>



                      <div class="col-sm-3">
            <label> estado: </label>
        <select class="form-control"  name="estado" id="estado">
      <option value=""></option>
      <option value="1">Inactivo</option>
      <option value="2">Activo</option>
    
    </select>
                            <br />
          </div> 



      <div class="col-sm-5">
      <label>tipo:</label>
       <input type="text" name="tipo" id="tipo" class="form-control" />
     <br />
            </div>





            
        </div>



        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_planta" id="id_planta" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!------------------>
<div id="userModal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form2" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Planta</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">



           <div class="col-sm-4">
                  <label>id_planta:</label>
                  <input type="text" name="id_planta2" id="id_planta2" class="form-control" readonly />
                   <br/>
            </div>

                <div class="col-sm-5">
      <label>nombre_planta:</label>
       <input type="text" name="nombre_planta2" id="nombre_planta2" class="form-control" readonly/>
     <br />
            </div>


        </div>

      <div class="col-sm-5">
      <label>cod_semilla:</label>
       <input type="text" name="cod_semilla2" id="cod_semilla2" class="form-control" readonly/>
     <br />
            </div>

            <div class="col-sm-5">
                  <label>fecha_registro:</label>
                  <input type="date" name="fecha_registro2" id="fecha_registro2" class="form-control" readonly/>
                  <br />
            </div>
            <div class="col-sm-5">
                  <label>id_especieP:</label>
                  <input type="text" name="id_especieP2" id="id_especieP2" class="form-control" readonly/>
                  <br />
            </div>



                      <div class="col-sm-3">
                  <label>observacion: </label>
                  <textarea type="text" name="observacion2" id="observacion2" class="form-control" readonly></textarea>
                            
          </div> 

          <div class="row">

   <div class="col-sm-5">                  
          <label>estado: </label>
          <input type="text" name="estado2" id="estado2" class="form-control" readonly/>
            <br />
</div>
      <div class="col-sm-5">
      <label> tipo:</label>
       <input type="text" name="tipo2" id="tipo2" class="form-control" readonly/>
     <br />
            </div>
            
        </div>



        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>

  </div>
</div>


<!-------------------------------------------------------------------------------->


 <script type="text/javascript" language="javascript" >




$(document).ready(function(){

$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Agregar plantas");
$('#action').val("Add");
$('#operation').val("Add");



    });


$('#add_button2').click(function(){
$('#user_form2')[0].reset();
$('.modal-title').text("Ver plantas");

});


  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Planta/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});

  $(document).on('click', '.ver', function(){
    var id_planta = $(this).attr("id_planta");
    $.ajax({
      url:"../../Controller/Planta/fetch_single.php",
      method:"POST",
      data:{id_planta:id_planta},
      dataType:"json",
      success:function(data)
      {

        $('#userModal2').modal('show');
        $('#id_planta2').val(data.id_planta);
        $('#nombre_planta2').val(data.nombre_planta);
        $('#cod_semilla2').val(data.nombre_semilla);
        $('#fecha_registro2').val(data.fecha_registro);
        $('#id_especieP2').val(data.nombreS);
        $('#observacion2').val(data.observacion);
        $('#estado2').val(data.estado);
        $('#tipo2').val(data.tipo);

        $('.modal-title').text("Ver Plantas");
        $('#id_planta2').val(id_planta);

  
      }
    })
  });


  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();

    var nombre_planta = $('#nombre_planta').val();
    var cod_semilla = $('#cod_semilla').val();
    var fecha_registro = $('#fecha_registro').val();
    var id_especieP = $('#id_especieP').val();
    var observacion = $('#observacion').val();
    var estado = $('#estado').val();
    var tipo = $('#tipo').val();

   
    if(nombre_planta != '' && fecha_registro != '')
    {
  
      $.ajax({
        url:"../../Controller/Planta/insert.php",
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
    var id_planta = $(this).attr("id_planta");
    $.ajax({
      url:"../../Controller/Planta/fetch_single.php",
      method:"POST",
      data:{id_planta:id_planta},
      dataType:"json",
      success:function(data)
      {


        $('#userModal').modal('show');
        $('#id_planta').val(data.id_planta);
        $('#nombre_planta').val(data.nombre_planta);
        $('#cod_semilla').val(data.nombre_semilla);
        $('#fecha_registro').val(data.fecha_registro);
        $('#id_especieP').val(data.nombreS);
        $('#observacion').val(data.observacion);
        $('#estado').val(data.estado);
        $('#tipo').val(data.tipo);
      


        $('.modal-title').text("Edit semilla");
        $('#id_planta').val(id_planta);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });
  $(document).on('click', '.delete', function(){
    var id_planta = $(this).attr("id_planta");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Planta/delete.php",
        method:"POST",
        data:{id_planta:id_planta},
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