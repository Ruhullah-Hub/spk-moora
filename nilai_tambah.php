<?php 
include "head.php";
include "combo_lowongan.php";
?>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Tambah Penilaian</div>
		</div>
			<div class="card-body">

            <form name="form1"  class="form-horizontal" action="nilai_tambah.php" method="post" role="form">
                <div class="panel panel-default">
                   
                    <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-5 control-label">Nama Peserta</label>
                        <div class="col-sm-5">
                            <select name='nim' id='nim' class='required select form-control'  onchange='showPeserta()' required data-placeholder="PILIH PESERTA">
                            <option value=''></option>
                            <?php 
                            $tampil=mysql_query("SELECT * FROM peserta ORDER BY nim asc");
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[nim]>$r[nama_peserta]</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    
                                        
                    <?php  
                        $q=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
                        while($r2=mysql_fetch_array($q))
                        {
                            $no=1;
                            $kriteria="kriteria".$no;
                            $nilai="nilai".$no;
                            ?>
                            <div class="form-group">
                            <input type="hidden" name="kriteria[]" value="<?php echo $r2['id_kriteria'] ?>">
                            <label class="col-sm-5 control-label"><?php echo $r2["nama_kriteria"]; ?></label>
                            <div class="col-sm-5">
                                <select name="nilai[]" data-placeholder="<?php echo "Pilih ".$r2['nama_kriteria']." ..." ?>" class="required select form-control" required>
                                    <option></option>
                                    <?php
                                    $query = "SELECT * FROM subkriteria where id_kriteria='$r2[id_kriteria]' order by bobot DESC";
                                    $hasil = mysql_query($query);
                                    while ($data = mysql_fetch_array($hasil)) 
                                    {
                                        echo "<option value='".$data['id_subkriteria']."-".$data['bobot']."'>".$data['nama_subkriteria']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php 
                        $no++;
                        }

                    ?>

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
    
    mysql_query("DELETE FROM nilai WHERE no_kk='$_POST[no_kk]'");

    $jml_kriteria=mysql_num_rows(mysql_query("SELECT * FROM kriteria"));
    //echo $jml_kriteria;
    for ($i=0; $i <$jml_kriteria ; $i++) { 

        $kriteria           = $_POST["kriteria"];
        $nilai              = $_POST["nilai"];
        $data               = explode("-", $nilai[$i]);
        $nim              = $_POST['nim'];

        $sql = "insert into nilai values
        ('','$nim', '$kriteria[$i]', '$data[0]', '$data[1]')";
        $query = mysql_query($sql) or die(mysql_error());
    }
    
    if ($query) {        
    echo "<script>window.alert('Nilai berhasil di tambah');
            window.location=(href='nilai.php')</script>";
    }}
?>
            <!-- /right lebels -->
<?php include "footer.php" ?>