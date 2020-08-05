<?php
include 'inc/koneksi.php';

$id_subkriteria = $_GET['id_subkriteria'];
$query = mysql_query("delete from subkriteria where id_subkriteria='$id_subkriteria'") or die(mysql_error());
if ($query) {
?>
<script language="JavaScript">
	alert('Sub Kriteria berhasil di hapus');
	document.location='sub_kriteria.php';
</script>
<?php
}
?>