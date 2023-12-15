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
        $query = $this->conn->prepare("select idkeberangkatan, nmkapal, kotaasal, kotatujuan, tanggal, jam, hargatiket from keberangkatan,kapal,rute where kapal.idkapal=keberangkatan.idkapal and rute.idrute=keberangkatan.idrute order by idkeberangkatan");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($idkeberangkatan)
    {
        $query = $this->conn->prepare("select idkeberangkatan, idkapal, idrute, tanggal, jam, hargatiket from keberangkatan where idkeberangkatan=?");
        $query->execute(array($idkeberangkatan));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($idkeberangkatan, $data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into keberangkatan (idkeberangkatan, idkapal, idrute, tanggal, jam, hargatiket) values (?,?,?,?,?,?)");
        $query->execute(array($data['idkeberangkatan'], $data['idkapal'], $data['idrute'], $data['tanggal'], $data['jam'], $data['hargatiket']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update keberangkatan set idkapal=?, idrute=?, tanggal=?, jam=?, hargatiket=? where idkeberangkatan=?");
        $query->execute(array($data['idkapal'], $data['idrute'], $data['tanggal'], $data['jam'], $data['hargatiket'], $data['idkeberangkatan']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($idkeberangkatan)
    {
        $query = $this->conn->prepare("delete from keberangkatan where idkeberangkatan=?");
        $query->execute(array($idkeberangkatan));
        $query->closeCursor();
        unset($idkeberangkatan);
}
}
?>