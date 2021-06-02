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
						<th>NO</th>
							<th>Keterangan</th>
							<th>Berkas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						foreach ($data->result_array() as $i) :
							$id = $i['id'];
							$instansi = $i['instansi'];
							$no_surat = $i['no_surat'];
							$tgl_surat = $i['tgl_surat'];
							$tgl_masuk = $i['tgl_masuk'];
							$isi_ringkas = $i['isi_ringkas'];
							$berkas = $i['berkas'];
							$hal_surat = $i['hal_surat'];
							$tahun = $i['tahun'];
						?>
								<tr>
								<td><?php echo $id; ?></td>
								<td>Surat Dari: <?php echo $instansi; ?> 
								<br>
								No. Surat:  <?php echo $no_surat; ?>
								<br>
								Tanggal Surat:  <?php echo $tgl_surat; ?>
								<br>
								Hal Surat:  <?php echo $hal_surat; ?>
								<br>
								<small>Ringkasan Surat :  <?php echo $isi_ringkas; ?></small>
								<br>
								<small>Tanggal Surat Diterima:  <?php echo $tgl_masuk; ?></small>
								</td>
								<td> <a href="<?= base_url('arsipLain/');?><?php echo $berkas; ?>" target="_blank" class="dropdown-item">LIHAT</a></td>


								<td>
									<div class="btn-group">


										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
											<i class="fas fa-cog"> </i>
											<span class="caret"></span>
										</button>
										<div class="dropdown-menu">
											<a href="#" data-toggle="modal" data-target="#editArchive<?php echo $id; ?>" class="dropdown-item">EDIT</a>
											<a href="<?= base_url(); ?>arsipLuar/delete/<?php echo $id; ?>" class="dropdown-item btn-sm tombol-hapus">HAPUS</a>
										
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
