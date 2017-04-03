<?php
	include "connection.php";
	$sintaks = mysqli_query($link,"SELECT * FROM pinjamruangan");
	$pinjam = array();
	$data = array();
	$isi = array();

/*
	foreach($query as $row) {
		$contents[] = $row;
	}
*/

	while($baris = mysqli_fetch_array($sintaks)) {
		$isi[] = array(
			'idpeminjaman' => $baris['idPeminjaman'],
			'namapeminjam' => $baris['namaPeminjam'],
			'notelp' => $baris['noTelp'],
			'idruangan' => $baris['idRuangan'],
			'tglpeminjaman' =>$baris['tglPeminjaman']);
	}

	$data['data'] = $isi;
	$pinjam['datapinjam'] = $data;

	$json = json_encode($pinjam, JSON_PRETTY_PRINT);
	echo $json;
	file_put_contents('datapinjam.json', $json); //export to "data.json"
?>
