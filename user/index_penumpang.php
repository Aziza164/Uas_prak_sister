<?php
include "Client_penumpang.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Penumpang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/bootstrap-responsive.css" rel="stylesheet">	
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
	<a class="brand" href="#">Data Penumpang</a>
	<ul class="nav">
	  <li><a href="?page=home"><i class="icon-home"></i> Home</a></li>
	  <li><a href="?page=tambah"><i class="icon-plus-sign"></i> Tambah Pelanggan</a></li>
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
                <form name="form" method="POST" action="proses_penumpang.php">
                    <input type="hidden" name="aksi" value="tambah" />
                    <label>ID Pelanggan</label>
                    <input type="text" name="idpelanggan" />
                    <br />
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nmpelanggan" />
                    <br />
                    <label>Alamat</label>
                    <input type="text" name="alamat" />
                    <br />
                    <label>No Telp</label>
                    <input type="text" name="notelp" />
                    <br />
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jk" />
                    <br />
                    <button type="submit" name="simpan">Simpan</button>
                </form>
            <?php
            } elseif ($_GET['page'] == 'ubah') {
                $r = $abc->tampil_data($_GET['idpelanggan']);
            ?>
                <legend>Ubah Data</legend>
                <form name="form" method="post" action="proses_penumpang.php">
                    <input type="hidden" name="aksi" value="ubah" />
                    <input type="hidden" name="idpelanggan" value="<?= $r->idpelanggan?>" />
                    <label>ID Pelanggan</label>
                    <input type="text" value="<?= $r->idpelanggan ?>" disabled>
                    <br />
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nmpelanggan" value="<?= $r->nmpelanggan ?>">
                    <br />
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?= $r->alamat ?>">
                    <br />
                    <label>No Telp</label>
                    <input type="text" name="notelp" value="<?= $r->notelp ?>">
                    <br />
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jk" value="<?= $r->jk ?>">
                    <br />
                    <button type="submit" name="ubah">Ubah</button>
                </form>
            <?php
                unset($r);
            }elseif ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data User</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Pelanggan</th>
                    <th width="25%">Nama Pelanggan</th>
                    <th width="25%">Alamat</th>
                    <th width="25%">No Telp</th>
                    <th width="25%">Jenis Kelamin</th>
                    <th width="5%" >Aksi</th>
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
                    </tr>
                <?php
                    $no++;
                }
                unset($data_array,$r,$no);
                ?>
            </table>
        <?php
        } 
        ?>
        </fieldset>
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