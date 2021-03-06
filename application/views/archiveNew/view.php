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
			<?= $this->session->flashdata('message'); ?>
            <a data-toggle="modal" data-target="#newArchiveNew" class="btn btn-primary btn-icon-split">
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
                            $kirim = $i['kirim'];
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
                                            Tujuan : <?php echo $tujuan; ?> | TANGGAL BUAT : <?php echo ArchiveNew::format($date_created); ?>
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
                                            <a href="#" data-toggle="modal" data-target="#editArchiveNew<?php echo $id; ?>" class="dropdown-item">EDIT</a>
                                            <a href="<?= base_url(); ?>archiveNew/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
                                            <a href="<?= base_url('archiveNew/'); ?>cetak/<?php echo $id; ?>" target="_blank" class="dropdown-item">BARCODE</a>
                                            <a href="#" data-toggle="modal" data-target="#uploadNew<?php echo $id; ?>" class="dropdown-item">UPLOAD</a>

                                            <?php if ($kirim == 1) { ?>
                                                <a href="#" data-toggle="modal" data-target="#kirimArchiveNew<?php echo $id; ?>" class="dropdown-item">KIRIM</a>
                                            <?php } ?>
                                        </div>
                                    </div>

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