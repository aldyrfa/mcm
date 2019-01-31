<h2> Jadwal Interview </h2>

<table class="table table-bordered">
 <thead>
 <tr>
	 <th>No</th>
	 <th>Nama Pelamar</th>
	 <th>Nama Divisi</th> 
	 <th>Nilai Skor</th> 
	 <th>Tanggal Interview</th>
	 <th>Status</th>
	 <th>Action</th>
 </tr>
 </thead>
 <tbody>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi->query("SELECT
										a.*, b.nama,
										c.nama_divisi,
										d.skor,
										b.id_user,
									CASE 
										WHEN a.status = 0 THEN 'Jadwal Interview Belum Di Set'
										ELSE 'Jadwal Interview Sudah Di Set'
									END AS 'status_hasil'
									FROM
										interview a
									LEFT JOIN biodata_user b ON a.id_pelamar = b.id_pelamar
									LEFT JOIN lowongan c ON a.id_lowongan = c.id_lowongan
									LEFT JOIN jawaban d ON b.id_user = d.id_user"); ?>
	<?php while($pecah = $ambil->fetch_assoc()) { ?>
	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $pecah['nama']; ?></td>
		<td><?php echo $pecah['nama_divisi']; ?></td>
		<td><?php echo $pecah['skor']; ?></td>
		<td><?php echo $pecah['jadwal_interview']; ?></td>
		<td><?php echo $pecah['status_hasil']; ?></td>
		<td><a title="Edit" href="#" onClick="edit_jadwal(<?=$pecah["id_interview"]?>)">Edit</a></td>
	</tr>


	<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>


<!-- Modal Tambah -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Set Tanggal Interview</h3>
      </div>
      <div class="modal-body form">
      	<div class="row">
        <form action="#" id="form" class="form-horizontal" style="margin-right: 30px !important; margin-left: 30px !important;">
          <input type="hidden" value="" name="id"/>
           <input type="hidden" value="jadwal_interview" name="my_val"/>
          <div class="form-body">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Tanggal Interview</label>
              <input name="jadwal_interview" class="form-control" type="date" required="required">
            </div>
          </div>
        </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="simpan()" class="btn btn-primary">Kirim</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<script type="text/javascript">
	function edit_jadwal(id)
     {
       $('#form')[0].reset(); 
       $('#modal_form').modal('show'); 
       $('.modal-title').text('Set Tanggal Interview');
       $('[name="id"]').val(id);
       
       return false; 
    }

    function simpan()
    {
	  var form = $("#form");
      var formData = new FormData(form[0]);

      $.ajax({
        url : "<?php echo '../proses.php' ?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function(data)
        {
          if(data.status=="1"){
                alert("Set Jadwal Interview Berhasil");
                window.location.reload();
            }else{
                alert("Set Jadwal Interview Gagal");
                window.location.reload();     
            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            alert('Error get data from ajax');
         }
      });
    }
</script>
