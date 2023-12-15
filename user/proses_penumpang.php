<?php
include "Client_penumpang.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("idpelanggan" => $_POST['idpelanggan'], 
                "nmpelanggan" => $_POST['nmpelanggan'],
                "alamat" => $_POST['alamat'],
                "notelp" => $_POST['notelp'],
                "jk" => $_POST['jk'],
                "aksi"=>$_POST['aksi']);
    $abc->tambah_data($data);
    header('location:index_penumpang.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array("idpelanggan" => $_POST['idpelanggan'], 
                "nmpelanggan" => $_POST['nmpelanggan'],
                "alamat" => $_POST['alamat'],
                "notelp" => $_POST['notelp'],
                "jk" => $_POST['jk'],
                "aksi"=>$_POST['aksi']);
    $abc->ubah_data($data);
    header('location:index_penumpang.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') 
{ $data = array("idpelanggan"=>$_GET['idpelanggan'],
                "aksi"=>$_GET['aksi']);
    $abc->hapus_data($data);
    header('location:index_penumpang.php?page=daftar-data');
}
unset($abc,$data);
?>