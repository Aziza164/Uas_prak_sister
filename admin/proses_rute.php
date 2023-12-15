<?php
include "Client_rute.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("idrute" => $_POST['idrute'], 
                "kotaasal" => $_POST['kotaasal'],
                "kotatujuan" => $_POST['kotatujuan'],
                "jarak" => $_POST['jarak'],
                "durasi" => $_POST['durasi'],
                "aksi"=>$_POST['aksi']);
    $abc->tambah_data($data);
    header('location:index_rute.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array("idrute" => $_POST['idrute'], 
                "kotaasal" => $_POST['kotaasal'],
                "kotatujuan" => $_POST['kotatujuan'],
                "jarak" => $_POST['jarak'],
                "durasi" => $_POST['durasi'],
                "aksi"=>$_POST['aksi']);
    $abc->ubah_data($data);
    header('location:index_rute.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') 
{ $data = array("idrute"=>$_GET['idrute'],
                "aksi"=>$_GET['aksi']);
    $abc->hapus_data($data);
    header('location:index_rute.php?page=daftar-data');
}
unset($abc,$data);
?>