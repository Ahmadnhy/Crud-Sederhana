<?php
	include 'koneksi.php';

	if(empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jumlah']) || empty($_POST['kondisi']) || empty($_POST['thn_anggaran'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/crud-inven/edit.php?id=<?php echo $_POST['id']; ?>");
		</script>
		<?php
	} else {
		$update = mysqli_query($con, "UPDATE gudang SET nama='$_POST[nama]', jenis='$_POST[jenis]', jumlah='$_POST[jumlah]', kondisi='$_POST[kondisi]',  thn_anggaran='$_POST[thn_anggaran]' WHERE id='$_POST[id]'");

		if($update) {
			?>
			<script>
				alert('Data berhasil diupdate!')
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