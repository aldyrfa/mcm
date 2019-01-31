<h2>Info Lowongan Pekerjaan</h2>

<a href="index.php?halaman=tambahlowongan" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>
   No
  </th> 
<th>
  Nama Divisi
 </th> 
 <th>
Tanggal Mulai
</th> 
<th>
Tanggal Selesai
</th>
<th>
Persyaratan
</th>
<th>
	Aksi
</th>
</tr>
</thead>
<tbody>
	<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM lowongan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_divisi']; ?></td>
			<td><?php echo $pecah['tanggal_mulai']; ?></td>
			<td><?php echo $pecah['tanggal_selesai']; ?></td>
			<td><?php echo $pecah['persyaratan']; ?></td>
			
			<td>
				<a href="index.php?halaman=hapuslowongan&id=<?php echo $pecah['id_lowongan']; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
				<a href="index.php?halaman=editlowongan&id=<?php echo $pecah['id_lowongan']; ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"> Edit</i></a>
			</td>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
