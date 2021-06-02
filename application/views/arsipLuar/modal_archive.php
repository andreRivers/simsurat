<!-- New Archive Modal-->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahData">Tambah Surat Masuk Dari Instansi Lain</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url('arsipLuar/view') ?>" enctype="multipart/form-data">

					<input type="text" class="form-control" value="<?= $user['email']; ?>" id="email" name="email" required hidden>

					<div class="form-group">
						<label for="text">Instansi</label>
						<input type="text" class="form-control" id="instansi" name="instansi" value="<?= set_value('instansi'); ?>" required>
						<?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">No. Surat</label>
						<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= set_value('no_surat'); ?>" required>
						<?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Hal Surat</label>
						<input type="text" class="form-control" id="hal_surat" name="hal_surat" value="<?= set_value('hal_surat'); ?>" required>
						<?= form_error('hal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Tanggal Surat</label>
						<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= set_value('tgl_surat'); ?>" required>
						<?= form_error('tgl_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Isi Ringkas</label>
						<input type="text" class="form-control" id="isi_ringkas" name="isi_ringkas" value="<?= set_value('isi_ringkas'); ?>" required>
						<?= form_error('isi_ringkas', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Tanggal Diterima Surat</label>
						<input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= set_value('tgl_masuk'); ?>" required>
						<?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					
			
				
					<div class="form-group">
						<label for="text">Tahun Surat</label>
						<select class="form-control custom-select" id="tahun" name="tahun" value="<?= set_value('tahun'); ?>" required>
							<option disabled selected value>Silahkan Pilih</option>
							<option value="2021">2021</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>		
						</select>
						<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				
					<div class="form-group">
						<label for="text">Upload File Scan</label>
						<input type="file" class="form-control" placeholder="Upload File Scan" id="berkas" name="berkas" value="<?= set_value('berkas'); ?>" required>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" type="submit">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

	foreach ($data->result_array() as $i) :
		$id = $i['id'];
		$instansi = $i['instansi'];
		$no_surat = $i['no_surat'];
		$tgl_surat = $i['tgl_surat'];
		$tgl_masuk = $i['tgl_masuk'];
		$isi_ringkas = $i['isi_ringkas'];
		$berkas = $i['berkas'];
		$hal_surat = $i['hal_surat'];
		$tahun = $i['tahun'];
   
?>

<!-- Edit Archive Modal-->
<div class="modal fade" id="editArchive<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Ubah Arsip</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('arsipLuar/ubahArsip'); ?>">
                        <input type="text" hidden class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>

                        <div class="form-group">
                            <label for="text">Hal</label>
                            <input type="text" class="form-control" placeholder="Hal Surat" id="hal_surat" name="hal_surat" value="<?php echo $hal_surat; ?>" required>
                            <?= form_error('hal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        
						<div class="form-group">
						<label for="text">Instansi</label>
						<input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $instansi; ?>" required>
						<?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">No. Surat</label>
						<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $no_surat; ?>" required>
						<?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Hal Surat</label>
						<input type="text" class="form-control" id="hal_surat" name="hal_surat" value="<?php echo $hal_surat; ?>" required>
						<?= form_error('hal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Tanggal Surat</label>
						<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?php echo $tgl_surat; ?>" required>
						<?= form_error('tgl_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Isi Ringkas</label>
						<input type="text" class="form-control" id="isi_ringkas" name="isi_ringkas" value="<?php echo $isi_ringkas; ?>" required>
						<?= form_error('isi_ringkas', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="text">Tanggal Diterima Surat</label>
						<input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>" required>
						<?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					
			
				
					<div class="form-group">
						<label for="text">Tahun Surat</label>
						<select class="form-control custom-select" id="tahun" name="tahun" required>
							<option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
							<option value="2021">2021</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>		
						</select>
						<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				
					<div class="form-group">
						<label for="text">Upload File Scan</label>
						<input type="file" class="form-control" placeholder="Upload File Scan" id="berkas" name="berkas">
					</div>


                </div>
                <div class=" modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

