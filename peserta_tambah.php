<?php 
include "head.php";
?>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Tambah Data Peserta</div>
		</div>
			<div class="card-body">
			<form class="form-horizontal" action="peserta_tambah.php" method="post" role="form">
				<div class="panel panel-default">
				
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" name="nim" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Peserta</label>
							<div class="col-sm-10">
								<input type="text" name="nama_peserta" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">NIK</label>
							<div class="col-sm-10">
								<input type="text" name="nik" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Fakultas</label>
							<div class="col-sm-10">
								<input type="text" name="fakultas" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Program Studi</label>
							<div class="col-sm-10">
								<input type="text" name="prodi" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-10">
							<select name="jk" class="form-control">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="Laki Laki">Laki Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
								
							</div>
						</div>
						
						

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat Lengkap</label>
							<div class="col-sm-10">
								<input type="text" name="alamat" required class="form-control">
							</div>
						</div>

						
						<div class="form-action">
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
			if (isset($_POST['simpan'])) {
				$nim 		= $_POST['nim'];
				$nik 		= $_POST['nik'];
				$fakultas 		= $_POST['fakultas'];
				$prodi 		= $_POST['prodi'];
				$jk 		= $_POST['jk'];
				$nama 		= $_POST['nama_peserta'];
				$alamat 	= $_POST['alamat'];


				$sql = "INSERT INTO peserta values 
				('$nim','$nik','$fakultas','$prodi','$jk','$nama','$alamat',0)";
				$query = mysql_query($sql);
				if ($query) {
					echo "<script>window.alert('Peserta  Berhasil ditambah');
								window.location=(href='peserta.php')</script>";
				}else{
					echo "<script>window.alert('Peserta  Gagal ditambah');
								window.location=(href='peserta.php')</script>";
				}}
			?>
			<!-- /right labels -->
			<?php include "footer.php"; ?>