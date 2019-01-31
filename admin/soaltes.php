<h2>Soal tes ganda</h2>
<a href="index.php?halaman=tambahsoal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah soal</a>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Kode Soal
			</th>
			<th>
				Soal
			</th>
			<th>
				A
			</th>
			<th>
				B
			</th>
			<th>
				C
			</th>
			<th>
				D
			</th>
			<th>
				E
			</th>
			<th>
				Jawaban
			</th>
			<th>
				Nama Lowongan
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM soal JOIN lowongan ON soal.id_lowongan = lowongan.id_lowongan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['kode_soal']; ?></td>
			<td><?php echo $pecah['nama_soal']; ?></td>
			<td><?php echo $pecah['a']; ?></td>
			<td><?php echo $pecah['b']; ?></td>
			<td><?php echo $pecah['c']; ?></td>
			<td><?php echo $pecah['d']; ?></td>
			<td><?php echo $pecah['e']; ?></td>
			<td><?php echo $pecah['jawaban']; ?></td>
			<td><?php echo $pecah['nama_divisi']; ?></td>
			
			
			<td>
				<a href="index.php?halaman=editsoal&id=<?php echo $pecah['id']; ?>" class="btn btn-info"><span class= "fa fa-file"> Edit </span></a>
				<a href="index.php?halaman=hapussoal&id=<?php echo $pecah['id']; ?>" " class="btn btn-danger"><span class=" fa fa-trash"> Hapus</span></a>



			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

