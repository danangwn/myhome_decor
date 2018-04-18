<?php 
	include'core/db_connect.php';
	$idpost = $_GET['id_image'];
	mysqli_query($connect,"DELETE FROM images WHERE id_image = '$idpost'");?>
	<script language="javascript">alert("Announcements Berhasil di Hapus!");</script>
	<script>document.location.href='profil_designer.php';</script>
?>