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
			<div class="form-group">
				<h4 for="usr">
					<center> Pencarian Surat Administrasi UMSU Tahun 2015-2019</center>
				</h4>
				<form method="POST" action="<?= base_url('old/lihatPencarian'); ?>">
					<input type="text" class="form-control" id="keyword" name="keyword" required>
			</div>
			<center>
				<button type="submit" class="btn btn-primary btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-search"></i>
					</span>
					<span class="text">Telusuri</span>
				</button>
			</center>
			</form>
		</div>
	</div>
	
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Hasil Penelusuran Surat 2015-2019</h6>
		</div>

		<div class="card-body">
			
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama File</th>
							<th>Berkas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data->result_array() as $i) :
							$id = $i['id'];
							$hal_surat = $i['hal_surat'];
							$file = $i['file'];
						?>
							<tr>
								<td><?php echo $id; ?></td>
								<td><?php echo $hal_surat; ?></td>
								<td> <a href="<?= base_url('arsip/');?><?php echo $file; ?>" target="_blank" class="dropdown-item">LIHAT</a></td>


								<td>
									<div class="btn-group">


										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
											<i class="fas fa-cog"> </i>
											<span class="caret"></span>
										</button>
										<div class="dropdown-menu">
											<a href="#" data-toggle="modal" data-target="#editArchive<?php echo $id; ?>" class="dropdown-item">EDIT</a>
											<a href="<?= base_url(); ?>old/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
										
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

</div>

<!-- /.container-fluid -->
