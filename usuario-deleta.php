<?php include 'dbh.php';

if(isset($_GET['id'])) {
	$sql = "DELETE FROM eventos WHERE id_evento = '".$_GET['id']."';";
	$result = mysqli_query($conn,$sql);
	header("location: eventos_usuario.php?id=1&sucesso=sucesso");
}

?>