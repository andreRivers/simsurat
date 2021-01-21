<?php
$email = $this->session->userdata('email');
if ($user['role_id'] == '2') {
  $suratMasuk = $this->db->query("SELECT * FROM app_notif_suratMasuk where penerima='$email' AND notif='1'");
  $disposisi = $this->db->query("SELECT * FROM app_notif_disposisi where penerima='$email' AND notif='1'");
	$nsppd = $this->db->query("SELECT * FROM app_sppd where notif='1'");
	$sppd = $this->db->query("SELECT * FROM app_sppd where notif='1'")->result_array();

	$suratTugas = $this->db->query("SELECT * FROM app_surattugas where notif='1'");
	$nSuratTugas = $this->db->query("SELECT * FROM app_surattugas where notif='1'")->result_array();
  $sppd1 = $nsppd->num_rows();
  $suratTugas1 = $suratTugas->num_rows();
  $suratMasuk1 = $suratMasuk->num_rows();
  $disposisi1 = $disposisi->num_rows();


  $nSuratMasuk = $this->db->query("SELECT app_notif_suratMasuk.id,
  app_notif_suratMasuk.id_surat,
  app_notif_suratMasuk.penerima,
  app_user.email,
  app_user.image,
  app_disposisi.hal,
  app_disposisi.date_created
  FROM app_notif_suratMasuk
 LEFT JOIN app_user 
 ON app_user.email= app_notif_suratMasuk.penerima 
 LEFT JOIN app_disposisi
 ON app_disposisi.id_surat = app_notif_suratMasuk.id_surat 
 where app_notif_suratMasuk.penerima='$email' AND app_notif_suratMasuk.notif='1'")->result_array();

  $nDisposisi = $this->db->query("SELECT
  app_notif_disposisi.id,
   app_notif_disposisi.id_surat,
   app_notif_disposisi.penerima,
   app_user.email,
   app_user.image,
   app_disposisi.hal,
   app_disposisi.pimpinan,
   app_disposisi.date_created
   FROM app_notif_disposisi
LEFT JOIN app_user 
ON app_user.email= app_notif_disposisi.penerima 
LEFT JOIN app_disposisi
ON app_disposisi.id_surat = app_notif_disposisi.id_surat 
where app_notif_disposisi.penerima='$email' AND app_notif_disposisi.notif='1'")->result_array();
}
?>

<?php
$email = $this->session->userdata('email');
if ($user['role_id'] == '1') {
  $suratMasuk = $this->db->query("SELECT * FROM app_notif_suratMasuk where penerima='$email' AND notif='1'");
  $disposisi = $this->db->query("SELECT * FROM app_notif_disposisi where penerima='$email' AND notif='1'");
  $sppd = $this->db->query("SELECT * FROM app_sppd where notif='1'");
  $suratTugas = $this->db->query("SELECT * FROM app_surattugas where notif='1'");
  $sppd1 = $sppd->num_rows();
  $suratTugas1 = $suratTugas->num_rows();
  $suratMasuk1 = $suratMasuk->num_rows();
  $disposisi1 = $disposisi->num_rows();


  $nSuratMasuk = $this->db->query("SELECT app_notif_suratMasuk.id,
   app_notif_suratMasuk.id_surat,
   app_notif_suratMasuk.penerima,
   app_user.email,
   app_user.image,
   app_disposisi.hal,
   app_disposisi.date_created
   FROM app_notif_suratMasuk
  LEFT JOIN app_user 
  ON app_user.email= app_notif_suratMasuk.penerima 
  LEFT JOIN app_disposisi
  ON app_disposisi.id_surat = app_notif_suratMasuk.id_surat 
  where app_notif_suratMasuk.penerima='$email' AND app_notif_suratMasuk.notif='1'")->result_array();

  $nDisposisi = $this->db->query("SELECT
  app_notif_disposisi.id,
   app_notif_disposisi.id_surat,
   app_notif_disposisi.penerima,
   app_user.email,
   app_user.image,
   app_disposisi.hal,
   app_disposisi.date_created
   FROM app_notif_disposisi
LEFT JOIN app_user 
ON app_user.email= app_notif_disposisi.penerima 
LEFT JOIN app_disposisi
ON app_disposisi.id_surat = app_notif_disposisi.id_surat 
where app_notif_disposisi.penerima='$email' AND app_notif_disposisi.notif='1'")->result_array();
}
?>

<?php
$email = $this->session->userdata('email');
if ($user['role_id'] == '3') {
  $suratMasuk = $this->db->query("SELECT * FROM app_notif_suratMasuk where penerima='$email' AND notif='1'");
  $disposisi = $this->db->query("SELECT * FROM app_notif_disposisi where penerima='$email' AND notif='1'");
  $sppd = $this->db->query("SELECT * FROM app_sppd where notif='1'");
  $suratTugas = $this->db->query("SELECT * FROM app_surattugas where notif='1'");
  $sppd1 = $sppd->num_rows();
  $suratTugas1 = $suratTugas->num_rows();
  $suratMasuk1 = $suratMasuk->num_rows();
  $disposisi1 = $disposisi->num_rows();


  $nSuratMasuk = $this->db->query("SELECT app_notif_suratMasuk.id,
   app_notif_suratMasuk.id_surat,
   app_notif_suratMasuk.penerima,
   app_user.image,
   app_disposisi.email,
   app_disposisi.hal,
   app_disposisi.date_created
   FROM app_notif_suratMasuk
  LEFT JOIN app_user 
  ON app_user.email= app_notif_suratMasuk.penerima 
  LEFT JOIN app_disposisi
  ON app_disposisi.id_surat = app_notif_suratMasuk.id_surat 
  where app_notif_suratMasuk.penerima='$email' AND app_notif_suratMasuk.notif='1'")->result_array();

  $nDisposisi = $this->db->query("SELECT
  app_notif_disposisi.id,
   app_notif_disposisi.id_surat,
   app_notif_disposisi.penerima,
   app_user.image,
   app_disposisi.email,
   app_disposisi.hal,
   app_disposisi.date_created
   FROM app_notif_disposisi
LEFT JOIN app_user 
ON app_user.email= app_notif_disposisi.penerima 
LEFT JOIN app_disposisi
ON app_disposisi.id_surat = app_notif_disposisi.id_surat 
where app_notif_disposisi.penerima='$email' AND app_notif_disposisi.notif='1'")->result_array();
}
?>



<?php
$email = $this->session->userdata('email');
if ($user['role_id'] == '5') {
	$suratMasuk = $this->db->query("SELECT * FROM app_disposisi where pimpinan='$email' AND sts='2'");
	$sppd = $this->db->query("SELECT * FROM app_sppd where email_pimpinan='$email' AND status='1'");
	$nsppd = $this->db->query("SELECT * FROM app_sppd where email_pimpinan='$email' AND status='1'")->result_array();
	$suratTugas = $this->db->query("SELECT * FROM app_surattugas where  email_pimpinan='$email' AND status='1'");
	$nSuratTugas = $this->db->query("SELECT * FROM app_surattugas where  email_pimpinan='$email' AND status='1'")->result_array();
	$sppd1 = $sppd->num_rows();
  $suratTugas1 = $suratTugas->num_rows();
  $nSuratMasuk = $this->db->query("SELECT app_disposisi.id,
   app_disposisi.id_surat,
   app_disposisi.pimpinan,
   app_user.image,
   app_disposisi.email,
   app_disposisi.hal,
   app_disposisi.date_created
   FROM app_disposisi
  LEFT JOIN app_user 
  ON app_user.email= app_disposisi.email 
  where app_disposisi.pimpinan='$email' AND app_disposisi.sts='2'")->result_array();
}
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- USER REKTORAT -->
        <?php if ($user['role_id'] == '2') { ?>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter"><?= $sppd1 + $suratTugas1 ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
							</h6>
							<?php foreach ($sppd as $sdd) : ?>
								<a class="dropdown-item d-flex align-items-center" href="<?= base_url('sppd/nView/');?><?= $sdd['id']; ?>">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">Tanggal Berangkat : <?= $sdd['tgl_berangkat']; ?> </div>
									<span class="font-weight-bold"><?= $sdd['tujuan_pd']; ?></span>
									<br>
									<span class="small text-gray-500"><?= $sdd['nama_pegawai']; ?> | <?= $sdd['nama_pegawai2']; ?></span>
                </div>
              </a>
							<?php endforeach; ?>

							<?php foreach ($nSuratTugas as $nst) : ?>
								<a class="dropdown-item d-flex align-items-center" href="<?= base_url('suratTugas/nView/');?><?= $nst['id'];?>">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?= $nst['no_surat_keluar']; ?> </div>
									<span class="font-weight-bold">Perihal: <?= $nst['perihal']; ?></span>
									<br>
									<span class="small text-gray-500">Tanggal Acara: <?= $nst['tanggal']; ?> </span>
                </div>
              </a>
							<?php endforeach; ?>
            </div>
          </li>
        <?php } ?>
        <!-- -------------------------------------- -->

        <?php if ($user['role_id'] == '5') { ?>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter"><?= $sppd1 +  $suratTugas1 ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
               Pemberitahuan
							</h6>
							
							<?php foreach ($nsppd as $sdd) : ?>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('sppd/list');?>">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">Tanggal Berangkat : <?= $sdd['tgl_berangkat']; ?> </div>
									<span class="font-weight-bold"><?= $sdd['tujuan_pd']; ?></span>
									<br>
									<span class="small text-gray-500"><?= $sdd['nama_pegawai']; ?> | <?= $sdd['nama_pegawai2']; ?></span>
                </div>
              </a>
							<?php endforeach; ?>

							<?php foreach ($nSuratTugas as $nst) : ?>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('suratTugas/viewPimpinan');?>">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?= $nst['no_surat_keluar']; ?> </div>
									<span class="font-weight-bold">Perihal: <?= $nst['perihal']; ?></span>
									<br>
									<span class="small text-gray-500">Tanggal Acara: <?= $nst['tanggal']; ?> </span>
                </div>
              </a>
							<?php endforeach; ?>

            </div>
          </li>
        <?php } ?>





        <!-- USER REKTORAT -->
        <?php if ($user['role_id'] == '2') { ?>
          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter"><?= $suratMasuk1 + $disposisi1 ?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
              Pesan Masuk
              </h6>

              <?php foreach ($nSuratMasuk as $sM) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewMasuk/'); ?><?= $sM['id']; ?>/<?= $sM['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $sM['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $sM['hal']; ?>.</div>
                    <div class="small text-gray-500"><?= $sM['email']; ?>· <?= $sM['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

              <?php foreach ($nDisposisi as $dis) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewDisposisi/'); ?><?= $dis['id']; ?>/<?= $dis['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $dis['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $dis['hal']; ?>.</div>
                    <div class="disall text-gray-500"><?= $dis['pimpinan']; ?>· <?= $dis['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

            </div>
          </li>
        <?php } ?>
        <!-- -------------------------------------- -->

        <!-- USER REKTORAT -->
        <?php if ($user['role_id'] == '1') { ?>
          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter"><?= $suratMasuk1 + $disposisi1 ?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>

              <?php foreach ($nSuratMasuk as $sM) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewMasuk/'); ?><?= $sM['id']; ?>/<?= $sM['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $sM['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $sM['hal']; ?>.</div>
                    <div class="small text-gray-500"><?= $sM['email']; ?>· <?= $sM['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

              <?php foreach ($nDisposisi as $dis) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewDisposisi/'); ?><?= $dis['id']; ?>/<?= $dis['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $dis['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $dis['hal']; ?>.</div>
                    <div class="disall text-gray-500"><?= $dis['email']; ?>· <?= $dis['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

            </div>
          </li>
        <?php } ?>
        <!-- -------------------------------------- -->



        <!-- USER REKTORAT -->
        <?php if ($user['role_id'] == '3') { ?>
          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter"><?= $suratMasuk1 + $disposisi1 ?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>

              <?php foreach ($nSuratMasuk as $sM) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewMasuk/'); ?><?= $sM['id']; ?>/<?= $sM['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $sM['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $sM['hal']; ?>.</div>
                    <div class="small text-gray-500"><?= $sM['email']; ?>· <?= $sM['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

              <?php foreach ($nDisposisi as $dis) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/nViewDisposisi/'); ?><?= $dis['id']; ?>/<?= $dis['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $dis['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $dis['hal']; ?>.</div>
                    <div class="disall text-gray-500"><?= $dis['email']; ?>· <?= $dis['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>

            </div>
          </li>
        <?php } ?>
        <!-- -------------------------------------- -->


        <!-- USER REKTORAT -->
        <?php if ($user['role_id'] == '5') { ?>
          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter"><?= $suratMasuk->num_rows(); ?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>

              <?php foreach ($nSuratMasuk as $sM) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('disposisi/viewMasukPimpinan/'); ?><?= $sM['id']; ?>/<?= $sM['id_surat']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $sM['image']; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $sM['hal']; ?>.</div>
                    <div class="small text-gray-500"><?= $sM['email']; ?>· <?= $sM['date_created']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>
            </div>
          </li>
        <?php } ?>
        <!-- -------------------------------------- -->


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/profile/<?= $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('admin/profil'); ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->
