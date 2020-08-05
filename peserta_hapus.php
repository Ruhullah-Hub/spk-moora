<?php 
include 'inc/koneksi.php';
$nim = $_GET['nim'];
$query = mysql_query("DELETE FROM peserta WHERE nim='$nim'") or die(mysql_error());
if ($query) {
	?>
	<script language="JavaScript">
	alert('Data Peserta Berhasil dihapus');
	document.location = 'peserta.php';
	</script>
	<?php
}
?>