<?php 
include "head.php";
?>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Tambah Data Sub Kriteria</div>
		</div>
			<div class="card-body">
			<form class="form-horizontal" action="sub_kriteria_tambah.php" method="post" role="form">
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Kriteria:</label>
							<div class="col-sm-5">
								<select name='id_kriteria' data-placeholder="Pilih Kriteria..." class="required select form-control" required>
									<option></option>";
									<?php
										$query = "SELECT * FROM kriteria order by id_kriteria asc";
										$hasil = mysql_query($query);
										while ($data = mysql_fetch_array($hasil)) 
										{
											echo "<option value='".$data['id_kriteria']."'>".$data['nama_kriteria']."</option>";
										}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Sub Kriteria</label>
							<div class="col-sm-5">
								<input type="text" name="nama_subkriteria" required class="form-control" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bobot:</label>
							<div class="col-sm-5">
								<input type="text" name="bobot" required class="form-control">
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
				$id_kriteria	= $_POST['id_kriteria'];
				$nama_subkriteria	= $_POST['nama_subkriteria'];
				$bobot 			= $_POST['bobot'];

				$sql="insert into subkriteria values 
				('','$id_kriteria','$nama_subkriteria','$bobot')";
				$query= mysql_query($sql);
				if ($query) {
				echo "<script>window.alert('Sub Kriteria berhasil ditambah');
						window.location=(href='sub_kriteria.php')</script>";
				}else{
					echo "<script>window.alert('Sub Kriteria gagal ditambah');
						window.location=(href='sub_kriteria.php')</script>";
				}}
			?>
						<!-- /right labels -->
<?php include "footer.php"; ?>