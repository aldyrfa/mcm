<h2>data user</h2>

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
				Username
			</th>
			<th>
				Email
			</th>
			<th>
				Telepon
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM user "); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td>
				<a href="index.php?halaman=hapusdatauser&id=<?php echo $pecah['id_user']; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash">Hapus</i></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
