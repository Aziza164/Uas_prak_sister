<?php
include "Client_pemesanan.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array("idpemesanan" => $_POST['idpemesanan'], 
                "idpelanggan" => $_POST['idpelanggan'],
                "idkeberangkatan" => $_POST['idkeberangkatan'],
                "jumlah" => $_POST['jumlah'],
                "total_pembayaran" => $_POST['total_pembayaran'],
                "status_pembayaran" => $_POST['status_pembayaran'],
                "aksi"=>$_POST['aksi']);
    $abc->tambah_data($data);
    header('location:index_pemesanan.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array("idpemesanan" => $_POST['idpemesanan'], 
                "idpelanggan" => $_POST['idpelanggan'],
                "idkeberangkatan" => $_POST['idkeberangkatan'],
                "jumlah" => $_POST['jumlah'],
                "total_pembayaran" => $_POST['total_pembayaran'],
                "status_pembayaran" => $_POST['status_pembayaran'],
                "aksi"=>$_POST['aksi']);
    $abc->ubah_data($data);
    header('location:index_pemesanan.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') 
{ $data = array("idpemesanan"=>$_GET['idpemesanan'],
                "aksi"=>$_GET['aksi']);
    $abc->hapus_data($data);
    header('location:index_pemesanan.php?page=daftar-data');
}
unset($abc,$data);
?>