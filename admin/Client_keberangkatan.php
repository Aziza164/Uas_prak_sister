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

    public function tampil_semua_data_k()
    {
        $client = curl_init($this->url1);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data,$client,$response);
    }
    public function tampil_semua_data_r()
    {
        $client = curl_init($this->url2);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data,$client,$response);
    }

    public function tampil_data($idkeberangkatan)
    { 
        $idkeberangkatan = $this->filter($idkeberangkatan);
        $client = curl_init($this->url."?aksi=tampil&idkeberangkatan=".$idkeberangkatan); 
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($idkeberangkatan,$client,$response,$data);
    }

    public function tambah_data($data)
    {
        $data = '{  "idkeberangkatan":"'.$data['idkeberangkatan'].'",
                    "idkapal":"'.$data['idkapal'].'",
                    "idrute":"'.$data['idrute'].'",
                    "tanggal":"'.$data['tanggal'].'",
                    "jam":"'.$data['jam'].'",
                    "hargatiket":"'.$data['hargatiket'].'",
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
        $data = '{  "idkeberangkatan":"'.$data['idkeberangkatan'].'",
                    "idkapal":"'.$data['idkapal'].'",
                    "idrute":"'.$data['idrute'].'",
                    "tanggal":"'.$data['tanggal'].'",
                    "jam":"'.$data['jam'].'",
                    "hargatiket":"'.$data['hargatiket'].'",
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
        $idkeberangkatan = $this->filter($data['idkeberangkatan']);
        $data = '{  "idkeberangkatan":"'.$idkeberangkatan.'",
                    "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($idkeberangkatan, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }

}

$url = 'http://10.90.32.144:8080/www/uaspraksister/server/server_keberangkatan.php';
$url1 = 'http://10.90.32.144:8080/www/uaspraksister/server/server_kapal.php';
$url2 = 'http://10.90.32.144:8080/www/uaspraksister/server/server_rute.php';
// buat objek baru dari class client
$abc = new Client($url);
$bcd = new Client($url1);
$cde = new Client($url2);
?>