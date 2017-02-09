<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
include_once '../../db/confighost.php';
include_once '../../db/datamodelos.php';
$database = new Config();
$db = $database->get_Connection();
$product = new Data($db);
$stmt = $product->readAll($page, $from_record_num,$records_per_page);
$num = $stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Modelos</title>
    <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">


		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
	<body>
<p><br></br></p>
<div class="container">
<p>
 <a class="btn btn-primary" href="addmodelos.php" role="button">Agregar Modelo</a>
</p>
<?php

if ($num>0){

?>
<table class="table table-bordered table-hover table-striped">
<caption>Tabla de modelos</caption>
<thead>
<tr>
     <th>Id</th>
     <th>Modelo</th>
     <th>Precio</th>
     <th>Marca</th>
		 <th>Opciones</th>
</tr>
</thead>
<tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>
<tr>
      <?php echo "<td>{$idmodelos}</td>" ?>
      <?php echo "<td>{$modelo}</td>" ?>
      <?php echo "<td>{$precio}</td>" ?>
      <?php echo "<td>{$marca}</td>" ?>


      <?php echo "<td width='100px'>
        <a class='btn btn-warning btn-sm' href='modificarmodelo.php?id={$idmodelos}' role='button'>
         <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
         <a class='btn btn-danger btn-sm' onclick='eliminar($idmodelos)' href='#' role='button'>
         <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
         </td>" ?>
</tr>


<?php
}
?>
</tbody>
</table>
<?php
$page_dom= "modelos.php";
include_once '../../db/paginacion.php';
}
else
{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Warning!</strong> La Tabla esta vacia</div>

<!-- // quitar esto ">" en el span debe ser asi <span
aria-hidden="true"> -->
<?php
}
?>
</div>
	<!-- script references -->
		<script src="../../js/jquery.min.js">
    </script>
		<script src="../../js/bootstrap.min.js"></script>
<script>
  function eliminar(id)
  {
    var respuesta = confirm("Esta seguro que desea eliminar?");
    if(respuesta ==true)
    {
      window.location = 'eliminarmodelo.php?id=' + id;
    }
    else
    {

    }
  }

</script>

	</body>
</html>
