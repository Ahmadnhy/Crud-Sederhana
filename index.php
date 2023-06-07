<?php

session_start();

//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}

    include 'koneksi.php';
	header('Content-Type: text/html; charset=utf-8');
	
	$get_last_id = mysqli_query($con, "SELECT id FROM gudang ORDER BY id DESC LIMIT 1");
	$last_id = mysqli_fetch_array($get_last_id);

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD - Sederhana</title>
	
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
    <div class="container">
        <a href="index.php" class="navbar-brand">ahmadnh</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-light">Home</a>
            </li>
            <li class="nav-item ml-4">
                <a href="logout.php" class="nav-link text-light"> Log Out </a>
            </li>
        </ul>
    </div>
</nav>
	<div class="container">

		<!-- Modal Tambah Data -->
		<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahData" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalTambahData">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="proses_tambah.php" method="post">
							<div class="form-group">
								<label>ID</label>
								<input type="number" class="form-control" name="id">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Jenis</label>
								<input type="text" class="form-control" name="jenis" placeholder="" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Jumlah</label>
								<input type="number" class="form-control" name="jumlah" placeholder="" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Kondisi</label>
								<input type="text" class="form-control" name="kondisi" placeholder="" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Tahun Anggaran</label>
								<input type="date" class="form-control" name="thn_anggaran" placeholder="" autocomplete="off" required>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Kirim</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<h2 class="text-center mt-5">CRUD Sederhana</h2>

		<table class="table">
			<thead class="thead-dark text-center">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Jenis</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Kondisi</th>
					<th scope="col">Tahun Anggaran</th>
					<th scope="col">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$produk = mysqli_query($con, "SELECT * FROM gudang");
				$i = 1;
				
				while($data_produk = mysqli_fetch_array($produk)) {
				?>

				<tr class="text-center">
					<th scope="row"><?php echo $i++ ?></th>
					<td><?php echo $data_produk['nama']; ?></td>
					<td><?php echo $data_produk['jenis']; ?></td>
					<td><?php echo $data_produk['jumlah']; ?></td>
					<td><?php echo $data_produk['kondisi']; ?></td>
					<td><?php echo $data_produk['thn_anggaran']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $data_produk['id']; ?>" role="button" class="btn btn-primary px-3">Edit</a>
						<a href="#" role="button" class="btn btn-dark btn-hapus px-3" onclick="konfirmasiHapus(this)" data-id="<?php echo $data_produk['id']; ?>">Hapus</a>
					</td>
				</tr>

				<?php
				}
				?>
			</tbody>
		</table>

		<a href="tambah.php" role="button" class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalTambahData">Tambah Data</a>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script>
		function konfirmasiHapus(id) {
			var getId = id.getAttribute('data-id');
			var tanya = confirm('Anda yakin ingin menghapus data ini?');
			
			if(tanya == true) {
				window.location.replace("proses_hapus.php?id=" + getId);
			} else {
				return false;
			}
		}
	</script>
</body>
</html>