<h2>Jadwal Tes</h2>

<a href="index.php?halaman=tambahjadwaltes" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah jadwal</a>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>Tanggal mulai</th>
			<th>
				Tanggal selesai
			</th>
			<th>
				Lowongan
			</th>
			
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT jadwal.tanggal_mulai AS mulai_tes ,jadwal.tanggal_akhir AS selesai_tes,jadwal.id_jadwal,lowongan.nama_divisi
		FROM jadwal JOIN lowongan ON jadwal.id_lowongan=lowongan.id_lowongan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['mulai_tes']; ?></td>
			<td><?php echo $pecah['selesai_tes']; ?></td>
			<td><?php echo $pecah['nama_divisi']; ?></td>
			
			
			<td>
				<a href="index.php?halaman=editjadwal&id=<?php echo $pecah['id_jadwal']; ?>" class="btn btn-info"><span class= "glyphicon glyphicon-edit"> Edit </span></a>
				<a href="index.php?halaman=hapusjadwal&id=<?php echo $pecah['id_jadwal']; ?>" " class="btn btn-danger"><span class=" fa fa-trash"> Hapus</span></a>



			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>