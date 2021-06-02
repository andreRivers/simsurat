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
            <a data-toggle="modal" data-target="#newType" class="btn btn-danger btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text text-white">Type Archive</span>
            </a>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Jenis Archive</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id_jenis = $i['id_jenis'];
                            $jenis_archive = $i['jenis_archive'];

                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?php echo $jenis_archive; ?></td>

                                <td>

                                    <a data-toggle="modal" data-target="#editType<?php echo $id_jenis; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url(); ?>typearchive/delete/<?php echo $id_jenis; ?>" class="btn btn-danger btn-circle btn-sm tombol-hapus" title="Delete">
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