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

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Surat Masuk</th>
                            <th>Berkas</th>
                            <?php
                            if ($user['role_id'] == 2) { ?>
                                <th><i class="fa fa-cog"></i></th>
                            <?php } ?>

                            <?php
                            if ($user['role_id'] == 5) { ?>
                                <th><i class="fa fa-cog"></i></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result_array() as $i) :
                            $id = $i['id'];
                            $nomor_surat = $i['nomor_surat'];
                            $email = $i['email'];
                            $hal = $i['hal'];
                            $jenis_archive = $i['jenis_archive'];
                            $catatan = $i['catatan'];
                            $penerima = $i['penerima'];
                            $date_created = $i['date_created'];
                            $sts = $i['sts'];
                            $scan = $i['scan'];
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nomor_surat; ?>
                                    <br>
                                    Hal : <?php echo $hal; ?>
                                    <br>
                                    <small><i>
                                            Sifat surat : <span class="badge badge-success"><?php echo $jenis_archive; ?></span>
                                            <br>
                                            Penerima : <?php echo $penerima; ?> | Tanggal Kirim : <?php echo Disposisi::format($date_created); ?>
                                            <br>
                                            Pengirim : <?php echo $email; ?></i>
                                        <br>
                                        Catatan Pengirim : <?php echo $catatan; ?>
                                    </small>
                                    <br>


                                    <?php
                                    if ($sts == 1) {
                                        echo '<span class="badge badge-pill badge-info">Terkirim</span>';
                                    } elseif ($sts == 2) {
                                        echo '<span class="badge badge-pill badge-warning">Proses</span>';
                                    } elseif ($sts == 3) {
                                        echo '<span class="badge badge-pill badge-success">Disetujui</span>';
                                    } elseif ($sts == 4) {
                                        echo '<span class="badge badge-pill badge-danger">Ditolak</span>';
                                    }
                                    ?>

                                </td>

                                <td> <a href="<?= base_url('upload/'); ?><?php echo $scan; ?>" target="_blank" class="dropdown-item">LIHAT</a></td>

                                <?php
                                if ($user['role_id'] == 2) { ?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <i class="fas fa-cog"> </i>
                                                <span class="caret"></span>
                                            </button>
                                            <?php
                                            if ($sts == 1) { ?>
                                                <div class="dropdown-menu">
                                                    <a href="#" data-toggle="modal" data-target="#ProsesSurat<?php echo $id; ?>" class="dropdown-item">PROSES</a>
                                                    <a href="#" data-toggle="modal" data-target="#TolakSurat<?php echo $id; ?>" class="dropdown-item">TOLAK</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                <?php } ?>

                                <?php
                                if ($user['role_id'] == 5) { ?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <i class="fas fa-cog"> </i>
                                                <span class="caret"></span>
                                            </button>
                                            <?php
                                            if ($sts == 2) { ?>
                                                <div class="dropdown-menu">
                                                    <a href="#" data-toggle="modal" data-target="#DisposisiSurat<?php echo $id; ?>" class="dropdown-item">DISPOSISI</a>
                                                    <a href="#" data-toggle="modal" data-target="#TolakSurat<?php echo $id; ?>" class="dropdown-item">TOLAK</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                <?php } ?>

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