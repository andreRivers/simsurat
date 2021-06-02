<!-- New Archive Modal-->
<div class="modal fade" id="newType" tabindex="-1" role="dialog" aria-labelledby="newArchive" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newArchive">New User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('typearchive') ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tingkat Kepentingan" id="jenis_archive" name="jenis_archive" value="<?= set_value('jenis_archive'); ?>" required>
                        <?= form_error('jenis_archive', '<small class="text-danger pl-3">', '</small>'); ?>
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
    $id_jenis = $i['id_jenis'];
    $jenis_archive = $i['jenis_archive'];
?>
    <!-- Edit Archive Modal-->
    <div class="modal fade" id="editType<?php echo $id_jenis; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('typearchive/edit'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_jenis" name="id_jenis" value="<?php echo $id_jenis; ?>" readonly hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jenis_archive" name="jenis_archive" value="<?php echo $jenis_archive; ?>" required>
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