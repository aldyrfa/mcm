<h2>Data Pelamar Lulus</h2>

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
				No Telepon
			</th>
			<th>
				Email
			</th>
			<th>
				Pendidikan
			</th>
			<th>
				Perguruan Tinggi
			</th>
			<th>
				IPK
			</th>
			<th>
				Pengalaman Kerja
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
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM biodata_user JOIN lowongan ON biodata_user.id_lowongan=lowongan.id_lowongan WHERE status_pelamar = '1'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['pendidikan']; ?></td>
			<td><?php echo $pecah['perguruan_tinggi']; ?></td>
			<td><?php echo $pecah['ipk']; ?></td>
			<td><?php echo $pecah['pengalaman_kerja']; ?></td>
			<td><?php echo $pecah['jenis_kelamin']; ?></td>
			<td><?php echo $pecah['nama_divisi']; ?></td>
			
			<td>
				<a href="index.php?halaman=detail_berkaslulus&id=<?php echo $pecah['id_pelamar']; ?>" class="btn btn-info"><span class= "fa fa-file"> Detail </span></a>
				<a href="index.php?halaman=hapusdatapelamar&id=<?php echo $pecah['id_pelamar']; ?>" " class="btn btn-danger"><span class=" fa fa-trash"> Hapus</span></a>



			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</thead>
	<tbody>
