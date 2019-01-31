<h2>Data Pelamar</h2>

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
				Tanggal lahir
			</th>
			<th>
				No Telp
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM biodata_user"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['tanggal_lahir']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td>
				<a href="" class="btn btn-info">Detail</a>
				<a href="" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>