<?php
include "Client_rute.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Kapal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/bootstrap-responsive.css" rel="stylesheet">	
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
	<a class="brand" href="#">Data Kapal</a>
	<ul class="nav">
	  <li><a href="?page=home"><i class="icon-home"></i> Home</a></li>
	  <li><a href="?page=tambah"><i class="icon-plus-sign"></i> Tambah Data</a></li>
	  <li><a href="index_kapal.php?page=daftar-data"><i class="icon-list"></i> Data Kapal</a></li>
	  <li><a href="index_keberangkatan.php?page=daftar-data"><i class="icon-list"></i> Data Keberangkatan</a></li>
	  <li><a href="index_pemesanan.php?page=daftar-data"><i class="icon-list"></i> Data Pemesanan</a></li>
	  <li><a href="index_penumpang.php?page=daftar-data"><i class="icon-list"></i> Data Penumpang</a></li>
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Rute</a></li>
	</ul>
  </div>
</div>
<div class="container">
<fieldset>
        <?php
        if ($_GET['page'] == 'tambah') {
        ?>
            <legend>Tambah Data</legend>
            <form class="form-horizontal" name="form1" method="POST" action="proses_rute.php" novalidate>
		    <input type="hidden" name="aksi" value="tambah"/>
            <div class="control-group">
			<label class="control-label" for="idrute">ID Rute</label>
                <div class="controls">
                    <input type="text" name="idrute" class="input-small" placeholder="ID Rute"
                        rel="tooltip" data-placement="right" title="Masukkan ID Rute"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="kotaasal">Kota Asal</label>
                <div class="controls">
                    <input type="text" name="kotaasal" class="input-small" placeholder="Kota Asal"
                        rel="tooltip" data-placement="right" title="Masukkan Kota Asal"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="kotatujuan">Kota tujuan</label>
                <div class="controls">
                    <input type="text" name="kotatujuan" class="input-small" placeholder="Kota tujuan"
                        rel="tooltip" data-placement="right" title="Masukkan Kota tujuan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="jarak">Jarak</label>
                <div class="controls">
                    <input type="text" name="jarak" class="input-small" placeholder="Jarake"
                        rel="tooltip" data-placement="right" title="Masukkan Jarak"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="durasi">Durasi Perjalan</label>
                <div class="controls">
                    <input type="text" name="durasi" class="input-small" placeholder="Durasi Perjalan"
                        rel="tooltip" data-placement="right" title="Masukkan Durasi Perjalan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<div class="controls">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
			</div>	
		</div>	
        </form>	
	</div>
	</div>
        <?php
        } elseif ($_GET['page'] == 'ubah') {
            $r = $abc->tampil_data($_GET['idrute']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses_rute.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="idrute" value="<?= $r->idrute?>" />
                <label>ID Rute</label>
                <input type="text" class="input-small" placeholder="ID Rute" value="<?= $r->idrute ?>" disabled>
                <br />
                <label>Kota Asal</label>
                <input type="text" name="kotaasal" class="input-small" placeholder="Kota Asal" value="<?= $r->kotaasal ?>">
                <br />
                <label>Kota Tujuan</label>
                <input type="text" name="kotatujuan" class="input-small" placeholder="kota Tujuan" value="<?= $r->kotatujuan ?>">
                <br />
                <label>Jarak</label>
                <input type="text" name="jarak" class="input-small" placeholder="Jarak" value="<?= $r->jarak ?>">
                <br />
                <label>Durasi Perjalanan</label>
                <input type="text" name="durasi" class="input-small" placeholder="Durasi Perjalanan" value="<?= $r->durasi ?>">
                <br />
                <button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i>Ubah</button>

            </form>
        <?php
            unset($r);
        } elseif ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data Server</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Rute</th>
                    <th width="20%">Kota Asal</th>
                    <th width="20%">Kota Tujuan</th>
                    <th width="20%">Jarak</th>
                    <th width="20%">Durasi Perjalanan</th>
                    <th width="5%" colspan="2">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->idrute ?></td>
                        <td><?= $r->kotaasal ?></td>
                        <td><?= $r->kotatujuan ?></td>
                        <td><?= $r->jarak ?></td>
                        <td><?= $r->durasi ?></td>
                        <td><a href="?page=ubah&idrute=<?=$r->idrute ?>">Ubah</a></td>
                        <td><a href="proses_rute.php?aksi=hapus&idrute=<?=$r->idrute ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                    </tr>
                <?php
                    $no++;
                }
                unset($data_array,$r,$no);
                ?>
            </table>
        <?php
        } else {
        ?>
            <legend>Home</legend>
            Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (JavaScript Object Notation).
    </fieldset>
    <?php
        }
        ?>
</body>

</html>