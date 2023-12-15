<?php
class Database
{
    private $host = "127.0.0.1";
    private $dbname = "tiketkapal";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    {   // koneksi database 
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }

    public function tampil_semua_data()
    {
        $query = $this->conn->prepare("select idpelanggan, nmpelanggan, alamat, notelp, jk from pelanggan order by idpelanggan");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($idpelanggan)
    {
        $query = $this->conn->prepare("select idpelanggan, nmpelanggan, alamat, notelp, jk from pelanggan where idpelanggan=?");
        $query->execute(array($idpelanggan));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($idpelanggan, $data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into pelanggan (idpelanggan, nmpelanggan, alamat, notelp, jk) values (?,?,?,?,?)");
        $query->execute(array($data['idpelanggan'], $data['nmpelanggan'], $data['alamat'], $data['notelp'], $data['jk']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update pelanggan set nmpelanggan=?, alamat=?, notelp=?, jk=? where idpelanggan=?");
        $query->execute(array($data['nmpelanggan'], $data['alamat'], $data['notelp'], $data['jk'], $data['idpelanggan']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($idpelanggan)
    {
        $query = $this->conn->prepare("delete from pelanggan where idpelanggan=?");
        $query->execute(array($idpelanggan));
        $query->closeCursor();
        unset($idpelanggan);
}
}
?>