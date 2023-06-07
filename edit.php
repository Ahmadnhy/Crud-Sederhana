<?php
    include 'koneksi.php';
	header('Content-Type: text/html; charset=utf-8');

	$get_data = mysqli_query($con, "SELECT * FROM gudang WHERE id='$_GET[id]'");
	$data = mysqli_fetch_array($get_data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD</title>

	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Edit Data</h1>

		<form action="proses_edit.php" method="post">
			<div class="form-group">
				<label for="inputAddress">ID</label>
				<input type="number" class="form-control" name="id" readonly value="<?php echo $data['id']; ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="inputAddress">Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" placeholder="" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="inputAddress">Jenis</label>
				<input type="text" class="form-control" name="jenis" value="<?php echo $data['jenis']; ?>" placeholder="" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="inputAddress">Jumlah</label>
				<input type="number" class="form-control" name="jumlah" value="<?php echo $data['jumlah']; ?>" placeholder="" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="inputAddress">Kondisi</label>
				<input type="text" class="form-control" name="kondisi" value="<?php echo $data['kondisi']; ?>" placeholder="" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="inputAddress">Tahun Anggaran</label>
				<input type="date" class="form-control" name="thn_anggaran" value="<?php echo $data['thn_anggaran']; ?>" placeholder="" autocomplete="off" required>
			</div>
			<a href="http://localhost/crud-inven" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
			<button type="submit" class="btn btn-success">Update</a>
		</form>
	</div>
</body>
</html>