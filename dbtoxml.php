<?php
	include "connection.php";
	$query = mysqli_query($link, "SELECT * FROM pinjamruangan");
	$pinjam = new SimpleXMLElement('<datapinjam/>');

	while($baris = mysqli_fetch_array($query)) {
			$isi = $pinjam->addChild('data');
			$isi->addChild("idpeminjaman",$baris['idPeminjaman']);
			$isi->addChild("namapeminjam",$baris['namaPeminjam']);
			$isi->addChild("nohp",$baris['noTelp']);
			$isi->addChild("idruangan",$baris['idRuangan']);
			$isi->addChild("tglpeminjaman",$baris['tglPeminjaman']);
	}

	Header('Content-type: text/xml');
	print($pinjam->asXML());
	file_put_contents('datapinjam.xml',$pinjam->saveXML()); 
?>
