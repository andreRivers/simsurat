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
            <a data-toggle="modal" data-target="#newArchive" class="btn btn-primary btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                    New Archive</span>
            </a>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Archive</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id = $i['id'];
                            $no_surat = $i['no_surat'];
                            $kode_surat = $i['kode_surat'];
                            $hal = $i['hal'];
                            $jenis_archive = $i['jenis_archive'];
                            $tujuan = $i['tujuan'];
                            $unit_created = $i['unit_created'];
                            $date_created = $i['date_created'];
                            $scan = $i['scan'];
                        ?>
                            <tr>
                                <td><?php echo $no_surat; ?></td>
                                <td><?php echo $no_surat; ?><?php echo $kode_surat; ?>
                                    <br>
                                    Hal : <?php echo $hal; ?>
                                    <br>
                                    <small><i>
                                            Sifat surat : <span class="badge badge-success"><?php echo $jenis_archive; ?></span>
                                            <br>
                                            Tujuan : <?php echo $tujuan; ?> | TANGGAL BUAT : <?php echo Archive::format($date_created); ?>
                                            <br>
                                            Pembuat : <?php echo $unit_created; ?></i></td>
                                <td> <a href="<?= base_url('upload/'); ?><?php echo $scan; ?>" target="_blank" class="dropdown-item">LIHAT</a></td>


                                <td>
                                    <div class="btn-group">


                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            <i class="fas fa-cog"> </i>
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#" data-toggle="modal" data-target="#editArchive<?php echo $id; ?>" class="dropdown-item">EDIT</a>
                                            <a href="<?= base_url(); ?>archive/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                            <a href="<?= base_url('archive/'); ?>cetak/<?php echo $id; ?>" target="_blank" class="dropdown-item">BARCODE</a>
                                            <a href="#" data-toggle="modal" data-target="#upload<?php echo $id; ?>" class="dropdown-item">UPLOAD</a>
                                            <a href="#" data-toggle="modal" data-target="#kirimArchive<?php echo $id; ?>" class="dropdown-item">KIRIM</a>
                                        </div>
                                    </div>

                                    <!-- <a data-toggle="modal" data-target="#editArchive<?php echo $id; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Archive">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url(); ?>archive/delete/<?php echo $id; ?>" class="btn btn-danger btn-circle btn-sm tombol-hapus" title="Delete Archive">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="<?= base_url('archive/'); ?>cetak/<?php echo $id; ?>" class="btn btn-success btn-circle btn-sm" target="_blank" title="Cetak Barcode QR">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#upload<?php echo $id; ?>" class="btn btn-primary btn-circle btn-sm" title="Upload Archive">
                                        <i class="fas fa-upload" style="color:white"></i>
                                    </a> -->

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