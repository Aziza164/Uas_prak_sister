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
        $query = $this->conn->prepare("select idpemesanan, nmpelanggan, tanggal, jam, jumlah, total_pembayaran, status_pembayaran from pemesanan,pelanggan,keberangkatan where pelanggan.idpelanggan=pemesanan.idpelanggan and keberangkatan.idkeberangkatan=pemesanan.idkeberangkatan order by idpemesanan");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($idpemesanan)
    {
        $query = $this->conn->prepare("select idpemesanan, idpelanggan, idkeberangkatan, jumlah, total_pembayaran, status_pembayaran from pemesanan where idpemesanan=?");
        $query->execute(array($idpemesanan));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($idpemesanan, $data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into pemesanan (idpemesanan, idpelanggan, idkeberangkatan, jumlah, total_pembayaran, status_pembayaran) values (?,?,?,?,?,?)");
        $query->execute(array($data['idpemesanan'], $data['idpelanggan'], $data['idkeberangkatan'], $data['jumlah'], $data['total_pembayaran'], $data['status_pembayaran']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update pemesanan set idpelanggan=?, idkeberangkatan=?, jumlah=?, total_pembayaran=?, status_pembayaran=? where idpemesanan=?");
        $query->execute(array($data['idpelanggan'], $data['idkeberangkatan'], $data['jumlah'], $data['total_pembayaran'], $data['status_pembayaran'], $data['idpemesanan']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($idpemesanan)
    {
        $query = $this->conn->prepare("delete from pemesanan where idpemesanan=?");
        $query->execute(array($idpemesanan));
        $query->closeCursor();
        unset($idpemesanan);
}
}
?>