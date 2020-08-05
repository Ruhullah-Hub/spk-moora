<?php 
include "head.php";
?>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Tambah Data Kriteria</div>
		</div>
			<div class="card-body">

			<form class="form-horizontal" action="kriteria_tambah.php" method="post" role="form">
				<div class="panel panel-default">
				
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Kriteria:</label>
							<div class="col-sm-10">
								<input type="text" name="kode_kriteria" required class="form-control" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Kriteria </label>
							<div class="col-sm-10">
								<input type="text" name="nama_kriteria" required class="form-control" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bobot</label>
							<div class="col-sm-10">
								<input type="text" name="bobot" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tipe</label>
							<div class="col-sm-10">
								<input type="radio" name="tipe" value="Cost" checked>
								Cost
								<input type="radio" name="tipe" value="Benefit">
								Benefit
							</div>
						</div>

						<div class="form-action">
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
						</div>

					</div>
				
			</form>
			</div>
				</div>
				</div>
				</div>
				</div>
<?php
if (isset($_POST['simpan'])) {
	$kode_kriteria	= $_POST['kode_kriteria'];
	$nama_kriteria	= $_POST['nama_kriteria'];
	$bobot 		    = $_POST['bobot'];
	$tipe 		    = $_POST['tipe'];

	$sql="insert into kriteria values 
	('$kode_kriteria','$nama_kriteria','$bobot','$tipe')";
	$query = mysql_query($sql);
	if ($query) {
	echo "<script>window.alert('Kriteria berhasil ditambah');
			window.location=(href='kriteria.php')</script>";
	}else{
		echo "<script>window.alert('Kriteria gagal ditambah');
			window.location=(href='kriteria.php')</script>";
	}}
?>
			<!-- /right label -->
<?php include "footer.php"; ?>