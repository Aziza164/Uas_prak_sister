<?php
include "Client_kapal.php";
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
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Kapal</a></li>
	  <li><a href="index_keberangkatan.php?page=daftar-data"><i class="icon-list"></i> Data Keberangkatan</a></li>
	  <li><a href="index_pemesanan.php?page=daftar-data"><i class="icon-list"></i> Data Pemesanan</a></li>
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
            <form class="form-horizontal" name="form1" method="POST" action="proses_kapal.php" novalidate>
		    <input type="hidden" name="aksi" value="tambah"/>
            <div class="control-group">
			<label class="control-label" for="idkapal">ID Kapal</label>
                <div class="controls">
                    <input type="text" name="idkapal" class="input-small" placeholder="ID Kapal"
                        rel="tooltip" data-placement="right" title="Masukkan ID Kapal"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="nmkapal">Nama Kapal</label>
                <div class="controls">
                    <input type="text" name="nmkapal" class="input-small" placeholder="Nama Kapal"
                        rel="tooltip" data-placement="right" title="Masukkan Nama Kapal"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="jeniskapal">Jenis Kapal</label>
                <div class="controls">
                    <input type="text" name="jeniskapal" class="input-small" placeholder="Jenis Kapal"
                        rel="tooltip" data-placement="right" title="Masukkan Jenis Kapal"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="kapasitas">Kapasitas Penumpang</label>
                <div class="controls">
                    <input type="text" name="kapasitas" class="input-small" placeholder="Kapasitas Penumpang"
                        rel="tooltip" data-kapasitas="right" title="Masukkan Kapasitas Penumpang"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="tahun_pembuatan">Tahun Pembuatan</label>
                <div class="controls">
                    <input type="text" name="tahun_pembuatan" class="input-small" placeholder="Tahun Pembuatan"
                        rel="tooltip" data-kapasitas="right" title="Masukkan Tahun Pembuatan"
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
            $r = $abc->tampil_data($_GET['idkapal']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses_kapal.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="idkapal" value="<?= $r->idkapal?>" />
                <label>ID Kapal</label>
                <input type="text" class="input-small" placeholder="ID Kapal" value="<?= $r->idkapal ?>" disabled>
                <br />
                <label>Nama Kapal</label>
                <input type="text" name="nmkapal" class="input-small" placeholder="Nama Kapal" value="<?= $r->nmkapal ?>">
                <br />
                <label>Jenis Kapal</label>
                <input type="text" name="jeniskapal" class="input-small" placeholder="Jenis Kapal" value="<?= $r->jeniskapal ?>">
                <br />
                <label>Kapasitas Penumpang</label>
                <input type="text" name="kapasitas" class="input-small" placeholder="Kapasitas Penumpang" value="<?= $r->kapasitas ?>">
                <br />
                <label>Tahun Pembuatan</label>
                <input type="text" name="tahun_pembuatan" class="input-small" placeholder="Tahun Pembuatan" value="<?= $r->tahun_pembuatan ?>">
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
                    <th width="10%">ID Kapal</th>
                    <th width="25%">Nama Kapal</th>
                    <th width="25%">Jenis Kapal</th>
                    <th width="25%">Kapasitas Penumpang</th>
                    <th width="25%">Tahun Pembuatan</th>
                    <th width="5%" colspan="2">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->idkapal ?></td>
                        <td><?= $r->nmkapal ?></td>
                        <td><?= $r->jeniskapal ?></td>
                        <td><?= $r->kapasitas ?></td>
                        <td><?= $r->tahun_pembuatan ?></td>
                        <td><a href="?page=ubah&idkapal=<?=$r->idkapal ?>">Ubah</a></td>
                        <td><a href="proses_kapal.php?aksi=hapus&idkapal=<?=$r->idkapal ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
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