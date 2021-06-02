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
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
        
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Surat Tugas Perjalanan Dinas </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id = $i['id'];
                            $id_permohonan = $i['id_permohonan']; 
                            $no_surat_masuk = $i['no_surat_masuk']; 
                            $tgl_surat_masuk = $i['tgl_surat_masuk']; 
                            $no_surat_keluar = $i['no_surat_keluar']; 
			                $balasan_surat = $i['balasan_surat']; 
                            $perihal = $i['perihal']; 
                            $menghadiri = $i['menghadiri']; 
                            $tanggal = $i['tanggal']; 
                            $pukul = $i['pukul']; 
                            $tempat = $i['tempat']; 
                            $status = $i['status']; 
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>Surat Keluar : <?php echo $no_surat_keluar; ?>
                                <br>
                                Perihal : <?php echo $perihal; ?>
                                <br>
                                Menghadiri : <?php echo $menghadiri; ?>
                                <small>
                                Tanggal : <?php echo $tanggal; ?> | Lokasi : <?php echo $tempat; ?>
                                <br>
                                <?php
							            if ($status == 1) {
                                            echo '<span class="badge badge-info">Sedang Diverifikasi</span> ';
                                        } elseif ($status == 2) {
                                            echo '<span class="badge badge-success">Disetujui</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Ditolak</span>';
                                        }  ?>
                                </small>
                               


                                <td>
                                    <div class="btn-group">


                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            <i class="fas fa-cog"> </i>
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <?php
							            if ($user['role_id'] == 5) { ?>
                                        <?php
							            if ($status == 1) { ?>
                                            <a href="<?= base_url(); ?>suratTugas/setuju/<?php echo $id; ?>" class="dropdown-item btn-sm">SETUJU</a>
                                            <a href="<?= base_url(); ?>suratTugas/tolak/<?php echo $id; ?>" class="dropdown-item btn-sm">TOLAK</a>
                                        <?php } ?>
                                        <?php } ?>

                                        <?php
							            if ($user['role_id'] == 2 ) { ?>

                                        <?php if ($status == 2) { ?>
                                            <a href="<?= base_url(); ?>suratTugas/cetak/<?php echo $id; ?>" target="_blank" class="dropdown-item btn-sm">CETAK</a>
                                        <?php } ?>

                                        <?php if ($status == 1) { ?>
                                            <a href="<?= base_url(); ?>suratTugas/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                        <?php } ?>

                                        <?php if ($status == 3) { ?>
                                            <a href="<?= base_url(); ?>suratTugas/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                        <?php } ?>
                                        <?php } ?>

                                        <a href="<?= base_url(); ?>suratTugas/detail/<?php echo $id_permohonan; ?>" class="dropdown-item btn-sm">DETAIL</a>

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
</div>