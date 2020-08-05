<?php 
include "head.php";
?>

<div class="row">		
	<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
		<a href="sub_kriteria_tambah.php"><input type="submit" value="Tambah Sub Kriteria" class="btn btn-sm btn-danger"></a>
	</div>
	<div class="card-body">

				<div class="datatable">
				<h4>Data Sub Kriteria Penilaian</h4>	<hr>

				<div class="datatable">
					<table class="table table-hover table-bordered" id="dataTables1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kriteria</th>
								<th>Nama Sub Kriteria</th>
								<th>Bobot</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$nomor = 0;
						$hasil = mysql_query("SELECT subkriteria.*, kriteria.nama_kriteria FROM subkriteria, kriteria where subkriteria.id_kriteria=kriteria.id_kriteria order by subkriteria.id_subkriteria asc");
						while ($dataku = mysql_fetch_array($hasil)) {
						?>
							<tr>
								<td><?php echo $nomor=$nomor+1;?></td>
								<td><?php echo $dataku['nama_kriteria']; ?></td>
								<td><?php echo $dataku['nama_subkriteria']; ?></td>
								<td><?php echo $dataku['bobot']; ?></td>
								<td width="20%">
									<a href="sub_kriteria_edit.php?id_subkriteria=<?php echo $dataku['id_subkriteria']; ?>">
									<button class="btn btn-success btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										</a>
										&nbsp;
									<a href="sub_kriteria_hapus.php?id_subkriteria=<?php echo $dataku['id_subkriteria']; ?>">
									<button class="btn btn-danger btn-sm">Hapus</button>
									</a>
								</td>
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
<?php include "footer.php" ?>