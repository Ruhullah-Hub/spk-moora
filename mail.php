<?php
require("phpmailer/class.phpmailer.php");
include "inc/koneksi.php";

$email = $_POST['email'];

$sql=mysql_query("SELECT * FROM admin WHERE email='$email'");
$cek = mysql_num_rows($sql);
$data  = mysql_fetch_assoc($sql);
$username = $data['username'];
$password = $data['password'];
$nama_user = $data['nama'];


if($cek > 0){
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = 'rintodinaulawitia@gmail.com';
	$mail->Password = 'xxxxx';

	$mail->From="rintodinaulawitia@gmail.com";
	$mail->FromName="Admin@rintodinaulawitia@gmail.com";
	$mail->Sender="rintodinaulawitia@gmail.com";
	$mail->AddReplyTo("rintodinaulawitia@gmail.com", "Balas ke :");

	$mail->AddAddress($email);
	$mail->Subject = "Informasi Data Akun";
	//$mail->AddEmbeddedImage('../../img/logo.png', 'logo');

	$mail->IsHTML(true);
	$mail->Body = "<h3>Permintaan akun : ".$email."</h3><img src='cid:logo'><hr>
				   <p>Terimakasih Saudara/i ".$email." telah melakukan Request Lupa password pada sistem kami.</p>
				   <p>Berikut Adalah Informasi Akun anda :<hr></p>
				   <ul>
						
						<li>Nama : ".$nama_user."</li>
						<li>Email : ".$email."</li>
						<li>Username : ".$username." (Gunakan ini untuk ID Pengguna)</li>
						<li>Password : ".$username."</li>
				   </ul>
				   <hr>
				   <p>Silahkan gunakan akun data diatas untuk melakukan login .</p><br><br>
				   <p>Salam,<br><br><br><b>Sapadia Hotel</b></p>";
	$mail->AltBody="Dikirim Aplikasi Penjadwalan Sapadia Hotel";
	if(!$mail->Send())
	{
		echo "Error sending: " . $mail->ErrorInfo;;
	}else{
		?>
		<script>
		alert("Email Berhasil Dikirim, Silahkan buka Email untuk melihat akun anda.");
		document.location="index.php";
		</script>
		<?php
	}
}else{
	?>
	<script>
	alert("Maaf, Email anda tidak terdaftar disistem. !");
	document.location="lupa_password.php";
	</script>
	<?php
}


?>