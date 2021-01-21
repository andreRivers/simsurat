<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_a'); ?>"></div>
    <?php if ($this->session->flashdata('flash_a')) : ?>

    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
        </div>

        <div class="card-body">
            <a data-toggle="modal" data-target="#newUser" class="btn btn-danger btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text text-white">New user</span>
            </a>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>No_Hp</th>
                            <th>Email</th>
                            <th>Aktif</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id = $i['id'];
                            $nama = $i['nama'];
                            $no_hp = $i['no_hp'];
                            $email = $i['email'];
                            $is_active = $i['is_active'];
                            $role_id = $i['role_id'];

                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?php echo $nama; ?></td>
                                <td><?php echo $no_hp; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php
                                    if ($i['is_active'] == 1) {
                                        echo '<span class="badge badge-pill badge-success">Active</span>';
                                    } else {
                                        echo '<span class="badge badge-pill badge-success">Nonactive</span>';
                                    }
                                    ?>
                                </td>
                                <td><?php
                                    if ($i['role_id'] == 1) {
                                        echo '<span class="badge badge-pill badge-danger">Admin</span>';
                                    }  elseif ($i['role_id'] == 2 ) {
                                        echo '<span class="badge badge-pill badge-success">Super Admin</span>';
                                    } else {
                                        echo '<span class="badge badge-pill badge-info">Admin Unit</span>';
                                    }
                                    ?>
                                </td>


                                <td>

                                    <a data-toggle="modal" data-target="#editUser<?php echo $id; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url(); ?>usermanagement/delete/<?php echo $id; ?>" class="btn btn-danger btn-circle btn-sm tombol-hapus" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
