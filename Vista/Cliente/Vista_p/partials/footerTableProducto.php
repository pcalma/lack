 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>P.canavas - 2020 - ck</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-warning" href="login.html" >Logout</a>
        </div>
      </div>
    </div>
  </div>












  <!-- Bootstrap core JavaScript-->
  <script src="Vista_p/vendor/jquery/jquery.min.js"></script>
  <script src="Vista_p/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Vista_p/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Vista_p/js/sb-admin-2.min.js"></script>



  <!-- Page level custom scripts -->
  <script src="Vista_p/js/demo/datatables-demo.js"></script>







    <!-- <script src="Vista_p/librerias/jquery-3.2.1.min.js"></script>-->
    <!-- <script src="Vista_p/librerias/bootstrap/js/bootstrap.js"></script>-->
    <!-- <script src="Vista_p/librerias/alertifyjs/alertify.js"></script>-->
    <!-- <script src="Vista_p/librerias/select2/js/select2.js"></script>-->

    <!-- <script src="Vista_p/librerias/datatable/dataTables.bootstrap.min.js"></script>-->
 <script src="Vista_p/librerias/datatable/jquery.dataTables.min.js"></script>

<!----------
   <script src="Vista_p/librerias/datatable/buttons/dataTables.buttons.min.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/jszip.min.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/pdfmake.min.js"></script>
    <script src="Vista_p/librerias/datatable/buttons/vfs_fonts.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/buttons.html5.min.js"></script>
----->

</body>

</html>




<!------------------

Columnacod_producto
Columnacod_proveedor
Columnadescripcion
Columnanombre_producto
Columnaprecio
cantidad
  ------------------------------------------------>










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

<!-------------------------------------------------------------------------------->




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
      url:"../../Controller/Producto/fetch.php",
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