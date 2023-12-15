<?php
include "Client_keberangkatan.php";
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
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Keberangkatan</a></li>
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
            <form class="form-horizontal" name="form1" method="POST" action="proses_keberangkatan.php" novalidate>
		    <input type="hidden" name="aksi" value="tambah"/>
            <div class="control-group">
			<label class="control-label" for="idkeberangkatan">ID Keberangkatan</label>
                <div class="controls">
                    <input type="text" name="idkeberangkatan" class="input-small" placeholder="ID Keberangkatan"
                        rel="tooltip" data-placement="right" title="Masukkan ID Keberangkatan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
    <label class="control-label" for="idkapal">Nama Kapal </label>
    <div class="controls">
                <select name="idkapal" class="select" placeholder="Nama Kapal">
                    <option value"">pilih kapal</option>
                        <?php
                                $data_array = $bcd->tampil_semua_data();
                                foreach ($data_array as $a) {
                                    ?>
                                    <option value=" <?= $a->idkapal; ?>">
                                        <?= $a->idkapal; ?>
                                        <?= $a->nmkapal; ?>
                                    </option>
                                    <?php } ?>
                </select>
                                </div>

                    </div>           
                    <div class="control-group">
    <label class="control-label" for="idrute">Rute </label>
    <div class="controls">
                <select name="idrute" class="select" placeholder="Rute">
                <option value"">pilih kapal</option>
                        <?php
                                $data_array = $cde->tampil_semua_data();
                                foreach ($data_array as $a) {
                                    ?>
                                    <option value=" <?= $a->idrute; ?>">
                                        <?= $a->idrute; ?>
                                        <?= $a->kotaasal;?> -
                                        <?=$a->kotatujuan; ?>
                                        <!-- {$dataBobot['nmkriteria']}-{$dataBobot['value']} -->
                                    </option>
                                    <?php } ?>
                </select>
                                </div>
                                </div>          
            <div class="control-group">
			<label class="control-label" for="tanggal">Tanggal Keberangkatan</label>
                <div class="controls">
                    <input type="text" name="tanggal" class="input-small" placeholder="Tanggal Keberangkatan"
                        rel="tooltip" data-placement="right" title="Masukkan Tanggal Keberangkatan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="jam">Jam Keberangkatan</label>
                <div class="controls">
                    <input type="text" name="jam" class="input-small" placeholder="Jam Keberangkatan"
                        rel="tooltip" data-placement="right" title="Masukkan Jam Keberangkatan"
                        required data-validation-required-message="Harus diisi">				  
                </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="hargatiket">Harga Tiket</label>
                <div class="controls">
                    <input type="text" name="hargatiket" class="input-small" placeholder="Harga Tiket"
                        rel="tooltip" data-placement="right" title="Masukkan Harga Tiket"
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
            $a = $abc->tampil_data($_GET['idkeberangkatan']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses_keberangkatan.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="idkeberangkatan" class="input-small" placeholder="ID Keberangkatan" value="<?= $a->idkeberangkatan?>" />
                <label>ID Keberangkatan</label>
                <input type="text" value="<?= $a->idkeberangkatan ?>" disabled>
                <br />
                <label>ID Kapal</label>
                <input type="text" name="idkapal" class="input-small" placeholder="ID Kapal" value="<?= $a->idkapal ?>">
                <br />
                <label>ID Rute</label>
                <input type="text" name="idrute" class="input-small" placeholder="ID Rute" value="<?= $a->idrute ?>">
                <br />   
                <label>Tanggal Keberangkatan</label>
                <input type="text" name="tanggal" class="input-small" placeholder="Tanggal Keberangkatan" value="<?= $a->tanggal ?>">
                <br />
                <label>Jam Keberangkatan</label>
                <input type="text" name="jam" class="input-small" placeholder="Jam Keberangkatan" value="<?= $a->jam ?>">
                <br />
                <label>Harga Tiket</label>
                <input type="text" name="hargatiket" class="input-small" placeholder="Harga Tiket" value="<?= $a->hargatiket ?>">
                <br />
                <button type="submit" name="ubah">Ubah</button>
            </form>
        <?php
            unset($a);
        } elseif ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data Server</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Keberangkatan</th>
                    <th width="15%">Nama Kapal</th>
                    <th width="20%">Rute</th>
                    <th width="15%">Tanggal Keberangkatan</th>
                    <th width="15%">Jam Keberangkatan</th>
                    <th width="15%">Harga Tiket</th>
                    <th width="5%" colspan="2">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->idkeberangkatan ?></td>
                        <td><?= $r->nmkapal ?></td>
                        <td><?= $r->kotaasal?> -
                        <?= $r->kotatujuan?></td>
                        <td><?= $r->tanggal ?></td>
                        <td><?= $r->jam ?></td>
                        <td><?= $r->hargatiket ?></td>
                        <td><a href="?page=ubah&idkeberangkatan=<?=$r->idkeberangkatan ?>">Ubah</a></td>
                        <td><a href="proses_keberangkatan.php?aksi=hapus&idkeberangkatan=<?=$r->idkeberangkatan ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                    </tr>
                <?php
                    $no++;
                }
                unset($data_array,$a,$no);
                ?>
            </table>
            <?php
        } ?>
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
</body>

</html>