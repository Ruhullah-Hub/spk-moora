<?php 
include "head.php";
?>

<div class="row">		
	<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
		<a href="kriteria_tambah.php"><input type="submit" value="Tambah Kriteria" class="btn btn-sm btn-danger"></a>
	</div>
	<div class="card-body">

				<div class="datatable">
				<h4>Data Kriteria Penilaian</h4>	<hr>
					<table class="table table-hover table-bordered" id="dataTables1">
						<thead>
							<tr>
								<th>No</th>
								<th>Id Krieria</th>
								<th>Nama Kriteria</th>
								<th>Bobot</th>
								<th>Tipe</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$nomor=0;
							$tampil = mysql_query("SELECT * FROM kriteria");
							while ($data = mysql_fetch_array($tampil)) {
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['id_kriteria']; ?></td>
									<td><?php echo $data['nama_kriteria']; ?></td>
									<td><?php echo $data['bobot']; ?></td>
									<td><?php echo $data['tipe']; ?></td>
									<td width="20%">
										<a href="kriteria_edit.php?id_kriteria=<?php echo $data['id_kriteria']; ?>">
										<button class="btn btn-success btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										</a>
										&nbsp;
										<a href="kriteria_hapus.php?id_kriteria=<?php echo $data['id_kriteria']; ?>">
										<button class="btn btn-danger btn-sm">Hapus</button>
										</a>
									</td>
								</tr>
							<?php 
							// endforeach;
						}
							?>
						</tbody>
					</table>
				</div>
				</div>
				</div>
				</div>
			<?php include "footer.php"; ?>