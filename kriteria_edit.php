<?php 
include "head.php";
?>
	
<?php
$id_kriteria = $_GET['id_kriteria'];
$query=mysql_query("select * from kriteria where id_kriteria='$id_kriteria'");
$dataku=mysql_fetch_array($query);
?>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Edit Data Kriteria</div>
		</div>
			<div class="card-body">
			<form class="form-horizontal" action="kriteria_edit.php" method="post" role="form">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Id Kriteria:</label>
							<div class="col-sm-10">
								<input type="text" name="id_kriteria" value="<?php echo $dataku['id_kriteria']; ?>" required class="form-control" readonly onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Kriteria</label>
							<div class="col-sm-10">
								<input type="text" name="nama_kriteria" value="<?php echo $dataku['nama_kriteria']; ?>" required class="form-control" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Bobot</label>
							<div class="col-sm-10">
								<input type="text" name="bobot" value="<?php echo $dataku['bobot']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tipe</label>
							<div class="col-sm-10">
								<input type="radio" name="tipe" value="Cost" <?php if ($dataku["tipe"]=="Cost"){?> checked="checked" <?php } ?>>
								Cost
								<input type="radio" name="tipe" value="Benefit" <?php if ($dataku["tipe"]=="Benefit"){?> checked="checked" <?php } ?>>
								Benefit
							</div>
						</div>

						<div class="form-action">
							<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
						</div>

					</div>
				</div>
			</form>
			</div>
				</div>
				</div>
				</div>
				</div>
<?php
if (isset($_POST['ubah'])) {

	$id_kriteria	= $_POST['id_kriteria'];
	$nama_kriteria	= $_POST['nama_kriteria'];
	$bobot 		    = $_POST['bobot'];
	$tipe 		    = $_POST['tipe'];

	$query=mysql_query("UPDATE kriteria SET nama_kriteria='$nama_kriteria', bobot='$bobot', tipe='$tipe' WHERE id_kriteria='$id_kriteria'") or die(mysql_error());
	if ($query) {
	echo "<script>window.alert('Kriteria berhasil diubah');
			window.location=(href='kriteria.php')</script>";
	}}
?>
			<!-- /right labels -->
<?php include "footer.php";?>