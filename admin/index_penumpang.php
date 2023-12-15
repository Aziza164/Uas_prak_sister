<?php
include "Client_penumpang.php";
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
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Penumpang</a></li>
	  <li><a href="index_rute.php?page=daftar-data"><i class="icon-list"></i> Data Rute</a></li>
	</ul>
  </div>
</div>
<div class="container">
<fieldset>
        <?php
        if ($_GET['page'] == 'tambah') {
        ?>
            <legend>Tambah Data</legend>
            <form class="form-horizontal" name="form1" method="POST" action="proses_penumpang.php" novalidate>
		    <input type="hidden" name="aksi" value="tambah"/>
            <div class="control-group">
			<label class="control-label" for="idpelanggan">ID Pelanggan</label>
                <div class="controls">
                    <input type="text" name="idpelanggan" class="input-small" placeholder="ID Pelanggan"
                        rel="tooltip" data-placement="right" title="Masukkan ID Pelangganl"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        
        <div class="control-group">
			<label class="control-label" for="nmpelanggan">Nama Pelanggan</label>
                <div class="controls">
                    <input type="text" name="nmpelanggan" class="input-small" placeholder="Nama Pelanggan"
                        rel="tooltip" data-placement="right" title="Masukkan Nama Pelanggan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="alamat">Alamat</label>
                <div class="controls">
                    <input type="text" name="alamat" class="input-small" placeholder="Alamat"
                        rel="tooltip" data-placement="right" title="Masukkan Alamat"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="notelp">No Telp</label>
                <div class="controls">
                    <input type="text" name="notelp" class="input-small" placeholder="No Telp"
                        rel="tooltip" data-placement="right" title="Masukkan No Telp"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
			<label class="control-label" for="jk">Jenis Kelamin</label>
                <div class="controls">
                    <input type="text" name="jk" class="input-small" placeholder="Jenis Kelamin"
                        rel="tooltip" data-placement="right" title="Masukkan Jenis Kelamin"
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
            $r = $abc->tampil_data($_GET['idpelanggan']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses_penumpang.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="idpelanggan" value="<?= $r->idpelanggan?>" />
                <label>ID Pelanggan</label>
                <input type="text" class="input-small" placeholder="ID Pelanggan" value="<?= $r->idpelanggan ?>" disabled>
                <br />
                <label>Nama Pelanggan</label>
                <input type="text" name="nmpelanggan" class="input-small" placeholder="Nama Pelanggan" value="<?= $r->nmpelanggan ?>">
                <br />
                <label>Alamat</label>
                <input type="text" name="alamat" class="input-small" placeholder="Alamat" value="<?= $r->alamat ?>">
                <br />
                <label>No Telp</label>
                <input type="text" name="notelp" class="input-small" placeholder="No Telp" value="<?= $r->notelp ?>">
                <br />
                <label>Jenis Kelamin</label>
                <input type="text" name="jk" class="input-small" placeholder="Jenis Kelamin" value="<?= $r->jk ?>">
                <br />
                <button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i> Ubah</button>
            </form>
        <?php
            unset($r);
        } elseif ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data Server</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Pelanggan</th>
                    <th width="25%">Nama Pelanggan</th>
                    <th width="25%">Alamat</th>
                    <th width="25%">No Telp</th>
                    <th width="25%">Jenis Kelamin</th>
                    <th width="5%" colspan="2">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->idpelanggan ?></td>
                        <td><?= $r->nmpelanggan ?></td>
                        <td><?= $r->alamat ?></td>
                        <td><?= $r->notelp ?></td>
                        <td><?= $r->jk ?></td>
                        <td><a href="?page=ubah&idpelanggan=<?=$r->idpelanggan ?>">Ubah</a></td>
                        <td><a href="proses_penumpang.php?aksi=hapus&idpelanggan=<?=$r->idpelanggan ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
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