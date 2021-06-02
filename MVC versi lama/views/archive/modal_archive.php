<?php
// $query123 = "SELECT max(id) as kode FROM app_archive ";
// $i = $this->db->query($query123)->result_array();
// $b = '$kode';
// var_dump($i);
// die;
$date = date('Y');
$auto = "SELECT IFNULL(MAX(no_surat)+1,1) AS nomorSurat FROM app_archive where year=$date";
$no = $this->db->query($auto)->row_array();

?>
<!-- New Archive Modal-->
<div class="modal fade" id="newArchive" tabindex="-1" role="dialog" aria-labelledby="newArchive" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newArchive">New Archive</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('archive/view') ?>">
                    <input type="text" class="form-control" value="<?= $user['nama']; ?>" id="unit_created" name="unit_created" required hidden>
                    <input type="text" class="form-control" value="<?= $user['email']; ?>" id="email" name="email" required hidden>
                    <div class="form-group">
                        <label for="text">No Surat</label>
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $no['nomorSurat']; ?>" readonly>
                        <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Kode Surat</label>
                        <input type="text" class="form-control" placeholder="Kode Surat" id="kode_surat" name="kode_surat" value="<?= set_value('kode_surat'); ?>" required>
                        <small class="text-danger pl-2">- Contoh Pengisian : /KEP/II.3-AU/UMSU/D/2020 </small>
                    </div>
                    <div class="form-group">
                        <label for="text">Hal</label>
                        <input type="text" class="form-control" placeholder="Hal Surat" id="hal" name="hal" value="<?= set_value('hal'); ?>">
                        <?= form_error('hal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Jenis Kepentingan</label>
                        <select class="form-control custom-select" id="jenis_archive" name="jenis_archive" value="<?= set_value('jenis_archive'); ?>">
                            <option value="">Silahkan Pilih</option>
                            <?php foreach ($jenis_archive as $ja) : ?>
                                <option value="<?= $ja['jenis_archive']; ?>"><?= $ja['jenis_archive']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jenis_archive', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Tujuan</label>
                        <input type="text" class="form-control" placeholder="Tujuan Surat" id="tujuan" name="tujuan" value="<?= set_value('tujuan'); ?>">
                        <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <form method="POST" action="<?= base_url('archive/edit'); ?>">
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
                    <form method="POST" action="<?= base_url('archive/upload'); ?>" enctype="multipart/form-data">
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

<!-- KIRIM SURAT -->
<?php
$users = "SELECT * From app_user";
$us = $this->db->query($users)->result_array();
foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $no_surat = $i['no_surat'];
    $kode_surat = $i['kode_surat'];
    $hal = $i['hal'];
    $jenis_archive = $i['jenis_archive'];
    $tujuan = $i['tujuan'];
    $scan = $i['scan'];
    $unit_created = $i['unit_created'];
?>
    <!-- Edit Archive Modal-->
    <div class="modal fade" id="kirimArchive<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Kirim Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('disposisi/kirim'); ?>">

                        <input hidden type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                        <input hidden type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">No. Surat</label>
                            <div class="col-sm-3">
                                <input type="text" readonly class="form-control" id="nomor_surat" name="nomor_surat" value="<?php echo $no_surat; ?><?php echo $kode_surat; ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Hal Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hal" name="hal" value="<?php echo $hal; ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Surat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="jenis_archive" name="jenis_archive" value="<?php echo $jenis_archive; ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">File Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="scan" name="scan" value="<?php echo $scan; ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kirim Ke: *</label>
                            <div class="col-sm-10">
                                <select multiple class="selectpicker form-control" id="number-multiple" name="penerima[]" data-container="body" data-live-search="true" title="Pilih Penerima" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
                                    <?php foreach ($us as $u) : ?>
                                        <option value="<?= $u['email']; ?>"><?= $u['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" rows="5" id="catatan" name="catatan" required></textarea>
                            </div>
                        </div>

                </div>
                <div class=" modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>