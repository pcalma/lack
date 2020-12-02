<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');
 ?>



<link href="cssProducto/app.css" rel="stylesheet">

<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>
<?php include 'Vista_p/partials/nav_top.php';?>





<div class="pt-5 text-center" >
	<h1>Productos</h1>
</div>

<div class="container-fluid ">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">producto</th>
      <th scope="col">precio</th>
      <th scope="col">cantidad</th>
      <th scope="col">kk</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><img src="imgProducto/mills_1.png" width="150" alt="..."></td>
      <td class="pt-5">200</td>
      <td class="pt-5"><input type="text" name="cant" value="1" class="from-control"> </td>
      <td class="pt-5">200</td>
      <td class="pt-5"><button id="btn-delete" class="btn-btn-primary" ><ion-icon name="trash"></ion-icon></button> </td>
    </tr>
        <tr>
      <td><img src="imgProducto/mills_1.png" width="180" alt="..."></td>
      <td class="pt-5">200</td>
      <td class="pt-5"><input type="text" name="cant" value="1" class="from-control"> </td>
      <td class="pt-5">200</td>
      <td class="pt-5"><button id="btn-delete" class="btn-btn-primary" ><ion-icon name="trash"></ion-icon></button> </td>
    </tr>
        <tr>
      <td><img src="imgProducto/mills_1.png" width="180" alt="..."></td>
      <td class="pt-5">200</td>
      <td class="pt-5"><input type="text" name="cant" value="1" class="from-control"> </td>
      <td class="pt-5">200</td>
      <td class="pt-5"><button id="btn-delete" class="btn-btn-primary" ><ion-icon name="trash"></ion-icon></button> </td>
    </tr>
        <tr>
      <td><img src="imgProducto/mills_1.png" width="180" alt="..."></td>
      <td class="pt-5">200</td>
      <td class="pt-5"><input type="text" name="cant" value="1" class="from-control"> </td>
      <td class="pt-5">200</td>
      <td class="pt-5"><button id="btn-delete"  class="btn-btn-primary" ><ion-icon name="trash"></ion-icon></button> </td>
    </tr>


  </tbody>
</table>  

<a href="" class="btn btn-primary">Seguir comprando</a>
<h4 class="text-right" >Total <span id="total" class="text-dark">$300</span> </h4>





















	
	<div class="row">

		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">uno</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>

	<!--------------------------------------------->

		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">DOS</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
		<!--------------------------------------------->
		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">TRES</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
<!--------------------------------------------->

		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">CUATRO</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
<!--------------------------------------------->
			<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">CINCO</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
<!--------------------------------------------->
		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">SEIS</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
<!--------------------------------------------->
		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">SIETE</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>

<!--------------------------------------------->


		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">OCHO</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>
<!--------------------------------------------->
		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">NUEVE</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="btn-btn-primary">Another link 
    <ion-icon name="accessibility-outline"></ion-icon> </a>
  </div>
</div>
	</div>

	<!--------------------------------------------->
		<div class="col-sm-2" style="margin: 1rem;">
		
<div class="card" style="width: 18rem;">
  <img src="imgProducto/mills_1.png" class="card-img-top" height="200" alt="...">


  <div class="card-body">
    <h5 class="card-title">DIEZ</h5>
    <p class="card-text">SAQUIIIIIIIIIIIIIIIIIIIIIII.</p>
  </div>



  <ul class="list-group list-group-flush">
    <li class="list-group-item">AQUIII</li>
    <li class="list-group-item">AQUIII</li>
    <li class="list-group-item">AQUIII</li>
  </ul>



  <div class="card-body">
    <a href="#" class="card-link">AQUIII</a>
    <a href="#" class="btn-btn-primary"><ion-icon  name = "heart-outline" > </ion-icon>TRISTE

     </a>
  </div>
</div>
	</div>
	
<!--------------------------------------------->


	</div>

</div>




<?php include 'Vista_p/partials/footerTableProducto.php';?>
<!---------IONICONS------->
<script  src ="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"> </script>
<!---------DELETE------->
<script type="text/javascript">
	
	$(function(){
$(document).on("click","#btn-delete",function(){
	$(this).parent().parent().remove();
		// TRAEMOS EL TOTAL
	getTotal();
});

// MULTIPLICAR VALORES
$(document).on("keyup", "input[name*=cant]", function(){

	var Subtotal=$(this).val()*$(this).closest("tr").find("td:eq(1)").html();
	$(this).closest("tr").find("td:eq(3)").html(Subtotal.toFixed(2));
	// TRAEMOS EL TOTAL
    getTotal();
});




	});


	function getTotal(){
     
     total=0;
     $("tbody tr").each(function(){
     	total= total+Number($(this).find("td:eq(3)").html());
     });

     $("#total").html("$"+total.toFixed(2));

	}

</script>