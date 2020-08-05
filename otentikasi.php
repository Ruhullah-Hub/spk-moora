<?php
include 'inc/koneksi.php';
function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
$username = antiinjection($username);
$password = antiinjection($password);

$loginadmin = mysql_query("select * from admin where username='$username' and password='$password'");
$q=mysql_fetch_array($loginadmin);

if (mysql_num_rows($loginadmin) == 1) {
	$_SESSION['username'] = $q['username'];
	$_SESSION['password'] = $q['password'];
	$_SESSION['nama']	  = $q['nama'];
	header('location:index.php');
} else {
	header('location:index.php?error=4');
}
?>