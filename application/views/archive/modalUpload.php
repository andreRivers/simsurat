<?php
$jenis_archive = "SELECT * From app_jenis_archive";
$ja = $this->db->query($jenis_archive)->result_array();
foreach ($data->result_array() as $i) :
	$id = $i['id'];
	$kode_surat = $i['kode_surat'];
	$hal = $i['hal'];
	$jenis_archive = $i['jenis_archive'];
	$tujuan = $i['tujuan'];
	$unit_created = $i['unit_created'];
?>
	<!-- Edit Archive Modal-->
	<div class="modal fade" id="editArchive<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newArchive">Edit Archive</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url('archive/edit2'); ?>">
							<input type="text" hidden class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>

						
						<div class="form-group">
							<label for="text">Kode Surat</label>
							<input type="text" class="form-control" placeholder="Kode Surat" id="kode_surat" name="kode_surat" value="<?php echo $kode_surat; ?>" required>
							<small class="text-danger pl-2">- Contoh Pengisian : /KEP/II.3-AU/UMSU/D/2020 </small>
						</div>
						<div class="form-group">
							<label for="text">Hal</label>
							<input type="text" class="form-control" placeholder="Hal Surat" id="hal" name="hal" value="<?php echo $hal; ?>">
							<?= form_error('hal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="text">Jenis Kepentingan</label>
							<select class="form-control custom-select" id="jenis_archive" name="jenis_archive">
								<option value="<?php echo $jenis_archive; ?>"><?php echo $jenis_archive; ?></option>
								<?php foreach ($ja as $jar) : ?>
									<option value="<?= $jar['jenis_archive']; ?>"><?= $jar['jenis_archive']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('jenis_archive', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="text">Tujuan</label>
							<input type="text" class="form-control" placeholder="Tujuan Surat" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>">
							<?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
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


<?php
$jenis_archive = "SELECT * From app_jenis_archive";
$ja = $this->db->query($jenis_archive)->result_array();
foreach ($data->result_array() as $i) :
	$id = $i['id'];
	$scan = $i['scan'];
?>
	<!-- Edit Archive Modal-->
	<div class="modal fade" id="upload<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newArchive">Upload File</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url('archive/upload2'); ?>" enctype="multipart/form-data">
							<input type="text" hidden class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>

						<div class="form-group">
							<label for="text">Upload File</label>
							<input type="file" class="form-control" placeholder="Upload" id="scan" name="scan" value="<?php echo $scan; ?>" required>
							<small class="text-danger pl-2">-FORMAT FILE WAJIB IMG / PDF </small>
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
