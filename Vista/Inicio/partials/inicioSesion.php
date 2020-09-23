    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">La CK medicinal garden </h4>
            </div>
            <div class="modal-body customer-box row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                        <li ><a href="#Registration" id="add_button" data-toggle="tab">Add</a></li>

            
                    </ul>









                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Login">







                        <form id="loginForm" action="Vista/Cliente/validarCode.php" method="POST" role="form">

                            <div class="form-group">
                                <label for="nombre_cliente">nombre_cliente</label>
                                <input type="text" name="nombre_cliente" class="form-control" id="nombre_cliente" autofocus required placeholder="usuario">
                            </div>

                            <div class="form-group">
                                <label for="pass">pass</label>
                                <input type="password" name="pass" class="form-control" required id="pass" placeholder="****">
                            </div>
                  <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                        Ingresar</button>



                      
                        </form>




                        </div>











<!--------------------------------------------------------------------------->






                        <div class="tab-pane" id="Registration">
                           <form method="post" id="user_form" enctype="multipart/form-data">

 <div class="row form-group">
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="nombre_u" type="text" name="nombre_u" id="nombre_u">
                                </div>

          <div class="col-sm-6">                
                      <select class="form-control" name="genero" required name="genero" id="genero">
      <option value="">--GENERO--</option>
      <option value="1">femenino</option>
      <option value="2">masculino</option>
      <option value="3">otro</option>
    
    </select>
                        
          </div> 



                        
 </div>
 <div class="row form-group">
                   
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="nombre_cliente" type="text" type="text" name="nombre_cliente" id="nombre_cliente">
                                </div>

                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="apellido_cliente" type="text" type="text" name="apellido_cliente" id="apellido_cliente">
                                </div>
                        
 </div>

  <div class="row form-group">


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="cedula" type="text" name="cedula" id="cedula">
                                </div>


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="tel_cliente" type="text" name="tel_cliente" id="tel_cliente">
                                </div>
                        
 </div>

   <div class="row form-group">


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="fecha_nacimiento" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                                </div>


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="tel_cliente" type="text" name="tel_cliente" id="tel_cliente">
                                </div>
                        
 </div>

 <div class="row form-group">


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="email" type="email" name="email" id="email">
                                </div>


                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="pass" type="password" name="pass" id="pass">
                                </div>
                        
 </div>
















 
 


    
        <div class="row">
          <input type="hidden" name="cod_cliente" id="cod_cliente" />
          <input type="hidden" name="operation" id="operation" />


 <button type="submit" name="action" id="action" class="btn btn-light btn-radius btn-brd grd1" value="Add">ADD</button>
            <button type="button" class="btn btn-light btn-radius btn-brd grd1">CLOSE</button>
        </div>




    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- LOADER 
    <div id="preloader">
        <div class="loading">
            <div class="finger finger-1">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-2">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-3">
                <div class="finger-item">
                  <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-4">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="last-finger">
                <div class="last-finger-item"><i></i></div>
            </div>
        </div>
    </div>-->
    <!-- END LOADER -->

