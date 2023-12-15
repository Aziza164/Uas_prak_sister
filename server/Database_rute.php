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
        $query = $this->conn->prepare("select idrute, kotaasal, kotatujuan, jarak, durasi from rute order by idrute");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($idrute)
    {
        $query = $this->conn->prepare("select idrute, kotaasal, kotatujuan, jarak, durasi from rute where idrute=?");
        $query->execute(array($idrute));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($idrute, $data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into rute (idrute, kotaasal, kotatujuan, jarak, durasi) values (?,?,?,?,?)");
        $query->execute(array($data['idrute'], $data['kotaasal'], $data['kotatujuan'], $data['jarak'], $data['durasi']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update rute set kotaasal=?, kotatujuan=?, jarak=?, durasi=? where idrute=?");
        $query->execute(array($data['kotaasal'], $data['kotatujuan'], $data['jarak'], $data['durasi'], $data['idrute']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($idrute)
    {
        $query = $this->conn->prepare("delete from rute where idrute=?");
        $query->execute(array($idrute));
        $query->closeCursor();
        unset($idrute);
}
}
?>