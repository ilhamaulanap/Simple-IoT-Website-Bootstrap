<?php
$host ='localhost';
$user ='bioboxmy_bioboxku';
$pas ='********';
$database='bioboxmy_biobox';

$konek = mysqli_connect($host,$user,$pas,$database);

if (!$konek)
{
	echo "koneksi ke MYSQL gagal....";
}
?>
