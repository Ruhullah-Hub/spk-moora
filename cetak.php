<?php
session_start();
ob_start();
require_once "inc/koneksi.php";
require_once "config/fungsi_indotgl.php";

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Laporan </title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <style>
	.main {
	max-width:1100px;
	margin:0 auto;
	padding:10px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	line-height:20px;
	font-size:9px;
	}
#laporan {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
 font-size:10px;
 width:100%;
 
}

#laporan td, #laporan th {
 
padding: 4px 10px 4px 10px;
}

#laporan tr:nth-child(even){background-color: #f2f2f2;}

#laporan tr:hover {background-color: #ddd;}

#laporan th {
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.ttd {
	margin-left:0px;
	width:250px;
	height:220px;
	text-align:center;
}
</style>
    <body>
   
   	<div align="center">
           <img src="img/kop.jpg">
           <br><br>
           SELEKSI PENENTUAN PENERIMA BEASISWA PPA 
           
</div>
        <br>
        <br>
        <div id="isi">
            <table id="laporan" width="100%" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                    <th>No</th>
                                <th>Nama</th>  
                                <th>NIM</th>  
                                <th>Fakultas</th>  
                                <th>Program Studi</th>  
                                <th>Alamat</th>  
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
                                    <td><?php echo $dataku['alamat']; ?></td>
                                    <td><?php echo $dataku['nilai_y']; ?></td>
                                </tr>
                                <?php 
                            }
                            ?>      
                </tbody>
            </table>
            <br><br><br>
			<table align="right">
				
				<tbody>
					<tr>
						<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td align="center">Pasir Pengaraian,<?php echo tgl_indo(date('Y-m-d'));?></td>
                        <td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
                        <td></td>
                        <td></td>
                        <td align="center">Wakil Rektor I Bagian Kemahasiswaan</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
					<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td>.</td>
                        <td></td>
						<td></td>
					</tr>
					<tr>
					<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td></td>
                        <td>.</td>
						<td></td>
					</tr>
					<tr>
					<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td>.</td>
                        <td></td>
						<td></td>
					</tr>
					<tr>					
					<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td align="center">Rivi Antoni, M.Pd</td>
                        <td></td>
						<td></td>
					</tr>
					<tr>
					<td></td>
						<td></td>
                        <td></td>
                        <td></td>
						<td align="center">NIDN. 1003128103</td>
                        <td></td>
						<td></td>
					</tr>
					
				</tbody>
			</table>
           
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="laporan.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('config/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
