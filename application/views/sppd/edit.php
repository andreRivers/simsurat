<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <div class="row">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
        </div>
        <div class="card-body">
        <form method="post" action="<?= base_url('sppd/newSppd'); ?>">
        <input hidden type="text" class="form-control" id="id" name="id" value="<?= $data['id'];?>" required readonly>
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">No Surat :</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $data['no_surat'];?>" required>
        <small class="text-danger pl-2">- Contoh Pengisian : 123/KEP/II.3-AU/UMSU/D/2020 </small>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Pejabat Berwenang Memberi Perintah :</label>
        <div class="col-sm-8">
        <select class="form-control custom-select" id="id_pejabat" name="id_pejabat" >
            <option elected disabled value="">Silahkan Pilih</option>
                <?php foreach ($pimpinan as $ja) : ?>
                <option value="<?= $ja['id_pejabat']; ?>"><?= $ja['nama']; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        </div>
        <hr>
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">1. Nama Pegawai :</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required value="<?= $data['nama_pegawai'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">a. Pangkat Dan Golongan :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="pangkat_pegawai" name="pangkat_pegawai" required value="<?= $data['pangkat_pegawai'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">b. Jabatan :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="jabatan_pegawai" name="jabatan_pegawai"required value="<?= $data['jabatan_pegawai'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">c. Tingkat Perjalanan Dinas :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="tingkat_pd" name="tingkat_pd" required value="<?= $data['tingkat_pd'];?>">
        </div>
        </div>
        <hr>
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">2. Nama Pegawai :</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_pegawai2" name="nama_pegawai2" value="<?= $data['nama_pegawai2'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">a. Pangkat Dan Golongan :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="pangkat_pegawai2" name="pangkat_pegawai2" value="<?= $data['pangkat_pegawai2'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">b. Jabatan :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="jabatan_pegawai2" name="jabatan_pegawai2" value="<?= $data['jabatan_pegawai2'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">c. Tingkat Perjalanan Dinas :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="tingkat_pd2" name="tingkat_pd2" value="<?= $data['tingkat_pd2'];?>">
        </div>
        </div>
        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Maksud Perjalanan Dinas :</label>
        <div class="col-sm-8">
        <textarea type="text" class="form-control" id="tujuan_pd" name="tujuan_pd" rows="5" required value="<?= $data['tujuan_pd'];?>"></textarea>
        </div>
        </div>
        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Transportasi:</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="alat_angkutan" name="alat_angkutan" required value="<?= $data['alat_angkutan'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">a. Berangkat Dari (Kota) :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="berangkat_kota" name="berangkat_kota" required value="<?= $data['berangkat_kota'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">b. Tujuan Ke (Kota) :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="tujuan_kota" name="tujuan_kota" required value="<?= $data['tujuan_kota'];?>">
        </div>
        </div>
        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Lama Perjalanan:</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="lama_perjalanan" name="lama_perjalanan" value="<?= $data['lama_perjalanan'];?>" required>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">a. Tanggal Berangkat :</label>
        <div class="col-sm-4">
        <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" required value="<?= $data['tgl_berangkat'];?>">
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">b. Tanggal Kembali:</label>
        <div class="col-sm-4">
        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required value="<?= $data['tgl_kembali'];?>">
        </div>
        </div>
        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Keterangan Lain-lain :</label>
        <div class="col-sm-8">
        <textarea type="text" class="form-control" id="catatan" name="catatan" rows="5" required value="<?= $data['catatan'];?>"></textarea>
        </div>
        </div>



   
    
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</form>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->


<!-- BATAS FOOTER -->
</div>