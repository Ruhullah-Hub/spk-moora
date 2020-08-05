<?php 
include "head.php";
?>
<div class="row">		
	<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
		<a>Perhitungan MOORA</a>
	</div>
	<div class="card-body">
      <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">MATRIK AWAL</h6></div>
            	<div class="datatable">
                <div class='table-responsive'>
            		<table class="table table-hover table-bordered">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
            					<?php
	            				$no = 1;
	            				$query = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
	            				while($data=mysql_fetch_array($query)) { 
	            					?>
		            					<th><?php echo $data["nama_kriteria"]."<br>Bobot = ".$data["bobot"]."<br>Tipe = ".$data["tipe"]; ?></th>
	            					<?php
	            				}
            					?>            					
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            				$nomor = 0;
            				
            					$hasil = mysql_query("SELECT * FROM peserta ORDER BY nim ASC");
	            				while ($dataku = mysql_fetch_array($hasil)) {
	            				?>
	            				<tr>
	            					<td><?php echo $nomor=$nomor+1; ?></td>
	            					<td><?php echo $dataku['nama_peserta']; ?></td>
	            					<?php 
	            					$query=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
            						while($data=mysql_fetch_array($query)){
            							$query2=mysql_query("SELECT * FROM nilai, kriteria, subkriteria, peserta
                                            WHERE nilai.id_kriteria='$data[id_kriteria]' 
                                            AND nilai.id_subkriteria=subkriteria.id_subkriteria
                                            AND kriteria.id_kriteria=subkriteria.id_kriteria
                                            AND nilai.nim=peserta.nim
                                            AND nilai.nim='$dataku[nim]'");
            						    while($data2=mysql_fetch_array($query2)){
            							?>
	            							<td><?php echo $data2['nama_subkriteria']; ?></td>
	            						<?php 
	            						} 
	            					}?>
	            				</tr>
	            				<?php 
            				}
            				?>          				
            			</tbody>
            		</table>
                    </div>
            	</div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">MATRIK KECOCOKAN ALTERNATIF KRITERIA</h6></div>
            	<div class="datatable">
                <div class='table-responsive'>
            		<table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <?php
                                $no = 1;
                                $query = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                                while($data=mysql_fetch_array($query)) { 
                                    ?>
                                        <th><?php echo $data["nama_kriteria"]."<br>Bobot = ".$data["bobot"]."<br>Tipe = ".$data["tipe"]; ?></th>
                                    <?php
                                }
                                ?>                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 0;
                            
                                $hasil = mysql_query("SELECT * FROM peserta ORDER BY nim ASC");
                                while ($dataku = mysql_fetch_array($hasil)) {
                                ?>
                                <tr>
                                    <td><?php echo $nomor=$nomor+1; ?></td>
                                    <td><?php echo $dataku['nama_peserta']; ?></td>
                                    <?php 
                                    $query=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                                    while($data=mysql_fetch_array($query)){
                                        $query2=mysql_query("SELECT * FROM nilai, kriteria, subkriteria, peserta
                                            WHERE nilai.id_kriteria='$data[id_kriteria]' 
                                            AND nilai.id_subkriteria=subkriteria.id_subkriteria
                                            AND kriteria.id_kriteria=subkriteria.id_kriteria
                                            AND nilai.nim=peserta.nim
                                            AND nilai.nim='$dataku[nim]'");
                                        while($data2=mysql_fetch_array($query2)){
                                        ?>
                                            <td><?php echo $data2['nilai']; ?></td>
                                        <?php 
                                        } 
                                    }?>
                                </tr>
                                <?php 
                            }
                            ?>                          
                        </tbody>
                    </table>
                    </div>
            	</div>
                </div>
            	<!-- Normalisasi -->
            	<div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">MATRIK NORMALISASI</h6></div>
            	<div class="datatable">
                <div class='table-responsive'>
            		<table class="table table-hover table-bordered">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
            					<?php
	            				$no = 1;
	            				$query = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
	            				while($data=mysql_fetch_array($query)) { 
	            					?>
		            					<th><?php echo $data["nama_kriteria"]?></th>
	            					<?php
	            				}
            					?>            					
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            				$nomor = 0;
            				
            					$hasil = mysql_query("SELECT * FROM peserta ORDER BY nim ASC");
	            				while ($dataku = mysql_fetch_array($hasil)) {
	            				?>
	            				<tr>
	            					<td><?php echo $nomor=$nomor+1; ?></td>
	            					<td><?php echo $dataku['nama_peserta']; ?></td>
	            					<?php 
	            					$query=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
            						while($data=mysql_fetch_array($query)){

            							//$r_tipe=mysql_fetch_array(mysql_query("SELECT MAX(bobot) AS max, MIN(bobot) AS min FROM kriteria WHERE id_kriteria='$data[id_kriteria]'"));
            							//$max=$r_tipe["max"];
            							//$min=$r_tipe["min"];
  	          						    $pembagi=0;
            							$query2=mysql_query("SELECT * FROM nilai, subkriteria WHERE nilai.id_kriteria='$data[id_kriteria]' AND nilai.id_subkriteria=subkriteria.id_subkriteria AND nilai.nim='$dataku[nim]'");
            						    while($data2=mysql_fetch_array($query2)){
            						   	
  										$query3=mysql_query("SELECT * FROM nilai WHERE nilai.id_kriteria='$data[id_kriteria]'");
    						    			
    						    		while($data3=mysql_fetch_array($query3)){
                                            $pembagi=$pembagi+($data3['nilai']*$data3['nilai']);
        									 //$pembagi=sqrt($data3["tot_nilai"]);
                                            //$pembagi=$data3["tot_nilai"];
        								}
            							?>
	            							<td>
	            								<?php 
												$n = $data2["nilai"]/sqrt($pembagi);
												$nh = round($n,4);
	            								echo $nh;
                                                //echo $pembagi;
	            								?>
	            									
	            							</td>
	            						<?php 
	            						} 
	            					}?>
	            				</tr>
	            				<?php 
            				}
            				?>          				
            			</tbody>
            		</table>
                    </div>
            	</div>     
                </div>            				


	<!-- Normalisasi -->
    <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">MATRIK NORMALISASI TERBOBOT</h6></div>
            	<div class="datatable">
                <div class='table-responsive'>
            		<table class="table table-hover table-bordered">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
            					<?php
	            				$no = 1;
	            				$query = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
	            				while($data=mysql_fetch_array($query)) { 
	            					?>
		            					<th><?php echo $data["nama_kriteria"]?></th>
	            					<?php
	            				}
            					?>            					
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            				$nomor = 0;
            				
            					$hasil = mysql_query("SELECT * FROM peserta ORDER BY nim ASC");
	            				while ($dataku = mysql_fetch_array($hasil)) {
	            				?>
	            				<tr>
	            					<td><?php echo $nomor=$nomor+1; ?></td>
	            					<td><?php echo $dataku['nama_peserta']; ?></td>
	            					<?php 
	            					$query=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
            						while($data=mysql_fetch_array($query)){

            							//$r_tipe=mysql_fetch_array(mysql_query("SELECT MAX(bobot) AS max, MIN(bobot) AS min FROM kriteria WHERE id_kriteria='$data[id_kriteria]'"));
            							//$max=$r_tipe["max"];
            							//$min=$r_tipe["min"];
  	          						    $pembagi=0;
            							$query2=mysql_query("SELECT * FROM nilai, subkriteria WHERE nilai.id_kriteria='$data[id_kriteria]' AND nilai.id_subkriteria=subkriteria.id_subkriteria AND nilai.nim='$dataku[nim]'");
            						    while($data2=mysql_fetch_array($query2)){
            						   	
  										$query3=mysql_query("SELECT * FROM nilai WHERE nilai.id_kriteria='$data[id_kriteria]'");
    						    			
    						    		while($data3=mysql_fetch_array($query3)){
                                            $pembagi=$pembagi+($data3['nilai']*$data3['nilai']);
        								}
            							?>
	            							<td>
												<?php 
												$hs = $data['bobot']*($data2["nilai"]/sqrt($pembagi));
												$hsl1 = round($hs,4);
	            								
	            								echo $hsl1;
	            								?>
	            									
	            							</td>
	            						<?php 
	            						} 
	            					}?>
	            				</tr>
	            				<?php 
            				}
            				?>          				
            			</tbody>
            		</table>
                    </div>
            	</div>     
                </div>            				
           
		   <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">MENGHITUNG NILAI Y</h6></div>
            	<div class="datatable">
            		<table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>  
                                <th>MAX</th>
                                <th>MIN</th>
                                <th>Y = MAX - MIN</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $nomor = 0;
                            
                                $hasil = mysql_query("SELECT * FROM peserta ORDER BY nim ASC");
                                while ($dataku = mysql_fetch_array($hasil)) {
                                    $nilai_y=0;
                                ?>
                                <tr>
                                    <td><?php echo $nomor=$nomor+1; ?></td>
                                    <td><?php echo $dataku['nama_peserta']; ?></td>
									<?php 
									$hsld = 0;
									$query=mysql_query("SELECT * FROM kriteria WHERE tipe='Benefit' ORDER BY id_kriteria ASC");
            						while($data=mysql_fetch_array($query)){
  	          						    $pembagi=0;
            							$query2=mysql_query("SELECT * FROM nilai, subkriteria WHERE nilai.id_kriteria='$data[id_kriteria]' AND nilai.id_subkriteria=subkriteria.id_subkriteria AND nilai.nim='$dataku[nim]'");
            						    while($data2=mysql_fetch_array($query2)){
            						   	
  										$query3=mysql_query("SELECT * FROM nilai WHERE nilai.id_kriteria='$data[id_kriteria]'");
    						    			
    						    		while($data3=mysql_fetch_array($query3)){
                                            $pembagi=$pembagi+($data3['nilai']*$data3['nilai']);
        								}	
										$hsd = $data['bobot']*($data2["nilai"]/sqrt($pembagi));
												$hsld += round($hsd,4);
										
									}
									}
									?>
                                    <td>
                                        <?php echo $hsld; ?><br>
										
                                    </td>
									<?php 
									$hsldm = 0;
									$query=mysql_query("SELECT * FROM kriteria WHERE tipe='Cost' ORDER BY id_kriteria ASC");
            						while($data=mysql_fetch_array($query)){
  	          						    $pembagi=0;
            							$query2=mysql_query("SELECT * FROM nilai, subkriteria WHERE nilai.id_kriteria='$data[id_kriteria]' AND nilai.id_subkriteria=subkriteria.id_subkriteria AND nilai.nim='$dataku[nim]'");
            						    while($data2=mysql_fetch_array($query2)){
            						   	
  										$query3=mysql_query("SELECT * FROM nilai WHERE nilai.id_kriteria='$data[id_kriteria]'");
    						    			
    						    		while($data3=mysql_fetch_array($query3)){
                                            $pembagi=$pembagi+($data3['nilai']*$data3['nilai']);
        								}	
										$hsdm = $data['bobot']*($data2["nilai"]/sqrt($pembagi));
												$hsldm += round($hsdm,4);
										
									}
									}
									?>
                                    <td>
                                        <?php echo $hsldm; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $hsld-$hsldm; 
                                        $nilai_y=$hsld-$hsldm;
                                        mysql_query("UPDATE peserta SET nilai_y='$nilai_y' WHERE nim='$dataku[nim]'");
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                                
                            }
                            ?>                          
                        </tbody>
                    </table>
            	</div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">PERANGKINGAN</h6></div>
                <div class="datatable">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>  
                                <th>NIM</th>  
                                <th>Fakultas</th>  
                                <th>Prodi</th>  
                                <th>NILAI</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 0;
                            
                                $hasil = mysql_query("SELECT * FROM peserta ORDER BY nilai_y DESC");
                                while ($dataku = mysql_fetch_array($hasil)) {
                                ?>
                                <tr>
                                    <td><?php echo $nomor=$nomor+1; ?></td>
                                    <td><?php echo $dataku['nama_peserta']; ?></td>
                                    <td><?php echo $dataku['nim']; ?></td>
                                    <td><?php echo $dataku['fakultas']; ?></td>
                                    <td><?php echo $dataku['prodi']; ?></td>
                                    <td><?php echo round($dataku['nilai_y'],4); ?></td>
                                </tr>
                                <?php 
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