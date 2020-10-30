<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.detalle.php');
 ?>

<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>

<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detalle</h1>
          <p class="mb-4">Encontraras todos los proveedor registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Detalle </h6>
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
<!-----
cod_detalle
nombre
id_categoria
img_deta

descripcion
precio
   -->       
              <th width="5%">cod_detalle</th>
              <th width="25%">nombre</th>
              <th width="20%">id_categoria</th>
              <th width="10%">img_deta</th>

              
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
             <!------------------------------------------------------------------>

<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="user_form" enctype="multipart/form-data" class="form-inline" >
      <!-----action="../Controlador/Cliente/cargar.php"------->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">

   <div class="form-group">

    <label for="">descripcionD</label>
        <textarea type="textarea" id="descripcionD" class="form-control mx-sm-3" name="descripcionD" > </textarea>
 
  </div>

     <div class="form-group">

    <label for="">id_categoria</label>
      <select class="form-control" required name="id_categoria" id="id_categoria">
      <option value="id_categoria"></option>
      <option value="1">desayuno</option>
      <option value="2">cultivo</option>
      <option value="3">plantas</option>
    
    </select>

    
  </div>
  <br>

  <br>

   <div class="form-group">

    <label for="img_deta">img_deta</label>
    <input type="img" id="img_deta" class="form-control mx-sm-3"  name="img_deta" >
    
  </div>
      <br>

  
   <div class="form-group">

    <label for="nombreD">nombreD</label>
    <input type="text" id="nombreD" class="form-control mx-sm-3"  name="nombreD" >
    
  </div>
      <br>
   <div class="form-group">

    <label for="precioD">precioD</label>
    <input type="number" id="precioD" class="form-control mx-sm-3"  name="precioD" >
    
  </div>


        </div>

        <div class="modal-footer">
          <input type="hidden" name="cod_detalle" id="cod_detalle" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </form>

  </div>
</div>

<!-------------------------------------------------------------->
             <!------------------------------------------------------------------>

<div id="userModal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">
    <form method="post" id="user_form2" enctype="multipart/form-data" class="form-inline" >
      <!-----action="../Controlador/Cliente/cargar.php"------->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">

   <div class="form-group">

    <label for="">descripcionD</label>
        <textarea type="text" id="descripcionD2" class="form-control mx-sm-3" name="descripcionD2" readonly> </textarea>
 
  </div>
<br>
     <div class="form-group">

    <label for="">id_categoria</label>
      <select class="form-control" required name="id_categoria2" id="id_categoria2">
      <option value="id_categoria"></option>
      <option value="1">desayuno</option>
      <option value="2">cultivo</option>
      <option value="3">plantas</option>
    
    </select>

    
  </div>
  <br>

  <br>

   <div class="form-group">

    <label for="img_deta">img_deta</label>
    <input type="text" id="img_deta2" class="form-control mx-sm-3"  name="img_deta2" readonly>
    
  </div>
      <br>

  
   <div class="form-group">

    <label for="nombreD">nombreD</label>
    <input type="text" id="nombreD2" class="form-control mx-sm-3"  name="nombreD2" readonly>
    
  </div>
      <br>
   <div class="form-group">

    <label for="precioD">precioD</label>
    <input type="number" id="precioD2" class="form-control mx-sm-3"  name="precioD2" readonly>
    
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
$('.modal-title').text("Agregar Detalle");
$('#action').val("Add");
$('#operation').val("Add");

    });


$('#add_button2').click(function(){

$('#user_form2')[0].reset();
$('.modal-title').text("Agregar Detalle");


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

    $(document).on('click', '.ver', function(){
    var cod_detalle = $(this).attr("cod_detalle");
    $.ajax({
      url:"../../Controller/Detalle/fetch_dato.php",
      method:"POST",
      data:{cod_detalle:cod_detalle},
      dataType:"json",
      success:function(data)
      {

        $('#userModal2').modal('show');
        $('#descripcionD2').val(data.descripcionD);
        $('#id_categoria2').val(data.id_categoria);
        $('#img_deta2').val(data.img_deta);
        $('#nombreD2').val(data.nombreD);
        $('#precioD2').val(data.precioD);

        $('.modal-title').text("Ver semilla");
        $('#cod_detalle2').val(cod_detalle);

  
      }
    })
  });

  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var descripcionD = $('#descripcionD').val();
    var id_categoria = $('#id_categoria').val();
    var img_deta = $('#img_deta').val();
    var nombreD = $('#nombreD').val();
    var precioD = $('#precioD').val();
  
   
    if(nombreD != '' && descripcionD != '')
    {
  
      $.ajax({
        url:"../../Controller/Detalle/insert.php",
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
    var cod_detalle = $(this).attr("cod_detalle");
    $.ajax({
      url:"../../Controller/Detalle/fetch_single.php",
      method:"POST",
      data:{cod_detalle:cod_detalle},
      dataType:"json",
      success:function(data)
      {

        $('#userModal').modal('show');
        $('#descripcionD').val(data.descripcionD);
        $('#id_categoria').val(data.id_categoria);
        $('#img_deta').val(data.img_deta);
        $('#nombreD').val(data.nombreD);
        $('#precioD').val(data.precioD);


        $('.modal-title').text("Edit Detalle");
        $('#cod_detalle').val(cod_detalle);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });

  $(document).on('click', '.delete', function(){
    var cod_detalle = $(this).attr("cod_detalle");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Detalle/delete.php",
        method:"POST",
        data:{cod_detalle:cod_detalle},
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