<?php
    include 'koneksi.php';

	$hapus = mysqli_query($con, "DELETE FROM gudang where id='$_GET[id]'");

	if($hapus) {
		?>
		<script>
			alert('Data berhasil dihapus!')
			window.location.replace("http://localhost/crud-inven");
		</script>
		<?php
	}
	else {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
?>