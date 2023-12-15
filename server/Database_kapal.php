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
        $query = $this->conn->prepare("select idkapal, nmkapal, jeniskapal, kapasitas, tahun_pembuatan from kapal order by idkapal");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($idkapal)
    {
        $query = $this->conn->prepare("select idkapal, nmkapal, jeniskapal, kapasitas, tahun_pembuatan from kapal where idkapal=?");
        $query->execute(array($idkapal));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($idkapal, $data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into kapal (idkapal, nmkapal, jeniskapal, kapasitas, tahun_pembuatan) values (?,?,?,?,?)");
        $query->execute(array($data['idkapal'], $data['nmkapal'], $data['jeniskapal'], $data['kapasitas'], $data['tahun_pembuatan']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update kapal set nmkapal=?, jeniskapal=?, kapasitas=?, tahun_pembuatan=? where idkapal=?");
        $query->execute(array($data['nmkapal'], $data['jeniskapal'], $data['kapasitas'], $data['tahun_pembuatan'], $data['idkapal']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($idkapal)
    {
        $query = $this->conn->prepare("delete from kapal where idkapal=?");
        $query->execute(array($idkapal));
        $query->closeCursor();
        unset($idkapal);
}
}
?>