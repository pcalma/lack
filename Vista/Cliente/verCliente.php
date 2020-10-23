<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');
 ?>


<?php include 'Vista_p/partials/headTable.php';?>


<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>


<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
          <p class="mb-4">Encontraras todos los clientes registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Clientes </h6>
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
          
              <th width="5%">Cod cliente</th>
              <th width="25%">Nombre cliente</th>
              <th width="20%">Email</th>
              <th width="10%">tel_cliente</th>
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

<!----------------->
<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">
        <div class="col-sm-5">        
          <label>Rol: </label>
    <select name="id_rol" required name="id_rol" id="id_rol" class="form-control">
      <option value=""> --Selecciona-- </option>
      <option value="1">Admin</option>
      <option value="2">Cliente</option>
    
    </select>
                                </div>


           <div class="col-sm-4">
                  <label>pERROS U:</label>
                  <input type="text" name="nombre_u" id="nombre_u" class="form-control" />
                   <br/>
            </div>
                      <div class="col-sm-3">
                  <label>Estado: </label>
                  <input type="text" name="estado" id="estado" class="form-control" />
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>Nombre:</label>
                  <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" />
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>Apellido: </label>
          <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control" />
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>Edad: </label>
                  <input type="number" name="edad" id="edad" class="form-control" />
                            <br />
          </div>  
        </div>



        <div class="row">

 
          <div class="col  form-group">                
                  <label >Genero: </label>
                      <select class="form-control" name="genero" required name="genero" id="genero">
      <option value="">--Selecciona--</option>
      <option value="1">femenino</option>
      <option value="2">masculino</option>
      <option value="3">otro</option>
    
    </select>
                            <br />
          </div> 
        </div> 









<div class="row">
   <div class="col">
          <label>Cedula:</label>
          <input type="text" name="cedula" id="cedula" class="form-control" />
</div>
    <div class="col">  

          <label>Telefono: </label>
          <input type="text" name="tel_cliente" id="tel_cliente" class="form-control" />
                    <br />
</div> 
  <div class="col">                      
          <label>Fecha Nacimiento: </label>
          <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" />
                    <br />
</div>

  <div class="col">                      
          <label>Fecha registro: </label>
          <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" />
                    <br />
</div>





</div> 








<div class="row">
 

</div> 
                    <br />
<div class="row"> 
 <div class="col">                     
          <label>email </label>
          <input type="email" name="email" id="email" class="form-control" />
 </div>                              <br />
 <div class="col">
          <label>pass</label>
          <input type="password" name="pass" id="pass" class="form-control" />
                              <br />
</div> 
 
</div> 

        </div>
        <div class="modal-footer">
          
          <input type="hidden" name="cod_cliente" id="cod_cliente" />
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
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">
        <div class="col-sm-5">        
          <label>Rol: </label>
    <select required name="id_rol2" id="id_rol2" class="form-control" readonly>
    
      <option value="1">Admin</option>
      <option value="2">Cliente</option>
    
    </select>
                                </div>


           <div class="col-sm-4">
                  <label>pERROS U:</label>
                  <input type="text" name="nombre_u2" id="nombre_u2" class="form-control" readonly />
                   <br/>
            </div>
                      <div class="col-sm-3">
                  <label>Estado: </label>
                  <input type="text" name="estado2" id="estado2" class="form-control" readonly/>
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>Nombre:</label>
                  <input type="text" name="nombre_cliente2" id="nombre_cliente2" class="form-control" readonly/>
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>Apellido: </label>
          <input type="text" name="apellido_cliente2" id="apellido_cliente2" class="form-control" readonly/>
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>Edad: </label>
                  <input type="number" name="edad2" id="edad2" class="form-control" readonly/>
                            <br />
          </div>  
        </div>



        <div class="row">

 
          <div class="col  form-group">                
                  <label >Genero: </label>
                      <select class="form-control" name="genero2" required name="genero" id="genero2" readonly>
      <option value="">--Selecciona--</option>
      <option value="1">femenino</option>
      <option value="2">masculino</option>
      <option value="3">otro</option>
    
    </select>
                            <br />
          </div> 
        </div> 









