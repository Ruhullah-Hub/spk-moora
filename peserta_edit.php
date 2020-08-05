<?php 
include "head.php";
?>	<?php 
			$nim = $_GET['nim'];
			$query = mysql_query("SELECT * FROM peserta WHERE nim='$nim'");
			$data = mysql_fetch_array($query);
			 ?>
			 
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Edit Data Peserta</div>
		</div>
			<div class="card-body">

			 <form class="form-horizontal" action="peserta_edit.php" method="post" role="form">
			 	<div class="panel panel-default">
			 	
			 		<div class="panel-body">

					 <div class="form-group">
							<label class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" name="nim" value="<?php echo $data['nim']; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Peserta</label>
							<div class="col-sm-10">
								<input type="text" name="nama_peserta" value="<?php echo $data['nama_peserta']; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">NIK</label>
							<div class="col-sm-10">
								<input type="text" name="nik" value="<?php echo $data['nik']; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Fakultas</label>
							<div class="col-sm-10">
								<input type="text" name="fakultas" value="<?php echo $data['fakultas']; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Program Studi</label>
							<div class="col-sm-10">
								<input type="text" name="prodi" value="<?php echo $data['prodi']; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-10">
							<select name="jk" class="form-control">
								<option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
								<option value="Laki Laki">Laki Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat Lengkap</label>
							<div class="col-sm-10">
								<input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required class="form-control">
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
				$nim 		= $_POST['nim'];
				$nik 		= $_POST['nik'];
				$fakultas 		= $_POST['fakultas'];
				$prodi 		= $_POST['prodi'];
				$jk 		= $_POST['jk'];
				$nama 		= $_POST['nama_peserta'];
				$alamat 	= $_POST['alamat'];

			 	$query = mysql_query("UPDATE peserta SET nik='$nik', fakultas='$fakultas', prodi='$prodi', jk='$jk', nama_peserta='$nama', alamat='$alamat' WHERE nim='$nim'") or die(mysql_error());
			 	if ($query) {
			 		echo "<script>window.alert('Data Peserta berhasil diubah');
			 					window.location=(href='peserta.php')</script>";
			 	}}
			 ?>
			 <!-- /right labels -->
			 <?php include "footer.php"; ?>