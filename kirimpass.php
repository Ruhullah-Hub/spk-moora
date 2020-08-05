<?php
require_once "inc/koneksi.php";
$username = $_POST['username'];
 
function randomPassword()
{
// function untuk membuat password random 6 digit karakter
 
$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
 
srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}
 
// membuat password baru secara random -> memanggil function randomPassword
$newPassword = randomPassword();
 
// perlu dibuat sebarang pengacak
$pengacak  = "NDJS3289JSKS190JISJI";
     
// mengenkripsi password dengan md5() dan pengacak
$newPasswordEnkrip = md5($pengacak . md5($newPassword) . $pengacak);
 
// mencari alamat email si user
$query = mysql_query($mysqli, "SELECT * FROM admin WHERE username = '$username'")
									or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
	$data  = mysql_num_rows($query);

$alamatEmail = $data['email'];
 
// title atau subject email
$title  = "New Password";
 
// isi pesan email disertai password
$pesan  = "Username Anda : ".$username.". \nPassword Anda yang baru adalah ".$newPassword;
 
// header email berisi alamat pengirim
$header = "From: admin@.com";
 
// mengirim email
$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
 
// cek status pengiriman email
if ($kirimEmail) {
 
    // update password baru ke database (jika pengiriman email sukses)
    $query = "UPDATE admin SET password = '$newPasswordEnkrip' WHERE username = '$username'";
    $hasil = mysql_query($query);
     
    if ($hasil) echo "Password baru telah direset dan sudah dikirim ke email Anda";
    }
else echo "Pengiriman password baru ke email gagal";
 
?>