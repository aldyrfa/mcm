<h2>Hasil Ujian Online</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Nama 
			</th>
			<th>
				Email
			</th>
			<th>
				Skor
			</th>
			<th>
				Jenis Kelamin
			</th>
			<th>
				Nama Divisi
			</th>
			<th>
				Aksi
			</th>
		</tr>
		 <?php $nomor=1; $ambil = $koneksi->query("SELECT * FROM jawaban 
		 											JOIN user ON jawaban.id_user=user.id_user
		 											JOIN biodata_user ON user.id_user=biodata_user.id_user
		 											JOIN lowongan ON biodata_user.id_lowongan=lowongan.id_lowongan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['skor'];?></td>
			<td><?php echo $pecah['jenis_kelamin']; ?></td>
			<td><?php echo $pecah['nama_divisi']; ?></td>
			
			<td>
				<!-- <a href="index.php?halaman=detail_berkaslulus&id=<?php echo $pecah['id_pelamar']; ?>" class="btn btn-info"><span class= "fa fa-file"> Detail </span></a> -->
				<a href="index.php?halaman=hapusdatapelamar&id=<?php echo $pecah['id_pelamar']; ?>" " class="btn btn-danger"><span class=" fa fa-trash"> Hapus</span></a>



			</td>
		</tr>
		<?php $nomor++; ?>
		<?php  } ?>

		
	</thead>
	<tbody>
