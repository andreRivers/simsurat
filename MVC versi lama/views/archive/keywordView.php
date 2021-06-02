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
			<h6 class="m-0 font-weight-bold text-primary">UPLOAD</h6>
		</div>

		<div class="card-body">
			<div class="form-group">
				<h4 for="usr">
					<center> Telusuri Surat Administrtasi UMSU</center>
				</h4>
				<form method="POST" action="<?= base_url('archive/keywordView'); ?>">
					<input type="text" class="form-control" id="keyword" name="keyword" required>
			</div>
			<center>
				<button type="submit" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-search"></i>
					</span>
					<span class="text">Search</span>
				</button>
			</center>
			</form>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_a'); ?>"></div>
	<?php if ($this->session->flashdata('flash_a')) : ?>

	<?php endif; ?>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
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
                                            Tujuan : <?php echo $tujuan; ?> | TANGGAL BUAT : <?php echo Archive::format($date_created); ?>
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
											<a href="#" data-toggle="modal" data-target="#editArchive<?php echo $id; ?>" class="dropdown-item">EDIT</a>
 										<a href="<?= base_url('archive/'); ?>cetak/<?php echo $id; ?>" target="_blank" class="dropdown-item" >QR CODE</a>
											<a href="#" data-toggle="modal" data-target="#upload<?php echo $id; ?>" class="dropdown-item">UPLOAD</a>
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

<!-- /.container-fluid -->
