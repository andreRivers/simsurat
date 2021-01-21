<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
		<div class="sidebar-brand-icon">
			<img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/logo.png" style="width:30px">
		</div>
		<div class="sidebar-brand-text mx-3">Administrasi</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('admin'); ?> ">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">


	<?php if ($user['role_id'] == '2') { ?>
		<!-- Nav Item - Pages Collapse Menu -->
		<div class="sidebar-heading">
			Archive
		</div>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Archive</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">archive:</h6>

					<a class=" collapse-item" href="<?= base_url('archive/view'); ?>">View (100)</a>
					<a class="collapse-item" href="<?= base_url('archive/report'); ?>">View all</a>
					<a class="collapse-item" href="<?= base_url('archive/uploadBerkas'); ?>">Upload</a>
<a class="collapse-item" href="<?= base_url('archive/keyword'); ?>">Keyword</a>
				</div>
			</div>
		</li>
	<?php } ?>

	<?php if ($user['role_id'] == '1') { ?>
		<div class="sidebar-heading">
			Archive
		</div>
		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Archive</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">archive:</h6>

					<a class=" collapse-item" href="<?= base_url('archive/view'); ?>">View (30)</a>
					<a class=" collapse-item" href="<?= base_url('archive/viewUser'); ?>">View All</a>
				</div>
			</div>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('validasiNew'); ?>">
				<i class="fas fa-fw fa-mobile"></i>
				<span>Scan Archive</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewMasuk'); ?>">
				<i class="fas fa-fw fa-envelope"></i>
				<span>Surat Masuk</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewKeluar'); ?>">
				<i class="fas fa-fw fa-envelope-open"></i>
				<span>Surat Keluar</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewDisposisiUser'); ?>">
				<i class="fas fa-fw fa-share-square"></i>
				<span>Disposisi</span></a>
		</li>
	<?php } ?>

	<?php if ($user['role_id'] == '2') { ?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-file"></i>
				<span>Archive Old</span>
			</a>
			<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">archive:</h6>

					<a class=" collapse-item" href="<?= base_url('old/view'); ?>">View (30)</a>
					<a class="collapse-item" href="<?= base_url('old/report'); ?>">View all</a>

				</div>
			</div>
		</li>
		<!-- Nav Item - Charts -->
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('validasi'); ?>">
				<i class="fas fa-fw fa-mobile"></i>
				<span>Scan Archive</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewMasuk'); ?>">
				<i class="fas fa-fw fa-envelope"></i>
				<span>Surat Masuk</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewKeluar'); ?>">
				<i class="fas fa-fw fa-envelope-open"></i>
				<span>Surat Keluar</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewDisposisi'); ?>">
				<i class="fas fa-fw fa-share-square"></i>
				<span>Disposisi</span></a>
		</li>
	<?php } ?>



	<?php if ($user['role_id'] == '3') { ?>
		<!-- Nav Item - Pages Collapse Menu -->
		<div class="sidebar-heading">
			Archive
		</div>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Archive</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">archive:</h6>

					<a class=" collapse-item" href="<?= base_url('archiveNew/view'); ?>">View (30)</a>
					<?php if ($user['role_id'] == '3') { ?>
						<a class="collapse-item" href="<?= base_url('archiveNew/report'); ?>">View all</a>
					
					<?php } ?>
				</div>
			</div>
		</li>


		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('validasiNew'); ?>">
				<i class="fas fa-fw fa-mobile"></i>
				<span>Scan Archive</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewMasuk'); ?>">
				<i class="fas fa-fw fa-envelope"></i>
				<span>Surat Masuk</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewKeluar'); ?>">
				<i class="fas fa-fw fa-envelope-open"></i>
				<span>Surat Keluar</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewDisposisiUser'); ?>">
				<i class="fas fa-fw fa-share-square"></i>
				<span>Disposisi</span></a>
		</li>


	<?php } ?>

	<?php if ($user['role_id'] == '2') { ?>
		<hr class="sidebar-divider">
		<!-- Heading -->
		<div class="sidebar-heading">
			SPPD
		</div>
		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Sppd</span>
			</a>
			<div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Sppd:</h6>
					<a class=" collapse-item" href="<?= base_url('sppd/newSppd'); ?>">New SPPD</a>
					<a class=" collapse-item" href="<?= base_url('sppd/view30'); ?>">List (30)</a>
					<a class="collapse-item" href="<?= base_url('sppd/viewall'); ?>">List all</a>
				</div>
			</div>
		</li>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Surat Tugas</span>
			</a>
			<div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Surat Tugas:</h6>
					<a class=" collapse-item" href="<?= base_url('suratTugas/newSuratTugas'); ?>">New Surat Tugas</a>
					<a class=" collapse-item" href="<?= base_url('suratTugas/view30'); ?>">List (30)</a>
					<a class="collapse-item" href="<?= base_url('suratTugas/report'); ?>">List all</a>
				</div>
			</div>
		</li>
	<?php } ?>

	<?php if ($user['role_id'] == '5') { ?>
		<div class="sidebar-heading">
			Archive
		</div>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewMasukPimpinan'); ?>">
				<i class="fas fa-fw fa-envelope"></i>
				<span>Surat Masuk</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('disposisi/viewDisposisi'); ?>">
				<i class="fas fa-fw fa-share-square"></i>
				<span>Disposisi</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			SPPD
		</div>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('sppd/list'); ?>">
				<i class="fas fa-fw fa-file"></i>
				<span>List Sppd</span></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('suratTugas/viewPimpinan'); ?>">
				<i class="fas fa-fw fa-file"></i>
				<span>List Surat Tugas</span></a>
		</li>
	<?php } ?>




	<!-- Divider -->
	<?php if ($user['role_id'] == '2') { ?>
		<hr class="sidebar-divider">
		<!-- Heading -->
		<div class="sidebar-heading">
			Master Data
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
				<i class="fas fa-fw fa-folder"></i>
				<span>Master data</span>
			</a>
			<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('usermanagement'); ?>">User Management</a>
					<a class="collapse-item" href="<?= base_url('typearchive'); ?>">Type archive</a>

				</div>
			</div>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('master/arsip'); ?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Master Arsip</span>
			</a>
		</li>
	<?php } ?>



	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<div class="sidebar-heading">
		My Data
	</div>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/profil'); ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>My profile</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/edit_profil'); ?>">
			<i class="fas fa-fw fa-edit"></i>
			<span>Edit profile</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/changepassword'); ?>">
			<i class="fas fa-fw fa-table"></i>
			<span>Change password</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline active">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->