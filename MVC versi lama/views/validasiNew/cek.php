<?php
$queryProses = "SELECT * FROM app_archive_new WHERE  nomor_surat like '$_POST[nomor_surat]'";
$arsipp = $this->db->query($queryProses)->result_array();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
        </div>
        <div class="card-body">
            <a href="javascript:window.history.go(-1);" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-backward"></i>
                </span>
                <span class="text">Back</span>
            </a>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nomor Archive</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arsipp as $ars) : ?><tr>
                                <td><?= $ars['id']; ?></td>
                                <td><?= $ars['no_surat']; ?><?= $ars['kode_surat']; ?>
                                <br>Hal : <?= $ars['hal']; ?>
                                <br><small>Jenis Kepentingan : <?= $ars['jenis_archive']; ?>
                                <br>Tujuan : <?= $ars['tujuan']; ?>
                                <br>Pembuat Surat : <?= $ars['unit_created']; ?>
                                <br>Tanggal Pembuatan :<?= $ars['date_created']; ?></small></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>