<?php
include "Client_keberangkatan.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("idkeberangkatan" => $_POST['idkeberangkatan'], 
                "idkapal" => $_POST['idkapal'],
                "idrute" => $_POST['idrute'],
                "tanggal" => $_POST['tanggal'],
                "jam" => $_POST['jam'],
                "hargatiket" => $_POST['hargatiket'],
                "aksi"=>$_POST['aksi']);
    $abc->tambah_data($data);
    header('location:index_keberangkatan.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array("idkeberangkatan" => $_POST['idkeberangkatan'], 
                "nmkapal" => $_POST['nmkapal'],
                "idkapal" => $_POST['idkapal'],
                "idrute" => $_POST['idrute'],
                "tanggal" => $_POST['tanggal'],
                "jam" => $_POST['jam'],
                "hargatiket" => $_POST['hargatiket'],
                "aksi"=>$_POST['aksi']);
    $abc->ubah_data($data);
    header('location:index_keberangkatan.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') 
{ $data = array("idkeberangkatan"=>$_GET['idkeberangkatan'],
                "aksi"=>$_GET['aksi']);
    $abc->hapus_data($data);
    header('location:index_keberangkatan.php?page=daftar-data');
}
unset($abc,$data);
?>