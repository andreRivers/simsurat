<!-- TOLAK PERMOHONAN-->
<?php
foreach ($data->result_array() as $i) :
    $id = $i['id'];
?>
    <div class="modal fade" id="TolakSurat<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Tolak Permohonan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('disposisi/tolakSurat'); ?>">
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>

                        <div class="form-group">
                            <label for="text">KETERANGAN</label>
                            <textarea type="text" class="form-control" rows="5" id="keterangan" name="keterangan" required> </textarea>
                        </div>
                </div>
                <div class=" modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Kirim</button>
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
?>
    <!-- Edit Archive Modal-->
    <div class="modal fade" id="ProsesSurat<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Kirim Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('disposisi/prosesSurat'); ?>">
                        <input hidden type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Kirim Ke: *</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="pimpinan" name="pimpinan" title="Pilih Penerima" required>
                                    <option disabled selected value="">SILAHKAN PILIH</option>
                                    <option value="rektor@umsu.ac.id">REKTOR</option>
                                    <option value="wr1@umsu.ac.id">WAKIL REKTOR I</option>
                                    <option value="akrim@umsu.ac.id">WAKIL REKTOR II</option>
                                    <option value="wr3@umsu.ac.id">WAKIL REKTOR III</option>
                                    <option value="sektor@umsu.ac.id">SEKRETARIS UNIVERSITAS</option>
                                    <option value="kabaum@umsu.ac.id">KA. BAUM</option>

                                </select>
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

<!-- KIRIM SURAT -->
<?php
$users = "SELECT * From app_user";
$us = $this->db->query($users)->result_array();
foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $id_surat = $i['id_surat'];
    $penerima = $i['penerima'];
?>
    <!-- Edit Archive Modal-->
    <div class="modal fade" id="DisposisiSurat<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editArchive" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">DISPOSISI SURAT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('disposisi/disposisiSurat'); ?>">
                        <input hidden type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                        <input hidden type="text" class="form-control" id="id_surat" name="id_surat" value="<?php echo $id_surat; ?>" readonly>
                        <div class="form-group">
                            <label>DISPOSISI :</label>

                            <table>
                                <thead>
                                    <tr>
                                        <th><label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Hadiri"> Hadiri</label></th>
                                        <th><label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Pelajari"> Pelajari</label></th>
                                    </tr>
                                    <tr>
                                        <th style="width:50%"><label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Ikuti Perkembangan"> Ikuti Perkembangan </label></th>
                                        <th><label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Siapkan Laporan "> Siapkan Laporan </label></th>
                                    </tr>
                                    <tr>
                                        <th><label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Edarkan/Umumkan"> Edarkan/Umumkan</label></th>
                                        <th> <label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Proses Selanjutnya"> Proses Selanjutnya</label></th>
                                    </tr>
                                    <tr>
                                        <th> <label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Koreksi"> Koreksi</label></th>
                                        <th> <label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Untuk Diperhatikan/Diketahui"> Untuk Diperhatikan/Diketahui</label></th>
                                    </tr>
                                    <tr>
                                        <th> <label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Hubungi Saya"> Hubungi Saya</label></th>
                                        <th> <label class="checkbox-inline"><input type="checkbox" id="disposisi" name="disposisi[]" value="Arsipkan"> Arsipkan</label></th>
                                    </tr>
                                </thead>
                            </table>

				<div class="form-group">
				<label for="text">KEPADA:</label>
                                <select multiple class="selectpicker form-control" id="number-multiple" name="penerima[]" data-container="body" data-live-search="true" title="Pilih Penerima" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
                                    <?php foreach ($us as $u) : ?>
                                        <option value="<?= $u['email']; ?>"><?= $u['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                           
                        </div>



                            <div class="form-group">
                                <label for="text">CATATAN:</label>
                                <textarea type="text" class="form-control" rows="5" id="keterangan" name="keterangan" required> </textarea>
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