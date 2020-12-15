<?php
$conf = mysqli_connect("localhost", "root", "", "crudnative1");
/*if ($conf) {
	echo "Koneksi Sukses";
} else {
	echo "Koneksi Gagal";
}*/


function query($query)
{
	global $conf;
	$result = mysqli_query($conf, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function hapus($id)
{
	global $conf;
	mysqli_query($conf, "DELETE FROM mhs WHERE id = $id ");
	return mysqli_affected_rows($conf);
}

function edit($data)
{
	global $conf;
	$id = $data["id"];
	$nm_mhs = htmlspecialchars($data["nm_mhs"]);
	$nim = htmlspecialchars($data["nim"]);
	$jk = htmlspecialchars($data["jk"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$email = htmlspecialchars($data["email"]);

	$query = "UPDATE mhs SET 
        nm_mhs='$_POST[nm_mhs]',
        nim='$_POST[nim]',
        jk='$_POST[jk]',
        id_kelas='$_POST[id_kelas]',
        email='$_POST[email]'
        WHERE id=$_POST[id] ";
	mysqli_query($conf, $query);
	return mysqli_affected_rows($conf);
}
