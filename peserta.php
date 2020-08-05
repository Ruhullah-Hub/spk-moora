<?php 
include "head.php";
?>

<div class="row">		
	<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
		<a href="peserta_tambah.php"><input type="submit" value="Tambah Peserta" class="btn btn-sm btn-danger"></a>
	</div>
	<div class="card-body">

				<div class="datatable">
				<h4>Daftar Peserta Mahasiswa</h4>	<hr>

	
		
				<div class="datatable">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Mahasiswa</th>
								<th>NIM</th>
								<th>Fakultas</th>
								<th>Prodi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
							$nomor=0;
							$tampil = mysql_query("SELECT * FROM peserta");
							while ($data = mysql_fetch_array($tampil)) {
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['nama_peserta']; ?></td>
									<td><?php echo $data['nim']; ?></td>
									<td><?php echo $data['fakultas']; ?></td>
									<td><?php echo $data['prodi']; ?></td>
									
									<td width="20%">
										<a href="peserta_edit.php?nim=<?php echo $data['nim']; ?>">
										<button class="btn btn-success btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										</a>
										&nbsp;
										<a href="peserta_hapus.php?nim=<?php echo $data['nim']; ?>">
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
				</div>
				</div>
			<?php include "footer.php"; ?>