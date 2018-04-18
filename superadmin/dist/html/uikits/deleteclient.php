<?php 
	include'../../../../core/db_connect.php';
	$idpost = $_GET['id_c'];
	mysqli_query($connect,"DELETE FROM client WHERE id = '$idpost'");?>
	<script language="javascript">alert("Berhasil di Hapus!");</script>
	<script>document.location.href='client.php';</script>
?>