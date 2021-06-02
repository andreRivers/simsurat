<!-- New Archive Modal-->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahData">Tambah Arsip Lama</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url('old/view') ?>" enctype="multipart/form-data">
					<input type="text" class="form-control" value="<?= $user['email']; ?>" id="email" name="email" required hidden>
					<div class="form-group">
						<label for="text">Hal Surat</label>
						<input type="text" class="form-control" id="hal_surat" name="hal_surat" value="<?= set_value('hal_surat'); ?>" required>
						<?= form_error('hal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
			
				
					<div class="form-group">
						<label for="text">Tahun Surat</label>
						<select class="form-control custom-select" id="tahun" name="tahun" value="<?= set_value('tahun'); ?>" required>
							<option disabled selected value>Silahkan Pilih</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>

							
							
						</select>
						<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				
					<div class="form-group">
						<label for="text">Upload File Scan</label>
						<input type="file" class="form-control" placeholder="Upload File Scan" id="file" name="file" value="<?= set_value('file'); ?>" required>
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
                    <form method="POST" action="<?= base_url('old/ubahArsip'); ?>">
                        <input type="text" hidden class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>

                        <div class="form-group">
                            <label for="text">Hal</label>
                            <input type="text" class="form-control" placeholder="Hal Surat" id="hal_surat" name="hal_surat" value="<?php echo $hal_surat; ?>" required>
                            <?= form_error('hal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="text">Tahun</label>
                            <select class="form-control custom-select" id="tahun" name="tahun" required>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>

                            </select>
                            <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
						<div class="form-group">
						<label for="text">Upload File Scan</label>
						<input type="file" class="form-control" placeholder="Upload File Scan" id="file" name="file" value="<?= set_value('file'); ?>">
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

