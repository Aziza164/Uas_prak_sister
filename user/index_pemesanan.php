<?php
include "Client_pemesanan.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Pemesanan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/bootstrap-responsive.css" rel="stylesheet">	
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
	<a class="brand" href="#">Data Pemesanan</a>
	<ul class="nav">
	  <li><a href="?page=home"><i class="icon-home"></i> Home</a></li>
	  <li><a href="?page=tambah"><i class="icon-plus-sign"></i> Tambah Data</a></li>
	  <li><a href="index_kapal.php?page=daftar-data"><i class="icon-list"></i> Data Kapal</a></li>
	  <li><a href="index_keberangkatan.php?page=daftar-data"><i class="icon-list"></i> Data Keberangkatan</a></li>
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Pemesanan</a></li>
	  <li><a href="index_penumpang.php?page=daftar-data"><i class="icon-list"></i> Data Penumpang</a></li>
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
            <form name="form" method="POST" action="proses_pemesanan.php">
                <input type="hidden" name="aksi" value="tambah" />
                <label>ID Pemesanan</label>
                <input type="text" name="idpemesanan" />
                <br />
                <label>Nama Pelanggan</label>
                <select name="idpelanggan" class="select">
                        <?php
                                $data_array = $bcd->tampil_semua_data();
                                foreach ($data_array as $r) {
                                    ?>
                                    <option value=" <?= $r->idpelanggan; ?>">
                                        <?= $r->idpelanggan; ?>
                                        <?= $r->nmpelanggan; ?>
                                    </option>
                                    <?php } ?>
                </select>
                               
                </br>
                <label>Keberangkatan</label>
                <select name="idkeberangkatan" class="select">
                        <?php
                                $data_array = $cde->tampil_semua_data();
                                foreach ($data_array as $r) {
                                    ?>
                                    <option value=" <?= $r->idkeberangkatan; ?>">
                                        <?= $r->idkeberangkatan; ?>
                                        <?= $r->tanggal;?> -
                                        <?=$r->jam; ?>
                                        <!-- {$dataBobot['nmkriteria']}-{$dataBobot['value']} -->
                                    </option>
                                    <?php } ?>
                </select>
                               
                </br> 
                <label>Jumlah Penumpang</label>
                <input type="text" name="jumlah" />
                <br />
                <button type="submit" name="simpan">Simpan</button>
            </form>
        <?php
        } elseif ($_GET['page'] == 'ubah') {
            $r = $abc->tampil_data($_GET['idpemesanan']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses_pemesanan.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="idpemesanan" value="<?= $r->idpemesanan?>" />
                <label>ID Pemesanan</label>
                <input type="text" value="<?= $r->idpemesanan ?>" disabled>
                <br />
                <label>ID Pelanggan</label>
                <input type="text" name="idpelanggan" value="<?= $r->idpelanggan ?>">
                <br />
                <label>ID Keberangkatan</label>
                <input type="text" name="idkeberangkatan" value="<?= $r->idkeberangkatan ?>">
                <br />
                <label>Jumlah Penumpang</label>
                <input type="text" name="jumlah" value="<?= $r->jumlah ?>">
                <br />
                <button type="submit" name="ubah">Ubah</button>
            </form>
        <?php
            unset($r);
        } elseif ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data User</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Pemesanan</th>
                    <th width="20%">Nama Pelanggan</th>
                    <th width="15%">Keberangkatan</th>
                    <th width="15%">Jumlah Penumpang</th>
                    <th width="10%">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->idpemesanan ?></td>
                        <td><?= $r->nmpelanggan ?></td>
                        <td><?= $r->tanggal ?> - 
                        <?= $r->jam ?></td>
                        <td><?= $r->jumlah ?></td>
                        <td><a href="?page=ubah&idpemesanan=<?=$r->idpemesanan ?>">Ubah</a></td>
                    </tr>
                <?php
                    $no++;
                }
                unset($data_array,$r,$no);
                ?>
            </table>
        <?php
        } ?></fieldset>
        </div>
        
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/tooltip.js"></script>
        
        <!-- jqBootstrapValidation -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script>
            $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
        </script>
        
        </body>
        </html>