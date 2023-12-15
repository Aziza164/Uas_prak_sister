<?php
error_reporting(1);
class Client
{
    private $url;

    // function yan pertama kali di load saat class dipanggil 
    public function __construct($url)
    {
        $this->url=$url;
        unset($url);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/','',$data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data()
    {
        $client = curl_init($this->url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data,$client,$response);
    }

    public function tampil_data($idrute)
    { 
        $idrute = $this->filter($idrute);
        $client = curl_init($this->url."?aksi=tampil&idrute=".$idrute); 
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($idrute,$client,$response,$data);
    }

    public function tambah_data($data)
    {
        $data = '{  "idrute":"'.$data['idrute'].'",
                    "kotaasal":"'.$data['kotaasal'].'",
                    "kotatujuan":"'.$data['kotatujuan'].'",
                    "jarak":"'.$data['jarak'].'",
                    "durasi":"'.$data['durasi'].'",
                    "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data($data)
    {
        $data = '{  "idrute":"'.$data['idrute'].'",
                    "kotaasal":"'.$data['kotaasal'].'",
                    "kotatujuan":"'.$data['kotatujuan'].'",
                    "jarak":"'.$data['jarak'].'",
                    "durasi":"'.$data['durasi'].'",
                    "aksi":"'.$data['aksi'].'"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data($data)
    {
        $idrute = $this->filter($data['idrute']);
        $data = '{  "idrute":"'.$idrute.'",
                    "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($idrute, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }

}

$url = 'http://10.90.32.144:8080/www/uaspraksister/server/server_rute.php';
// buat objek baru dari class client
$abc = new Client($url);
?>