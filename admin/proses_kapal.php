<?php
include "Client_kapal.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("idkapal" => $_POST['idkapal'], 
                "nmkapal" => $_POST['nmkapal'],
                "jeniskapal" => $_POST['jeniskapal'],
                "kapasitas" => $_POST['kapasitas'],
                "tahun_pembuatan" => $_POST['tahun_pembuatan'],
                "aksi"=>$_POST['aksi']);
    $abc->tambah_data($data);
    header('location:index_kapal.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array("idkapal" => $_POST['idkapal'], 
                "nmkapal" => $_POST['nmkapal'],
                "jeniskapal" => $_POST['jeniskapal'],
                "kapasitas" => $_POST['kapasitas'],
                "tahun_pembuatan" => $_POST['tahun_pembuatan'],
                "aksi"=>$_POST['aksi']);
    $abc->ubah_data($data);
    header('location:index_kapal.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') 
{ $data = array("idkapal"=>$_GET['idkapal'],
                "aksi"=>$_GET['aksi']);
    $abc->hapus_data($data);
    header('location:index_kapal.php?page=daftar-data');
}
unset($abc,$data);
?>