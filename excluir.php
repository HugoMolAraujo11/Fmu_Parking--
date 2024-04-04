
<?php
require_once 'banco.php';
$bc = new Banco;
$con = $bc->conectar();
$reg_id = $_GET['del'];
$del = "DELETE FROM `registro` WHERE reg_id ='$reg_id'";
mysqli_query($con, $del);
header("location:listar.php");
?>