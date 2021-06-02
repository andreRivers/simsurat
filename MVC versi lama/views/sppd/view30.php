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
        <a href="<?= base_url('sppd/newSppd'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                    New Sppd</span>
            </a>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Surat Perintah Perjalanan Dinas </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id = $i['id'];
                            $nama =$i['nama']; 
                            $no_surat =$i['no_surat']; 
                            $nama_pegawai =$i['nama_pegawai']; 
                            $pangkat_pegawai =$i['pangkat_pegawai']; 
                            $jabatan_pegawai =$i['jabatan_pegawai']; 
                            $tingkat_pd =$i['tingkat_pd']; 
                            $nama_pegawai2 =$i['nama_pegawai2']; 
                            $pangkat_pegawai2 =$i['pangkat_pegawai2']; 
                            $jabatan_pegawai2 =$i['jabatan_pegawai2']; 
                            $tingkat_pd2 =$i['tingkat_pd2']; 
                            $tujuan_pd =$i['tujuan_pd'];
                            $alat_angkutan =$i['alat_angkutan'];
                            $lama_perjalanan =$i['lama_perjalanan'];
                            $tgl_berangkat =$i['tgl_berangkat']; 
                            $tgl_kembali =$i['tgl_kembali']; 
                            $berangkat_kota =$i['berangkat_kota']; 
                            $tujuan_kota =$i['tujuan_kota']; 
                            $status =$i['status']; 
                            $date_created =$i['date_created']; 
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>Perintah Pimpinan Bapak <?php echo $nama; ?>
                                <br>
                                <?php echo $no_surat; ?>
                                <br>
                                <small>
                                <?php echo $nama_pegawai; ?> | <?php echo $jabatan_pegawai; ?>
                                <br>
                                <?php echo $nama_pegawai2; ?> | <?php echo $jabatan_pegawai2; ?>
                                <br>
                                <?php echo $tujuan_pd; ?> 
                                <br>
                                Tanggal Berangkat : <?php echo Sppd::format($tgl_berangkat); ?> | Tanggal Kembali : <?php echo Sppd::format($tgl_kembali); ?>
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
                                            <a href="<?= base_url(); ?>sppd/setuju/<?php echo $id; ?>" class="dropdown-item btn-sm">SETUJU</a>
                                        <?php } ?>
                                        <?php } ?>

                                        <?php if ($status == 2) { ?>
                                            <a href="<?= base_url(); ?>sppd/cetak/<?php echo $id; ?>" target="_blank" class="dropdown-item btn-sm">CETAK</a>
                                        <?php } ?>

                                        <?php if ($status == 1) { ?>
                                            <a href="<?= base_url(); ?>sppd/edit/<?php echo $id; ?>" target="_blank" class="dropdown-item btn-sm">EDIT</a>
                                            <a href="<?= base_url(); ?>sppd/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                        <?php } ?>

                                        <?php if ($status == 3) { ?>
                                            <a href="<?= base_url(); ?>sppd/edit/<?php echo $id; ?>" class="dropdown-item btn-sm">EDIT</a>
                                            <a href="<?= base_url(); ?>sppd/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                        <?php } ?>

                                        
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