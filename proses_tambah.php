<?php
    include 'koneksi.php';

	if(empty($_POST['id']) || empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jumlah']) || empty($_POST['kondisi'] || empty($_POST['thn_anggaran']))) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/crud-inven");
		</script>
		<?php
	} else {
		$tambah = mysqli_query($con, "INSERT INTO gudang (id, nama, jenis, jumlah, kondisi, thn_anggaran) values ('$_POST[id]','$_POST[nama]', '$_POST[jenis]', '$_POST[jumlah]', '$_POST[kondisi]', '$_POST[thn_anggaran]')");
		if($tambah) {
			?>
			<script>
				alert('Data berhasil ditambahkan!')
				window.location.replace("http://localhost/crud-inven");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}
	}
?>