<?php
// $query123 = "SELECT max(id) as kode FROM app_archive ";
// $i = $this->db->query($query123)->result_array();
// $b = '$kode';
// var_dump($i);
// die;

$auto = "SELECT IFNULL(MAX(id_permohonan)+1,1) AS nomorPermohonan FROM app_surattugas";
$no = $this->db->query($auto)->row_array();

?>

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
        <form method="post" action="<?= base_url('suratTugas/newSuratTugas'); ?>">

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">ID PERMOHONAN:</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $no['nomorPermohonan']; ?>" required readonly>
        </div>
				</div>
				
				<div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Pejabat Berwenang Memberi Perintah :</label>
        <div class="col-sm-8">
        <select class="form-control" id="email_pimpinan" name="email_pimpinan" required>
            <option selected disabled value="">Silahkan Pilih</option>
						<option value="agussani@umsu.ac.id">Assoc. Prof. Dr. Agussani, M.AP</option>
						<option value="muhammadarifin@umsu.ac.id">Assoc. Prof. Dr. Muhammad Arifin, M.Hum</option>
						<option value="akrim@umsu.ac.id">Assoc. Prof. Dr. Akrim, M.Pd</option>
						<option value="rudianto@umsu.ac.id">Dr. Rudianto, M.Si</option>
						<option value="gunawan@umsu.ac.id">Gunawan, S.Pd.I., M.TH</option>
              
                </select>
        </div>
        </div>
        
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">No Surat Masuk:</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk" required>
        <small class="text-danger pl-2">- Contoh Pengisian : 123/KEP/II.3-AU/ASAL/D/2020 </small>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Tgl Surat Masuk :</label>
        <div class="col-sm-8">
        <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk" required>
        </div>
        </div>

        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">No Surat Keluar:</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="no_surat_keluar" name="no_surat_keluar" required>
        <small class="text-danger pl-2">- Contoh Pengisian : 123/KEP/II.3-AU/UMSU/D/2020 </small>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Balasan Surat Dari (Fakultas/Unit/Lembaga/Dll):</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="balasan_surat" name="balasan_surat" required>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Perihal (Pelatihan/Undangan/Dll):</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="perihal" name="perihal" required>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Menghadiri (Judul Undangan/Pelatihan/Dll):</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="menghadiri" name="menghadiri"required>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Ditugaskan Kepada:</label>
        <div class="col-sm-8">
        <table class="table table-bordered" id="dynamic_field">
              <tr>
                <td><input type="text" name="nama[]" placeholder="Nama Lengkap" class="form-control name_list" required></td>
                <td><input type="text" name="jabatan[]" placeholder="Jabatan" class="form-control name_jabatan" required></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
              </tr>
            </table>
        </div>
        </div>


        <hr>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Hari/Tanggal</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="tanggal" name="tanggal" required>
        <small class="text-danger pl-2">- Contoh Pengisian : Senin, 12 Desember 2020 </small>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Pukul</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="pukul" name="pukul" required>
        <small class="text-danger pl-2">- Contoh Pengisian : 08:00 Wib s/d Selesai </small>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Lokasi</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="tempat" name="tempat" required>
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
