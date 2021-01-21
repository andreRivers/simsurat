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
        <a href="javascript: history.go(-1)" class="btn btn-primary btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-backward"></i>
                    KEMBALI</span>
            </a>
<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">No Surat Masuk:</label>
<div class="col-sm-8">
<?= $data['no_surat_masuk'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Tgl Surat Masuk :</label>
<div class="col-sm-8">
<?= $data['tgl_surat_masuk'] ?>
</div>
</div>

<hr>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">No Surat Keluar:</label>
<div class="col-sm-8">
<?= $data['no_surat_keluar'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Balasan Surat Dari (Fakultas/Unit/Lembaga/Dll):</label>
<div class="col-sm-8">
<?= $data['balasan_surat'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Perihal (Pelatihan/Undangan/Dll):</label>
<div class="col-sm-4">
<?= $data['perihal'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Menghadiri (Judul Undangan/Pelatihan/Dll):</label>
<div class="col-sm-4">
<?= $data['menghadiri'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Ditugaskan Kepada:</label>
<div class="col-sm-8">
<table class="table table-striped">
    <thead>
      <tr>
        <th>NAMA</th>
        <th>JABATAN</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($tugas as $tg) : ?>
      <tr>
        <td><?=$tg['nama']; ?></td>
        <td><?=$tg['jabatan']; ?></td>
      </tr>
    <?php endforeach; ?>
      
    </tbody>
  </table>
</div>
</div>


<hr>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Hari/Tanggal</label>
<div class="col-sm-8">
<?= $data['tanggal'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Pukul</label>
<div class="col-sm-8">
<?= $data['pukul'] ?>
</div>
</div>

<div class="form-group row">
<label for="inputEmail" class="col-sm-4 col-form-label">Lokasi</label>
<div class="col-sm-8">
<?= $data['tempat'] ?>
</div>
</div>


         
        </div>
    </div>

</div>
