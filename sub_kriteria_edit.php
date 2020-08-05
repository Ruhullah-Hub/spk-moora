<?php 
include "head.php";
?>

			<?php
			$id_subkriteria=$_GET['id_subkriteria'];
			$query=mysql_query("select * from subkriteria where id_subkriteria='$id_subkriteria'");
			$dataku=mysql_fetch_array($query);
			?>
			
			
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Edit Data Sub Kriteria</div>
		</div>
			<div class="card-body">

			<form class="form-horizontal" action="sub_kriteria_edit.php" method="post" role="form">
			<input type=hidden name='id_subkriteria' value=<?php echo $_GET['id_subkriteria']; ?> >
				<div class="panel panel-default">
				
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Kriteria:</label>
							<div class="col-sm-5">
								<select name='id_kriteria' data-placeholder="Pilih Kriteria..." class="form-control">
									<option value='' selected>-- Pilih Kriteria --</option>
									<?php
									$query = "SELECT * FROM kriteria order by id_kriteria asc";
									$hasil = mysql_query($query);
									while ($data = mysql_fetch_array($hasil)) 
									{
										if ($dataku['id_kriteria']==$data['id_kriteria']) {
										echo "<option value='$data[id_kriteria]' selected='$dataku[id_kriteria]'>".$data['nama_kriteria']."</option>";
										}else{
										echo "<option value='$data[id_kriteria]'>".$data['nama_kriteria']."</option>";
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Sub Kriteria:</label>
							<div class="col-sm-5">
								<input type="text" name="nama_subkriteria" value="<?php echo $dataku['nama_subkriteria'];?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bobot:</label>
							<div class="col-sm-5">
								<input type="text" name="bobot" value="<?php echo $dataku['bobot'];?>" required class="form-control">
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
				$id_subkriteria	= $_POST['id_subkriteria'];
				$id_kriteria	= $_POST['id_kriteria'];
				$nama_subkriteria	= $_POST['nama_subkriteria'];
				$bobot 			= $_POST['bobot'];
				$query=mysql_query("UPDATE subkriteria SET id_kriteria='$id_kriteria', nama_subkriteria='$nama_subkriteria', bobot='$bobot' WHERE id_subkriteria='$id_subkriteria'") or die(mysql_error());
				if ($query) {
				echo "<script>window.alert('Sub Kriteria berhasil diubah');
						window.location=(href='sub_kriteria.php')</script>";
				}}
			?>
				<!-- /right labels -->
	<?php include "footer.php"; ?>