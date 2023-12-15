<?php
include "Client_keberangkatan.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Keberangkatan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/bootstrap-responsive.css" rel="stylesheet">	
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
	<a class="brand" href="#">Data Keberangkatan</a>
	<ul class="nav">
	  <li><a href="?page=home"><i class="icon-home"></i> Home</a></li>
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
        if ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data User</legend>
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
                foreach ($data_array as $a) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $a->idkeberangkatan ?></td>
                        <td><?= $a->nmkapal ?></td>
                        <td><?= $a->kotaasal?> -
                        <?= $a->kotatujuan?></td>
                        <td><?= $a->tanggal ?></td>
                        <td><?= $a->jam ?></td>
                        <td><?= $a->hargatiket ?></td>
                        </tr>
                <?php
                    $no++;
                }
                unset($data_array,$a,$no);
                ?>
            </table>
        <?php
        } else {
        ?>
            <legend>Home</legend>
            Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (JavaScript Object Notation).
            </fieldset>
</div>
<?	
}
?>

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
<?php?>