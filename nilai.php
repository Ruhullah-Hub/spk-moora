<?php 
include "head.php";
?>
<div class="row">		
	<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
		<a href="nilai_tambah.php"><input type="submit" value="Tambah Penilaian" class="btn btn-sm btn-danger"></a>
	</div>
	<div class="card-body">

				<div class="datatable">
				<h4>Data Penilaian</h4>	<hr>

				<div class="datatable">
				<hr>
					<table class="table table-hover table-borderd"  id="dataTables1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peserta</th>
								<th>Nama Kriteria</th>
								<th>Nama Sub Kriteria</th>
								<th>Bobot</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$nomor = 0;
						$hasil = mysql_query("SELECT nilai.*, subkriteria.nama_subkriteria, subkriteria.bobot, peserta.nama_peserta, kriteria.nama_kriteria FROM nilai, subkriteria, peserta, kriteria where nilai.nim=peserta.nim AND nilai.id_kriteria=kriteria.id_kriteria AND nilai.id_subkriteria=subkriteria.id_subkriteria");
						while ($dataku = mysql_fetch_array($hasil)) {
						?>
							<tr>
								<td><?php echo $nomor=$nomor+1;?></td>
								<td><?php echo $dataku['nama_peserta']; ?></td>
								<td><?php echo $dataku['nama_kriteria']; ?></td>
								<td><?php echo $dataku['nama_subkriteria']; ?></td>
								<td><?php echo $dataku['bobot']; ?></td>
								
							</tr>
						<?php }	?>
						</tbody>
					</table>
					</div>
			</div>
			</div>
				</div>
				</div>
				</div>
	<?php include "footer.php"; ?>
