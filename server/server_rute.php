<?php
error_reporting(1);
include "Database_rute.php";
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
    $idrute = $data->idrute;
    $kotaasal = $data->kotaasal;
    $kotatujuan = $data->kotatujuan;
    $jarak = $data->jarak;
    $durasi = $data->durasi;
    $aksi = $data-> aksi;

    if ($aksi == 'tambah')
    {
        $data2=array('idrute' => $idrute, 'kotaasal' => $kotaasal, 'kotatujuan' => $kotatujuan, 'jarak' => $jarak, 'durasi' => $durasi);
        $abc->tambah_data($data2);
    } elseif ($aksi == 'ubah')
    {
        $data2=array('idrute' => $idrute, 'kotaasal' => $kotaasal, 'kotatujuan' => $kotatujuan, 'jarak' => $jarak, 'durasi' => $durasi);
        $abc->ubah_data($data2);
    } elseif ($aksi == 'hapus')
    {
        $abc->hapus_data($idrute);
    }

    unset($postdata,$data,$data2,$idrute,$kotaasal,$kotatujuan,$jarak,$durasi,$aksi,$abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ( ($_GET['aksi']=='tampil') and (isset($_GET['idrute'])) )
    {
        $idrute = filter($_GET['idrute']);
        $data=$abc->tampil_data($idrute);
        echo json_encode($data);
    } else
    {
        $data = $abc->tampil_semua_data();
        echo json_encode($data);
    }
    unset($postdata,$data,$idrute,$abc);
}