<div class="row">
   <div class="col">
          <label>Cedula:</label>
          <input type="text" name="cedula2" id="cedula2" class="form-control" readonly/>
</div>
    <div class="col">  

          <label>Telefono: </label>
          <input type="text" name="tel_cliente2" id="tel_cliente2" class="form-control" readonly />
                    <br />
</div> 
  <div class="col">                      
          <label>Fecha Nacimiento: </label>
          <input type="date" name="fecha_nacimiento2" id="fecha_nacimiento2" class="form-control" readonly/>
                    <br />
</div>

  <div class="col">                      
          <label>Fecha registro: </label>
          <input type="date" name="fecha_registro2" id="fecha_registro2" class="form-control" readonly/>
                    <br />
</div>





</div> 








<div class="row">
 

</div> 
                    <br />
<div class="row"> 
 <div class="col">                     
          <label>email </label>
          <input type="email" name="email2" id="email2" class="form-control" readonly/>
 </div>                              <br />
 <div class="col">
          <label>pass</label>
          <input type="password" name="pass2" id="pass2" class="form-control" readonly/>
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
$('.modal-title').text("Agregar Usuarios");
$('#action').val("Add");
$('#operation').val("Add");

    });

$('#add_button2').click(function(){
$('#user_form2')[0].reset();
$('.modal-title').text("Ver Usuarios");

});

  
  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Cliente/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});

  $(document).on('click', '.ver', function(){
    var cod_cliente = $(this).attr("cod_cliente");
    $.ajax({
      url:"../../Controller/Cliente/fetch_single.php",
      method:"POST",
      data:{cod_cliente:cod_cliente},
      dataType:"json",
      success:function(data)
      {

        $('#userModal2').modal('show');
        $('#nombre_cliente2').val(data.nombre_cliente);
        $('#nombre_u2').val(data.nombre_u);
        $('#estado2').val(data.estado);
        $('#genero2').val(data.genero);
        $('#id_rol2').val(data.id_rol);
        $('#fecha_nacimiento2').val(data.fecha_nacimiento);
        $('#apellido_cliente2').val(data.apellido_cliente);
        $('#email2').val(data.email);


        $('.modal-title').text("Ver User");
        $('#cod_cliente2').val(cod_cliente);

  
      }
    })
  });

  



  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var nombre_cliente = $('#nombre_cliente').val();
    var nombre_u = $('#nombre_u').val();
    var edad = $('#edad').val();
    var estado = $('#estado').val();
    var genero = $('#genero').val();
    var id_rol = $('#id_rol').val();
    var fecha_nacimiento = $('#fecha_nacimiento').val();
    var apellido_cliente = $('#apellido_cliente').val();
    var email = $('#email').val();
    var pass = $('#pass').val();
    var cedula = $('#cedula').val();
    var fecha_registro = $('#fecha_registro').val();
  
    if(nombre_cliente != '' && nombre_u != '')
    {
      $.ajax({
        url:"../../Controller/Cliente/insert.php",
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
    var cod_cliente = $(this).attr("cod_cliente");
    $.ajax({
      url:"../../Controller/Cliente/fetch_single.php",
      method:"POST",
      data:{cod_cliente:cod_cliente},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#nombre_cliente').val(data.nombre_cliente);
        $('#nombre_u').val(data.nombre_u);
        $('#estado').val(data.estado);
        $('#genero').val(data.genero);
        $('#id_rol').val(data.id_rol);
        $('#fecha_nacimiento').val(data.fecha_nacimiento);
        $('#apellido_cliente').val(data.apellido_cliente);
        $('#email').val(data.email);


        $('.modal-title').text("Edit User");
        $('#cod_cliente').val(cod_cliente);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });

  $(document).on('click', '.delete', function(){
    var cod_cliente = $(this).attr("cod_cliente");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Cliente/delete.php",
        method:"POST",
        data:{cod_cliente:cod_cliente},
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