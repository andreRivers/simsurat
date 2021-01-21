<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <div class="row">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          Arsip Fakultas/Unit/lembaga
        </div>
        <div class="card-body">
          <form id="form_validation" action="<?= base_url('master/view'); ?>" method="POST" enctype="multipart/form-data">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-line">

                    <select class="custom-select" id="email" name="email">
                      <option selected disabled value="">Arsip Fakultas/Unit/Lembaga</option>
                      <?php foreach ($unit as $pr) : ?>
                        <option value="<?= $pr['email']; ?>"><?= $pr['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Lihat Data</button>
                </div>
              </div>
          </form>

        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<div class="card">
  <div class="card-header">
    Arsip Fakultas/Unit/lembaga
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Archive</th>
            <th>Berkas</th>
            <th>Unit</th>

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
              <td><?php echo $no; ?></td>
              <td><?php echo $no_surat; ?><?php echo $kode_surat; ?>
                <br>
                Hal : <?php echo $hal; ?>
                <br>
                <small><i>
                    Sifat surat : <span class="badge badge-success"><?php echo $jenis_archive; ?></span>
                    <br>
                    Tujuan : <?php echo $tujuan; ?> | TANGGAL BUAT : <?php echo Master::format($date_created); ?>
                    <br>
              <td> <a href="<?= base_url('upload/'); ?><?php echo $scan; ?>" target="_blank" class="dropdown-item">LIHAT</a></td>
              <td><?php echo $unit_created; ?></td>


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