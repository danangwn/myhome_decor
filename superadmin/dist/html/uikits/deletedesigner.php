<?php 
	include'../../../../core/db_connect.php';
	$idpost = $_GET['id_c'];
	mysqli_query($connect,"DELETE FROM designer WHERE id_d = '$idpost'");?>
	<script language="javascript">alert("Berhasil di Hapus!");</script>
	<script>document.location.href='designer.php';</script>
?>