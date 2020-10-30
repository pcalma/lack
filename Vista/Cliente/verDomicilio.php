

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
 <!-------------------------------------------------------------------------------->

<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver domicilio</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">
        <div class="col-sm-5">        
          <label>cod_cliente: </label>
    <select name="cod_cliente" id="cod_cliente" required class="form-control">
      <option value=""> --Selecciona-- </option>
      <option value="1">coni</option>
      <option value="2">paula</option>
    
    </select>
                                </div>
        <div class="col-sm-5">        
          <label>cod_empleado: </label>
    <select name="cod_empleado" id="cod_empleado" required class="form-control">
      <option value=""> --Selecciona-- </option>
      <option value="1">paula</option>
      <option value="2">julian</option>
    
    </select>
                                </div>


                      <div class="col-sm-3">
                  <label>direccion: </label>
                  <textarea type="text" name="direccion" id="direccion" class="form-control"></textarea>
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>estado:</label>
                  <input type="text" name="estado" id="estado" class="form-control" />
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>fecha: </label>
          <input type="date" name="fecha" id="fecha" class="form-control" />
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>fechaEnrega: </label>
                  <input type="date" name="fechaEnrega" id="fechaEnrega" class="form-control" />
                            <br />
          </div>  
        </div>

</div> 


   <div class="form-group">

    <label for="hora">hora</label>
    <input type="time" id="hora" class="form-control mx-sm-3"  name="hora" >
    
  </div>
      <br>


   <div class="form-group">

    <label for="tel_cliente">tel_cliente</label>
    <input type="text" id="tel_cliente" class="form-control mx-sm-3"  name="tel_cliente" >
    
  </div>
      <br>


        <div class="modal-footer">
         <input type="hidden" name="cod_domicilio" id="cod_domicilio" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!-------------------------------------------------------------------------------->

 <!-------------------------------------------------------------------------------->

<div id="userModal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form2" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver domicilio</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">

        <div class="col-sm-5">        
          <label>cod_cliente: </label>
<input type="text" name="cod_cliente2" id="cod_cliente2" class="form-control" />
                                </div>
        <div class="col-sm-5">        
          <label>cod_empleado: </label>
<input type="text" name="cod_empleado2" id="cod_empleado2" class="form-control" />
                                </div>


                      <div class="col-sm-3">
                  <label>direccion: </label>
                  <textarea type="text" name="direccion2" id="direccion2" class="form-control"></textarea>
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>estado:</label>
                  <input type="text" name="estado2" id="estado2" class="form-control" />
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>fecha: </label>
          <input type="date" name="fecha2" id="fecha2" class="form-control" />
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>fechaEnrega: </label>
                  <input type="date" name="fechaEnrega2" id="fechaEnrega2" class="form-control" />
                            <br />
          </div>  
        </div>

</div> 


   <div class="form-group">

    <label for="hora">hora</label>
    <input type="time" id="hora2" class="form-control mx-sm-3"  name="hora2" >
    
  </div>
      <br>


   <div class="form-group">

    <label for="tel_cliente">tel_cliente</label>
    <input type="text" id="tel_cliente2" class="form-control mx-sm-3"  name="tel_cliente2" >
    
  </div>
      <br>


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
$('.modal-title').text("Agregar Detalle");
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
  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var cod_cliente = $('#cod_cliente').val();
    var cod_empleado = $('#cod_empleado').val();
    var direccion = $('#direccion').val();
    var estado = $('#estado').val();
    var fecha = $('#fecha').val();
    var fechaEnrega = $('#fechaEnrega').val();
    var hora = $('#hora').val();
    var tel_cliente = $('#tel_cliente').val();
  
    if(cod_cliente != '' && cod_empleado != '')
    {
      $.ajax({
        url:"../../Controller/Domicilio/insert.php",
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
    var cod_domicilio = $(this).attr("cod_domicilio");
    $.ajax({
      url:"../../Controller/Domicilio/fetch_single.php",

      method:"POST",
      data:{cod_domicilio:cod_domicilio},
      dataType:"json",
      success:function(data)
      {

        $('#userModal').modal('show');
        $('#cod_cliente').val(data.cod_cliente);
        $('#cod_empleado').val(data.cod_empleado);
        $('#direccion').val(data.direccion);
        $('#estado').val(data.estado);
        $('#fecha').val(data.fecha);
         $('#fechaEnrega').val(data.fechaEnrega);
          $('#hora').val(data.hora);
           $('#tel_cliente').val(data.tel_cliente);
      


        $('.modal-title').text("Edit domicilio");
        $('#cod_domicilio').val(cod_domicilio);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });


      $(document).on('click', '.delete', function(){
    var cod_domicilio = $(this).attr("cod_domicilio");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Domicilio/delete.php",
        method:"POST",
        data:{cod_domicilio:cod_domicilio},
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