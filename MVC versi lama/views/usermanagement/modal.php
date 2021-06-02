<!-- New Archive Modal-->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newArchive" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newArchive">New User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('usermanagement') ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="No Handphone" id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>">
                        <?= form_error('hal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                    <select class="form-control" placeholder="Akses" id="role_id" name="role_id">
                      <option value="">Pilih Akses</option>
                      <option value="1">Admin</option>
					  <option value="2">Super Admin</option>
					  <option value="3">Admin Unit</option>
                    </select>
                        <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">

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
    $nama = $i['nama'];
    $no_hp = $i['no_hp'];
    $email = $i['email'];
    $is_active = $i['is_active'];
    $role_id = $i['role_id'];
?>
    <!-- Edit Archive Modal-->
    <div class="modal fade" id="editUser<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newArchive">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('usermanagement/edit'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        
                        <div class="form-group">
                    <select class="form-control" placeholder="Akses" id="role_id" name="role_id">
                      <option value="">Pilih Akses</option>
                      <option value="1">Admin</option>
                      <option value="2">Super Admin</option>
                    </select>
                        <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
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
