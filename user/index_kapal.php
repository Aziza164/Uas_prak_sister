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
	  <li><a href="?page=daftar-data"><i class="icon-list"></i> Data Kapal</a></li>
	  <li><a href="index_keberangkatan.php?page"><i class="icon-list"></i> Data Keberangkatan</a></li>
	  <li><a href="index_pemesanan.php"><i class="icon-list"></i> Data Pemesanan</a></li>
	  <li><a href="index_penumpang.php"><i class="icon-list"></i> Data Penumpang</a></li>
	  <li><a href="index_rute.php"><i class="icon-list"></i> Data Rute</a></li>
	</ul>
  </div>
</div>
<div class="container">
<fieldset>               
        <?php
        if ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data USer</legend>
            <table class="table table-hover">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">ID Kapal</th>
                    <th width="25%">Nama Kapal</th>
                    <th width="25%">Jenis Kapal</th>
                    <th width="25%">Kapasitas Penumpang</th>
                    <th width="25%">Tahun Pembuatan</th>
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
<?php ?>