<?php
error_reporting(1);
include "Database_pemesanan.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])){
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow_Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $data = json_decode($postdata);
    $idpemesanan = $data->idpemesanan;
    $idpelanggan = $data->idpelanggan;
    $idkeberangkatan = $data->idkeberangkatan;
    $jumlah = $data->jumlah;
    $total_pembayaran = $data->total_pembayaran;
    $status_pembayaran = $data->status_pembayaran;
    $aksi = $data-> aksi;

    if ($aksi == 'tambah')
    {
        $data2=array('idpemesanan' => $idpemesanan, 'idpelanggan' => $idpelanggan, 'idkeberangkatan' => $idkeberangkatan, 'jumlah' => $jumlah, 'total_pembayaran' => $total_pembayaran, 'status_pembayaran' => $status_pembayaran);
        $abc->tambah_data($data2);
    } elseif ($aksi == 'ubah')
    {
        $data2=array('idpemesanan' => $idpemesanan, 'idpelanggan' => $idpelanggan, 'idkeberangkatan' => $idkeberangkatan, 'jumlah' => $jumlah, 'total_pembayaran' => $total_pembayaran, 'status_pembayaran' => $status_pembayaran);
        $abc->ubah_data($data2);
    } elseif ($aksi == 'hapus')
    {
        $abc->hapus_data($idpemesanan);
    }

    unset($postdata,$data,$data2,$idpemesanan,$idpelanggan,$idkeberangkatan,$jumlah,$total_pembayaran,$status_pembayaran,$aksi,$abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ( ($_GET['aksi']=='tampil') and (isset($_GET['idpemesanan'])) )
    {
        $idpemesanan = filter($_GET['idpemesanan']);
        $data=$abc->tampil_data($idpemesanan);
        echo json_encode($data);
    } else
    {
        $data = $abc->tampil_semua_data();
        echo json_encode($data);
    }
    unset($postdata,$data,$idpemesanan,$abc);
}