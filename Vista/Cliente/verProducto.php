<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');
 ?>


<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>


<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Productos</h1>
          <p class="mb-4">Encontraras todos los Productos registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Productos </h6>
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
          
              <th width="5%">cod_producto</th>
              <th width="15%">nombre_proveedor</th>
              <th width="10%">descripcion</th>
              <th width="10%">nombre_producto</th>
              <th width="10%">cantidad</th>
              <th width="10%">precio</th>



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
            

<?php include 'Vista_p/partials/footerTableProducto.php';?>

<div id="userModal" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add producto</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">


        <div class="col-sm-5">        
          <label>cod_proveedor: </label>
    <select name="cod_proveedor" id="cod_proveedor" required class="form-control">
      <option value=""> --Selecciona-- </option>
      <option value="1">corazon verde</option>
      <option value="2">panda seeds</option>
    
    </select>
                                </div>


                      <div class="col-sm-3">
                  <label>descripcion: </label>
                  <textarea type="text" name="descripcion" id="descripcion" class="form-control"></textarea>
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>nombre_producto:</label>
                  <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" />
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>cantidad: </label>
          <input type="number" name="cantidad" id="cantidad" class="form-control" />
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>precio: </label>
                  <input type="number" name="precio" id="precio" class="form-control" />
                            <br />
          </div>  
        </div>

</div> 


        <div class="modal-footer">
          <input type="hidden" name="cod_producto" id="cod_producto" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!-------------------------------------------------------------------------------->

<div id="userModal2" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg">


    <form method="post" id="user_form2" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver producto</h4>
          <button type="button" class="close" data-dismiss="modal">X</button>
          
        </div>
        <div class="modal-body">




        <div class="row">

        <div class="col-sm-5">        
          <label>cod_producto: </label>
<input type="text" name="cod_producto2" id="cod_producto2" class="form-control" />
                                </div>
        <div class="col-sm-5">        
          <label>cod_proveedor: </label>
<input type="text" name="cod_proveedor2" id="cod_proveedor2" class="form-control" />
                                </div>


                      <div class="col-sm-3">
                  <label>descripcion: </label>
                  <textarea type="text" name="descripcion2" id="descripcion2" class="form-control"></textarea>
                            <br />
          </div> 
        </div>


          <div class="row">
            <div class="col-sm-5">
                  <label>nombre_producto:</label>
                  <input type="text" name="nombre_producto2" id="nombre_producto2" class="form-control" />
                  <br />
            </div>


   <div class="col-sm-5">                  
          <label>cantidad: </label>
          <input type="number" name="cantidad2" id="cantidad2" class="form-control" />
            <br />
</div>
          <div class="col-sm-2">                  

                  <label>precio: </label>
                  <input type="number" name="precio2" id="precio2" class="form-control" />
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
$('.modal-title').text("Agregar Productos");
$('#action').val("Add");
$('#operation').val("Add");

    });

$('#add_button2').click(function(){
$('#user_form2')[0].reset();
$('.modal-title').text("Ver Productos");

});

  
  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Producto/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});


    $(document).on('click', '.ver', function(){
    var cod_producto = $(this).attr("cod_producto");
    $.ajax({
      url:"../../Controller/Producto/fetch_dato.php",
      method:"POST",
      data:{cod_producto:cod_producto},
      dataType:"json",
      success:function(data)
      {
        $('#userModal2').modal('show');
        $('#cod_proveedor2').val(data.nombre_proveedor);
        $('#descripcion2').val(data.descripcion);
        $('#nombre_producto2').val(data.nombre_producto);
        $('#cantidad2').val(data.cantidad);
        $('#precio2').val(data.precio);


        $('.modal-title').text("Ver Producto");
        $('#cod_producto2').val(cod_producto);

  
      }
    })
  });

  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var cod_proveedor = $('#cod_proveedor').val();
    var descripcion = $('#descripcion').val();
    var nombre_producto = $('#nombre_producto').val();
    var cantidad = $('#cantidad').val();
    var precio = $('#precio').val();
  
    if(nombre_producto != '' && precio != '')
    {
      $.ajax({
        url:"../../Controller/Producto/insert.php",
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
    var cod_producto = $(this).attr("cod_producto");
    $.ajax({
      url:"../../Controller/Producto/fetch_single.php",

      method:"POST",
      data:{cod_producto:cod_producto},
      dataType:"json",
      success:function(data)
      {

        $('#userModal').modal('show');
        $('#cod_proveedor').val(data.cod_proveedor);
        $('#descripcion').val(data.descripcion);
        $('#nombre_producto').val(data.nombre_producto);
        $('#cantidad').val(data.cantidad);
        $('#precio').val(data.precio);
      


        $('.modal-title').text("Edit Producto");
        $('#cod_producto').val(cod_producto);

        $('#action').val("Edit");
        $('#operation').val("Edit");

  
      }
    })
  });


  $(document).on('click', '.delete', function(){
    var cod_producto = $(this).attr("cod_producto");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Producto/delete.php",
        method:"POST",
        data:{cod_producto:cod_producto},
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