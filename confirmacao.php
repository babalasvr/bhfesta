<?php include 'header.php';

if(isset($_GET['id'])) {
	$sql = "INSERT INRO confirmacao  = 2 WHERE id_evento = '".$_GET['id']."';";
	$result = mysqli_query($conn,$sql);
	header("location: area-admin.php?id=1");
}

?>